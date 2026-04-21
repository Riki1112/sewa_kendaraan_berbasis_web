<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function create($id)
    {
        $booking = Booking::findOrFail($id);
        return view('payment.pay', compact('booking'));
    }

    public function selectMethod(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
        ]);

        $booking = Booking::findOrFail($request->booking_id);

        return view('payment.method', compact('booking'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_type' => 'required',
        ]);

        $booking = Booking::findOrFail($request->booking_id);

        $payment = Payment::create([
            'booking_id' => $booking->id,
            'order_id' => 'ORD-' . time() . '-' . $booking->id,
            'payment_type' => $request->payment_type,
            'transaction_status' => 'settlement',
            'gross_amount' => $booking->total_harga,
            'transaction_time' => now(),
            'settlement_time' => now(),

            'companyCode' => 'SYS',
            'status' => 1,
            'isDeleted' => 0,
            'createdBy' => 'user',
            'createdDate' => now(),
            'lastUpdateBy' => 'user',
            'lastUpdateDate' => now(),
        ]);

        $booking->update([
            'status_booking' => 'dibayar',
        ]);

        return redirect('/pay/receipt/' . $payment->id)
            ->with('success', 'Pembayaran berhasil');
    }

    public function receipt($id)
    {
        $payment = Payment::findOrFail($id);
        $booking = Booking::findOrFail($payment->booking_id);

        return view('payment.receipt', compact('payment', 'booking'));
    }
}
