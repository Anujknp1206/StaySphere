<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>


<body style="margin: 0; padding: 0; font-family: 'Georgia', serif; background-color: #f5f5f5;">
    <table role="presentation"
        style="width: 100%; border-collapse: collapse; background-color: #f5f5f5; padding: 30px;">
        <tr>
            <td align="center">
                <table role="presentation"
                    style="width: 100%; max-width: 650px; border-collapse: collapse; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 8px 16px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="background: #AE7D54; padding: 50px 20px; text-align: center;">
                            <img src="{{ url('storage/photos/StaySphereT.png') }}" alt="Staysphere"
                                style="max-width: 160px; height: auto; margin-bottom: 15px;">
                            <h1 style="color: #ffffff; font-size: 24px; margin: 0;">{{ $setting->_site_name }}</h1>
                        </td>
                    </tr>
                    <!-- Hero Image -->
                    <tr>
                        <td style="padding: 0;">
                            <img src="{{ url('storage/photos/Background.jpg')}}" alt="Booking Confirmation"
                                style="width: 100%; height: auto; display: block; border: 0;">
                        </td>
                    </tr>
                    <!-- Content -->
                    <tr>
                        <td style="padding: 20px; color: #1f2937; font-size: 14px; line-height: 1.4;">
                            <p style="margin: 0 0 20px; font-weight: 600; font-size: 18px;">Dear
                                {{ $booking->first_name }}{{ $booking->last_name }},
                            </p>
                            <p style="margin: 0 0 20px;">Your reservation for <strong>{{$booking->room->roomType->name
                                    }} room </strong>
                                has been confirmed from {{ $booking->check_in }} to {{ $booking->check_out }}. Below are
                                the details of your booking:</p>
                            <!-- Booking Summary -->
                            <table role="presentation"
                                style="width: 100%; border-collapse: collapse; margin: 10px 0; background-color: #f9fafb; border-radius: 10px; border: 1px solid #e5e7eb;">
                                <tr>
                                    <td style="padding: 5px; font-weight: 600; color: #1f2937; width: 70%;">Booking ID:
                                    </td>
                                    <td style="padding: 5px; color: #1f2937;">{{ $booking->id }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px; font-weight: 600; color: #1f2937;">Check-In Date:</td>
                                    <td style="padding: 5px; color: #1f2937;">{{ $booking->check_in }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px; font-weight: 600; color: #1f2937;">Check-Out Date:</td>
                                    <td style="padding: 5px; color: #1f2937;">{{ $booking->check_out }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px; font-weight: 600; color: #1f2937;">Number of Guests:</td>
                                    <td style="padding: 5px; color: #1f2937;">{{ $booking->number_of_guests }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px; font-weight: 600; color: #1f2937;">Room Price:</td>
                                    <td style="padding: 5px; color: #1f2937;">{{ $booking->room_price }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px; font-weight: 600; color: #1f2937;">Room Service:</td>
                                    <td style="padding: 5px; color: #1f2937;">{{ $booking->room_service }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px; font-weight: 600; color: #1f2937;">Total Amount:</td>
                                    <td style="padding: 5px; color: #1f2937;">{{ $booking->total_amount }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px; font-weight: 600; color: #1f2937;">Payment Status:</td>
                                    <td style="padding: 5px; color: #1f2937;">{{ $booking->payment_status }}</td>
                                </tr>
                            </table>
                            <!-- Guest Information -->
                            <h3 style="margin: 20px 0 10px; font-size: 18px; color: #1f2937;">Guest Information</h3>
                            <table role="presentation"
                                style="width: 100%; border-collapse: collapse; margin: 20px 0; border: 1px solid #e5e7eb;">
                                <tr>
                                    <td style="padding: 12px; font-weight: 600; width: 30%;">Email:</td>
                                    <td style="padding: 12px; color: #1f2937; cursor: pointer;">{{$booking->email}}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px; font-weight: 600; color: #1f2937;">Address:</td>
                                    <td style="padding: 12px; color: #1f2937;">
                                        {{ $booking->city }} , {{ $booking->state }} , {{ $booking->country }}
                                    </td>
                                </tr>
                            </table>
                            <!-- Testimonial -->
                            <table role="presentation"
                                style="width: 100%; border-collapse: collapse; margin: 30px 0; background-color: #fefce8; border-radius: 10px; padding: 20px; text-align: center;">
                                <tr>
                                    <td>
                                        <p style="font-style: italic; color: #4b5563; margin: 0 0 10px;">"Booking with
                                            {{ $setting->_site_name }} was seamless! Exceptional service and comfort."
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            <!-- CTA -->
                            <p style="margin: 0 0 20px;">Ready to view your booking details? Track it now!</p>
                            <a href="{{route('dashboard')}}"
                                style="display: inline-block; padding: 16px 32px; background: linear-gradient(135deg, #7c3aed, #db2777); color: #ffffff; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 16px; transition: transform 0.2s ease, box-shadow 0.2s ease; box-shadow: 0 4px 10px rgba(0,0,0,0.2);">Track
                                Your Booking</a>
                        </td>
                    </tr>
                    <!-- Divider -->
                    <tr>
                        <td style="padding: 0 40px;">
                            <hr style="border: 0; border-top: 1px solid #e5e7eb; margin: 20px 0;">
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td
                            style="background: linear-gradient(180deg, #1f2937, #111827); padding: 30px; text-align: center; color: #d1d5db; font-size: 14px;">
                            <p style="margin: 0 0 10px; font-weight: 600;">{{ $setting->_site_name }}</p>
                            <p style="margin: 0 0 10px;">{{ $setting->address }}</p>
                            <p style="margin: 0 0 10px;">Phone: <a href="tel:+1-555-123-4567"
                                    style="color: #c084fc; text-decoration: none;">{{ $setting->phone_no }}</a> | Email:
                                <a href="mailto:info@sunsetresorts.com"
                                    style="color: #c084fc; text-decoration: none;">{{ $setting->email}}</a>
                            </p>
                            <p style="margin: 0 0 10px;">© 2025 All rights reserved.</p>
                            <p style="margin: 0 0 10px;">
                                <a href="{{route('contactus')}}"
                                    style="color: #c084fc; text-decoration: none;">Contact Support</a> |
                                <a href=""
                                    style="color: #c084fc; text-decoration: none;">Unsubscribe</a>
                            </p>
                            <p style="margin: 10px 0 0;">
                                <a href="{{ $setting->facebook }}" style="margin: 0 10px;"></a>
                                <a href="{{ $setting->twitter }}" style="margin: 0 10px;"></a>
                                <a href="{{ $setting->instagram }}" style="margin: 0 10px;"></a>
                                <a href="{{ $setting->linkedin }}" style="margin: 0 10px;"></a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>