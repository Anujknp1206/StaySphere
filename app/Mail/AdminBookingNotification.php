<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminBookingNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $booking;
    public $setting;
    public function __construct(Booking $booking, Setting $setting)
    {
        $this->booking = $booking;
        $this->setting = $setting;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('New Booking Received')
            ->view('admin.email.admin_email')
            ->with(['booking' => $this->booking,'setting'=>$this->setting]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
