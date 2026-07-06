<?php

namespace App\Http\Controllers\Home\Room;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoomsController extends Controller
{
    public function roomList()
    {
        $title = 'Stay Sphere : Room List';
        $label = 'Room List';
        $rooms = Room::all();
        $facilities = Facility::all();
        return view('home.room.roomList', compact('rooms', 'facilities', 'label', 'title'));
    }
    public function show($id)
    {
        $facilities = Room::with('facilities')->findOrFail($id);
        $title = 'StaySphere: Facilities';
        $label = 'Room Facilities';
        return view('Home.Room.FacilityDetails', compact('facilities', 'title', 'label'));
    }
    public function book($id)
    {
        $room = Room::with('facilities')->findOrFail($id);
        $rooms = Room::all();
        $title = 'StaySphere: Book a Room';
        $label = 'Room Details';
        return view('Home.Room.RoomDetails', compact('room', 'rooms', 'title', 'label'));
    }

    // public function storeBooking(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email',
    //         'check_in' => 'required|date',
    //         'check_out' => 'required|date|after:check_in',
    //     ]);

    //     $room = Room::findOrFail($id);

    //     // Store booking details in a booking table (assuming a booking model exists)
    //     $booking = new Booking();
    //     $booking->room_id = $room->id;
    //     $booking->name = $request->name;
    //     $booking->email = $request->email;
    //     $booking->check_in = $request->check_in;
    //     $booking->check_out = $request->check_out;
    //     $booking->save();

    //     return redirect()->route('rooms.show', $room->id)->with('success', 'Your booking was successful!');
    // }

}
