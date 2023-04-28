<x-mail::message>
<div class="text-base pb-base">Sehr geehrte/r {{$data->salutation }} {{ $data->firstname }} {{ $data->name }},</div>
<div class="text-base pb-large">Herzlichen Dank für Ihre Anfrage.</div>
<div class="text-base pb-base">
  Anreise<br>{{ $data->arrival_date ? \Carbon\Carbon::parse($data->arrival_date)->translatedFormat('d.m.Y') : '-' }}
</div>
<div class="text-base pb-base">
  Abreise<br>{{ $data->departure_date ? \Carbon\Carbon::parse($data->departure_date)->translatedFormat('d.m.Y') : '-' }}
</div>
<div class="text-base pb-base">
  Anzahl Suiten<br>{{ $data->number_suites ? __($data->number_suites) : '-' }}
</div>
<div class="text-base pb-base">
  Anzahl Personen<br>{{ $data->number_guests ? __($data->number_guests) : '-' }}
</div>
<div class="text-base pb-large">
  Bevorzugter Suitentyp<br>{{ $data->suite_type ? __($data->suite_type) : '-' }}
</div>
<div class="text-base pb-base">
  Gerne unterbreiten wir Ihnen in den nächsten Tagen ein Angebot.
</div>
<div class="text-base">
  Freundliche Grüße<br>Anna Bampi und Philipp Lange
</div>
</x-mail::message>
