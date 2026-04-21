<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleImage;
use Illuminate\Http\Request;


class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('images')->get();
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kendaraan' => 'required',
            'merek' => 'required',
            'plat_nomor' => 'required',
            'tahun' => 'required',
            'harga_sewa' => 'required',
            'status_ketersediaan' => 'required',
            'images' => 'required|array|max:5',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $vehicle = Vehicle::create([
            'nama_kendaraan' => $request->nama_kendaraan,
            'merek' => $request->merek,
            'plat_nomor' => $request->plat_nomor,
            'tahun' => $request->tahun,
            'harga_sewa' => $request->harga_sewa,
            'status_ketersediaan' => $request->status_ketersediaan,
            'deskripsi' => $request->deskripsi,

            'warna' => $request->warna,
            'transmisi' => $request->transmisi,
            'bahan_bakar' => $request->bahan_bakar,
            'kapasitas_mesin' => $request->kapasitas_mesin,
            'jumlah_kursi' => $request->jumlah_kursi,
            'kilometer' => $request->kilometer,
            'tanggal_pajak' => $request->tanggal_pajak,
            'status_servis' => $request->status_servis,
            'terakhir_servis' => $request->terakhir_servis,
            'nomor_stnk' => $request->nomor_stnk,
            'nomor_rangka' => $request->nomor_rangka,
            'nomor_mesin' => $request->nomor_mesin,

            'companyCode' => 'SYS',
            'status' => 1,
            'isDeleted' => 0,
            'createdBy' => 'user',
            'createdDate' => now(),
            'lastUpdateBy' => 'user',
            'lastUpdateDate' => now(),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('vehicles', 'public');

                VehicleImage::create([
                    'vehicle_id' => $vehicle->id,
                    'image' => $path,
                ]);
            }
        }

        return redirect('/vehicles');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();

        return redirect('/vehicles');
    }

    public function edit($id)
    {
        $vehicle = Vehicle::with('images')->findOrFail($id);
        return view('vehicles.edit', compact('vehicle'));
    }

public function update(Request $request, $id)
{
    $vehicle = Vehicle::findOrFail($id);

    $request->validate([
        'nama_kendaraan' => 'required',
        'merek' => 'required',
        'harga_sewa' => 'required',
        'status_ketersediaan' => 'required',
        'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $vehicle->update([
        'nama_kendaraan' => $request->nama_kendaraan,
        'merek' => $request->merek,
        'plat_nomor' => $request->plat_nomor,
        'tahun' => $request->tahun,
        'harga_sewa' => $request->harga_sewa,
        'status_ketersediaan' => $request->status_ketersediaan,
        'warna' => $request->warna,
        'transmisi' => $request->transmisi,
        'bahan_bakar' => $request->bahan_bakar,
        'kapasitas_mesin' => $request->kapasitas_mesin,
        'jumlah_kursi' => $request->jumlah_kursi,
        'kilometer' => $request->kilometer,
        'tanggal_pajak' => $request->tanggal_pajak,
        'status_servis' => $request->status_servis,
        'terakhir_servis' => $request->terakhir_servis,
        'nomor_stnk' => $request->nomor_stnk,
        'nomor_rangka' => $request->nomor_rangka,
        'nomor_mesin' => $request->nomor_mesin,
        'deskripsi' => $request->deskripsi,
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('vehicles', 'public');

            \App\Models\VehicleImage::create([
                'vehicle_id' => $vehicle->id,
                'image' => $path,
                'is_primary' => 0,
            ]);
        }
    }

    return redirect('/vehicles/edit/' . $vehicle->id)
        ->with('success', 'Data kendaraan berhasil diperbarui');
}

    public function show($id)
    {
        $vehicle = Vehicle::with('images')->findOrFail($id);
        return view('vehicles.detail', compact('vehicle'));
    }

    public function userIndex()
    {
        $vehicles = \App\Models\Vehicle::with('images')->get();
        return view('user.dashboard', compact('vehicles'));
    }

    public function userShow($id)
    {
        $vehicle = \App\Models\Vehicle::with('images')->findOrFail($id);
        return view('user.detail', compact('vehicle'));
    }

    public function setPrimaryImage($id)
    {
        $image = VehicleImage::findOrFail($id);

        VehicleImage::where('vehicle_id', $image->vehicle_id)->update([
            'is_primary' => 0
        ]);

        $image->update([
            'is_primary' => 1
        ]);

        return back()->with('success', 'Gambar utama berhasil diubah.');
    }

    public function deleteImage($id)
    {
        $image = \App\Models\VehicleImage::findOrFail($id);

        if ($image->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($image->image)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($image->image);
        }

        $vehicleId = $image->vehicle_id;
        $image->delete();

        return redirect('/vehicles/edit/' . $vehicleId)
            ->with('success', 'Gambar berhasil dihapus');
    }

        public function dashboard()
        {
            $totalVehicles = Vehicle::count();
            $availableVehicles = Vehicle::where('status_ketersediaan', 'tersedia')->count();
            $unavailableVehicles = Vehicle::where('status_ketersediaan', '!=', 'tersedia')->count();
            $latestVehicles = Vehicle::latest('id')->take(5)->get();

            return view('admin.dashboard', compact(
                'totalVehicles',
                'availableVehicles',
                'unavailableVehicles',
                'latestVehicles'
            ));
        }

}
