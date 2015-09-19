@extends('layout.master')
@section('content')
<div class="candidate-details">
    <p>{{ $candidate->forename }}</p>
    <p>{{ $candidate->surname }}</p>
    <p>{{ $candidate->email }}</p>
    <p>{{ $candidate->contact_number }}</p>
    <p>{{ $candidate->right_to_work }}</p>
    <p>{{ $candidate_country->country_id }}</p>
    <p>{{ $candidate->alerts }}</p>
</div>
@endsection