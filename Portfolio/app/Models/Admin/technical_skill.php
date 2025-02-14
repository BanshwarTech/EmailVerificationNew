<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class technical_skill extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['skill_name', 'proficiency', 'experience_years', 'category', 'is_del'];

    protected $dates = ['deleted_at'];
}
