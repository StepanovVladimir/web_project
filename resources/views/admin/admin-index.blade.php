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
                <a href="{{ url('/') }}" class="btn btn-primary">На главную</a>
                <a href="{{ route('post.create') }}" class="btn btn-primary">Добавить статью</a>
            </header>
            <div class="row">
                @yield('content')
            </div>
        </div>
    </body>
</html>