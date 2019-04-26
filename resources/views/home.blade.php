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
                        @if (Auth::user()->isAdmin == 1)
                            <div><a href="{{ route('comments.show') }}">Все комментарии</a></div>
                            <div><a href="{{ route('post.create') }}">Добавить статью</a></div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection