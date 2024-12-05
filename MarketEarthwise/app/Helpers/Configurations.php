<?php

use App\Models\Admin\MailCofig;
use App\Models\Admin\RazorpayConfig;
use App\Models\EmailSetting;
use Illuminate\Support\Facades\Config;

if (!function_exists('setMailConfig')) {
    function setMailConfig()
    {
        $data = MailCofig::first();

        if ($data) {
            Config::set('mail.default', $data->mail_mailer);
            Config::set('mail.mailers.smtp.host', $data->mail_host);
            Config::set('mail.mailers.smtp.port', $data->mail_port);
            Config::set('mail.mailers.smtp.username', $data->mail_username);
            Config::set('mail.mailers.smtp.password', $data->mail_password);
            Config::set('mail.mailers.smtp.encryption', $data->mail_encryption);
            Config::set('mail.from.address', $data->mail_from_address);
            Config::set('mail.from.name', $data->mail_from_name);
        } else {
            throw new Exception('No mail settings found in the database.');
        }
    }
}


if (!function_exists('setRazorpayConfig')) {
    function setRazorpayConfig()
    {
        $razorpaydata = RazorpayConfig::first();
        if ($razorpaydata) {
            Config::set('razorpay.key_id', $razorpaydata->RAZORPAY_KEY);
            Config::set('razorpay.key_secret', $razorpaydata->RAZORPAY_SECRET);
        } else {
            throw new Exception('No razorpay settings found in the database.');
        }
    }
}
