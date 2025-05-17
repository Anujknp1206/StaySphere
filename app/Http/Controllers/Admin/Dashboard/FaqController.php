<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $title = "Stay Sphere : FAQ's";
        $label = "FAQ's";
        $faqs = Faq::latest()->get();
        return view('admin.dashboard.faq.index', compact('faqs', 'title', 'faqs'));
    }

    public function create()
    {
        $title = "Stay Sphere : FAQ's";
        $label = "FAQ's";
        $faqs = Faq::all();
        return view('admin.dashboard.faq.create', compact('title', 'faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($request->only('question', 'answer'));
        alert()->toast('FAQ created successfully.', 'success');
        return redirect()->route('faqs.index');
    }

    public function edit(Faq $faq)
    {
        $title = "Stay Sphere : FAQ's";
        $label = "FAQ's";
        $faqs = Faq::all();
        return view('admin.dashboard.faq.edit', compact('faqs', 'title', 'faqs'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update($request->only('question', 'answer'));
        alert()->toast('FAQ Updated successfully.', 'success');
        return redirect()->route('faqs.index');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        alert()->toast('FAQ deleted successfully.', 'error');
        return redirect()->route('faqs.index');
    }
}
