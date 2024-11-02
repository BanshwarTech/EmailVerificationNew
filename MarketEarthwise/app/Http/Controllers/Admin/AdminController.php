<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {

            return redirect('admin/dashboard');
        } else {
            return view('Admin.Index');
        }
        return view('Admin.Index');
    }
    public function auth(Request $request)
    {
        $email = $request->post('useremail');
        $password = $request->post('password');
        // echo '<pre>';
        // print_r($email);
        // die();
        $result = Admin::where(['email' => $email])->first();
        if ($result) {
            if (Hash::check($password, $result->password)) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                $request->session()->put('ADMIN_NAME', $result->name);
                $request->session()->put('ADMIN_EMAIL', $result->email);
                return redirect('admin/dashboard');
            } else {
                $request->session()->flash('errorMessage', 'Please enter correct password');
                return redirect('admin');
            }
        } else {
            $request->session()->flash('errorMessage', 'Please enter valid login details');
            return redirect('admin');
        }
    }

    public function Dashboard()
    {
        return view('Admin.Dashboard');
    }


    public function updatePassword()
    {
        $pwd = Admin::find(1);
        $pwd->password = Hash::make('admin');
        $pwd->save();
    }
}
