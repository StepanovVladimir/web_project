@extends('admin.admin-index')

@section('title', 'Редактировать категорию')

@section('content')
    <div class="col-md-7">
        {!! Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT')) !!}
            <div class="form-group">
                <div class="col-md-3">
                    {{ Form::label('name', 'Название') }}
                </div>
                <div class="col-md-9">
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-9 col-md-offset-3">
                    {{ Form::submit('Редактировать', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection