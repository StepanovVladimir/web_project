@extends('admin.admin-index')

@section('title', 'Все статьи')

@section('content')
    <div class="col-md-10">
        @foreach($posts as $post)
            <a href="/admin-panel/{{ $post -> id }}"><h1>{{ $post->title }}</h1></a>
            <img src="{{ asset('/storage/' . $post -> image) }}" alt="{{ $post -> title }}" class="col-md-12">
            <p>{!! $post->description !!}</p>
            <p>{{ Carbon\Carbon::parse($post->created_at)->format('d m Y') }}</p>
            <a href="{{ URL::to('admin-panel/' . $post -> id) . '/edit' }}" class="btn btn-primary">Редактировать</a>
            {!! Form::open(['method' => 'DELETE', 'route' => ['admin-panel.destroy', $post->id]]) !!}
            {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endforeach
        {{ $posts->links() }}
    </div>
@endsection