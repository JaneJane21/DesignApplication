<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function show_reg(){
        return view('guest.reg');
    }
    public function show_welcome(){
        $orders = Order::query()->where('status','выполнено')->orderByDesc('created_at')->limit(4)->get();
        return view('welcome',['orders'=>$orders]);
    }
    public function show_auth(){
        return view('guest.auth');
    }
    public function user_profile(){
        $user = Auth::user();
        $orders = Order::query()->where('user_id',Auth::id())->get();
        return view('user.profile',['user'=>$user,'orders'=>$orders]);
    }
    public function admin_profile(){
        $user = Auth::user();
        $orders = Order::query()->where('user_id',Auth::id())->get();
        return view('admin.profile',['user'=>$user,'orders'=>$orders]);
    }

    public function show_categories(){
        $categories = Category::all();
        return view('admin.categories.index',['categories'=>$categories]);
    }

    public function add_category(){
        return view('admin.categories.add');
    }

    public function edit_category(Category $category){
        return view('admin.categories.edit',['category'=>$category]);
    }

    public function show_orders(){
        $orders = Order::all();
        return view('admin.orders.index',['orders'=>$orders,]);
    }

    public function add_order(){
        $categories = Category::all();
        return view('admin.orders.add',['categories'=>$categories]);
    }

    public function show_user_orders(){
        $orders = Order::query()->where('user_id',Auth::id())->orderByDesc('created_at')->get();
        return view('user.orders.index',['orders'=>$orders,]);
    }

    public function show_edit_order(Order $order){
        $categories = Category::all();
        return view('user.orders.edit',['order'=>$order,'categories'=>$categories]);
    }
}
