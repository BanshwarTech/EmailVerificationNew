<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class service extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = ['title', 'description', 'price', 'status'];

    protected $dates = ['deleted_at'];
}
