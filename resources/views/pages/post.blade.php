@extends('welcome')

@section('title', 'Статья')

@section('content')
    <div class="col-md-10">
        <h1>{{ $post -> title }}</h1>
        <p>{!! $post -> description !!}</p>
        <img src="{{ $post -> image }}" alt="{{ $post -> title }}">
        <p>{!! $post -> content !!}</p>
        <p>{{ Carbon\Carbon::parse($post -> created_at) -> format('d m Y') }}</p>
    </div>
@endsection