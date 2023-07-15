<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\orderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product_controller;
use App\Http\Controllers\userController;
use App\Models\Products;

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



Route::view("/admin/add","pages.admin.add")->middleware(['admin']);
Route::view("/register","pages.register")->name('register');
Route::view("/login","pages.login")->name('login');
Route::view("/order","pages.admin.order")->name('order');
Route::view("/admin/add-category","pages.admin.addCategory")->middleware(['admin']);
Route::post('/add-product',[Product_controller::class,'add_data'])->name('add_product');
Route::post('/add-category',[categoryController::class,'AddCategory']);
Route::get('/',[Product_controller::class, 'GetProducts']);
Route::get('/admin/add',[categoryController::class,'GetCategories'])->middleware(['admin']);
Route::get('/single-product/{id}',function($id){
    $item = Products::find($id);
    return view('pages.singleProduct',compact('item'));
});

Route::post('/register',[userController::class,'SignUp']);
Route::post('/logout',[userController::class,'SignOut']);
Route::post('/login',[userController::class,'SignIn']);
Route::view('/view-cart','pages.cart')->middleware('auth');
Route::post('/add-to-cart',[cartController::class,'addToCart']);
Route::get('/view-cart',[cartController::class,'getCartItems']);
Route::post('/send-mail',[mailController::class,'sendMail']);
Route::get('/order',[orderController::class,'getOrders']);
Route::post('/update-status/{id}',[orderController::class,'updateStatus']);