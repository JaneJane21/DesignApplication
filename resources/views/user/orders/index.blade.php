@extends('layout.app')
@section('title')
    Заявки
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
                <h2>Мои заявки</h2>
            </div>
            <div class="col-2">
                <a href="{{ route('add_order') }}" class="btn btn-outline-dark">Создать</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <form action="{{ route('filter_status') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="row">
                        <label class="label-control" for="status">Сортировать по статусу</label>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <select id="status" name="status" class="form-control">
                                <option value="0">Выберите категорию</option>
                                <option value="новая">новая</option>
                                <option value="принято в работу">принято в работу</option>
                                <option value="выполнено">выполнено</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-outline-dark">Применить</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
        <div class="row mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Время создания</th>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->title }}</td>
                            <td>{{ $order->description }}</td>
                            <td>{{ $order->category->title }}</td>
                            <td>{{ $order->status }}</td>

                            <td>
                                @if ($order->status == 'новая')
                                <div class="row">

                                    <div class="col-6">

                                            <a href="{{ route('show_edit_order',['order'=>$order]) }}" class="btn btn-outline-primary">Изменить</a>

                                    </div>
                                    <div class="col-6">
                                        <form action="{{ route('delete_order',['order'=>$order]) }}" method="post">
                                            @method('delete')
                                            @csrf
                                        <button type="submit" class="btn btn-outline-primary">Удалить</button>

                                        </form>
                                    </div>
                                </div>
                                @else
                                действия с заявкой недоступны
                                @endif

                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="commentModal_{{ $order->id }}" tabindex="-1" aria-labelledby="commentModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="commentModalLabel">Смена статуса заявки</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#" method="post">
                                            @method('put')
                                            @csrf

                                            <label for="comment" class="label-control">Оставьте комментарий</label>
                                            <textarea class="form-control" id="comment" name="comment"></textarea>
                                            <button class="btn btn-outline-success mt-2" type="submit">Сохранить</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="imgModal_{{ $order->id }}" tabindex="-1" aria-labelledby="imgModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="imgModalLabel">Смена статуса заявки</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#" method="post" enctype="multipart/form-data">
                                            @method('put')
                                            @csrf

                                            <label for="img_admin" class="label-control">Прикрепите изображение дизайн-проекта</label>
                                            <input type="file" accept=".jpg, .jpeg, .png, .bmp" class="form-control mt-2" id="img_admin" name="img_admin">
                                            <button class="btn btn-outline-success mt-2" type="submit">Сохранить</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
