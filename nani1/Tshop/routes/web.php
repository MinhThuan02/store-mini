<?php


use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ChekoutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\editcontroller;
use App\Http\Controllers\inforController;
use App\Http\Controllers\blogdetailController;
use App\Models\Product;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Home

Route::get('/',[HomeController::class,'index'])->name('home');


Route::get('/detail',[DetailController::class,'detail'])->name('detail');
Route::get('/checkout',[ChekoutController::class,'checkout'])->name('checkout');
Route::get('/blog',[BlogController::class,'blog'])->name('blog');
Route::get('/contact',[ContactController::class,'contact'])->name('contact');


Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'post_login'])->name('post_login');




Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register', [UserController::class, 'post_register']);
Route::get('/shop',[ShopController::class,'shop'])->name('shop');
Route::get('/shop',[ShopController::class,'shop'])->name('shop');
Route::get('/shop/{id}',[ShopController::class,'detail'])->name('detail');
Route::get('/shop/{category_id}',[ShopController::class,'shop'])->name('shop');
Route::get('/categories/{category_id}',[ShopController::class,'getproductBycategory'])->name('categories');
route::get('/product/{id}',[ShopController::class,'detail']);
Route::post('/save-categories',[ShopController::class,'save_categories']);
Route::get('/search',[HomeController::class,'search'])->name('search.products');
Route::get('/blogdetail',[blogdetailController::class,'blogdetail'])->name('blogdetail');
Route::get('/category/{id}', [ShopController::class, 'showProductsByCategory'])->name('category.products');







//admin
Route::get('/admin', [DashboardController::class, 'admin'])->name('admin');
Route::post('/admin', [DashboardController::class, 'login'])->name('dashboard');


Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
Route::post('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'show_dashboard'])->name('show_dashboard');
Route::get('/all_categories',[DashboardController::class,'all_categories'])->name('all_categories');


// Danh mục
Route::get('/edit-categories/{id}', [DashboardController::class, 'edit_categories'])->name('edit_categories');
Route::get('/delete-categories/{id}', [DashboardController::class, 'delete_categories'])->name('delete_categories');
Route::post('/update-categories/{id}', [DashboardController::class, 'update_categories']);
Route::get('/unactive-categories/{categories_id}',[DashboardController::class,'unactive_categories'])->name('all_categories');
Route::get('/active-categories/{categories_id}',[DashboardController::class,'active_categories'])->name('all_categories');
Route::get('/addPD',[DashboardController::class,'addPD'])->name('addPD');
Route::post('/save-categories',[DashboardController::class,'save_categories'])->name('save_categories');
Route::get('/category/{id}', [ShopController::class, 'showProductsByCategory'])->name('category.products');

// brand
Route::get('/add_Brand',[BrandController::class,'add_Brand'])->name('add_Brand');
Route::post('/save-add-brand',[BrandController::class,'save_Brand']);

Route::get('/all_Brand',[BrandController::class,'all_Brand'])->name('all_Brand');

Route::get('/edit-add-Brand/{id}', [BrandController::class, 'edit_add_Brand']);
Route::get('/delete-add-Brand/{id}', [BrandController::class, 'delete_Brand']);


Route::post('/update-add-Brand/{id}', [BrandController::class, 'update_Brand']);
Route::get('/unactive-brand/{categories_id}',[BrandController::class,'unactive_Brand']);


Route::get('/active-brand/{categories_id}',[BrandController::class,'active_Brand']);

//products

Route::get('/addSP', [ProductController::class, 'addSP'])->name('addSP');

// Route để xử lý form thêm sản phẩm
Route::post('/save-product', [ProductController::class, 'save_product']);
Route::get('/all_product',[ProductController::class,'all_product'])->name('all_product');

Route::get('/edit-product/{id}', [ProductController::class, 'edit_SP']);
Route::get('/delete-product/{id}', [ProductController::class, 'delete_product']);


Route::post('/update-product/{id}', [ProductController::class, 'update_product']);


Route::get('/unactive-product/{categories_id}',[ProductController::class,'unactive_product']);


Route::get('/active-brand/{categories_id}',[ProductController::class,'active_Brand']);



//cart
Route::post('/save-cart', [CartController::class, 'save_cart'])->name('save_cart');
Route::get('/cart',[CartController::class,'cart'])->name('cart');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('remove');
Route::post('/update-cart', [CartController::class, 'update_cart'])->name('update_cart');



//checklogin
Route::get('/checklogin',[ChekoutController::class,'checklogin'])->name('checklogin');
Route::post('/checklogin',[ChekoutController::class,'post_login'])->name('post_login');
Route::post('/save-checkout',[ChekoutController::class,'save_checkout'])->name('save_checkout');
Route::get('/logout', [ChekoutController::class, 'logout'])->name('logout');









