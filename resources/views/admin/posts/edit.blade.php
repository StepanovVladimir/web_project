@extends('admin.admin-index')

@section('title', 'Редактировать статью')

@section('content')
    <div class="col-md-12">
        {!! Form::model($post, array('route' => array('post.update', $post->id), 'files' => true, 'method' => 'PUT')) !!}
            <div class="form-group">
                <div class="col-md-3">
                    <label>Категории</label>
                </div>
                <div class="col-md-9">
                    @foreach ($categories as $category)
                        <label>
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                            @if ($post->categories->where('id', $category->id)->count() == 1)
                                checked="checked"
                            @endif>
                            {{ $category->name }}
                        </label>
                        <br>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    {{ Form::label('title', 'Заголовок') }}
                </div>
                <div class="col-md-12">
                    {{ Form::text('title', null, ['class' => 'form-control required']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    {{ Form::label('image', 'Изображение') }}
                </div>
                <div class="col-md-9">
                    <input name="image" type="file" id="image" class="required">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    {{ Form::label('description', 'Описание') }}
                </div>
                <div class="col-md-12">
                    {{ Form::textarea('description', null, ['class' => 'form-control'], ['id' => 'description']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    {{ Form::label('content', 'Текст') }}
                </div>
                <div class="col-md-12">
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