@extends('layout.app')
@section('title')
Регистрация
@endsection
@section('content')
<div class="container p-5">
    <div class="row justify-content-center">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-6 p-4 rounded" style="background-color: white">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Пользователь не зарегистрирован
                </div>
            @endif
            <form action="{{ route('save_user') }}" method="post">
                @method('post')
                @csrf
                <div class="mb-3 col-7">
                  <label for="fio" class="form-label">Фамилия Имя Отчество</label>
                  <input type="text" class="form-control" id="fio" name="fio"
                  @error('fio')
                    is_invalid
                  @enderror>
                  <div class="invalid-feedback d-block">
                    @error('fio')
                        {{ $message }}
                    @enderror
                  </div>
                </div>
                <div class="row">
                   <div class="mb-3 col-5">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                    @error('email')
                    is_invalid
                  @enderror>
                    <div class="invalid-feedback d-block">
                        @error('email')
                            {{ $message }}
                        @enderror
                      </div>
                </div>
                <div class="mb-3 col-5">
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
                </div>
                <div class="row">
                    <div class="mb-3 col-5">
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
                <div class="mb-3 col-5">
                    <label for="password_confirmation" class="form-label">Подтвердите пароль</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    @error('password')
                    is_invalid
                  @enderror>
                    <div class="invalid-feedback d-block">
                        @error('password')
                            {{ $message }}
                        @enderror
                      </div>
                </div>
                </div>

                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="rule" name="rule"
                  @error('rule')
                    is_invalid
                  @enderror>
                  <label class="form-check-label" for="rule">Согласен(-на) на обработку ПД</label>
                  <div class="invalid-feedback d-block">
                    @error('rule')
                        {{ $message }}
                    @enderror
                  </div>
                </div>

                    <div class="row justify-content-center">
                        <div class="col-5">
                            <button type="submit" class="btn btn-outline-dark">Зарегистрироваться</button>
                        </div>
                </div>



              </form>
        </div>
    </div>
</div>
@endsection
