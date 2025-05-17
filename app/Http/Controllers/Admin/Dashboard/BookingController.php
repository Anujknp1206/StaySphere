<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    // Show all bookings (Admin/Super Admin)
    public function index()
    {
        $title = 'Stay Sphere :Booking';
        $setting = Setting::first();
        $bookings = Booking::with(['user', 'room'])->latest()->paginate(10); // Paginate bookings
        return view('admin.dashboard.bookings.index', compact('bookings', 'title', 'setting'));
    }

    // Show specific booking details (Admin/Super Admin)
    public function show($id)
    {
        $title = 'Stay Sphere :Booking';
        $setting = Setting::first();
        $booking = Booking::with(['user', 'room'])->findOrFail($id);  // Find booking by ID
        return view('admin.dashboard.bookings.show', compact('booking', 'title', 'setting'));
    }

    // Edit booking (Admin/Super Admin)
    public function edit($id)
    {
        $title = 'Edit Booking';
        $setting = Setting::first();
        $booking = Booking::with(['user', 'room'])->findOrFail($id);  // Find booking by ID
        return view('admin.dashboard.bookings.edit', compact('booking', 'title', 'setting'));
    }

    // Update booking (Admin/Super Admin)
    public function update(Request $request, $id)
    {
        // Validate request
        $validated = $request->validate([
            'status' => 'required|in:booked,completed,cancelled',
            'payment_status' => 'required|in:paid,pending,failed',
        ]);

        // Find the booking and update
        $booking = Booking::findOrFail($id);
        $booking->update($validated);

        // Success alert
        Alert::success('Booking Updated', 'Booking details have been successfully updated.');
        return redirect()->route('bookings.index');
    }

    // Delete booking (Super Admin)
    public function destroy($id)
    {
        // Restrict action to super admins only
        if (!Auth::user()->hasRole('super admin')) {
            abort(403, 'Unauthorized action.');
        }

        $booking = Booking::findOrFail($id);

        // Mark the room as available
        Room::where('id', $booking->room_id)->update(['status' => 'available']);
        $booking->delete();

        // Error alert for deleted booking
        Alert::toast('Booking deleted', 'error');
        return redirect()->route('bookings.index');
    }

    // Show bookings for the authenticated customer (Customer View)
    public function myBookings()
    {
         $title = 'My Bookings';
        $setting = Setting::first();
        $bookings = Booking::with(['room', 'payments'])
            ->where('user_id', Auth::id())  // Filter bookings for the authenticated customer
            ->latest()
            ->paginate(10);

        return view('admin.dashboard.bookings.my_bookings', compact('bookings','title','setting'));
    }
    public function history(Request $request)
    {
        $search = $request->input('search');
        $title = 'Previous Booking';
        $setting = Setting::first();
        $bookings = Booking::with(['user', 'room', 'payments'])
            ->where('status', 'completed')
            ->when($search, function ($query) use ($search) {
                return $query->where(function ($q) use ($search) {
                    $q->whereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%$search%")
                            ->orWhere('email', 'like', "%$search%");
                    })
                        ->orWhereHas('room', function ($roomQuery) use ($search) {
                            $roomQuery->where('room_number', 'like', "%$search%")
                                ->orWhere('room_type', 'like', "%$search%");
                        })
                        ->orWhere('id', 'like', "%$search%");
                });
            })
            ->latest()
            ->paginate(15);

        return view('admin.dashboard.bookings.history', compact('bookings', 'search','title','setting'));
    }
}
