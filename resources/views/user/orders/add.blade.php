@extends('layout.app')
@section('title')
Создание кзаявки
@endsection
@section('content')
<div class="container mt-5 p-4 rounded" style="background-color: white">
    <div class="row">
        <div class="col-7">
            <h2>Создание новой заявки</h2>
        </div>
    </div>
    <div class="row">


        <div class="col-4">
            <form action="{{ route('store_order') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row align-items-end">
                    <div class="col-10">
                        <div class="mt-3">
                            <label for="title" class="form-label">Введите название</label>
                        <input class="form-control" type="text" name="title" id="title" @error('title')
                            is_invalid
                        @enderror>
                        <div class="invalid-feedback d-block">
                            @error('title')
                                {{ $message }}
                            @enderror

                        </div>
                        </div>

                        <div class="mt-3">
                            <label for="title" class="form-label">Введите описание</label>
                        <textarea class="form-control" type="text" name="description" id="title" @error('description')
                            is_invalid
                        @enderror>
                        </textarea>
                        <div class="invalid-feedback d-block">
                            @error('description')
                                {{ $message }}
                            @enderror

                        </div>
                        </div>

                        <div class="mt-3">
                            <label for="title" class="form-label">Выберите категорию</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="img_user" class="form-label">Выберите изображение</label>
                            <input class="form-control" accept=".jpg, .jpeg, .png, .bmp" type="file" name="img_user" id="img_user" @error('img_user')
                            is_invalid
                            @enderror>
                            <div class="invalid-feedback d-block">
                                @error('img_user')
                                    {{ $message }}
                                @enderror

                        </div>
                        </div>

                    </div>
                    <div class="col-4 mt-3">
                        <button type="submit" class="btn btn-outline-dark">Сохранить</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection
