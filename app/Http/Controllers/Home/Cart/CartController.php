<?php

namespace App\Http\Controllers\Home\Cart;

use App\Http\Controllers\Controller;
use App\Models\Suite;
use App\Models\BedType;
use App\Models\RoomType;
use App\Models\Occupancy;
use App\Models\Size;
use App\Models\View;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class CartController extends Controller
{
    public function show()
    {
        $title = 'StaySphere : Cart';
        $label = 'Cart';

        if (!auth()->check()) {
            Alert::warning('Login Required', 'Please login first to continue booking.');
            return redirect()->back();
        }

        $cart = session()->get('cart', [
            'items' => [],
            'cartSubtotal' => 0,
            'roomService' => 0,
            'orderTotal' => 0,
        ]);
       
        return view('Home.Cart.cart', [
            'cartItems' => $cart['items'] ?? [],
            'cart' => $cart,
            'label' => $label,
            'title' => $title,
        ]);
    }

    public function addtoCart(Request $request)
    {
        $roomInfo = $request->only([
            'id',
            'room_number',
            'description',
            'price',
            'status',
            'room_type_id',
        ]);

        $checkinInfo = $request->validate([
            'checkin_date' => [
                'required',
                'date_format:Y-m-d',
                'after_or_equal:' . now()->format('Y-m-d'),
            ],
            'checkin_time' => [
                'required',
                'date_format:H:i',
            ],
            'checkout_date' => [
                'required',
                'date_format:Y-m-d',
                'after_or_equal:' . $request->input('checkin_date'),
            ],
            'checkout_time' => [
                'required',
                'date_format:H:i',
            ],
            'guest-select' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);

        if (!auth()->check()) {
            Alert::warning('Login Required', 'Please login first to continue booking.');
            return redirect()->back()->withInput();
        }

        if (!empty($request->form_botcheck)) {
            alert()->error('Oops...', 'Bot Detected!');
            return redirect()->back();
        }

        $cart = session()->get('cart', [
            'items' => [],
            'cartSubtotal' => 0,
            'roomService' => 0,
            'orderTotal' => 0,
        ]);

        $checkinDate = Carbon::createFromFormat('Y-m-d H:i', $checkinInfo['checkin_date'] . ' ' . $checkinInfo['checkin_time']);
        $checkoutDate = Carbon::createFromFormat('Y-m-d H:i', $checkinInfo['checkout_date'] . ' ' . $checkinInfo['checkout_time']);
        $days = round($checkinDate->diffInDays($checkoutDate));
        $total_price = $days * $roomInfo['price'];
        $roomService = 200;

        // Fetch room type name
        $roomType = RoomType::find($roomInfo['room_type_id']);

        $cart['items'][$roomInfo['id']] = array_merge($roomInfo, $checkinInfo, [
            'days' => $days,
            'total_price' => $total_price,
            'room_type' => $roomType->name, // Directly use the name
            'room_type_id' => $roomType->id,
            'guest' => $checkinInfo['guest-select'],
            'checkin_datetime' => $checkinInfo['checkin_date'] . ' ' . $checkinInfo['checkin_time'],
            'checkout_datetime' => $checkinInfo['checkout_date'] . ' ' . $checkinInfo['checkout_time'],
        ]);

        // Recalculate totals
        $cartSubtotal = 0;
        foreach ($cart['items'] as $item) {
            $cartSubtotal += $item['total_price'];
        }
        $orderTotal = $cartSubtotal + $roomService;

        $cart['cartSubtotal'] = $cartSubtotal;
        $cart['roomService'] = $roomService;
        $cart['orderTotal'] = $orderTotal;
        session()->put('cart', $cart);

        toast('Added to cart', 'success')->autoClose(5000);

        return redirect()->route('cart.show');
    }
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart['items'][$id])) {
            unset($cart['items'][$id]);

            $cartSubtotal = 0;
            foreach ($cart['items'] as $item) {
                $cartSubtotal += $item['total_price'];
            }

            $roomService = $cart['roomService'] ?? 200;
            $cart['cartSubtotal'] = $cartSubtotal;
            $cart['orderTotal'] = $cartSubtotal + $roomService;

            session()->put('cart', $cart);


            toast('Item removed from cart', 'error')->autoClose(3000);
        }

        return redirect()->back();
    }

    public function checkout()
    {
        $title = 'StaySphere : Checkout';
        $label = 'Checkout';

        $cart = session()->get('cart', []);

        if (empty($cart['items'])) {
            Alert::info('Cart is empty', 'Please add items before checking out.');
            return redirect()->route('cart.show');
        }

        // Process each cart item
        foreach ($cart['items'] as $key => $item) {
            // Ensure datetime strings are properly formatted
            $checkin = Carbon::createFromFormat('Y-m-d H:i', $item['checkin_datetime']);
            $checkout = Carbon::createFromFormat('Y-m-d H:i', $item['checkout_datetime']);

            // Enhance the item data
            $cart['items'][$key] = array_merge($item, [
                // Formatted dates/times
                'formatted_checkin' => $checkin->format('H:i d/m/Y'),  // 14:15 13/05/2025
                'formatted_checkout' => $checkout->format('H:i d/m/Y'), // 14:15 22/05/2025
                'duration_nights' => $item['days'] . ' night' . ($item['days'] > 1 ? 's' : ''),

                // Price formatting
                'price_per_night' => '₹' . number_format($item['price'], 2),
                'total_price_formatted' => '₹' . number_format($item['total_price'], 2),

                // Room details (using existing room_type value)
                'room_details' => [
                    'type' => $item['room_type'], // 'Deluxe'
                    'number' => $item['room_number'] // '403'
                ],

                // Guest information
                'guest_count' => $item['guest-select'] . ' guest' . ($item['guest-select'] > 1 ? 's' : '')
            ]);
        }

        // Format cart totals
        $cart['totals'] = [
            'subtotal' => '₹' . number_format($cart['cartSubtotal'], 2),
            'service' => '₹' . number_format($cart['roomService'], 2),
            'total' => '₹' . number_format($cart['orderTotal'], 2)
        ];

        return view('home.cart.checkout', [
            'cart' => $cart,
            'label' => $label,
            'title' => $title
        ]);
    }
}
