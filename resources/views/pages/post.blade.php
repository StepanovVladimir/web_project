@extends('welcome')

@section('title', 'Статья')

@section('content')
    <div class="col-md-10">
        <h1>{{ $post->title }}</h1>
        <p>{!! $post->description !!}</p>
        <img src="{{ asset('/storage/' . $post->image) }}" alt="{{ $post->title }}" class="col-md-12">
        <p>{!! $post->content !!}</p>
        <p>{{ Carbon\Carbon::parse($post->created_at)->format('d m Y') }}</p>
        @auth
            @if (Auth::user()->isAdmin == 1)
                <a href="{!! route('post.edit', ['id' => $post->id]) !!}" class="btn btn-primary">Редактировать</a>
                {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id]]) !!}
                {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endif
        @endauth
        {!! Form::open(array('route' => 'comments.store')) !!}
            <input type="hidden" value="{{ $post->id }}" name="id_post">
            <div class="form-group">
                <div class="col-md-3">
                    {{ Form::label('content', 'Оставте комментарий') }}
                </div>
                <div class="col-md-9">
                    {{ Form::textarea('content', null, ['class' => 'form-control'], ['id' => 'content']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                    {{ Form::submit('Добавить', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        {!! Form::close() !!}
        <h2>Комментариев {{ $post->comments->count() }}</h2>
        @foreach ($comments as $comment)
            <div class="col-md-8">
                <span>
                    <b class="font-weight-bold">{{ $comment->user->name }}</b> {{ $comment->created_at->format('d-m-Y') }}
                    @auth
                        @if (Auth::user()->id == $comment->id_user || Auth::user()->isAdmin == 1)
                            <a href="javascript:;" class="delete" rel="{{ $comment->id }}" token="{{ csrf_token() }}" route="{!! route('comment.destroy') !!}">Удалить</a>
                        @endif
                    @endauth
                </span>
                {!! $comment->comment !!}
            </div>
        @endforeach
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection