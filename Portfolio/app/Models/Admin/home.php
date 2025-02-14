<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class home extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['title', 'subtitle', 'image', 'description', 'is_del'];

    protected $dates = ['deleted_at'];
}
