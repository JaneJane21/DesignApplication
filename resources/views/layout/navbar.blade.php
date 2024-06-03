<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container d-flex justify-content-between">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('public\logo\logo_main.png') }}">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('show_welcome') }}">Главная</a>
          </li>
            @guest
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('login') }}">Авторизация</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('show_reg') }}">Регистрация</a>
          </li>
            @endguest
            @auth

            @if (Illuminate\Support\Facades\Auth::user()->role==0)
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('show_user_orders') }}">Заявки</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('user_profile') }}">Профиль пользователя</a>
            </li>
              @elseif (Illuminate\Support\Facades\Auth::user()->role==1)
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('show_categories') }}">Категории</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('show_orders') }}">Все заявки</a>
            </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin_profile') }}">Профиль администратора</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('logout') }}">Выход</a>
            </li>
            @endauth

        </ul>
      </div>
    </div>
  </nav>
