<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories; 
use App\Models\Product; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;




class ShopController extends Controller
{

    public function shop()
    {
        
        // $categories_hot = DB::table('categories')->orderBy('view', 'desc')->limit(5)->get();
        $products = Product::paginate(6);
        $categories = categories::where('status', 1)->get();

        
        return view('shop', compact('products', 'categories'));
    }


    public function getProductByCategory(Request $request, $category_id)
    {
        // $categories_hot = DB::table('categories')->orderBy('view', 'desc')->limit(5)->get();
        $products = Product::where('category_id', $category_id)->paginate(6);

        $categories = categories::all();

        
        return view('shop', compact('products', 'categories'));
    }

    // public function detail(Request $request, $id)
    // {
    //     $product = Product::all();
    //     $categories_hot = DB::table('categories')->orderBy('view', 'desc')->limit(5)->get();
    //     $categories = categories::all();
    //     return view('detail', compact('product', 'categories', 'categories_hot'));
    // }



  
   
    public function detail(request $request , $id){
        // $categories_hot = DB::table('categories')->orderBy('view', 'desc')->limit(5)->get();
        $products = product::where('id', $request->id)->get();

        $product = Product::findOrFail($id);

        $related_products = Product::where('category_id', $product->category_id)
                               ->where('id', '!=', $product->id) // Loại bỏ sản phẩm hiện tại ra khỏi danh sách sản phẩm liên quan
                               ->get();
      
        return view('detail',compact('products', 'product', 'related_products'));
    }

    // public function AddToCart(Request $request){
    //     $product = Product::findOrFail($request->input('id')); // Tìm sản phẩm theo ID
    //     // Thêm sản phẩm vào giỏ hàng (đảm bảo AddToCart đã được import đúng cách)
    //     Cart::add(
    //         $product->id,
    //         $product->name,
    //         $request->input('quantity'),
    //         $product->price
    //     );
    //     return redirect()->route('detail')->with('message','Thêm Thành Công'); // Chuyển hướng về trang chi tiết sản phẩm
    // }
    

 
    // public function categories_hot()
    // {
    //     $categories_hot = DB::table('categories')->orderBy('view', 'desc')->get();
    //     return view('home', compact('categories_hot'));
    // }
    

    // public function shop()
    // {
    //     // Fetch all categories from the database
    //     $categories = categories::all();

    //     // Pass the categories to the view
    //     return view('shop', compact('categories'));
    // }
    // public function showProductsByCategory($categoryId)
    // {
    //     $category = categories::with('products')->find($categoryId);

    //     if (!$category) {
    //         return redirect()->back()->with('error', 'Category not found');
    //     }

    //     return view('products.by_category', ['category' => $category]);
    // }
}

