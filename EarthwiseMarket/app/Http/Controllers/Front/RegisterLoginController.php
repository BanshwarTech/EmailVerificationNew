<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;

class RegisterLoginController extends Controller
{
    public function Register()
    {
        return view('Front.register');
    }

    public function RegisterProcess(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' => 'required|min:8',
            "mobile" => 'required|numeric|digits:10',
        ]);

        if (!$valid->passes()) {
            return response()->json(['status' => 'error', 'error' => $valid->errors()->toArray()]);
        } else {
            $rand_id = rand(111111111, 999999999);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->mobile = $request->mobile;
            $user->status = 1;
            $user->rand_id = $rand_id;
            $user->is_forgot_password = 0;
            $user->created_at = date('Y-m-d h:i:s');
            $user->updated_at = date('Y-m-d h:i:s');
            $user->save();

            return redirect("/verification/" . $user->id);
        }
    }

    public function verification($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user || $user->is_verified == 1) {
            return redirect('/');
        }
        $email = $user->email;

        $this->sendOtp($user); //OTP SEND

        return view('Front.verification', compact('email'));
    }

    public function sendOtp($user)
    {
        $otp = rand(100000, 999999);
        $time = time();

        EmailVerification::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'otp' => $otp,
                'created_at' => $time
            ]
        );

        $data['email'] = $user->email;
        $data['title'] = 'Mail Verification';

        $data['body'] = 'Your OTP is:- ' . $otp;

        Mail::send('Front.mailVerification', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });
    }
    public function verifiedOtp(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $otpData = EmailVerification::where('otp', $request->otp)->first();
        if (!$otpData) {
            return response()->json(['success' => false, 'msg' => 'You entered wrong OTP']);
        } else {

            $currentTime = time();
            $time = $otpData->created_at;

            if ($currentTime >= $time && $time >= $currentTime - (90 + 5)) { //90 seconds
                User::where('id', $user->id)->update([
                    'is_verified' => 1
                ]);
                return response()->json(['success' => true, 'msg' => 'Mail has been verified']);
            } else {
                return response()->json(['success' => false, 'msg' => 'Your OTP has been Expired']);
            }
        }
    }
    public function resendOtp(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $otpData = EmailVerification::where('email', $request->email)->first();

        $currentTime = time();
        $time = $otpData->created_at;

        if ($currentTime >= $time && $time >= $currentTime - (90 + 5)) { //90 seconds
            return response()->json(['success' => false, 'msg' => 'Please try after some time']);
        } else {

            $this->sendOtp($user); //OTP SEND
            return response()->json(['success' => true, 'msg' => 'OTP has been sent']);
        }
    }
    public function Login()
    {
        if (session()->has('FRONT_USER_LOGIN') && session()->get('FRONT_USER_LOGIN') === true) {
            return redirect('/my-account');
        }
        return view('Front.login');
    }

    public function LoginProcess(Request $request)
    {

        Validator::make($request->all(), [
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);
        $userCredential = $request->only('email', 'password');
        $userData = User::where('email', $request->email)->first();
        if ($userData && $userData->is_verified == 0) {

            $this->sendOtp($userData);
            return redirect("/verification/" . $userData->id);
        } else if (Hash::check($request->password, $userData->password)) {

            if ($request->rememberme === null) {
                setcookie('login_email', $request->email, 100);
                setcookie('login_pwd', $request->password, 100);
            } else {
                setcookie('login_email', $request->email, time() + 60 * 60 * 24 * 100);
                setcookie('login_pwd', $request->password, time() + 60 * 60 * 24 * 100);
            }
            $request->session()->put('FRONT_USER_LOGIN', true);
            $request->session()->put('FRONT_USER_ID', $userData->id);
            $request->session()->put('FRONT_USER_NAME', $userData->name);
            $request->session()->put('FRONT_USER_EMAIL', $userData->email);

            $request->session()->flash('successMessage', 'Login Successfully....');
            return redirect()->route('myAccount');
        } else {
            $request->session()->flash('errorMessage', 'Please enter a valid password');
            return redirect('/login');
        }
    }

    public function Logout(Request $request)
    {
        session()->forget('FRONT_USER_LOGIN');
        session()->forget('FRONT_USER_ID');
        session()->forget('FRONT_USER_NAME');
        session()->forget('FRONT_USER_EMAIL');
        session()->forget('USER_TEMP_ID');
        $request->session()->flash('successMessage', 'Logout Successfully....');
        return redirect('/login');
    }
}
