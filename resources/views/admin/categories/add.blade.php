@extends('layout.app')
@section('title')
Создание категории
@endsection
@section('content')
<div class="container mt-5 p-4 rounded" style="background-color: white">
    <div class="row">
        <div class="col-7">
            <h2>Создание новой категории</h2>
        </div>
        <div class="col-4">
            <form action="{{ route('save_category') }}" method="post">
                @csrf
                @method('post')
                <div class="row align-items-end">
                    <div class="col-8">
                        
                            <label for="title" class="form-label">Введите название</label>
                        <input class="form-control" type="text" name="title" id="title" @error('title')
                            is_invalid
                        @enderror>
                        
                        
                        <div class="invalid-feedback">
                            @error('title')
                                {{ $message }}
                            @enderror
                            
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-outline-dark">Сохранить</button>
                    </div>
                </div>
                

            </form>
        </div>
    </div>
</div>
@endsection