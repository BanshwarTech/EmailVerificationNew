<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $result["home"] = DB::table('homes')->get();
        $result['about'] = DB::table('about_us')->get();
        $result['contact_details'] = DB::table('contact_details')->get();
        return view('home.index', $result);
    }
}
