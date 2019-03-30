@extends('welcome')

@section('title', 'Научно популярный сайт')

@section('content')
    <div class="col-md-10">
        @foreach($posts as $post)
            <a href="/post/{{ $post -> id }}"><h1>{{ $post -> title }}</h1></a>
            <img src="{{ $post -> image }}" alt="{{ $post -> title }}">
            <p>{!! $post -> description !!}</p>
            <p>{{ Carbon\Carbon::parse($post -> created_at) -> format('d m Y') }}</p>
        @endforeach
        {{ $posts -> links() }}
    </div>
@endsection