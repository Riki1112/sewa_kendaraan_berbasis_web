<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function bookingReport(Request $request)
    {
        $query = Booking::with([
            'user',
            'vehicle'
        ]);

        // FILTER TANGGAL
        if ($request->start_date && $request->end_date) {
            $query->whereBetween('created_at', [
                $request->start_date,
                $request->end_date
            ]);
        }

        $bookings = $query
            ->orderBy('id', 'desc')
            ->get();

        // TOTAL REVENUE
        $totalRevenue = Payment::where(
            'transaction_status',
            'settlement'
        )->sum('gross_amount');

        return view(
            'admin.reports.booking',
            compact(
                'bookings',
                'totalRevenue'
            )
        );
    }

    public function exportPdf()
    {
        $bookings = Booking::with(['user','vehicle','payment'])
                        ->orderBy('id','desc')
                        ->get();

        $totalRevenue = Payment::where('transaction_status','settlement')
                            ->sum('gross_amount');

        $pdf = Pdf::loadView('admin.reports.pdf', compact('bookings','totalRevenue'))
                ->setPaper('a4', 'portrait'); // ukuran kertas

        return $pdf->download('booking-report.pdf'); // langsung download
    }
}