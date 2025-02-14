<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUs extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['name', 'profile_image', 'role', 'experience', 'tagline', 'is_del'];

    protected $dates = ['deleted_at'];
}
