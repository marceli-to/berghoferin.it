<x-mail::message>
<div class="text-base pb-base">{{ __('Sehr geehrte/r', [], $data->user_language) }} {{$data->salutation }} {{ $data->name }},</div>
<div class="text-base pb-base">{!! __('Haben Sie herzlichen Dank für Ihre Anfrage.<br>Wir freuen uns, dass Sie sich für einen Aufenthalt im Fine Hotel & Hideaway Berghoferin interessieren.', [], $data->user_language) !!}</div>
<div class="text-base pb-large">{!! __('Nachfolgend Ihre Buchungsanfrage:', [], $data->user_language) !!}</div>
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
  <strong>{{ __('Bevorzugter Suitentyp', [], $data->user_language) }}</strong><br>{{ $data->room->title }}
</div>
<div class="text-base pb-base">
  {{ __('Gerne prüfen wir unsere Verfügbarkeiten im gewünschten Zeitraum und lassen Ihnen ein entsprechendes Angebot zukommen.', [], $data->user_language) }}
</div>
<div class="text-base pb-base">
  {{ __('Vielen Dank für Ihre Geduld!', [], $data->user_language) }}
</div>
<div class="text-base">
  {{ __('Ihr Fine Hotel & Hideaway Berghoferin', [], $data->user_language) }}
</div>
</x-mail::message>
