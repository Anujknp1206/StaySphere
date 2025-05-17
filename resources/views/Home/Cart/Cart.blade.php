@extends('home.homelayouts.master')

@section('content')
    <section>
        <div class="container pt-120 pb-100">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered tbl-shopping-cart">
                                <thead>
                                    <tr>
                                        <th class="text-center">S. No.</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Room Number</th>
                                        <th class="text-center">Guests</th>
                                        <th class="text-center">Check-in</th>
                                        <th class="text-center">Check-out</th>
                                        <th class="text-center">Price / Night</th>
                                        <th class="text-center">Total Days</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($cartItems))
                                        @foreach($cartItems as $item)
                                            <tr class="cart_item">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">
                                                    <form method="POST" action="{{ route('cart.remove', $item['id']) }}"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="border: none; background: none;">
                                                            <i class="fa-light fa-trash text-danger"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td class="text-center">{{ $item['room_number'] ?? '-' }}</td>
                                                <td class="text-center">{{ $item['guest-select'] ?? '-' }}</td>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i', $item['checkin_datetime'])->format('H:i d/m/Y') }}
                                                </td>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i', $item['checkout_datetime'])->format('H:i d/m/Y') }}
                                                </td>
                                                <td class="text-center">₹{{ number_format($item['price'], 2) }}</td>
                                                <td class="text-center">{{ $item['days'] }} day(s)</td>
                                                <td class="text-center">₹{{ number_format($item['total_price'], 2) }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10" class="text-center">Your cart is empty.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 mt-30">
                        <div class="row">
                            <div class="col-md-5">
                                <h4>Cart Totals</h4>
                                <table class="table table-bordered cart-total">
                                    <tbody>
                                        <tr>
                                            <td class="text-center">Cart Subtotal</td>
                                            <td class="text-center">₹{{ number_format($cart['cartSubtotal'] ?? 0, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Room Service</td>
                                            <td class="text-center">₹{{ number_format($cart['roomService'] ?? 0, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Order Total</td>
                                            <td class="text-center">₹{{ number_format($cart['orderTotal'] ?? 0, 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a class="theme-btn btn-style-one" href="{{ route('cart.checkout') }}">
                                    <span class="btn-title">Proceed to Checkout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection