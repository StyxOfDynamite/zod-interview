@extends('layout.master')
@section('content')

<p>Alert for : {{ $alert->candidate->forename }}</p>
<p>Alert Salary: {{ $alert->salary->currency . ' ' . $alert->salary->salary . ' per ' . $alert->salary->interval }}</p>
<p>Alert Country: {{ $alert->country->country }}</p>
<p>Alert Regions:</p>
<ul class="region-list">
  @foreach($alert->country->regions as $region)
  <li class="region">
    {{ $region->region }}
  </li>
  @endforeach
</ul>

<p>Alert Sectors:</p>
<ul class="sector-list">
  @foreach($alert->sectors as $sector)
  <li class="sector">
    {{ $sector->sector }}
  </li>
  @endforeach
</ul>


@endsection