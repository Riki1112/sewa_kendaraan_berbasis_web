<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'vehicle_id',
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
}
