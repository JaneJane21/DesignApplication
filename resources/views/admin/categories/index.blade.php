@extends('layout.app')
@section('title')
Категории
@endsection
@section('content')
<div class="container mt-5 p-4 rounded" style="background-color: white">
    <div class="row">
       <div class="col-6">
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
    <div class="row align-items-center justify-content-between">

        <div class="col-4">
            <h2>Категории заявок</h2>
        </div>
        <div class="col-2">
            <a href="{{ route('add_category') }}" class="btn btn-outline-dark">Создать</a>
        </div>
    </div>
    <div class="row mt-5">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->title }}</td>
                <td>
                    <div class="row">
                        <div class="col-6">
                            <form action="{{ route('edit_category',['category'=>$category]) }}" method="post">
                                @method('post')
                                @csrf
                            <button class="btn btn-outline-primary">Изменить</button>
                        </form>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('delete_category',['category'=>$category]) }}" method="post">
                                @method('delete')
                                @csrf
                            <button class="btn btn-outline-danger">Удалить</button>
                        </form>
                        </div>
                    </div>
                </td>
              </tr>
                @endforeach

            </tbody>
          </table>
    </div>
</div>
@endsection
