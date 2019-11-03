@extends('admin.admin-index')

@section('title', 'Категории')

@section('content')
    <div class="col-md-10">
        <table class="table table-bordered">
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{!! route('categories.edit', ['id' => $category->id]) !!}" class="btn btn-primary">Редактировать</a>
                    </td>
                    <td>
                        <a href="javascript:;" class="btn btn-danger delete" rel="{{ $category->id }}" token="{{ csrf_token() }}" route="{!! route('categories.destroy') !!}">Удалить</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection