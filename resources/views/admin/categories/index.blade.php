@extends('admin.admin-index')

@section('title', 'Категории')

@section('content')
    <div class="col-md-10">
        <table class="table table-bordered">
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td><a href="{!! route('categories.edit', ['id' => $category->id]) !!}" class="btn btn-primary">Редактировать</a></td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id]]) !!}
                        {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection