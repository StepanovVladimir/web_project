@extends('admin.admin-index')

@section('title', 'Все комментарии')

@section('content')
    <div class="col-md-10">
        @foreach ($comments as $comment)
            <div>
                <a href="/post/{{ $comment->id_post }}"><h4>{{ $comment->post->title }}</h4></a>
                <span><b class="font-weight-bold">{{ $comment->user->name }}</b> {{ $comment->created_at->format('d-m-Y') }}</span>
                <a href="javascript:;" class="delete" rel="{{ $comment->id }}" token="{{ csrf_token() }}" route="{!! route('comment.destroy') !!}">Удалить</a>
                {!! $comment->comment !!}
            </div>
        @endforeach
        {{ $comments->links() }}
    </div>
@endsection