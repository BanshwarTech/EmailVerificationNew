<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Storage;

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

        $rules = [
            'useremail' => 'required|email',
            'password' => 'required',
            'remember' => 'accepted'
        ];

        $messages = [
            'useremail.required' => 'Please enter your email!',
            'password.required' => 'Please enter your password!',
            'remember.accepted' => 'Please check the "Remember Me" option.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = $request->post('useremail');
        $password = $request->post('password');
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
        $result['data'] = DB::table("admins")->get();
        return view('Admin.Dashboard', $result);
    }
    public function updatePassword()
    {
        $pwd = Admin::find(1);
        $pwd->password = Hash::make('admin');
        $pwd->save();
    }
    public function profileUpdate(Request $request)
    {
        // Debug input (for testing)
        print_r($request->all());
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->input('id'),
            'password' => 'nullable|string|min:8',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $messages = [
            'name.required' => 'Please enter the username!',
            'name.string' => 'The username must be a string!',
            'name.max' => 'The username cannot exceed 255 characters!',
            'email.required' => 'Please enter an email address!',
            'email.email' => 'Please enter a valid email address!',
            'email.unique' => 'This email is already taken!',
            'password.min' => 'The password must be at least 8 characters long!',
            'profile.image' => 'Please upload a valid image file!',
            'profile.mimes' => 'The profile image must be a file of type: jpeg, png, jpg, gif, svg.',
            'profile.max' => 'The profile image cannot exceed 2MB in size!',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->post('id') > 0) {
            $model = Admin::find($request->post('id'));
            $msg = "Profile updated successfully. Please log in again.";
        } else {
            $model = new Admin();
            $msg = "Admin Details added";
        }

        if (!$model) {
            return redirect()->back()->withErrors(['errorMessage' => 'User not found'])->withInput();
        }

        // Profile image handling
        if ($request->hasFile('profile')) {
            if ($model->profile && Storage::exists('public/media/' . $model->profile)) {
                Storage::delete('public/media/' . $model->profile);
            }

            $image = $request->file('profile');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('media', $image, $image_name);
            $model->profile = $image_name;
        }

        // Update user details
        $model->name = $request->post('name');
        $model->email = $request->post('email');
        if ($request->filled('password')) {
            $model->password = Hash::make($request->post('password'));
        }
        dd($model);
        $model->save();

        // Session handling and redirection
        $request->session()->flash('successMessage', $msg);
        $request->session()->forget(['ADMIN_LOGIN', 'ADMIN_ID']);
        return redirect()->route('login');
    }
}
