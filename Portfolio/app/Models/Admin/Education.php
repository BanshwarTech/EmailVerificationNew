<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['degree', 'institution', 'location', 'duration', 'division', 'details'];


    protected $dates = ['deleted_at'];
}
