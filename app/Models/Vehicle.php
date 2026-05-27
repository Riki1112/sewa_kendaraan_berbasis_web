<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VehicleImage;
use Carbon\Carbon;


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

    public function isTaxDue()
{
    // Pajak jatuh tempo jika tanggal sekarang >= tax_due_date
    return $this->tax_due_date && Carbon::now()->greaterThanOrEqualTo(Carbon::parse($this->tax_due_date));
}

public function isServiceOverdue()
{
    // Servis overdue jika lebih dari 6 bulan dari terakhir servis
    return $this->last_service_date && Carbon::now()->greaterThanOrEqualTo(Carbon::parse($this->last_service_date)->addMonths(6));
}

    const CREATED_AT = 'createdDate';
    const UPDATED_AT = 'lastUpdateDate';
}

