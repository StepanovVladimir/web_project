@extends('admin.admin-index')

@section('title', 'Статья')

@section('content')
    <div class="col-md-10">
        <h1>{{ $post->title }}</h1>
        <p>{!! $post->description !!}</p>
        <img src="{{ \Illuminate\Support\Facades\Storage::url($post->image) }}" alt="{{ $post -> title }}" class="col-md-12">
        <p>{!! $post->content !!}</p>
        <p>{{ Carbon\Carbon::parse($post->created_at)->format('d m Y') }}</p>
        <a href="{{ URL::to('admin-panel/' . $post->id) . '/edit' }}" class="btn btn-primary">Редактировать</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['admin-panel.destroy', $post->id]]) !!}
        {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@endsection