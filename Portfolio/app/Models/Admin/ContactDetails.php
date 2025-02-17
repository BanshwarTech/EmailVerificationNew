<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactDetails extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['email', 'phone', 'address'];

    protected $dates = ['deleted_at'];
}
