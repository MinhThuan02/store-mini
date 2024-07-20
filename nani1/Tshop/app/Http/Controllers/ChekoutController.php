<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChekoutController extends Controller
{
    public function Checkout(){
        return view('Checkout');
    }
}
