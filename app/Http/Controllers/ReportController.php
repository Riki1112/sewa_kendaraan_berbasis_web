<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Vehicle;
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
            $query->whereBetween('createdDate', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
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

    public function vehicleReport()
    {
        $vehicles = Vehicle::orderBy('id', 'desc')->get();

$totalVehicles = Vehicle::count();

$availableVehicles = Vehicle::where('status_ketersediaan', 'tersedia')->count();

$rentedVehicles = Vehicle::where('status_ketersediaan', 'tidak tersedia')->count();
        return view(
            'admin.reports.vehicle',
            compact(
                'vehicles',
                'totalVehicles',
                'availableVehicles',
                'rentedVehicles'
            )
        );
    }

    public function exportVehiclePdf()
    {
        $vehicles = Vehicle::orderBy('id', 'desc')->get();

        $pdf = Pdf::loadView(
            'admin.reports.vehicle_pdf',
            compact('vehicles')
        )->setPaper('a4', 'portrait');

        return $pdf->download('vehicle-report.pdf');
    }
}