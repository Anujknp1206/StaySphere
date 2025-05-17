@extends('home.homelayouts.master')
@section('content')
    <section>
        <div class="container pt-70 pb-120">
            <div class="section-content">
                <form id="checkout-form" action="{{ route('checkout.placeOrder') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-30">
                        <div class="col-md-6">
                            <div class="billing-details">
                                <h3 class="mb-30">Billing Details</h3>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="checkuot-form-fname">First Name</label>
                                        <input id="checkuot-form-fname" name="first_name" type="text" required
                                            class="form-control" placeholder="First Name">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="checkuot-form-lname">Last Name</label>
                                        <input id="checkuot-form-lname" name="last_name" type="text" required
                                            class="form-control" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="checkuot-form-cname">Company Name</label>
                                            <input id="checkuot-form-cname" name="company_name" type="text" required
                                                class="form-control" placeholder="Company Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="checkuot-form-email">Email Address</label>
                                            <input id="checkuot-form-email" name="email" type="email" class="form-control"
                                                placeholder="Email Address">
                                        </div>
                                        <div class="mb-3">
                                            <label for="checkuot-form-address">Address</label>
                                            <input id="checkuot-form-address" name="address" type="text" required
                                                class="form-control" placeholder="Street address">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="more_address"
                                                placeholder="Apartment, suite, unit etc. (optional)">
                                        </div>
                                    </div>
                                    <!-- Country -->
                                    <div class="mb-3 col-md-6">
                                        <label for="country">Country</label>
                                        <select class="form-control" id="country" name="country">
                                            <option value="">Select Country</option>
                                            <option value="US">United States</option>
                                            <option value="IN">India</option>
                                            <option value="CA">Canada</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="AU">Australia</option>
                                            <option value="DE">Germany</option>
                                            <option value="FR">France</option>
                                            <option value="IT">Italy</option>
                                            <option value="JP">Japan</option>
                                            <option value="CN">China</option>
                                            <option value="BR">Brazil</option>
                                            <option value="RU">Russia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="MX">Mexico</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="EG">Egypt</option>
                                            <option value="AR">Argentina</option>
                                            <option value="KR">South Korea</option>
                                            <option value="SG">Singapore</option>
                                            <option value="NZ">New Zealand</option>

                                        </select>
                                    </div>

                                    <!-- State -->
                                    <div class="mb-3 col-md-6">
                                        <label for="state">State/Province</label>
                                        <select class="form-control" id="state" name="state">
                                            <option value="">Select State</option>
                                            <option value="AP">Andhra Pradesh</option>
                                            <option value="DL">Delhi</option>
                                            <option value="KA">Karnataka</option>
                                            <option value="MH">Maharashtra</option>
                                            <option value="TN">Tamil Nadu</option>
                                            <option value="UP">Uttar Pradesh</option>
                                            <option value="WB">West Bengal</option>

                                            <option value="CA">California</option>
                                            <option value="NY">New York</option>
                                            <option value="TX">Texas</option>
                                            <option value="FL">Florida</option>
                                            <option value="IL">Illinois</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="OH">Ohio</option>

                                            <option value="ENG">England</option>
                                            <option value="SCT">Scotland</option>
                                            <option value="WLS">Wales</option>
                                            <option value="NIR">Northern Ireland</option>

                                            <option value="NSW">New South Wales</option>
                                            <option value="VIC">Victoria</option>
                                            <option value="QLD">Queensland</option>
                                            <option value="SA">South Australia</option>
                                            <option value="WA">Western Australia</option>
                                            <option value="TAS">Tasmania</option>

                                            <option value="ON">Ontario</option>
                                            <option value="BC">British Columbia</option>
                                            <option value="QC">Quebec</option>
                                            <option value="AB">Alberta</option>
                                            <option value="MB">Manitoba</option>
                                            <option value="NS">Nova Scotia</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="city">City</label>
                                        <select class="form-control" id="city" name="city">
                                            <option value="">Select City</option>
                                            <option value="LA">Los Angeles</option>
                                            <option value="SF">San Francisco</option>
                                            <option value="SD">San Diego</option>
                                            <option value="Sac">Sacramento</option>
                                            <option value="Fresno">Fresno</option>

                                            <option value="NYC">New York City</option>
                                            <option value="Buffalo">Buffalo</option>
                                            <option value="Rochester">Rochester</option>
                                            <option value="Syracuse">Syracuse</option>

                                            <option value="Mumbai">Mumbai</option>
                                            <option value="Pune">Pune</option>
                                            <option value="Nagpur">Nagpur</option>
                                            <option value="Nashik">Nashik</option>

                                            <option value="Lucknow">Lucknow</option>
                                            <option value="Kanpur">Kanpur</option>
                                            <option value="Agra">Agra</option>
                                            <option value="Varanasi">Varanasi</option>
                                            <option value="Meerut">Meerut</option>
                                            <option value="Ghaziabad">Ghaziabad</option>
                                            <option value="Prayagraj">Prayagraj (Allahabad)</option>
                                            <option value="Noida">Noida</option>
                                            <option value="Bareilly">Bareilly</option>
                                            <option value="Aligarh">Aligarh</option>
                                            <option value="Moradabad">Moradabad</option>
                                            <option value="Saharanpur">Saharanpur</option>
                                            <option value="Muzaffarnagar">Muzaffarnagar</option>
                                            <option value="Mathura">Mathura</option>
                                            <option value="Rampur">Rampur</option>

                                            <option value="Chennai">Chennai</option>
                                            <option value="Coimbatore">Coimbatore</option>
                                            <option value="Madurai">Madurai</option>
                                            <option value="Tiruchirappalli">Tiruchirappalli</option>

                                            <option value="Sydney">Sydney</option>
                                            <option value="Newcastle">Newcastle</option>
                                            <option value="Wollongong">Wollongong</option>
                                            <option value="Coffs Harbour">Coffs Harbour</option>

                                            <option value="Toronto">Toronto</option>
                                            <option value="Ottawa">Ottawa</option>
                                            <option value="Mississauga">Mississauga</option>
                                            <option value="Brampton">Brampton</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="zip">Zip/Postal Code</label>
                                        <input class="form-control" type="text" id="zip" name="zip_code"
                                            placeholder="Zip Code">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3>Additional information</h3>
                            <label for="order_comments" class="">Order notes&nbsp;<span
                                    class="optional">(optional)</span></label>
                            <textarea id="order_comments" class="form-control" name="order_notes"
                                placeholder="Notes about your order, e.g. special notes for delivery." rows="3"></textarea>
                        </div>
                        <div class="col-md-12 mt-30">
                            <h3>Your order</h3>
                            <table class="table table-striped table-bordered tbl-shopping-cart">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No.</th>
                                        <th class="text-center">Room Number</th>
                                        <th class="text-center">Room Type</th>
                                        <th class="text-center">Check-in</th>
                                        <th class="text-center">Check-out</th>
                                        <th class="text-center">Guests</th>
                                        <th class="text-center">Nights</th>
                                        <th class="text-center">Price/Night</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart['items'] as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item['room_number'] ?? '-' }}</td>
                                            <td class="text-center">{{ $item['room_type'] ?? '-' }}</td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($item['checkin_datetime'])->format('H:i d/m/Y') }}
                                            </td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($item['checkout_datetime'])->format('H:i d/m/Y') }}
                                            </td>
                                            <td class="text-center">{{ $item['guest-select'] ?? '1' }}</td>
                                            <td class="text-center">{{ $item['days'] ?? '1' }}</td>
                                            <td class="text-center">₹{{ number_format($item['price'], 2) }}</td>
                                            <td class="text-center">₹{{ number_format($item['total_price'], 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Order Totals -->
                            <div class="row justify-content-end mt-4">
                                <div class="col-md-4">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th class="text-end">Subtotal:</th>
                                                <td class="text-end">₹{{ number_format($cart['cartSubtotal'], 2) }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-end">Service Fee:</th>
                                                <td class="text-end">₹{{ number_format($cart['roomService'], 2) }}</td>
                                            </tr>
                                            <tr class="fw-bold">
                                                <th class="text-end">Total:</th>
                                                <td class="text-end">₹{{ number_format($cart['orderTotal'], 2) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-60">
                            <div class="payment-method">
                                <h3>Choose a Payment Method</h3>
                                <ul class="accordion-box">
                                    <!-- Stripe Payment -->
                                    <li class="accordion block active-block">
                                        <div class="acc-btn active">
                                            <div class="icon-outer"><i class="lnr-icon-chevron-down"></i></div>
                                            Credit Card / Debit Card
                                        </div>
                                        <div class="acc-content current">
                                            <div class="payment-info">
                                                <input type="radio" name="payment_method" value="stripe" id="stripe_payment"
                                                    class="d-none payment-radio" checked>
                                                <button type="button" onclick="submitStripe()" class="btn"
                                                    style="background-color: #AE7D54; color: white; border: none; padding: 10px 20px; border-radius: 5px;">
                                                    Pay with Stripe
                                                </button>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Bank Transfer -->
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <div class="icon-outer"><i class="lnr-icon-chevron-down"></i></div>
                                            Direct Bank Transfer / UPI Payment
                                        </div>
                                        <div class="acc-content">
                                            <input type="radio" name="payment_method" value="bank_transfer"
                                                id="bank_transfer" class="d-none payment-radio">
                                            <div class="payment-info" style="position: relative;">
                                                <div style="position: absolute; left:70%;">
                                                    <img src="{{ asset('storage/photos/qr.png') }}" alt="User Logo"
                                                        class="brand-image img-circle elevation-3 " style="opacity: .8;">
                                                </div>
                                                <div class="bank-details mb-3">
                                                    <p><strong>Bank Name:</strong> HDFC Bank</p>
                                                    <p><strong>Account Number:</strong> 12345678901234</p>
                                                    <p><strong>IFSC Code:</strong> HDFC0001234</p>
                                                    <p><strong>Account Holder:</strong> Stay Sphere</p>
                                                    <p><strong>Branch:</strong> Kanpur Main Branch</p>
                                                </div>
                                                <p class="mb-3">After making the transfer, please enter your Treansaction Id
                                                    and upload the payment screenshot.
                                                </p>
                                                <p style="color: red;"><strong> Note:</strong> Payment Screenshot will be
                                                    varify at the time of checkIn</p>
                                                <!-- Bank details -->
                                                <div class="form-group mb-2">
                                                    <label for="transaction_id">UTR / Transaction ID:</label>
                                                    <input type="text" name="transaction_id" class="form-control" required>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="screenshot">Upload Screenshot of Payment:</label>
                                                    <input type="file" name="screenshot" class="form-control"
                                                        accept="image/*" required>
                                                </div>
                                                <button type="submit" name="submit_payment" class="btn"
                                                    style="background-color: #AE7D54; color: white; border: none; padding: 10px 20px; border-radius: 5px;">
                                                    Submit Payment Details
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const accBtns = document.querySelectorAll('.acc-btn');

            accBtns.forEach((btn, index) => {
                btn.addEventListener('click', () => {
                    const parent = btn.closest('.accordion.block');
                    const radio = parent.querySelector('.payment-radio');

                    // Uncheck all radios first
                    document.querySelectorAll('.payment-radio').forEach(r => r.checked = false);

                    // Check the current one
                    if (radio) radio.checked = true;
                });
            });
        });
    </script>
    <script>
        function submitStripe() {
            // Submit a form or redirect to route
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('stripe.checkout') }}";

            let csrf = document.createElement('input');
            csrf.type = 'hidden';
            csrf.name = '_token';
            csrf.value = '{{ csrf_token() }}';
            form.appendChild(csrf);

            let amount = document.createElement('input');
            amount.type = 'hidden';
            amount.name = 'amount';
            amount.value = "{{ $cart['orderTotal'] ?? 0 }}";
            form.appendChild(amount);

            document.body.appendChild(form);
            form.submit();
        }
    </script>



@endsection