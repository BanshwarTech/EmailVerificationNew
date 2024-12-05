<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ConfigurationController extends Controller
{
    public function MailConfig()
    {
        $result['data'] = DB::table('mail_cofigs')->where(['id' => 1])->get();
        return view('Admin.MailConfig', $result);
    }

    public function MailConfigProcess(Request $request)
    {
        $rules = [
            'MAIL_MAILER' => 'required',
            'MAIL_HOST' => 'required',
            'MAIL_PORT' => 'required|integer',
            'MAIL_USERNAME' => 'required',
            'MAIL_PASSWORD' => 'required',
            'MAIL_ENCRYPTION' => 'nullable',
            'MAIL_FROM_ADDRESS' => 'required|email',
            'MAIL_FROM_NAME' => 'required',
        ];

        $messages = [
            'MAIL_MAILER.required' => 'Please enter the mailer!',
            'MAIL_HOST.required' => 'Please enter the mail host!',
            'MAIL_PORT.required' => 'Please enter the mail port!',
            'MAIL_PORT.integer' => 'Mail port must be a number!',
            'MAIL_USERNAME.required' => 'Please enter the mail username!',
            'MAIL_PASSWORD.required' => 'Please enter the mail password!',
            'MAIL_ENCRYPTION.nullable' => 'Encryption method can be left empty.',
            'MAIL_FROM_ADDRESS.required' => 'Please enter the mail from address!',
            'MAIL_FROM_ADDRESS.email' => 'Please enter a valid email address!',
            'MAIL_FROM_NAME.required' => 'Please enter the mail from name!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::table('mail_cofigs')->updateOrInsert(
            ['id' => 1],
            [
                'MAIL_MAILER' => $request->input('MAIL_MAILER'),
                'MAIL_HOST' => $request->input('MAIL_HOST'),
                'MAIL_PORT' => $request->input('MAIL_PORT'),
                'MAIL_USERNAME' => $request->input('MAIL_USERNAME'),
                'MAIL_PASSWORD' => $request->input('MAIL_PASSWORD'),
                'MAIL_ENCRYPTION' => $request->input('MAIL_ENCRYPTION'),
                'MAIL_FROM_ADDRESS' => $request->input('MAIL_FROM_ADDRESS'),
                'MAIL_FROM_NAME' => $request->input('MAIL_FROM_NAME'),
            ]
        );

        $request->session()->flash('successMessage', 'Mail configuration updated successfully.');
        return redirect()->route('Mail.Config');
    }

    public function RazorpayConfig()
    {
        $result['data'] = DB::table('razorpay_configs')->where(['id' => 1])->get();
        return view('Admin.RazorpayConfig', $result);
    }

    public function RazorpayConfigProcess(Request $request)
    {
        $rules = [
            'RAZORPAY_KEY' => 'required',
            'RAZORPAY_SECRET' => 'required',
        ];

        $messages = [
            'RAZORPAY_KEY.required' => 'Please enter razorpay key!',
            'RAZORPAY_SECRET.required' => 'Please enter razorpay secret',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::table('razorpay_configs')->updateOrInsert(
            ['id' => 1], // or another condition if needed
            [
                'RAZORPAY_KEY' => $request->input('RAZORPAY_KEY'),
                'RAZORPAY_SECRET' => $request->input('RAZORPAY_SECRET'),
            ]
        );

        $request->session()->flash('successMessage', 'Razorpay configuration updated successfully.');
        return redirect()->route('Razorpay.Config');
    }
}
