<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{



    public function index()
    {


        // Lấy 4 sản phẩm
        $products_HM = Product::orderBy('created_at', 'desc')->take(4)->get();
        $products = Product::orderBy('created_at', 'desc')->take(6)->get();
        $products_jp = Product::where('brand_id', 1)->take(6)->get();
        $products_cate = Product::where('category_id', 4)->take(6)->get();

        // $categories_hot = DB::table('categories')->orderBy('view', 'desc')->limit('5')->get();
        return view('home', compact('products','products_jp','products_cate','products_HM'));



    //     return view('home'
    //     , [
    //         'products' => $products
    //     ]
    // );
    }

    // public function categories_hot()
    // {
    //     $categories_hot = DB::table('categories')->orderBy('view', 'desc')->get();
    //     return view('home', compact('categories_hot'));
    // }

    public function search(Request $req)
    {
        $categories = categories::orderBy('name', 'ASC')->get();
        $search = $req->input('search');

        $products = Product::where('name', 'LIKE', '%' . $search . '%')
            // ->orWhere('description', 'LIKE', '%' . $search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(6); // Ensure paginate is used here


        return view('shop', compact('products', 'categories'));
    }





}
