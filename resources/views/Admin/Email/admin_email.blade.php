<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking Confirmation</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Arial', sans-serif; background-color: #e5e7eb;">
    <table role="presentation"
        style="width: 100%; border-collapse: collapse; background-color: #e5e7eb; padding: 30px;">
        <tr>
            <td align="center">
                <table role="presentation"
                    style="width: 100%; max-width: 650px; border-collapse: collapse; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 6px 12px rgba(0,0,0,0.08);">
                    <!-- Header -->
                    <tr>
                        <td style="background: #AE7D54;  padding: 40px 20px; text-align: center;">
                            <img src="{{ url('storage/photos/' . $setting->logo_footer) }}"
                                alt="{{ $setting->_site_name }} Logo"
                                style="max-width: 140px; height: auto; margin-bottom: 10px;">
                            <p style="color: #dbeafe; font-size: 16px; margin: 10px 0 0;">Action Required: New Booking
                            </p>
                        </td>
                    </tr>
                    <!-- Content -->
                    <tr>
                        <td style="padding: 35px; color: #111827; font-size: 15px; line-height: 1.6;">
                            <p style="margin: 0 0 15px; font-weight: 600; font-size: 17px;">Dear Admin,</p>
                            <p style="margin: 0 0 15px;">A new booking has been placed. Please review the details below:
                            </p>
                            <!-- Booking Summary -->
                            <table role="presentation"
                                style="width: 100%; border-collapse: collapse; margin: 20px 0; background-color: #f9fafb; border-radius: 8px; border: 1px solid #d1d5db;">
                                <tr>
                                    <td style="padding: 15px; font-weight: 600; color: #1f2937; width: 30%;">Booking ID:
                                    </td>
                                    <td style="padding: 15px; color: #1f2937;">{{ $booking_id }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: 600; color: #1f2937;">Customer:</td>
                                    <td style="padding: 15px; color: #1f2937;">{{ $booking->first_name }}
                                        {{ $booking->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: 600; color: #1f2937;">Email:</td>
                                    <td style="padding: 15px; color: #1f2937;">{{ $booking->email }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: 600; color: #1f2937;">Room:</td>
                                    <td style="padding: 15px; color: #1f2937;">{{ $booking->room_id }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: 600; color: #1f2937;">Check-In:</td>
                                    <td style="padding: 15px; color: #1f2937;">
                                        {{ $booking->check_in->format('M d, Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: 600; color: #1f2937;">Check-Out:</td>
                                    <td style="padding: 15px; color: #1f2937;">
                                        {{ $booking->check_out->format('M d, Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: 600; color: #1f2937;">Guests:</td>
                                    <td style="padding: 15px; color: #1f2937;">{{ $booking->number_of_guests }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: 600; color: #1f2937;">Room Price:</td>
                                    <td style="padding: 15px; color: #1f2937;">
                                        ${{ number_format($booking->room_price, 2) }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: 600; color: #1f2937;">Room Service:</td>
                                    <td style="padding: 15px; color: #1f2937;">
                                        ${{ number_format($booking->room_service, 2) }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: 600; color: #1f2937;">Total Amount:</td>
                                    <td style="padding: 15px; color: #1f2937;">
                                        ${{ number_format($booking->total_amount, 2) }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px; font-weight: 600; color: #1f2937;">Payment Status:</td>
                                    <td style="padding: 15px;">
                                        <span
                                            style="display: inline-block; padding: 6px 12px; background-color: {{ $booking->payment_status == 'paid' ? '#dcfce7' : '#fee2e2' }}; color: {{ $booking->payment_status == 'paid' ? '#166534' : '#991b1b' }}; font-size: 13px; border-radius: 4px;">{{ ucfirst($booking->payment_status) }}</span>
                                    </td>
                                </tr>
                            </table>
                            <!-- Guest Information -->
                            <h3 style="margin: 20px 0 10px; font-size: 16px; color: #1f2937;">Guest Information</h3>
                            <table role="presentation"
                                style="width: 100%; border-collapse: collapse; margin: 20px 0; background-color: #f9fafb; border-radius: 8px; border: 1px solid #d1d5db;">
                                <tr>
                                    <td style="padding: 15px; font-weight: 600; color: #1f2937; width: 30%;">Address:
                                    </td>
                                    <td style="padding: 15px; color: #1f2937;">{{ $booking->address }},
                                        {{ $booking->more_address ? $booking->more_address . ', ' : '' }}{{ $booking->city }},
                                        {{ $booking->state }}, {{ $booking->country }} {{ $booking->zip_code }}
                                    </td>
                                </tr>
                                @if ($booking->order_notes)
                                    <tr>
                                        <td style="padding: 15px; font-weight: 600; color: #1f2937;">Order Notes:</td>
                                        <td style="padding: 15px; color: #1f2937;">{{ $booking->order_notes }}</td>
                                    </tr>
                                @endif
                            </table>
                            <!-- Timeline -->
                            <h3 style="margin: 20px 0 10px; font-size: 16px; color: #1f2937;">Booking Timeline</h3>
                            <table role="presentation" style="width: 100%; border-collapse: collapse; margin: 20px 0;">
                                <tr>
                                    <td style="padding: 10px 0; position: relative;">
                                        <div
                                            style="position: absolute; left: 15px; top: 0; bottom: 0; width: 2px; background-color: #d1d5db;">
                                        </div>
                                        <div style="margin-left: 30px;">
                                            <p style="margin: 0 0 5px; font-weight: 600; color: #1f2937;">Booking Placed
                                            </p>
                                            <p style="margin: 0; color: #6b7280; font-size: 13px;">
                                                {{ $booking->check_in->format('M d, Y H:i') }}
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0; position: relative;">
                                        <div
                                            style="position: absolute; left: 15px; top: 0; bottom: 0; width: 2px; background-color: #d1d5db;">
                                        </div>
                                        <div style="margin-left: 30px;">
                                            <p style="margin: 0 0 5px; font-weight: 600; color: #1f2937;">Pending
                                                Confirmation</p>
                                            <p style="margin: 0; color: #6b7280; font-size: 13px;">Awaiting your review
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <!-- CTA -->
                            <p style="margin: 0 0 15px;">Manage this booking in the admin panel.</p>
                            <a href="{{ route('dashboard') }}"
                                style="display: inline-block; padding: 12px 28px; background: linear-gradient(90deg, #1e3a8a, #3b82f6); color: #ffffff; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 14px; transition: transform 0.2s ease, box-shadow 0.2s ease; box-shadow: 0 4px 8px rgba(0,0,0,0.15);">{{ $action_text }}</a>
                        </td>
                    </tr>
                    <!-- Divider -->
                    <tr>
                        <td style="padding: 0 35px;">
                            <hr style="border: 0; border-top: 1px solid #d1d5db; margin: 20px 0;">
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td
                            style="background-color: #1f2937; padding: 25px; text-align: center; color: #d1d5db; font-size: 13px;">
                            <p style="margin: 0 0 8px; font-weight: 600;">{{ $setting->_site_name }} Admin</p>
                            <p style="margin: 0 0 8px;">{{ $setting->address }}</p>
                            <p style="margin: 0 0 8px;">Phone: <a href="tel:{{ $setting->phone_no }}"
                                    style="color: #3b82f6; text-decoration: none;">{{ $setting->phone_no }}</a> | Email:
                                <a href="mailto:{{ $setting->email }}"
                                    style="color: #3b82f6; text-decoration: none;">{{ $setting->email }}</a>
                            </p>
                            <p style="margin: 0 0 8px;">© {{ date('Y') }} All rights reserved.</p>
                            <p style="margin: 0 0 8px;">
                                <a href="{{ $support_url }}" style="color: #3b82f6; text-decoration: none;">Contact
                                    Support</a>
                            </p>
                            <p style="margin: 0;">
                                @if ($setting->facebook)
                                    <a href="{{ $setting->facebook }}" style="margin: 0 10px;"><img
                                            src="https://example.com/facebook-icon.png" alt="Facebook"
                                            style="width: 24px; height: 24px;"></a>
                                @endif
                                @if ($setting->twitter)
                                    <a href="{{ $setting->twitter }}" style="margin: 0 10px;"><img
                                            src="https://example.com/twitter-icon.png" alt="Twitter"
                                            style="width: 24px; height: 24px;"></a>
                                @endif
                                @if ($setting->instagram)
                                    <a href="{{ $setting->instagram }}" style="margin: 0 10px;"><img
                                            src="https://example.com/instagram-icon.png" alt="Instagram"
                                            style="width: 24px; height: 24px;"></a>
                                @endif
                                @if ($setting->linkedin)
                                    <a href="{{ $setting->linkedin }}" style="margin: 0 10px;"><img
                                            src="https://example.com/linkedin-icon.png" alt="LinkedIn"
                                            style="width: 24px; height: 24px;"></a>
                                @endif
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>