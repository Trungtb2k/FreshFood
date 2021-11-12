<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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
// Front End
Route::get('/', [HomeController::class,'index']);
Route::get('/trang-chu', [HomeController::class,'index']);

//Danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class,'show_category_home']);

//Chi tiet san pham
Route::get('/Chi-tiet-san-pham/{product_id}', [ProductController::class,'details_product']);


// Back end
Route::get('/admin', [AdminController::class,'index']);
Route::get('/dashboard', [AdminController::class,'show_dashboard']);
Route::get('/logout', [AdminController::class,'logout']);
Route::post('/admin-dashboard', [AdminController::class,'dashboard']);

//Category Product
Route::get('/add-category-product', [CategoryProduct::class,'add_category_product']);
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class,'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class,'delete_category_product']);
Route::get('/all-category-product', [CategoryProduct::class,'all_category_product']);

Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class,'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class,'active_category_product']);

Route::post('/save-category-product', [CategoryProduct::class,'save_category_product']);
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class,'update_category_product']);

//Product
Route::get('/add-product', [ProductController::class,'add_product']);
Route::get('/edit-product/{product_id}', [ProductController::class,'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class,'delete_product']);
Route::get('/all-product', [ProductController::class,'all_product']);

Route::get('/unactive-product/{product_id}', [ProductController::class,'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class,'active_product']);

Route::post('/save-product', [ProductController::class,'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class,'update_product']);

//Cart
Route::post('/save-cart', [CartController::class,'save_cart']);
Route::get('/show-cart', [CartController::class,'show_cart']);
Route::post('/add-cart-ajax', [CartController::class,'add_cart_ajax']);
Route::post('/update-cart', [CartController::class,'update_cart']);
Route::get('/del-product/{session_id}', [CartController::class,'delete_product']);

//Checkout
Route::get('/login-checkout', [CheckoutController::class,'login_checkout']);




