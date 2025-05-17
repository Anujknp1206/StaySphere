<?php

namespace App\Http\Controllers\Home\Booking;

use App\Http\Controllers\Controller;
use App\Mail\AdminBookingNotification;
use App\Mail\BookingConfirmed;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Room;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class RoomBookingController extends Controller
{
    public function placeOrder(Request $request)
    {
        $setting=Setting::first();
        DB::beginTransaction();

        try {
            // 1. Validate Customer/Payment Data
            $validated = $request->validate([
                'payment_method' => 'required|in:bank_transfer,upi,stripe',
                'transaction_id' => 'required_if:payment_method,bank_transfer,upi|string|max:255|nullable',
                'screenshot' => [
                    'required_if:payment_method,bank_transfer,upi',
                    'image',
                    'mimes:jpeg,png,jpg',
                    'max:4048',
                    'dimensions:min_width=300,min_height=300,max_width=2000,max_height=2000'
                ],
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'company_name' => 'nullable|string|max:255',
                'email' => 'required|email:rfc,dns|max:255',
                'address' => 'required|string|max:500',
                'more_address' => 'nullable|string|max:500',
                'country' => 'required|string|size:2',
                'state' => 'required|string|max:100',
                'city' => 'required|string|max:100',
                'zip_code' => 'required|regex:/^[a-zA-Z0-9\- ]+$/',
                'order_notes' => 'nullable|string|max:1000',
            ]);

            // 2. Validate and Get Session Data
            $cart = Session::get('cart');

            if (empty($cart) || !isset($cart['items']) || empty($cart['items'])) {
                throw new \Exception('Your booking session has expired. Please start over.');
            }

            $roomData = reset($cart['items']); // Get first room item

            // Validate essential room data exists
            $requiredRoomFields = [
                'id',
                'price',
                'checkin_datetime',
                'checkout_datetime',
                'guest',
                'days',
                'room_type'
            ];

            foreach ($requiredRoomFields as $field) {
                if (!isset($roomData[$field])) {
                    throw new \Exception("Invalid room data: missing $field");
                }
            }

            // 3. Process File Upload (if required)
            $screenshotPath = null;
            if (in_array($validated['payment_method'], ['bank_transfer', 'upi'])) {
                if (!$request->hasFile('screenshot')) {
                    throw new \Exception('Payment proof is required for this payment method');
                }
                $screenshotPath = $request->file('screenshot')->store('payment-proofs');
            }
            $overlappingBooking = Booking::where('room_id', $roomData['id'])
                ->where('status', Booking::STATUS_BOOKED)
                ->where(function ($query) use ($roomData) {
                    $query->whereBetween('check_in', [$roomData['checkin_datetime'], $roomData['checkout_datetime']])
                        ->orWhereBetween('check_out', [$roomData['checkin_datetime'], $roomData['checkout_datetime']])
                        ->orWhere(function ($query) use ($roomData) {
                            $query->where('check_in', '<=', $roomData['checkin_datetime'])
                                ->where('check_out', '>=', $roomData['checkout_datetime']);
                        });
                })
                ->exists();

            if ($overlappingBooking) {
                DB::rollBack();
                Alert::error('Room Already Booked', 'The selected room is not available for the chosen dates.');
                return redirect()->route('cart.checkout');
            }


            // 4. Create Booking
            $bookingData = [
                'user_id' => auth()->id(),
                'room_id' => $roomData['id'],
                'check_in' => $roomData['checkin_datetime'],
                'check_out' => $roomData['checkout_datetime'],
                'number_of_guests' => $roomData['guest'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'address' => $validated['address'],
                'country' => $validated['country'],
                'zip_code' => $validated['zip_code'],
                'total_amount' => $cart['orderTotal'] ?? $roomData['total_price'] ?? $roomData['price'] * $roomData['days'],
                'status' => Booking::STATUS_BOOKED,
                'payment_status' => $validated['payment_method'] === 'stripe'
                    ? Booking::PAYMENT_STATUS_PAID
                    : Booking::PAYMENT_STATUS_PENDING,
                'company_name' => $validated['company_name'],
                'more_address' => $validated['more_address'],
                'state' => $validated['state'],
                'city' => $validated['city'],
                'order_notes' => $validated['order_notes'] ?? null,
                'room_price' => $roomData['price'],
                'room_service' => $cart['roomService'] ?? 0,
                'duration_days' => $roomData['days'],
                'room_type' => $roomData['room_type'] ?? 'Unknown',
            ];
            $room = Room::find($roomData['id']);
            $booking = Booking::create($bookingData);
            $room->update(['status' => 'booked']);


            // 5. Create Payment
            $paymentData = [
                'amount' => $bookingData['total_amount'],
                'payment_method' => $validated['payment_method'],
                'transaction_id' => $validated['transaction_id'] ?? null,
                'screenshot' => $screenshotPath,
                'status' => $validated['payment_method'] === 'stripe'
                    ? Payment::STATUS_SUCCESS
                    : Payment::STATUS_FAILED,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'billing_address' => $this->formatBillingAddress($validated),
            ];
            $booking->payments()->create($paymentData);

            // Optional verification (you can skip this if confident in $payment above)
            $latestPayment = Payment::where('booking_id', $booking->id)->latest()->first();
            if ($latestPayment && $latestPayment->status === Payment::STATUS_SUCCESS) {
                $booking->update(['payment_status' => Booking::PAYMENT_STATUS_PAID]);
            }
            try {
                Mail::to($booking->email)->send(new BookingConfirmed($booking, $setting));

                Mail::to(config('mail.admin'))->send(new AdminBookingNotification($booking, $setting));

            } catch (\Exception $mailException) {
                Log::error('Mail Sending Failed: ' . $mailException->getMessage(), [
                    'booking_id' => $booking->id,
                    'exception' => $mailException,
                ]);
                // Optionally add alert or flash message about mail failure here
            }
            // 6. Clear Cart and Commit
            Session::forget('cart');
            Session::put('latest_booking_id', $booking->id);
            DB::commit();
            Alert::success('Booking Successfull', 'Enjoy Your Stay');
            return redirect()->route('stripe.success');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Alert::error('Booking Failed', 'Somthing Went wrong');
            return redirect()->route('cart.checkout');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Booking Error: ' . $e->getMessage(), [
                'exception' => $e,
                'request' => $request->except(['screenshot']), // Don't log file data
                'session' => Session::get('cart')
            ]);
            Alert::error('Booking Failed', 'Somthing Went wrong');
            return redirect()->route('cart.checkout');
        }
    }

    protected function formatBillingAddress(array $data): string
    {
        $parts = [
            $data['address'],
            $data['more_address'],
            implode(', ', array_filter([
                $data['city'],
                $data['state'],
                $data['zip_code']
            ])),
            $data['country']
        ];

        return implode("\n", array_filter($parts));
    }


}