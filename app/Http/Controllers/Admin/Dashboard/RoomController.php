<?php
namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Room;
use App\Models\Facility;
use App\Models\RoomImage;
use App\Models\RoomType;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    // Constructor to apply middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Display a listing of rooms
    public function index()
    {
        $user = Auth::user();
        $title = $user->name . ' | Dashboard'; // Paginate rooms for easy browsing
        $rooms = Room::with(['roomType', 'facilities', 'images'])->get();
        $setting = Setting::first();
        $images = RoomImage::all();


        return view('admin.dashboard.rooms.index', compact('rooms', 'images', 'title', 'setting'));
    }

    // Show the form for creating a new room
    public function create()
    {

        $user = Auth::user();
        $title = $user->name . ' | Dashboard';
        $setting = Setting::first();
        $roomTypes = RoomType::all();
        $facilities = Facility::all();
        $images = RoomImage::all();
        return view('admin.dashboard.rooms.create', compact('title', 'images', 'roomTypes', 'facilities', 'setting'));
    }


    // Store a newly created room in storage
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'room_number' => 'required',
            'room_type_id' => 'required|exists:room_types,id',
            'price' => 'required|numeric',
            'status' => 'required|in:available,booked,maintenance',
            'facility_ids' => 'array',
            'facility_ids.*' => 'exists:facilities,id',
            'images' => 'array',
            'images.*' => 'image|max:2048',
            'max_guests' => 'required|integer|min:1',
            'description' => 'required|string|max:1000',
        ], [
            'room_number.required' => 'The room number field is required.',
            'room_type_id.required' => 'Please select a room type.',
            'room_type_id.exists' => 'The selected room type is invalid.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a valid number.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The selected status is invalid. Please choose from available, booked, or maintenance.',
            'facility_ids.array' => 'Facilities must be selected as an array.',
            'facility_ids.*.exists' => 'One or more selected facilities are invalid.',
            'images.array' => 'The images must be provided as an array.',
            'images.*.image' => 'Each file must be a valid image.',
            'images.*.max' => 'Each image must not exceed 2MB in size.',
            'max_guests.required' => 'The maximum number of guests is required.',
            'max_guests.integer' => 'The maximum number of guests must be an integer.',
            'max_guests.min' => 'The maximum number of guests must be at least 1.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 1000 characters.',
        ]);

        // dd($validated);
        // Save the room data
        $room = Room::create([
            'room_number' => $request->room_number,
            'room_type_id' => $request->room_type_id,
            'price' => $request->price,
            'status' => $request->status,
            'max_guests' => $request->max_guests,
            'description' => $request->description,
        ]);
        if ($request->facility_ids) {
            $room->facilities()->attach($request->facility_ids);
        }

        // Upload room images
        if ($request->image_ids) {
            foreach ($request->image_ids as $imageId) {
                $image = RoomImage::find($imageId);
                if ($image) {
                    $image->room_id = $room->id;
                    $image->save();
                }
            }
        }
        // dd($room);

        alert()->toast('Room Added Successfully', 'success');
        return redirect()->route('rooms.index')->with('success', 'Room created successfully!');
    }

    public function toggleShowFrontend(Room $room)
    {
        $room->show_frontend = !$room->show_frontend;
        $room->save();
        alert()->toast('Updated To RoomList','success');
        return redirect()->back()->with('success', 'Room visibility updated.');
    }

    // Show the form for editing a roompublic 
    function edit(Room $room)
    {
        $user = Auth::user();
        $title = $user->name . ' | Dashboard';
        $setting = Setting::first();
        $roomTypes = RoomType::all();
        $facilities = Facility::all();
        return view('admin.dashboard.rooms.edit', compact('room', 'title', 'roomTypes', 'facilities', 'setting'));
    }

    // Update the specified room in storage
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => 'required',
            'room_type_id' => 'required|exists:room_types,id',
            'price' => 'required|numeric',
            'status' => 'required|in:available,booked,maintenance',
            'facility_ids' => 'array',
            'facility_ids.*' => 'exists:facilities,id',
            'images' => 'array',
            'images.*' => 'image|max:2048',
        ]);

        // Update room
        $room->update([
            'room_number' => $request->room_number,
            'room_type_id' => $request->room_type_id,
            'price' => $request->price,
            'status' => $request->status,
            'max_guests' => $request->max_guests ?? 1,
            'description' => $request->description,
        ]);

        // Update facilities
        if ($request->facility_ids) {
            $room->facilities()->sync($request->facility_ids);
        }

        // Upload new images
        if ($request->image_ids) {
            foreach ($request->image_ids as $imageId) {
                $image = RoomImage::find($imageId);
                if ($image && $image->room_id === null) {
                    $image->room_id = $room->id;
                    $image->save();
                }
            }
        }

        alert()->toast('Room Updated Successfully', 'success');
        return redirect()->route('rooms.index');
    }

    // Remove the specified room from storage

    // Delete room
    public function destroy(Room $room)
    {
        $room->facilities()->detach();
        $room->images()->delete();
        $room->delete();

        alert()->toast('Room Deleted Successfully', 'error');
        return redirect()->route('rooms.index');
    }
}
