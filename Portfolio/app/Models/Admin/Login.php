<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Login extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    protected $dates = ['deleted_at'];
}
