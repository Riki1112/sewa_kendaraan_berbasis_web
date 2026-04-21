<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'booking_id',
        'order_id',
        'payment_type',
        'transaction_status',
        'gross_amount',
        'transaction_time',
        'settlement_time',
        'companyCode',
        'status',
        'isDeleted',
        'createdBy',
        'createdDate',
        'lastUpdateBy',
        'lastUpdateDate',
    ];
}
