@extends('layouts.app')

@section('title', 'Популярность категорий')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($categories as $category)
                    <div class="comment">
                        <a href="{{ route('category.show', ['id' => $category->id]) }}" class="comment_post_title">{{ $category->name }}: {{ $category->sum }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection