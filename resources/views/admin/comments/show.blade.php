@extends('admin.admin-index')

@section('title', 'Все комментарии')

@section('content')
    <div class="col-md-10">
        @foreach($comments as $comment)
            <div>
                <a href="/post/{{ $comment->id_post }}"><h4>{{ $comment->post->title }}</h4></a>
                <span><b class="font-weight-bold">{{ $comment->user->name }}</b> {{ $comment->created_at->format('d-m-Y') }}</span>
                {!! Form::open(['method' => 'DELETE', 'route' => ['comment.destroy', $comment->id]]) !!}
                {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                {!! $comment->comment !!}
            </div>
        @endforeach
    </div>
@endsection