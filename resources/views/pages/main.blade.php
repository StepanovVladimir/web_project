@extends('welcome')

@section('title', 'Научно популярный сайт')

@section('content')
    <div class="col-md-10">
        @foreach($posts as $post)
            <a href="/post/{{ $post->id }}"><h1>{{ $post->title }}</h1></a>
            <img src="{{ asset('/storage/' . $post->image) }}" alt="{{ $post->title }}" class="col-md-12">
            <p>{!! $post->description !!}</p>
            <p>{{ Carbon\Carbon::parse($post->created_at)->format('d m Y') }}</p>
            @auth
                @if (Auth::user()->isAdmin == 1)
                    <a href="{{ URL::to('post/' . $post->id) . '/edit' }}" class="btn btn-primary">Редактировать</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id]]) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endif
            @endauth
        @endforeach
        {{ $posts->links() }}
    </div>
@endsection