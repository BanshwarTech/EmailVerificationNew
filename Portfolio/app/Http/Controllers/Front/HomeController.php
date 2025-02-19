<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Education;
use App\Models\Admin\experience;
use App\Models\Admin\technical_skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $result["home"] = DB::table('homes')->get();
        $result['about'] = DB::table('about_us')->get();
        $result['skill'] = technical_skill::all();
        $result['experiences'] = experience::all();
        $result['education'] = Education::all();
        $result['contact_details'] = DB::table('contact_details')->get();

        return view('home.index', $result);
    }
}
