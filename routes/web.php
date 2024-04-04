<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



                ///////////////Trang HOME////////////////////////


Route::controller(App\Http\Controllers\HomeController::class)->group(function(){
    Route::get('/home',  'index')->name('home');
    Route::get('/giohang',  'giohang')->name('giohang');
    Route::get('/thanhtoan',  'thanhtoan')->name('thanhtoan');
});


//Detail
Route::controller(App\Http\Controllers\detailcontroller::class)->group(function(){
    Route::get('/detailt/{ProID}',  'showProduct')->name('detailt');
});


//Login
Route::controller(App\Http\Controllers\LoginController::class)->group(function(){
    Route::get('/login',  'showLoginForm')->name('login');
    Route::get('/loginsubmit',  'login')->name('login.submit');
    Route::get('/register',  'showRegisterForm')->name('register');
    Route::get('/registersubmit',  'register')->name('register.submit');
});


//Danh Mục (category)
Route::controller(App\Http\Controllers\CategoryController::class)->group(function(){
    Route::get('/danhmuc/{CatID}',  'store')->name('danhmuc');
});


//Blog
Route::controller(App\Http\Controllers\BlogController::class)->group(function(){
    Route::get('/blog',  'index')->name('blog');
});





















            ////////////////////////ADMIN//////////////////////////////////

Route::get('/admin', function () {
    return view('admin.home');
})->name('admin');



Route::controller(App\Http\Controllers\admin\CategoryController::class)->group(function(){
    Route::get('/indexCategory','index')->name('categories.index');
    Route::get('/createCategory','create')->name('categories.create');
    Route::post('/storeCategory','store')->name('categories.store');
    Route::get('/showCategory/{CatID}','show')->name('categories.detail');
    Route::get('/editCategory/{CatID}','edit')->name('categories.edit');
    Route::put('/updateCategory/{CatID}','update')->name('categories.update');
    Route::get('/destroyCategory/{CatID}','destroy')->name('categories.destroy');
});



Route::controller(App\Http\Controllers\admin\ProductController::class)->group(function(){
    Route::get('/indexProduct', 'index')->name('product.index');
    Route::get('/createProduct',  'create')->name('product.create');
    Route::post('/storeProduct',  'store')->name('product.store');
    Route::get('/showProduct/{ProID}',  'show')->name('product.detail');
    Route::get('/editProduct/{ProID}',  'edit')->name('product.edit');
    Route::put('/updateProduct/{ProID}',  'update')->name('product.update');
    Route::get('/destroyProduct/{ProID}',  'destroy')->name('product.destroy');
});