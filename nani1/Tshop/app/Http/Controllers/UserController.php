<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   

    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function post_register(Request $req){
        $email = $req->input('email');
        $password = $req->input('password');
        $repassword = $req->input('repassword');
        $name = $req->input('name');

        if ($password!=$repassword) {
            session()->put('message', 'Mật khẩu nhập lại không trùng khớp!');
            return back();
        }

        $user = User::where('email',$email)->first();
        if (isset($user)) {
            session()->put('message', 'Email đã tồn tại không thể đăng ký!');
            return back();
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();
        return redirect()->route('login');
    }

    public function post_login(Request $req){
        $email = $req->input('email');
        $password = $req->input('password');
        $remember = $req->input('remember');

        $user = User::where('email', $email)->first();
        $canLogin = false;
        if(isset($user)){
            $canLogin = Hash::check($password, $user->password);
            // print_r($canLogin);
            // return;
        }
        if($canLogin){//cho phép đăng nhập
            Auth::login($user, $remember);
            return redirect()->route('home');
        }
        else{
            session()->put('message','Email hoặc mật khẩu không đúng!');
            return back();
        }
    }
}
