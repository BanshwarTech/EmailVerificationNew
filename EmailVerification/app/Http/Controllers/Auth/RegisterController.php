<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\User;
use App\Models\VerifyToken;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;

class RegisterController extends Controller
{


    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data["name"],
            'email' => $data["email"],
            'password' => Hash::make($data["password"]),
        ]);
        $validToken = rand(10, 100. . '2024');
        $get_token = new VerifyToken();
        $get_token->token = $validToken;
        $get_token->email = $data["email"];
        $get_token->save();

        $get_user_email = $data['email'];
        $get_user_name = $data["name"];
        Mail::to($data["email"])->send(new WelcomeMail($get_user_email, $validToken, $get_user_name));
        return $user;
    }
}
