<x-mail::message>
<h1 class="text-base pb-large">
  {{ $data->firstname }} {{ $data->name }} hat @if ($data->accepted_alternative_id != null) ein alternatives @else folgendes @endif Angebot akzeptiert:
</h1>
@php
$proposal = $data;
if ($data->accepted_alternative_id != null)
{
  $proposal = collect($data->alternative_proposals)->where('id', $data->accepted_alternative_id)->first();
}
@endphp
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
  <strong>Anzahl Personen</strong><br>{{ $proposal->number_guests ? __($proposal->number_guests) : '-' }}
</div>
<div class="text-base pb-large">
  <strong>Suitentyp</strong><br>{{ $proposal->room->title ? $proposal->room->title : '-' }}
</div>
</x-mail::message>
