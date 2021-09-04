<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'payment_status',
        'toyyibPay_bill_code',
    ];

    // payment_link
    public function getPaymentLinkAttribute()
    {
        return 'https://dev.toyyibpay.com/'.$this->toyyibPay_bill_code;
    }
}
