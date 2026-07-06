<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function index()
    {
        $title = 'Review: Dashboard';
        $setting = Setting::first();
        $reviews = Review::latest()->paginate(10);
        return view('admin.dashboard.review.index', compact('reviews', 'title', 'setting'));
    }

    public function create()
    {
        $title = 'Review: Create';
        $setting = Setting::first();
        return view('admin.dashboard.review.create', compact('setting','title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'designation' => 'required',
            'details' => 'required',
            'photo' => 'nullable|image|max:4048'
        ]);

        $data = $request->only(['customer_name', 'designation', 'details']);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('reviews', 'public');
        }

        Review::create($data);
        alert()->toast('Review Created Successfully', 'success');
        return redirect()->route('reviews.index');
    }

    public function edit(Review $review)
    {
        $title = 'Review: Edit';
        $setting = Setting::first();
        return view('admin.dashboard.review.edit', compact('review', 'setting','title'));
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'customer_name' => 'required',
            'designation' => 'required',
            'details' => 'required',
            'photo' => 'nullable|image|max:4048'
        ]);

        $data = $request->only(['customer_name', 'designation', 'details']);

        if ($request->hasFile('photo')) {
            if ($review->photo) {
                Storage::disk('public')->delete($review->photo);

            }
            $data['photo'] = $request->file('photo')->store('reviews', 'public');
        }

        $review->update($data);
        alert()->toast('Review Updated Successfully', 'success');

        return redirect()->route('reviews.index');
    }
    public function destroy(Review $review)
    {
        if ($review->photo) {
            Storage::disk('public')->delete($review->photo);
        }
        $review->delete();
        alert()->toast('Review Deleted Successfully', 'error');
        return redirect()->route('reviews.index');
    }
}