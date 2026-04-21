<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        if (strtolower(trim($vehicle->status_ketersediaan)) != 'tersedia') {
            return redirect('/user/dashboard')->with('error', 'Kendaraan tidak tersedia untuk dibooking');
        }

        return view('booking.create', compact('vehicle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $vehicle = Vehicle::findOrFail($request->vehicle_id);

        if (strtolower(trim($vehicle->status_ketersediaan)) != 'tersedia') {
            return redirect('/user/dashboard')->with('error', 'Kendaraan sudah tidak tersedia');
        }

        $lama = (strtotime($request->tanggal_selesai) - strtotime($request->tanggal_mulai)) / 86400;
        $lama += 1;

        $total = $lama * $vehicle->harga_sewa;

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'vehicle_id' => $vehicle->id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lama_sewa' => $lama,
            'total_harga' => $total,
            'status_booking' => 'pending',
            'companyCode' => 'SYS',
            'status' => 1,
            'isDeleted' => 0,
            'createdBy' => Auth::user()->name,
            'createdDate' => now(),
            'lastUpdateBy' => Auth::user()->name,
            'lastUpdateDate' => now(),
        ]);

        return redirect('/pay/' . $booking->id);
    }
}
