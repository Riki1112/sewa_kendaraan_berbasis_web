<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class BookingController extends Controller
{
    // Form booking untuk user
    public function create($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        if (strtolower(trim($vehicle->status_ketersediaan)) != 'tersedia') {
            return redirect('/user/dashboard')->with('error', 'Kendaraan tidak tersedia untuk dibooking');
        }

        return view('booking.create', compact('vehicle'));
    }

    // Simpan booking ke database
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

        // Data wajib booking
        $dataBooking = [
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
        ];

        // Data tambahan penyewa
        // Bagian ini aman: hanya disimpan kalau kolomnya memang ada di tabel bookings.
        if (Schema::hasColumn('bookings', 'nama_penyewa')) {
            $dataBooking['nama_penyewa'] = $request->input('nama_lengkap')
                ?? $request->input('nama_penyewa')
                ?? Auth::user()->name;
        }

        if (Schema::hasColumn('bookings', 'email_penyewa')) {
            $dataBooking['email_penyewa'] = $request->input('email')
                ?? $request->input('email_penyewa')
                ?? Auth::user()->email;
        }

        if (Schema::hasColumn('bookings', 'nomor_hp')) {
            $dataBooking['nomor_hp'] = $request->input('nomor_hp')
                ?? $request->input('no_hp')
                ?? $request->input('phone')
                ?? null;
        }

        if (Schema::hasColumn('bookings', 'alamat')) {
            $dataBooking['alamat'] = $request->input('alamat')
                ?? $request->input('address')
                ?? null;
        }

        if (Schema::hasColumn('bookings', 'alamat_lengkap')) {
            $dataBooking['alamat_lengkap'] = $request->input('alamat_lengkap')
                ?? $request->input('catatan_alamat')
                ?? $request->input('catatan_tambahan')
                ?? $request->input('catatan')
                ?? null;
        }

        $booking = Booking::create($dataBooking);

        return redirect('/pay/' . $booking->id);
    }

    // Untuk halaman admin booking jika suatu saat dipakai
    public function indexAdmin()
    {
        $bookings = Booking::with(['user', 'vehicle'])->get();

        return view('admin.dashboard', compact('bookings'));
    }
}