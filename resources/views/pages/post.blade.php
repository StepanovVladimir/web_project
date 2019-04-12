@extends('welcome')

@section('title', 'Статья')

@section('content')
    <header class="col-md-10">
        <a href="/" class="btn btn-primary">На главную</a>
    </header>
    <div class="col-md-10">
        <h1>{{ $post -> title }}</h1>
        <p>{{ $post -> description }}</p>
        <img src="{{ asset('/storage/' . $post->image) }}" alt="{{ $post->title }}" class="col-md-12">
        <p>{{ $post -> content }}</p>
        <p>{{ Carbon\Carbon::parse($post -> created_at) -> format('d m Y') }}</p>
    </div>
@endsection