@extends('layouts.app')

@section('title')
    {{ Auth::user()->name }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @auth
                        <div><a href="{{ route('user.comments.show') }}">Мои комментарии</a></div>
                        @if (canDeleteComments())
                            <div><a href="{{ route('comments.show') }}">Все комментарии</a></div>
                        @endif
                        @if (canManagePosts())
                            <div><a href="{{ route('post.create') }}">Добавить статью</a></div>
                        @endif
                        @if (canManageCategories())
                            <div><a href="{{ route('categories.index') }}">Категории</a></div>
                            <div><a href="{{ route('categories.create') }}">Добавить категорию</a></div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection