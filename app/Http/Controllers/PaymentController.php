<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function index()
    {
        // Fetch payments from the database
        $payments = Payment::all();

        // Pass the payments to the payment-page view
        return view('contents.payment-page', ['payments' => $payments]);
    }

    public function create()
    {
        return view('contents.add-payment-page');
    }

    public function store(Request $request)
    {
        $request->all();

        // Store image in storage/app/public directory
        $imagePath = $request->file('image')->store('public/image');

        $request->merge(['user_id' => Auth::id()]);

        // Create payment record
        $request->user()->payments()->create([
            'description' => $request->description,
            'date' => $request->date,
            'amount' => $request->amount,
            'image' => $imagePath, // Store file path in the database
        ]);

        return redirect()->route('payment-page');
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        return view('contents.edit-payment-page', ['payment' => $payment]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'image' => 'nullable|image|max:2048', // Max size 2MB, and must be an image
        ]);

        $payment = Payment::findOrFail($id);

        // Update payment record
        $payment->update([
            'description' => $request->description,
            'date' => $request->date,
            'amount' => $request->amount,
        ]);

        // If a new image is uploaded, update the image
        if ($request->hasFile('image')) {
            // Delete old image from storage
            Storage::delete($payment->image);

            // Store new image
            $imagePath = $request->file('image')->store('public/images');

            // Update image path in the database
            $payment->update(['image' => $imagePath]);
        }

        return redirect()->route('payment-page');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);

        // Delete image from storage
        Storage::delete($payment->image);

        // Delete payment record
        $payment->delete();

        return redirect()->route('payment-page');
    }
}
