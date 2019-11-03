@extends('admin.admin-index')

@section('title', 'Пользователи')

@section('content')
    <div class="col-md-10">
        <table class="table table-bordered">
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>
                        @if ($user->role->name == 'Пользователь')
                            <a href="javascript:;" class="btn btn-primary change_role" token="{{ csrf_token() }}" route="{!! route('users.role.change', ['id' => $user->id]) !!}">Дать права модератора</a>
                        @endif
                        @if ($user->role->name == 'Модератор')
                            <a href="javascript:;" class="btn btn-primary change_role" token="{{ csrf_token() }}" route="{!! route('users.role.change', ['id' => $user->id]) !!}">Лишить прав модератора</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection