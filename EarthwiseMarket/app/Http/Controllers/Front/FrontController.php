<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        return view('Front.index');
    }


    public function myAccount()
    {
        if (session()->has('FRONT_USER_LOGIN') && session()->get('FRONT_USER_LOGIN') === true) {

            return view('Front.myaccount');
        }
        return redirect('/login');
    }
}
