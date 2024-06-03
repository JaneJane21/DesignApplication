<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Mockery\Generator\StringManipulation\Pass\Pass;

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

Route::get('/',
[PageController::class,'show_welcome'])->name('show_welcome');

Route::get('page/reg',
[PageController::class,'show_reg'])->name('show_reg');

Route::post('page/reg/save',
[UserController::class,'save_user'])->name('save_user');

Route::get('page/auth',
[PageController::class,'show_auth'])->name('login');

Route::post('page/auth/login',
[UserController::class,'log_user'])->name('log_user');

Route::group(['middleware'=>['admin','auth'],
'prefix'=>'admin'],function(){
Route::get('/profile',
[PageController::class,'admin_profile'])->name('admin_profile');

Route::get('/categories/index',
[PageController::class,'show_categories'])->name('show_categories');

Route::get('/categories/add',
[PageController::class,'add_category'])->name('add_category');

Route::post('/categories/add/save',
[CategoryController::class,'save_category'])->name('save_category');

Route::post('/categories/edit/{category}',
[PageController::class, 'edit_category'])->name('edit_category');

Route::put('/categories/edit/save/{category}',
[CategoryController::class,'edit'])->name('save_edited_category');

Route::delete('/categories/delete/{category}',
[CategoryController::class,'destroy'])->name('delete_category');


Route::get('/orders/index',
[PageController::class,'show_orders'])->name('show_orders');

// Route::get('/orders/add',
// [PageController::class,'add_order'])->name('add_order');

// Route::post('/orders/add/save',
// [OrderController::class,'store'])->name('store_order');

Route::put('/orders/comment/{order}',
[OrderController::class,'add_comment'])->name('add_comment');

Route::put('/orders/img/{order}',
[OrderController::class,'add_img'])->name('add_img');

// Route::delete('admin/orders/delete/{order}',
// [OrderController::class,'destroy'])->name('delete_order');
});

Route::get('user/profile',
[PageController::class,'user_profile'])->name('user_profile');

Route::get('user/logout',
[UserController::class,'logout'])->name('logout');

Route::get('user/page/orders/index',
[PageController::class,'show_user_orders'])->name('show_user_orders');

Route::get('user/page/orders/add',
[PageController::class,'add_order'])->name('add_order');

Route::post('user/page/orders/add/save',
[OrderController::class,'store'])->name('store_order');

Route::get('user/page/orders/edit/{order}',
[PageController::class,'show_edit_order'])->name('show_edit_order');

Route::put('user/page/orders/edit/save/{order}',
[OrderController::class,'edit'])->name('edit_order');


Route::delete('user/page/orders/delete/{order}',
[OrderController::class,'delete_order'])->name('delete_order');

Route::post('user/filter',
[OrderController::class,'filter_status'])->name('filter_status');
