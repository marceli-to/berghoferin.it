<x-mail::message>
<h1 class="text-base pb-large">
  {{ $data->firstname }} {{ $data->name }} hat das Angebot akzeptiert:
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
  <strong>Anzahl Personen</strong><br>{{ $data->number_guests ? __($data->number_guests) : '-' }}
</div>
<div class="text-base pb-large">
  <strong>Suitentyp</strong><br>{{ $data->room->slug ? __($data->room->slug, [], 'de') : '-' }}
</div>
</x-mail::message>
