<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailCofig extends Model
{
    use HasFactory;

    protected $fillable = [
        'MAIL_MAILER',
        'MAIL_HOST',
        'MAIL_PORT',
        'MAIL_USERNAME',
        'MAIL_PASSWORD',
        'MAIL_ENCRYPTION',
        'MAIL_FROM_ADDRESS',
        'MAIL_FROM_NAME'
    ];
}
