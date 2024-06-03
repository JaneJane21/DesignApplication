@extends('layout.app')
@section('title')
Авторизация
@endsection
@section('content')
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-4 p-4 rounded" style="background-color: white">
            @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <form action="{{ route('log_user') }}" method="post">
                @method('post')
                @csrf
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" class="form-control" id="login" name="login"
                    @error('login')
                    is_invalid
                  @enderror>
                    <div class="invalid-feedback d-block">
                        @error('login')
                            {{ $message }}
                        @enderror
                      </div>
                </div>


                    <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password"
                    @error('password')
                    is_invalid
                  @enderror>
                    <div class="invalid-feedback d-block">
                        @error('password')
                            {{ $message }}
                        @enderror
                      </div>
                </div>
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <button type="submit" class="btn btn-outline-dark">Войти</button>

                        </div>

                </div>



              </form>
        </div>
    </div>
</div>
@endsection
