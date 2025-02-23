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
        $result['menu'] = DB::table('menus')->get();
        $result['login'] = Login::where('id', session('ADMIN_ID'))->get();

        return view('admin.dashboard', $result);
    }

    public function updateMenu(Request $request, $id)
    {
        // Get the existing menu record
        $menu = DB::table('menus')->where('id', $id)->first();

        // Prepare update data
        $updateData = [
            'Home'    => $request->Home,
            'About'   => $request->About,
            'Skill'   => $request->Skill,
            'EduExp'  => $request->EduExp,
            'Project' => $request->Project,
            'Contact' => $request->Contact,
            'updated_at' => now(),
        ];

        // Determine which items were disabled
        $disabledFields = [];
        foreach ($updateData as $key => $value) {
            if ($key !== 'updated_at' && $menu->$key == 1 && $value == 0) {
                $disabledFields[] = $key;
            }
        }

        // Update the menu record
        DB::table('menus')->where('id', $id)->update($updateData);

        // Check if any fields were disabled
        if (!empty($disabledFields)) {
            return redirect()->back()->with('success', 'The following sections were disabled: ' . implode(', ', $disabledFields));
        }

        return redirect()->back()->with('success', 'Menu updated successfully.');
    }
    public function updateLoginPassword(Request $request, $id)
    {
        $login = DB::table('logins')->where('id', $id)->first();

        if (!$login) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $updateData = [
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'updated_at' => now(),
        ];

        // Check if password is filled
        if ($request->filled('password')) {
            $newPassword = $request->post('password');
            $oldPassword = $login->password;
            // Compare new password with stored hashed password
            if ($newPassword != $oldPassword) {

                $updateData['password'] = Hash::make($newPassword);

                DB::table('logins')->where('id', $id)->update($updateData);
                // Store success message in session before logging out
                session()->put('password_changed_message', 'Password changed. Please log in again.');

                // Remove only relevant session values instead of flushing everything
                session()->forget(['ADMIN_LOGIN', 'ADMIN_ID', 'ADMIN_NAME', 'ADMIN_EMAIL']);

                return redirect()->route('admin.logout');
            }
        }
        // If password is not changed, update only name and email
        DB::table('logins')->where('id', $id)->update($updateData);
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword()
    {
        $pwd = Login::find(1);
        $pwd->password = Hash::make('Z&fkaSA+KfZPEZpe');
        $pwd->save();
    }
}
