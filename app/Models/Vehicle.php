<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VehicleImage;

class Vehicle extends Model
{
    protected $table = 'vehicles';

protected $fillable = [
    'nama_kendaraan',
    'merek',
    'plat_nomor',
    'tahun',
    'harga_sewa',
    'status_ketersediaan',
    'deskripsi',
    'gambar',
    'companyCode',
    'status',
    'isDeleted',
    'createdBy',
    'createdDate',
    'lastUpdateBy',
    'lastUpdateDate',

    'warna',
    'transmisi',
    'bahan_bakar',
    'kapasitas_mesin',
    'jumlah_kursi',
    'kilometer',
    'tanggal_pajak',
    'status_servis',
    'terakhir_servis',
    'nomor_stnk',
    'nomor_rangka',
    'nomor_mesin',
];
    public function images()
    {
        return $this->hasMany(VehicleImage::class);
    }

    const CREATED_AT = 'createdDate';
    const UPDATED_AT = 'lastUpdateDate';
}

