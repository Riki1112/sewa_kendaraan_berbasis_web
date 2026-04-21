<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        Vehicle::create([
            'nama_kendaraan' => 'Avanza',
            'merek' => 'Toyota',
            'plat_nomor' => 'B 4321 UPB',
            'tahun' => 2026,
            'harga_sewa' => 300000,
            'status_ketersediaan' => 'tersedia',
            'deskripsi' => 'Mobil nyaman',
            'gambar' => 'Avanza.png',

            'companyCode' => 'SYS',
            'status' => 1,
            'isDeleted' => 0,
            'createdBy' => 'admin',
            'createdDate' => now(),
            'lastUpdateBy' => 'admin',
            'lastUpdateDate' => now(),
        ]);
    }
}
