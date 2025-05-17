<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MarkCompletedBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:mark-completed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark bookings as completed after checkout time';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        // Update bookings where checkout time has passed and status is still booked
        $updated = Booking::where('status', Booking::STATUS_BOOKED)
            ->where('check_out', '<=', $now)
            ->update(['status' => Booking::STATUS_COMPLETED]);

        $this->info("Updated {$updated} bookings to completed.");
    }
}
