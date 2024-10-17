<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userView()
    {
        $user = User::all();
        return view('userview', compact('user'));
    }

    public function userStore(Request $req)
    {
        $data = new User();
        $data->usertype = $req->usertype;
        $data->name = $req->name;
        $data->email = $req->email;
        $data->email_verified_at = now();
        $data->password = bcrypt($req->password);
        $data->save();
        return redirect()->route('user-view');
    }

    public function adduser()
    {
        return view('add_user');
    }
}
