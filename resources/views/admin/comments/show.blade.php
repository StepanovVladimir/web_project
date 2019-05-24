@extends('admin.admin-index')

@section('title', 'Все комментарии')

@section('content')
    <div class="col-md-12">
        @foreach ($comments as $comment)
            <div class="comment">
                <a href="/post/{{ $comment->id_post }}" class="comment_post_title">{{ $comment->post->title }}</a><br>
                <span><b class="font-weight-bold">{{ $comment->user->name }}</b> {{ $comment->created_at->format('d-m-Y') }}</span>
                <a href="javascript:;" class="delete" rel="{{ $comment->id }}" token="{{ csrf_token() }}" route="{!! route('comment.destroy') !!}">Удалить</a>
                {!! $comment->comment !!}
            </div>
        @endforeach
        {{ $comments->links() }}
    </div>
@endsection