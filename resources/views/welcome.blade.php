<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
            <a href="/" class="navbar-brand">На главную</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="navbar-brand">Моя страница</a>
                @else
                    <a href="{{ route('login') }}" class="navbar-brand">Войти</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="navbar-brand">Регистрация</a>
                    @endif
                @endauth
                <a href="{{ route('popular.categories') }}" class="navbar-brand">Популярные категории</a>
            @endif
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarCollapse"
                aria-controls="navbarCollapse"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto sidenav bg-light">
                    @foreach (getCategories() as $category)
                        <li class="nav-item"><a href="{{ route('category.show', ['id' => $category->id]) }}" class="nav-link">{{ $category->name }}: {{ $category->posts()->count() }}</a></li>
                    @endforeach
                </ul>
            </div>
        </nav>
        <div class="container welcome_container">
            <div class="row">
                @yield('content')
            </div>
        </div>
        <script src="/js/jquery-3.2.1.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
        <script src="/js/main.js"></script>
        @include('inc.messages')
    </body>
</html>
