<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Models\categories;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect::to('dasboard');
        }else{
            return redirect::to('admin')->send();
        }
    }
    public function login() {
        // $categories_hot = DB::table('categories')->orderBy('view', 'desc')->limit(5)->get();

        return view('login_admin');
    }

    public function show_dashboard(){
       $this -> AuthLogin();
        return view('admin.dashboard');

    }

    public function dashboard(Request $request){
        $admin_email = trim($request->admin_email);
        $admin_password = md5(trim($request->admin_password));

        // Log the input values for debugging
        Log::info('Admin Email: ' . $admin_email);
        Log::info('Admin Password (MD5): ' . $admin_password);

        // Correct the query syntax
        $result = DB::table('tbal_admin')
                    ->where('admin_email', $admin_email)
                    ->where('admin_password', $admin_password)
                    ->first();

        Log::info('Query Result: ', (array)$result);

        if ($result) {
            Log::info('Login successful for admin: ' . $result->admin_name);
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return redirect('/dashboard');
        } else {
            Log::warning('Login failed for admin email: ' . $admin_email);
            Session::flash('message', 'Mật khẩu hoặc tài khoản sai.');
            return Redirect::to('/admin');
        }
    }

    public function logout(){
        $this -> AuthLogin();
        Session::flush();
        return Redirect::to('/admin');
    }


    // chức năng


    public function unactive_Brand($categories_id){
        $this -> AuthLogin();
        DB::table('_brand')->where('id',$categories_id)->update(['status'=>1]);
        Session::put('message' ,' Ẩn Danh Mục Thành Công');
        return redirect::to('all_Brand');
    }

    public function active_Brand($categories_id){
        $this -> AuthLogin();
        DB::table('_brand')->where('id',$categories_id)->update(['status'=>0]);
        Session::put('message' ,'Hiện Danh Mục Thành Công');
        return redirect::to('all_Brand');
    }
    public function all_product()
    {
        $this->AuthLogin();

        // Fetch all products with their category and brand names
        $all_product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('_brand', 'products.brand_id', '=', '_brand.brand_id')
            ->select('products.*', 'categories.name as category_name', '_brand.name as brand_name')
            ->orderBy('products.id', 'desc')
            ->paginate(6);

            // $all_product::paginate(6);

        // Check what data is retrieved
        // Log::info('Fetched products', ['products' => $all_product]);

        return view('admin.all_product', compact('all_product'));
    }





    public function save_product(Request $request)
    {
        $this->AuthLogin();

        $data = array();
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['quantity'] = $request->quantity;
        $data['sold'] = $request->sold;
        $data['brand_id'] = $request->brand_id;
        $data['category_id'] = $request->categories_id; // Đảm bảo tên biến đúng
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now(); // Thêm thời gian tạo


        $get_image = $request->file('img');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['img'] = $new_image;
        } else {
            $data['img'] = ''; // Đảm bảo biến img luôn là chuỗi
        }

        DB::table('products')->insert($data);

        Session::flash('message', 'Thêm Sản Phẩm Thành Công');
        // print_r($data);
        return Redirect::to('addSP');
    }

    public function addSP(){
        $this -> AuthLogin();
        $all_cate = DB::table('categories')->orderBy('id','desc')->get();
        $all_brand = DB::table('_brand')->orderBy('brand_id','desc')->get();

        return view('admin.addSP')->with('all_cate', $all_cate)->with('all_brand', $all_brand);
    }


    public function edit_SP($id){
        $this -> AuthLogin();
        $all_cate = DB::table('categories')->orderBy('id','desc')->get();
        $all_brand = DB::table('_brand')->orderBy('brand_id','desc')->get();
        $edit_SP = DB::table('products')->where('id',$id)->get();
        // Truy vấn danh mục cần chỉnh sửa từ cơ sở dữ liệu
    //   $maneger_product = view('admin.edit_SP')->with('edit_SP', $edit_SP)->with('all_cate', $all_cate)->with('all_brand', $all_brand);

    // Trả về view với dữ liệu danh mục cần chỉnh sửa
    return view('admin.edit_SP')->with('edit_SP', $edit_SP)->with('all_cate', $all_cate)->with('all_brand', $all_brand);



}

public function update_product(Request $request, $id) {
    $this->AuthLogin();

    // Validate request data
    $data = array();
    $data['name'] = $request->name;
    $data['price'] = $request->price;
    $data['quantity'] = $request->quantity;
    $data['sold'] = $request->sold;
    $data['brand_id'] = $request->brand_id;
    $data['category_id'] = $request->categories_id;
    $data['description'] = $request->description;
    $data['sold'] = $request->sold;
    $data['status'] = $request->status;
     // Thêm thời gian tạo
    $data['updated_at'] = Carbon::now();

    // Handle image upload
    $get_image = $request->file('img');
    if ($get_image) {

        $product = DB::table('products')->where('id', $id)->first();
        $old_image = $product->img;
        if ($old_image && File::exists('public/uploads/product/' . $old_image)) {
            File::delete('public/uploads/product/' . $old_image);


        }



        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move('public/uploads/product', $new_image);
        $data['img'] = $new_image;
        DB::table('products')->where('id', $id)->update($data);
        Session::flash('message', 'Cập Nhật Sản Phẩm Thành Công');
        return Redirect::to('all_product');

    }


    // Update product in the database

    // Flash success message and redirect

    DB::table('products')->where('id', $id)->update($data);
        Session::flash('message', 'Cập Nhật Sản Phẩm Thành Công');
        return Redirect::to('all_product');

}


public function delete_product($id) {

    $this->AuthLogin();


    $product = DB::table('products')->where('id', $id)->first();


    if ($product) {

        $old_image = $product->img;


        DB::table('products')->where('id', $id)->delete();


        if ($old_image && File::exists(public_path('uploads/product/' . $old_image))) {
            File::delete(public_path('uploads/product/' . $old_image));
        }


        Session::put('message', 'Xóa Sản Phẩm thành công');
    } else {

        Session::put('message', 'Sản Phẩm không tồn tại');
    }


    return Redirect::to('all_product');
}

}
