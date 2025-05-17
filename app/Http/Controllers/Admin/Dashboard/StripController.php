<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Setting;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Stripe\Stripe;

class StripController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $checkoutSession = Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'inr',
                        'product_data' => [
                            'name' => 'Hotel Booking',
                        ],
                        'unit_amount' => $request->amount * 100, // Amount in paise
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
        ]);

        return redirect($checkoutSession->url);
    }

    public function success()
    {
        $setting = Setting::first();
        $bookingId = Session::get('latest_booking_id');
        $title = 'Booking Confirmed:Thankyou';
        if (!$bookingId) {
            return redirect()->route('roomList')->with('error', 'Booking not found.');
        }
        $booking = Booking::with(['room', 'payments'])->findOrFail($bookingId);
        return view('home.payment.success', compact('title', 'setting','booking'));
    }

    public function cancel()
    {
        return view('home.payment.cancel', compact('title', 'label'));
    }
}
