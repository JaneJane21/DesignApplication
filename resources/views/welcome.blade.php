@extends('layout.app')
@section('title')
Главная
@endsection
@section('content')
<div class="container">
    <div class="row mt-5">
        <h1 class="text-center" style="color: white">Последние заявки</h1>
    </div>
    <div class="row justify-content-center mt-3">
        @foreach ($orders as $order)
        <div class="col-8">
            <div class="card m-3">
            <img src="{{ '/public'.$order->img_admin }}" class="card-img-top" alt="user img">
            <div class="card-body">
              <h5 class="card-title">{{ $order->title }}</h5>
              <p class="card-text">Категория: {{ $order->category->title }}</p>
              <p class="card-text">{{ $order->description }}</p>
              <p class="card-text"><small class="text-body-secondary">{{ $order->created_at }}</small></p>
            </div>
          </div>
        </div>

        @endforeach
    </div>
</div>
@endsection
