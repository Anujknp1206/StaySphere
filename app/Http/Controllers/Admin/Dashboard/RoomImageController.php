<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\Room;
use App\Models\RoomImage;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RoomImageController extends Controller
{
    public function index($room_id)
    {
        $room = Room::findOrFail($room_id);
        $images = RoomImage::all();
        $title = 'Images : Room';
        $setting = Setting::first();
        return view('admin.dashboard.rooms.images.index', compact('images', 'setting', 'room', 'title'));
    }

    public function create($room_id)
    {
        $room = Room::findOrFail($room_id);
        $title = 'Images : Room';
        $setting = Setting::first();
        return view('admin.dashboard.rooms.images.create', compact('room', 'setting', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'images' => 'required|array',
            'images.*' => 'image|max:8048',
        ]);

        $room = Room::findOrFail($request->room_id);

        foreach ($request->file('images') as $image) {
            $path = $image->store('room_images', 'public');

            RoomImage::create([
                'room_id' => $request->room_id,
                'image_url' => $path
            ]);
        }

        Alert::success('Images Uploaded');
        return redirect()->route('room-images.index', ['room_id' => $room->id]);

    }

    public function destroy(Request $request)
    {
        $image = RoomImage::findOrFail($request->image_id);
        $image->delete();

        Alert::toast('Image Deleted', 'error');
        return redirect()->route('room-images.index');
    }
}