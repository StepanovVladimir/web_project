<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link">Моя страница</a></li>
                        <li class="nav-item"><a href="{{ route('post.create') }}" class="nav-link">Добавить статью</a></li>
                        <li class="nav-item"><a href="{{ route('comments.show') }}" class="nav-link">Все комментарии</a></li>
                        <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link">Категории</a></li>
                        <li class="nav-item"><a href="{{ route('categories.create') }}" class="nav-link">Добавить категорию</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="container">
            @yield('content')
        </div>
        <script src="/js/jquery-3.2.1.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
        <script src="/js/main.js"></script>
        @include('inc.messages')
    </body>
</html>