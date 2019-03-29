@extends('admin.admin-index')

@section('title', 'Все посты')

@section('content')
    @foreach($posts as $post)
        <h1>{{ $post -> title }}</h1>
        <div><img src="{{ $post -> image }}" alt="{{ $post -> title }}"></div>
        <p>{!! $post -> description !!}</p>
        <a href="{{ URL::to('admin-panel/' . $post -> id) . '/edit' }}" class="btn btn-primary">Редактировать</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['admin-panel.destroy', $post -> id]]) !!}
        {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    @endforeach
    {{ $posts -> links() }}
@endsection