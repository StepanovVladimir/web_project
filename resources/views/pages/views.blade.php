@extends('layouts.app')

@section('title', 'Мои просмотры')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-xl-10">
                @foreach ($views as $view)
                    <div class="post">
                        <a href="/post/{{ $view->post->id }}" class="post_title_link">{{ $view->post->title }}</a>
                        <img src="{{ asset('/storage/' . $view->post->image) }}" alt="{{ $view->post->title }}" class="post_image">
                        <p>{!! $view->post->description !!}</p>
                        <p>{{ Carbon\Carbon::parse($view->post->created_at)->format('d m Y') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection