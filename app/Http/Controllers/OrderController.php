<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function filter_status(Request $request)
    {
        if(!$request->status){
            $orders = Order::query()->where('status',$request->status)->where('user_id',Auth::id())->get();
        }
        else{
            $orders = Order::query()->where('user_id',Auth::id())->get();
        }
        return view('user.orders.index',['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required'],
            'description'=>['required'],
            'img_user'=>['required','max:2048']
        ],
        ['title.required'=>['Поле обязательно для заполнения'],
        'description.required'=>['Поле обязательно для заполнения'],
        'img_user.required'=>['Поле обязательно для заполнения'],
        'img_user.max:2048'=>['Размер файла превышает 2MB'],
    ]);
    $order = new Order();
    $order->title = $request->title;
    $order->description = $request->description;
    $path = $request->file('img_user')->store('public/img');
    $order->img_user = '/storage/'.$path;
    $order->category_id=$request->category_id;
    $order->user_id = Auth::id();
    $order->save();
    if(Auth::user()->role==0){
        return redirect()->route('show_user_orders')->with('success','Новая заявка создана');
    }
    else{
        return redirect()->route('show_orders')->with('success','Новая заявка создана');
    }

    }

    public function add_comment(Order $order, Request $request){
        $request->validate([
            'comment'=>['required'],

        ],
        ['comment.required'=>['Поле обязательно для заполнения'],
        ]);
        $order->comment = $request->comment;
        $order->status = 'принято в работу';
        $order->update();
        return redirect()->back();
    }

    public function add_img(Order $order, Request $request){
        $request->validate([
            'img_admin'=>['required','max:2048']

        ],
        ['img_admin.required'=>['Поле обязательно для заполнения'],
        'img_admin.max:2048'=>['Размер файла превышает 2MB'],
        ]);

        $path = $request->file('img_admin')->store('public/img');
        $order->img_admin = '/storage/'.$path;
        $order->status = 'выполнено';
        $order->update();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order, Request $request)
    {
        $request->validate([
            'title'=>['required'],
            'description'=>['required'],
            'img_user'=>['max:2048']
        ],
        ['title.required'=>['Поле обязательно для заполнения'],
        'description.required'=>['Поле обязательно для заполнения'],
        'img_user.max:2048'=>['Размер файла превышает 2MB'],
        ]);
        $order->title = $request->title;
        $order->description = $request->description;
        if($request->file('img_user')){
            $path = $request->file('img_user')->store('public/img');
        $order->img_user = '/storage/'.$path;
        }
        $order->category_id=$request->category_id;
        $order->update();
        return redirect()->route('show_user_orders')->with('success','Заявка изменена');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_order(Order $order)
    {
        $order->delete();
        return redirect()->route('show_user_orders')->with('success','Заявка удалена');
    }
}
