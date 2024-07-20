<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Models\categories; 
use App\Models\Product; 
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
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
    public function all_Brand()
    {
        $this -> AuthLogin();
        $all_Brand = DB::table('_brand')->get();
        $manager_categories = view('admin.all_Brand')->with('all_Brand', $all_Brand);
        return view('admin.all_Brand')->with('all_Brand', $all_Brand);
    }


    
    public function save_Brand( request $request){
        $this -> AuthLogin();
        $data = array();
        $data ['name'] = $request->name;
        $data ['description'] = $request->description;
        $data ['status'] = $request->status;
        DB::table('_brand')->insert($data);

        Session::flash('message','Thêm danh mục sản phẩm thành công');
        return redirect::to('add_Brand');
        // echo '<pre>';
        //     print_r($data);
        // echo'</pre>';
    }

   public function add_Brand(){
    $this -> AuthLogin();
    return view('admin.add_Brand');
}

//     public function edit_categories($categories_id){
//         $this -> AuthLogin();
//         // Truy vấn danh mục cần chỉnh sửa từ cơ sở dữ liệu
//         $edit_categories = DB::table('categories')->where('id', $categories_id)->get();
    
//     // Trả về view với dữ liệu danh mục cần chỉnh sửa
//     return view('admin.edit_categories')->with('edit_categories', $edit_categories);
    
    
    
// }

// public function update_categories(Request $request, $categories_id) {
//     $this -> AuthLogin();
//     $data = array();
//     $data['name'] = $request->name;
//     $data['description'] = $request->description;
    
//     DB::table('categories')->where('id', $categories_id)->update($data);
//     Session::put('message', 'Update Thành Công');
    
//     return Redirect::to('all_categories');
// }

// public function delete_categories($categories_id) {
//     $this -> AuthLogin();
//     DB::table('categories')->where('id', $categories_id)->delete();
//     Session::put('message', 'Xóa danh mục thành công');
//     return Redirect::to('all_categories');
// }



}

