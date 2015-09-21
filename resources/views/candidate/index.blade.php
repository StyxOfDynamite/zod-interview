@extends('layout.master')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('candidate.create') }}" class="btn btn-sm btn-success btn-addon"><i class="glyphicon glyphicon-plus"></i>Create</a>
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
                @foreach($candidates as $candidate)
                    <tr>
                        <td>
                            <a href="{{ route('candidate.candidate', ['id' => $candidate->id]) }}">
                                {{ $candidate->forename }}
                            </a>
                        </td>
                        <td>{{ $candidate->surname }}</td>
                        <td>{{ $candidate->contact_number }}
                        <td>
                            <a href="{{ route('candidate.delete', ['id' => $candidate->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection