<x-mail::message>
<div class="text-base pb-base">{{ __('Sehr geehrte/r') }} {{$data->salutation }} {{ $data->firstname }} {{ $data->name }},</div>
<div class="text-base pb-large">{{ __('Herzlichen Dank für Ihre Anfrage.') }}</div>
<div class="text-base pb-base">
  <strong>{{ __('Anreise') }}</strong><br>{{ $data->arrival_date ? \Carbon\Carbon::parse($data->arrival_date)->translatedFormat('d.m.Y') : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Abreise') }}</strong><br>{{ $data->departure_date ? \Carbon\Carbon::parse($data->departure_date)->translatedFormat('d.m.Y') : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Anzahl Suiten') }}</strong><br>{{ $data->number_suites ? __($data->number_suites) : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Personen') }}</strong><br>{{ $data->number_guests ? __($data->number_guests) : '-' }}
</div>
<div class="text-base pb-large">
  <strong>{{ __('Bevorzugter Suitentyp') }}</strong><br>{{ $data->room->slug ? __($data->room->slug) : '-' }}
</div>
<div class="text-base pb-base">
  {{ __('Gerne unterbreiten wir Ihnen in den nächsten Tagen ein Angebot.') }}
</div>
<div class="text-base">
  {{ __('Freundliche Grüße') }}<br>Anna Bampi und Philipp Lange
</div>
</x-mail::message>
