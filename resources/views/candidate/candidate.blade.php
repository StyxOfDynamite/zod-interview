@extends('layout.master')
@section('content')
<div class="candidate-details">
    <p>{{ $candidate->forename }}</p>
    <p>{{ $candidate->surname }}</p>
    <p>{{ $candidate->email }}</p>
    <p>{{ $candidate->contact_number }}</p>
    <p>{{ $candidate->right_to_work }}</p>
    <p>{{ $candidate->country->country }}</p>
    <ul class="region-list">
        @foreach($candidate->country->regions as $region)
        <li class="region">
            {{ $region->region }}
        </li>
        @endforeach
    </ul>
    <ul class="sectors-list">
        @foreach($candidate->sectors as $sector)
        <li class="sector">
            {{ $sector->sector }}
        </li>
         @endforeach
    </ul>
    <p>{{ $candidate->salary->currency . ' ' . $candidate->salary->salary . ' ' . $candidate->salary->interval }}</p>
    <a href="{{ route('file.download', ['id' => $candidate->id]) }}" class="btn btn-sm btn-success btn-addon">
        <i class="fa fa-download"></i>Download
    </a>
    <p>{{ $candidate->alerts }}</p>
</div>
<div class="alert-details">
<a href="{{ route('alert.alert', ['id' => $candidate->id]) }}" class="btn btn-sm btn-default btn-addon">
    Alerts
</a>
</div>
@endsection