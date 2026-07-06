<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Faq;
use App\Models\Review;
use App\Models\Room;
use App\Models\Setting;
use App\Models\Team;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function welcome()
    {
        $title = 'Stay Sphere';
        $setting = Setting::first();
        $teams = Team::all();
        $reviews = Review::all();
        $rooms = Room::all();
        $teamCount = Team::count();
        $reviewCount = Review::count();
        $bookingCount = Booking::count();
        $roomCount = Room::count();
        // $offerCount = Offer::count();

        return view('welcome', compact('setting', 'title', 'teams', 'rooms', 'reviews', 'teamCount', 'roomCount', 'bookingCount', 'reviewCount'));
    }
    public function contactus()
    {
        $title = 'Stay Sphere : Contact Us';
        $setting = Setting::first();
        $label = 'Contact Us';
        return view('home.contactus.contactus', compact('setting', 'title', 'label'));
    }
    public function testimonials()
    {
        $title = 'Stay Sphere : Testimonials';
        $reviews = Review::all();
        $setting = Setting::first();
        $label = 'Testimonials';
        return view('home.reviews.review', compact('setting', 'title', 'label', 'reviews'));
    }
    public function teamdetails()
    {
        $title = 'Stay Sphere : Team Details';
        $teams = Team::all();
        $setting = Setting::first();
        $label = 'Team Details';
        return view('home.teams.teams', compact('setting', 'title', 'label', 'teams'));
    }
    public function faqs()
    {
        $title = 'Stay Sphere : FAQs';
        $faqs = Faq::all();
        $setting = Setting::first();
        $label = "FAQ's";
        return view('home.faqs.faqs', compact('setting', 'title', 'label', 'faqs'));
    }
    public function aboutus()
    {
        $title = 'Stay Sphere : FAQs';
        $setting = Setting::first();
        $label = "About Us";
        return view('home.about.aboutus', compact('setting', 'title', 'label'));
    }





}
