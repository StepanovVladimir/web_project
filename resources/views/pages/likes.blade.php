@extends('layouts.app')

@section('title', 'Понравившиеся статьи')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-xl-10">
                @foreach ($likes as $like)
                    <div class="post">
                        <a href="/post/{{ $like->post->id }}" class="post_title_link">{{ $like->post->title }}</a>
                        <img src="{{ asset('/storage/' . $like->post->image) }}" alt="{{ $like->post->title }}" class="post_image">
                        <p>{!! $like->post->description !!}</p>
                        <p>{{ Carbon\Carbon::parse($like->post->created_at)->format('d m Y') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection