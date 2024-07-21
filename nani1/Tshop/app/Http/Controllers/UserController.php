<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function post_register(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $id = DB::table('users')->insertGetId($data);

        Session::put('id', $id);
        return Redirect::to('/login');

    }

    // public function post_register(Request $req) {
    //     $email = $req->input('email');
    //     $password = $req->input('password');
    //     $repassword = $req->input('repassword');
    //     $name = $req->input('name');

    //     if ($password != $repassword) {
    //         session()->put('message', 'Mật khẩu nhập lại không trùng khớp!');
    //         return back();
    //     }

    //     $existingUser = User::where('email', $email)->first();
    //     if (isset($existingUser)) {
    //         session()->put('message', 'Email đã tồn tại không thể đăng ký!');
    //         return back();
    //     }

    //     $user = new User();
    //     $user->name = $name;
    //     $user->email = $email;
    //     $user->password = Hash::make($password); // Hash the password
    //     $user->save();

    //     Auth::login($user);
    //     Session::put('id', $user->id);
    //     Session::put('name', $user->name);

    //     return redirect()->route('home');
    // }

    public function post_login(Request $req) {
        $email = $req->input('email');
        $password = $req->input('password');
        $remember = $req->input('remember');

        $user = User::where('email', $email)->first();
        $canLogin = false;

        if (isset($user)) {
            $canLogin = Hash::check($password, $user->password);
        }

        if ($canLogin) { // Allow login
            Auth::login($user, $remember);
            Session::put('id', $user->id);
            Session::put('name', $user->name);
            return redirect()->route('home');
        } else {
            session()->put('message', 'Email hoặc mật khẩu không đúng!');
            return back();
        }
    }
}

