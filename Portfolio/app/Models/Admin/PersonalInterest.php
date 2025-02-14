<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalInterest extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['interest_name', 'description', 'is_del'];

    protected $dates = ['deleted_at'];
}
