@extends('admin.admin-index')

@section('title', 'Статья')

@section('content')

    <h1>{{ $post -> title }}</h1>
    <p>{!! $post -> description !!}</p>
    <div><img src="{{ $post -> image }}" alt="{{ $post -> title }}"></div>
    <p>{!! $post -> content !!}</p>
    <p>{{ Carbon\Carbon::parse($post -> created_at) -> format('d m Y') }}</p>

    <a href="{{ URL::to('admin-panel/' . $post -> id) . '/edit' }}" class="btn btn-primary">Редактировать</a>
    {!! Form::open(['method' => 'DELETE', 'route' => ['admin-panel.destroy', $post -> id]]) !!}
    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection