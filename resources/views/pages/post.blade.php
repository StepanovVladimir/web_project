@extends('welcome')

@section('title', 'Статья')

@section('content')
    <div class="col-lg-9 col-xl-10">
        <div class="post">
            <h1 class="post_title">{{ $post->title }}</h1>
            <p>{!! $post->description !!}</p>
            <img src="{{ asset('/storage/' . $post->image) }}" alt="{{ $post->title }}" class="post_image">
            <p>{!! $post->content !!}</p>
            <p>{{ Carbon\Carbon::parse($post->created_at)->format('d m Y') }}</p>
            @auth
                @if (canManagePosts())
                    <a href="{!! route('post.edit', ['id' => $post->id]) !!}" class="btn btn-primary post_btn">Редактировать</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id], 'class' => 'post_btn']) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger post_delete']) !!}
                    {!! Form::close() !!}
                    <div class="clear"></div>
                @endif
            @endauth
        </div>
        <h2>Лайков: {{ $post->likes()->count() }}</h2>
        @auth
            <a href="javascript:;" class="put_like" rel="{{ $post->id }}" token="{{ csrf_token() }}" route="{!! route('like.put') !!}">
                @if ($post->likes()->where('id_user', auth()->user()->id)->first())
                    Отменить лайк
                @else
                    Поставить лайк
                @endif
            </a>
            {!! Form::open(array('route' => 'comments.store')) !!}
                <input type="hidden" value="{{ $post->id }}" name="id_post">
                <div class="form-group">
                    <div>
                        {{ Form::label('comment', 'Оставте комментарий') }}
                    </div>
                    <div>
                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'id' => 'comment']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::submit('Добавить', ['class' => 'btn btn-primary', 'id' => 'submit_comment']) }}
                </div>
            {!! Form::close() !!}
        @else
            Зарегистрируйтесь, чтобы оставлять комментарии<br><br>
        @endauth
        <h2>Комментариев: {{ $comments->count() }}</h2>
        @foreach ($comments as $comment)
            <div class="col-md-12 comment" id="comment_{{ $comment->id }}">
                <span>
                    <b class="font-weight-bold">{{ $comment->user->name }}</b> {{ $comment->created_at->format('d-m-Y') }}
                    @auth
                        @if (Auth::user()->id == $comment->id_user)
                            <a href="javascript:;" class="edit_comment" rel="{{ $comment->id }}">Редактировать</a>
                        @endif
                        @if (Auth::user()->id == $comment->id_user || canDeleteComments())
                            <a href="javascript:;" class="delete" rel="{{ $comment->id }}" token="{{ csrf_token() }}" route="{!! route('comment.destroy') !!}">Удалить</a>
                        @endif
                    @endauth
                </span>
                {!! $comment->comment !!}
            </div>
            @auth
                @if (Auth::user()->id == $comment->id_user)
                    <div class="comment_edit" id="edit_{{ $comment->id }}">
                        {!! Form::model($comment, array('route' => array('comment.update', $comment->id), 'method' => 'PUT')) !!}
                            <div class="form-group">
                                {{ Form::textarea('comment', null, ['class' => 'form-control', 'id' => 'edit_form_' . $comment->id]) }}
                            </div>
                            {{ Form::submit('Редактировать', ['class' => 'btn btn-primary post_btn']) }}
                            <a href="javascript:;" class="btn btn-primary post_btn cancellation_edit" rel="{{ $comment->id }}">Отмена</a>
                            <div class="clear"></div>
                        {!! Form::close() !!}
                    </div>
                @endif
            @endauth
        @endforeach
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('comment');
        @auth
            @foreach ($comments as $comment)
                @if (Auth::user()->id == $comment->id_user)
                    CKEDITOR.replace('edit_form_' + {{ $comment->id }});
                @endif
            @endforeach
        @endauth
    </script>
@endsection