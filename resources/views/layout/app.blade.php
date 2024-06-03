<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('public\css\bootstrap.css') }}">
</head>
<body style="background-color: rgb(80, 65, 65)">
    <script src="{{ asset('public\js\bootstrap.bundle.js') }}"></script>
    @include('layout.navbar')
    @yield('content')
</body>
</html>
