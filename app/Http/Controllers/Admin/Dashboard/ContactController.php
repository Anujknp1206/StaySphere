<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $title = $user->name . ' | Dashboard';
        $setting = Setting::first();
        $contacts = ContactForm::all();
        return view('admin.dashboard.contacts.index', compact('contacts', 'title', 'setting'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'form_name' => 'required|string|max:255',
            'form_email' => 'required|email|max:255',
            'form_subject' => 'required|string|max:255',
            'form_phone' => 'nullable|string|max:20',
            'form_message' => 'required|string',
        ]);

        ContactForm::create([
            'name' => $request->form_name,
            'email' => $request->form_email,
            'subject' => $request->form_subject,
            'phone' => $request->form_phone,
            'message' => $request->form_message,
        ]);
        Alert::success('Thankyou !', 'We will contact you soon');
        return redirect()->route('contactus');
    }

}
