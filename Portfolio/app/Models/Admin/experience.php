<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class experience extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = ['job_title', 'company_name', 'location', 'start_date	', 'end_date', 'description', 'is_del'];

    protected $dates = ['deleted_at'];
}
