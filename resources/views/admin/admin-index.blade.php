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
        <div class="container">
            <header class="header">
                <a href="{{ url('/home') }}" class="btn btn-primary">Моя страница</a>
                <a href="{{ route('post.create') }}" class="btn btn-primary">Добавить статью</a>
                <a href="{{ route('comments.show') }}" class="btn btn-primary">Все комментарии</a>
                <a href="{{ route('categories.index') }}" class="btn btn-primary">Категории</a>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Добавить категорию</a>
            </header>
            <br>
            @yield('content')
        </div>
        <script src="/js/jquery-3.2.1.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
        <script src="/js/main.js"></script>
        @include('inc.messages')
    </body>
</html>