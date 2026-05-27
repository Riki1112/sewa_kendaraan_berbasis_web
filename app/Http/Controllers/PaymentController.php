<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Payment;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

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

        $orderId = 'ORD-' . time() . '-' . $booking->id;

        if ($request->payment_type == 'cash') {

            $payment = Payment::create([
                'booking_id' => $booking->id,
                'order_id' => $orderId,
                'payment_type' => 'cash',
                'transaction_status' => 'pending',
                'gross_amount' => $booking->total_harga,
                'transaction_time' => now(),

                'companyCode' => 'SYS',
                'status' => 1,
                'isDeleted' => 0,
                'createdBy' => 'user',
                'createdDate' => now(),
                'lastUpdateBy' => 'user',
                'lastUpdateDate' => now(),
            ]);

            return response()->json([
                'payment_id' => $payment->id
            ]);
        }
        // MIDTRANS PARAMETER
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $booking->total_harga,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ]
        ];

        // GENERATE SNAP TOKEN
        $snapToken = Snap::getSnapToken($params);

        // SIMPAN PAYMENT
        $payment = Payment::create([
            'booking_id' => $booking->id,
            'order_id' => $orderId,
            'payment_type' => $request->payment_type,
            'transaction_status' => 'pending',
            'gross_amount' => $booking->total_harga,
            'transaction_time' => now(),

            'companyCode' => 'SYS',
            'status' => 1,
            'isDeleted' => 0,
            'createdBy' => 'user',
            'createdDate' => now(),
            'lastUpdateBy' => 'user',
            'lastUpdateDate' => now(),
        ]);

        return response()->json([
            'snap_token' => $snapToken,
            'payment_id' => $payment->id
        ]);
    }

    public function receipt($id)
    {
        $payment = Payment::findOrFail($id);
        $booking = Booking::findOrFail($payment->booking_id);

        return view('payment.receipt', compact('payment', 'booking'));
    }

    public function paymentSuccess($id)
    {
        $payment = Payment::findOrFail($id);

        $payment->update([
            'transaction_status' => 'settlement',
            'settlement_time' => now(),
        ]);

        $booking = Booking::findOrFail($payment->booking_id);

        $booking->update([
            'status_booking' => 'dibayar',
        ]);

        return response()->json([
            'success' => true
        ]);
    }
}