@extends('layout.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('user.create') }}" class="btn btn-sm btn-success btn-addon"><i class="glyphicon glyphicon-plus"></i>Create</a>
        </div>
        <table class="table table-bordered has-action">
            <thead>
                <tr>
                    <th>Forename</th>
                    <th>Surname</th>
                    <th>Contact Number</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <a href="{{ route('user.candidate', ['id' => $user->id]) }}">
                                {{ $user->forename }}
                            </a>
                        </td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->contact_number }}</td>
                        <td>
                            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection