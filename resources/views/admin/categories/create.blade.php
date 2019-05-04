@extends('admin.admin-index')

@section('title', 'Добавить категорию')

@section('content')
    <div class="col-md-7">
        {!! Form::open(array('route' => 'categories.store')) !!}
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
                    {{ Form::submit('Добавить', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection