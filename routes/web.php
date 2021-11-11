<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ChechoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;

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
//     return view('welcome');
// });
Route::post('add-to-cart', [CartController::class, 'addproduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);
Route::post('update_cart',[CartController::class, 'updatecart']);

Route::get('/',[FrontendController::class,'index']);
Route::get('category',[FrontendController::class,'category']);
Route::get('view-category/{slug}',[FrontendController::class,'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}',[FrontendController::class,'productview']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['auth','isAdmin']], function () {

//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     });

// });
Route::middleware(['auth'])->group(function(){

Route::get('cart', [CartController::class, 'viewcart']);
Route::get('checkout',[ChechoutController::class, 'index']);
Route::post('place-order',[ChechoutController::class, 'placeorder']);

Route::get('my-orders', [UserController::class, 'index']);
Route::get('view-order/{id}', [UserController::class, 'view']);


   

});

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard','Admin\FrontendController@index');

    Route::get('/categories', 'Admin\CategoryController@index');
    Route::get('add-category', 'Admin\CategoryController@add');
    Route::post('insert-category', 'Admin\CategoryController@insert');
    Route::get('edit-category/{id}', [CategoryController::class ,'edit']);
    Route::post('update-category/{id}', [CategoryController::class ,'update']);
    Route::get('delete-category/{id}', [CategoryController::class ,'destroy']);

    Route::get('products', [ProductController::class ,'index']);
    Route::get('add-products', [ProductController::class ,'add']);
    Route::Post('insert-Product', [ProductController::class ,'insert']);
    Route::get('edit-product/{id}', [ProductController::class ,'edit']);
    Route::post('update-product/{id}', [ProductController::class ,'update']);
    Route::get('delete-product/{id}', [ProductController::class ,'destroy']);

    

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}',[OrderController::class, 'updateorder']);
    Route::get('order-history',[OrderController::class, 'orderhistory']);


    Route::get('users', [DashboardController::class, 'users']);


    
       
    


});