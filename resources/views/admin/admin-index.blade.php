<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="container">
            <header>
                <a href="{{ url('/home') }}" class="btn btn-primary">Моя страница</a>
                <a href="{{ route('post.create') }}" class="btn btn-primary">Добавить статью</a>
                <a href="{{ route('comments.show') }}" class="btn btn-primary">Все комментарии</a>
                <a href="{{ route('categories.index') }}" class="btn btn-primary">Категории</a>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Добавить категорию</a>
            </header>
            <br>
            <div class="row">
                @yield('content')
            </div>
        </div>
    </body>
</html>