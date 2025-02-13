<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public   function index()
    {
        return view('admin.login');
    }


    public function login_process(request $request)
    {
        $rules = [
            'useremail' => 'required|email',
            'userpassword' => 'required',
            'remember-me' => 'sometimes|accepted'
        ];

        $messages = [
            'useremail.required' => 'Please enter your email!',
            'useremail.email' => 'Please enter a valid email address!',
            'userpassword.required' => 'Please enter your password!',
            'remember-me.accepted' => 'Please check the "Remember Me" option if you want to stay logged in.'
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = $request->post('useremail');
        $password = $request->post('userpassword');
        $reme = $request->post('remember-me');
        $result = Login::where(['email' => $email])->first();
        if ($result) {
            if (Hash::check($password, $result->password)) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                $request->session()->put('ADMIN_NAME', $result->name);
                $request->session()->put('ADMIN_EMAIL', $result->email);
                // Redirect to Dashboard with Success Message
                return redirect('admin/dashboard')->with('success', 'Login successful!');
            } else {
                return redirect()->back()->with('error', 'Your password is invalid.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials!');
        }
    }

    public function logout()
    {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_NAME');
        session()->forget('ADMIN_EMAIL');
        session()->flush();
        return redirect('admin')->with('success', 'Logout successful!');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function updatePassword()
    {
        $pwd = Login::find(1);
        $pwd->password = Hash::make('Z&fkaSA+KfZPEZpe');
        $pwd->save();
    }
}
