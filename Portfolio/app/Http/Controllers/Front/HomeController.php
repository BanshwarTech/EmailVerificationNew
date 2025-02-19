<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Accounts;
use App\Models\Admin\Education;
use App\Models\Admin\experience;
use App\Models\Admin\Project;
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
        $result['project'] = Project::all();
        $result['contact_details'] = DB::table('contact_details')->get();
        $result['social_connection'] = $accounts = Accounts::where('account_type', 'social')->get();

        return view('home.index', $result);
    }
}
