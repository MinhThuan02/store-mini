<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Models\categories;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ChekoutController extends Controller
{
    public function checklogin(){
        return view('checklogin');
    }

    public function checkout(){
        $cartCollection = \Cart::getContent(); // Assuming you are using a package like Darryldecode\Cart
        return view('checkout', compact('cartCollection'));
    }


    public function save_checkout(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id);
        return Redirect::to('/payment');
    }



    public function payment(){
        // Code xử lý phần thanh toán
    }

    public function post_login(Request $req){
        $email = $req->input('email');
        $password = $req->input('password');
        $remember = $req->input('remember');

        $user = User::where('email', $email)->first();
        $canLogin = false;

        if(isset($user)){
            $canLogin = Hash::check($password, $user->password);
        }

        if($canLogin){ // Allow login
            Auth::login($user, $remember);
            Session::put('id', $user->id);
            Session::put('name', $user->name);
            return redirect()->route('home');
        } else {
            Session::put('message', 'Email hoặc mật khẩu không đúng!');
            return back();
        }
    }


    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('checklogin');
    }
}
