<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Vehicle;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'vehicle_id',

        'nama_penyewa',
        'email_penyewa',
        'nomor_hp',
        'alamat',
        'alamat_lengkap',

        'tanggal_mulai',
        'tanggal_selesai',
        'lama_sewa',
        'total_harga',
        'status_booking',
        'companyCode',
        'status',
        'isDeleted',
        'createdBy',
        'createdDate',
        'lastUpdateBy',
        'lastUpdateDate'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }
}