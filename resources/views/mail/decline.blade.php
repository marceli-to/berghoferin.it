<x-mail::message>
@if ($proposal)
@php
$proposal = collect($data->alternative_proposals)->where('id', $proposal['id'])->first();
@endphp
<h1 class="text-base pb-large">
  {{ $data->firstname }} {{ $data->name }} hat ein alternatives Angebot abgelehnt:
</h1>
<div class="text-base pb-base">
  <strong>Anreise</strong><br>{{ $proposal->arrival_date ? \Carbon\Carbon::parse($proposal->arrival_date)->translatedFormat('d.m.Y') : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Abreise</strong><br>{{ $proposal->departure_date ? \Carbon\Carbon::parse($proposal->departure_date)->translatedFormat('d.m.Y') : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Anzahl Suiten</strong><br>{{ $proposal->number_suites ? $proposal->number_suites : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Anzahl Personen</strong><br>{{ $proposal->number_guests ? $proposal->number_guests : '-' }}
</div>
<div class="text-base pb-large">
  <strong>Suitentyp</strong><br>{{ $proposal->room->title ? $proposal->room->title : '-' }}
</div>
@else
<h1 class="text-base pb-large">
  {{ $data->firstname }} {{ $data->name }} hat das Angebot abgelehnt:
</h1>
<div class="text-base pb-base">
  <strong>Anreise</strong><br>{{ $data->arrival_date ? \Carbon\Carbon::parse($data->arrival_date)->translatedFormat('d.m.Y') : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Abreise</strong><br>{{ $data->departure_date ? \Carbon\Carbon::parse($data->departure_date)->translatedFormat('d.m.Y') : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Anzahl Suiten</strong><br>{{ $data->number_suites ? $data->number_suites : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Anzahl Personen</strong><br>{{ $data->number_guests ? $data->number_guests : '-' }}
</div>
<div class="text-base pb-large">
  <strong>Suitentyp</strong><br>{{ $data->room->title ? $data->room->title : '-' }}
</div>
@endif
</x-mail::message>
