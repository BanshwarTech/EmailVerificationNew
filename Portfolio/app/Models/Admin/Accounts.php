<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accounts extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['account_related_image', 'account_name', 'account_id', 'account_link	', 'account_type', 'is_del'];

    protected $dates = ['deleted_at'];
}
