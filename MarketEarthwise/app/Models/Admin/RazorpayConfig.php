<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazorpayConfig extends Model
{
    use HasFactory;
    protected $fillable = ['RAZORPAY_KEY', 'RAZORPAY_SECRET'];
}
