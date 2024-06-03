@extends('layout.app')
@section('title')
Профиль администратора
@endsection
@section('content')
<div class="container mt-5 p-4 rounded" style="background-color: white">
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="row mt-5">
<h4>Данные пользователя</h4>
</div>
<div class="row mt-3">
    <div class="col-6">
        <p><strong>ФИО пользователя: </strong>{{ $user->fio }}</p>
        <p><strong>Логин: </strong>{{ $user->login }}</p>
        <p><strong>Email: </strong>{{ $user->email }}</p>
    </div>
</div>
<div class="row mt-5">
    <h4 class="text-center">Мои заявки</h4>
</div>
<div class="row justify-content-center mt-3">
    @foreach ($orders as $order)
    <div class="col-8">
       <div class="card m-3">
        <img src="{{ '/public'.$order->img_user }}" class="card-img-top" alt="user img">
        <div class="card-body">
          <h5 class="card-title">{{ $order->title }}</h5>
          <p class="card-text">{{ $order->description }}</p>
          <p class="card-text"><small class="text-body-secondary">{{ $order->created_at }}</small></p>
        </div>
      </div>
    </div>

    @endforeach
</div>
</div>

@endsection
