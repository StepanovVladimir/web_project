@extends('admin.admin-index')

@section('title', 'Добавить статью')

@section('content')
    <div class="col-md-7">
        {!! Form::open(array('route' => 'post.store', 'files' => true)) !!}
            <div class="form-group">
                <div class="col-md-3">
                    <label>Категории</label>
                </div>
                <div class="col-md-9">
                    @foreach($categories as $category)
                        <label><input type="checkbox" name="categories[]" value="{{ $category->id }}"> {{ $category->name }}</label>
                        <br>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    {{ Form::label('title', 'Заголовок') }}
                </div>
                <div class="col-md-9">
                    {{ Form::text('title', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    {{ Form::label('image', 'Изображение') }}
                </div>
                <div class="col-md-9">
                    {{ Form::file('image', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    {{ Form::label('description', 'Описание') }}
                </div>
                <div class="col-md-9">
                    {{ Form::textarea('description', null, ['class' => 'form-control'], ['id' => 'description']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    {{ Form::label('content', 'Текст') }}
                </div>
                <div class="col-md-9">
                    {{ Form::textarea('content', null, ['class' => 'form-control'], ['id' => 'content']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                    {{ Form::submit('Опубликовать', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'content' );
    </script>
@endsection