@extends('layout.master')
@section('content')
    <form class="form-horizontal" role="form" method="POST" action="{{ route('candidate.destroy', ['id' => $candidate->id]) }}">
        <input type="hidden" name="_method" value="DELETE">
        <input type="text" name="_token" id="_token" class="hidden" value="{{ csrf_token() }}">
        <div class="panel panel-default">
            <div class="panel-heading">
                Delete candidate
            </div>
            <div class="panel-body">
                <p>Are you sure to delete candidate, named <del>{{ $candidate->forename }}</del>?</p>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-sm btn-danger btn-addon"><i class="glyphicon glyphicon-ok"></i>Delete</button>
                <a href="{{ route('candidate.index') }}" class="btn btn-default btn-sm btn-addon"><i class="glyphicon glyphicon-remove"></i>Cancel</a>
            </div>
        </div>
    </form>
@endsection