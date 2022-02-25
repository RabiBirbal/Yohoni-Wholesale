<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('frontend/home');
// });
Route::get('/user_login', [LoginController::class,'userLoginIndex']);
Route::post('/user_login',[LoginController::class,'userlogin'])->name('userLogin');

Route::get('/user_register',[CustomerController::class,'index']);
Route::post('/user/register',[CustomerController::class,'store'])->name('userRegister');
Route::get('/verify/email/{verification_code}',[CustomerController::class,'verify_email'])->name('verify_email');


Route::get('/customer/delete/{id}',[CustomerController::class,'destroy']);
Route::get('/customer/edit/{id}',[CustomerController::class,'edit']);
Route::post('/customer/update',[CustomerController::class,'update']);


Route::get('/user/profile',[ProfileController::class,'index']);
Route::get('/user/profile/edit',[ProfileController::class,'edit']);
Route::post('/user/profile/update',[ProfileController::class,'update']);
Route::get('/user/password/edit',[ProfileController::class,'editPassword']);
Route::post('/user/password/update',[ProfileController::class,'updatePassword']);


Route::get('/orders',[OrderController::class,'index']);

Route::get('/', [IndexController::class, 'showData'])->name('index');

Route::get("about_us",[AboutController::class,'index']);

// Route::get("clothing",[ProductController::class,'showClothing']);

Route::get("/contact_us",[ContactController::class,'index']);

Route::post("contact_us",[ContactController::class,'store']);

// Route::get("electric",[ProductController::class,'showElectric']);

// Route::get("footwear",[ProductController::class,'showFootwear']);

// Route::get('/fridge', function () {
//     return view('frontend/fridge');
// });

// Route::get("furniture",[ProductController::class,'showFurniture']);

// Route::get("home_appliance",[ProductController::class,'showHomeAppliance']);

// Route::get("mobile",[ProductController::class,'showMobile']);

// Route::get("RO",[ProductController::class,'showRo']);

Route::get("products/subcategory/{name}",[ProductController::class,'index']);
Route::get("products/category/{name}",[ProductController::class,'show1']);

// Route::get('/washing_machine', function () {
//     return view('frontend/washing-machine');
// });

Route::get("/works",[WorkController::class,'index']);

Route::get("cart/details",[CartController::class,'index'])->name('cart_details');
// Route::get("cart/details",[CartController::class,'show']);
Route::get("cart/delete/{id}",[CartController::class,'destroy']);
Route::post("add_to_cart",[CartController::class,'store']);

Route::get("checkout",[CheckoutController::class,'index']);

Route::post("order",[OrderController::class,'store']);
// Route::post('send-link', [LoginController::class, 'resetPassword'])->name('password-email');
// Route::post('password-update', [LoginController::class, 'updatePassword'])->name('password-update');

// admin parts
Route::get('/admin', function () {
    return view('admin/index');
});
Route::get("/admin",[CustomerController::class,'show']);

Route::get('/admin_login', function () {
    return view('admin/admin-login');
});
Route::post('/admin_login',[LoginController::class,'login'])->name('adminLogin');

Route::get("/order_management",[OrderController::class,'show']);
Route::post('/status_change', [OrderController::class, 'changeStatus'])->name('status-change');

Route::get("/contact",[ContactController::class,'show']);

Route::post('/quantity_change', [CartController::class, 'changeQuantity'])->name('quantity-change');

Route::post('/size_change', [CartController::class, 'changeSize'])->name('size-change');

Route::get("/order/details/{id}",[OrderController::class,'showDetail']);

Route::get("/user/order/details/{id}",[OrderController::class,'showOrderDetail']);

Route::get("/order/details/{id}/pdf",[PdfController::class,'index']);

Route::post("/order/cancel",[OrderController::class,'cancelOrder']);

Route::get('/product_management', function () {
    return view('admin/product');
});

Route::get('/banner_management', function () {
    return view('admin/banner');
});
Route::get("banner_management",[BannerController::class,'show']);
Route::post("add_banner",[BannerController::class,'addBanner']);
// Route::get("banner_management",[BannerController::class,'show1']);
Route::post("add_middle_banner",[BannerController::class,'addMiddleBanner']);
Route::post("add_lower_banner",[BannerController::class,'addLowerBanner']);

Route::get("delete_banner/{id}",[BannerController::class,'destroy']);


Route::get("add_product",[ProductController::class,'show']);
Route::post("add_product",[ProductController::class,'addProduct']);

Route::get("product_details",[ProductController::class,'showProduct'])->name('product.list');
Route::get("product/{name}/id={id}",[ProductController::class,'showProductDetail']);
Route::get("delete_product/{id}",[ProductController::class,'destroy']);
Route::get("edit_product/{id}/edit",[ProductController::class,'update']);
Route::post("edit_product/{id}/edit",[ProductController::class,'edit']);

Route::get("category",[CategoryController::class,'show']);
Route::post("category",[CategoryController::class,'addCategory']);
Route::get("delete_category/{id}",[CategoryController::class,'destroy']);
Route::get("edit_category/{id}/edit",[CategoryController::class,'update']);
Route::post("edit_category/{id}/edit",[CategoryController::class,'edit']);

Route::get("sub_category/{id}",[CategoryController::class,'viewSubCategory']);
Route::post("sub_category/{id}",[CategoryController::class,'viewSubCategory']);
Route::post("sub_category/{id}/add",[CategoryController::class,'addSubCategory']);
Route::get("sub_category/delete/{id}",[CategoryController::class,'destroySubcategory']);
Route::get("sub_category/{id}/edit",[CategoryController::class,'updateSubcategory']);
Route::post("sub_category/{id}/edit",[CategoryController::class,'editSubcategory']);

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/logout', function () {
    Session::forget('admin');
    return redirect('/admin_login');
});
Route::get('/logout_user', function () {
    Session::forget('user');
    return redirect('/user_login');
});

// Auth::routes(['register'=>false]);
Auth::routes(['verify'=>true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
