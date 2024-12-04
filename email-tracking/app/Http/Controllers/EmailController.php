<?php

namespace App\Http\Controllers;

use App\Mail\UserWelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $name = "John Doe";
        $email = "alekhbanshwar2000@gmail.com";

        Mail::to($email)->send(new UserWelcomeMail($name, $email));

        return response()->json(['message' => 'Email sent successfully!']);
    }
}
