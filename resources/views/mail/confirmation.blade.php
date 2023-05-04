<x-mail::message>
<div class="text-base pb-base">{{ __('Sehr geehrte/r', [], $data->user_language) }} {{$data->salutation }} {{ $data->firstname }} {{ $data->name }},</div>
<div class="text-base pb-large">{{ __('Herzlichen Dank für Ihre Anfrage.', [], $data->user_language) }}</div>
<div class="text-base pb-base">
  <strong>{{ __('Anreise', [], $data->user_language) }}</strong><br>{{ $data->arrival_date ? \Carbon\Carbon::parse($data->arrival_date)->translatedFormat('d.m.Y') : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Abreise', [], $data->user_language) }}</strong><br>{{ $data->departure_date ? \Carbon\Carbon::parse($data->departure_date)->translatedFormat('d.m.Y') : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Anzahl Suiten', [], $data->user_language) }}</strong><br>{{ $data->number_suites ? __($data->number_suites) : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Personen', [], $data->user_language) }}</strong><br>{{ $data->number_guests ? __($data->number_guests) : '-' }}
</div>
<div class="text-base pb-large">
  <strong>{{ __('Bevorzugter Suitentyp', [], $data->user_language) }}</strong><br>{{ $data->room->slug ? __($data->room->slug) : '-' }}
</div>
<div class="text-base pb-base">
  {{ __('Gerne unterbreiten wir Ihnen in den nächsten Tagen ein Angebot.', [], $data->user_language) }}
</div>
<div class="text-base">
  {{ __('Freundliche Grüße', [], $data->user_language) }}<br>Anna Bampi und Philipp Lange
</div>
</x-mail::message>
