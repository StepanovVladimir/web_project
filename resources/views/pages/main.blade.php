@extends('welcome')

@section('title', 'Научно популярный сайт')

@section('content')
    <div class="col-lg-9 col-xl-10">
        @foreach ($posts as $post)
            <div class="post">
                <a href="/post/{{ $post->id }}" class="post_title_link">{{ $post->title }}</a>
                <img src="{{ asset('/storage/' . $post->image) }}" alt="{{ $post->title }}" class="post_image">
                <p>{!! $post->description !!}</p>
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
        @endforeach
        {{ $posts->links() }}
    </div>
@endsection