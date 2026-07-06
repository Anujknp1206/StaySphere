<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('booking')->latest()->paginate(15);
        return view('admin.dashboard.payments.index', compact('payments'));
    }

    public function show($id)
    {
        $payment = Payment::with('booking')->findOrFail($id);
        return view('admin.dashboard.payments.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $bookings = Booking::all(); // If you want to allow changing the booking
        return view('admin.dashboard.payments.edit', compact('payment', 'bookings'));
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:50',
            'payment_status' => 'required|string|in:paid,pending,failed',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
