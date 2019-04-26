@extends('layouts.app')

@section('title', 'Мои комментарии')

@section('content')
    <div class="col-md-10">
        @foreach($comments as $comment)
            <div>
                <a href="/post/{{ $comment->id_post }}"><h4>{{ _post($comment->id_post)->title }}</h4></a>
                <span><b class="font-weight-bold">{{ Auth::user()->name }}</b> {{ $comment->created_at->format('d-m-Y') }}</span>
                {!! $comment->comment !!}
            </div>
        @endforeach
    </div>
@endsection