@extends('layouts.app')

@section('title', 'Популярность категорий')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-xl-10">
                @foreach ($categories as $category)
                    <div class="post">
                        <a href="{{ route('category.show', ['id' => $category->id]) }}" class="nav-link">{{ $category->name }}: {{ $category->sum }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection