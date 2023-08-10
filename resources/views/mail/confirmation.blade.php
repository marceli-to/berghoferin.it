<x-mail::message>
<div class="text-base pb-base">{{ __('Sehr geehrte/r', [], $data->locale) }} {{$data->salutation }} {{ $data->name }},</div>
<div class="text-base pb-base">{!! __('Haben Sie herzlichen Dank für Ihre Anfrage.<br>Wir freuen uns, dass Sie sich für einen Aufenthalt im Fine Hotel & Hideaway Berghoferin interessieren.', [], $data->locale) !!}</div>
<div class="text-base pb-large">{!! __('Nachfolgend Ihre Buchungsanfrage:', [], $data->locale) !!}</div>
<div class="text-base pb-base">
  <strong>{{ __('Anreise', [], $data->locale) }}</strong><br>{{ $data->arrival_date ? \Carbon\Carbon::parse($data->arrival_date)->translatedFormat('d.m.Y') : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Abreise', [], $data->locale) }}</strong><br>{{ $data->departure_date ? \Carbon\Carbon::parse($data->departure_date)->translatedFormat('d.m.Y') : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Anzahl Suiten', [], $data->locale) }}</strong><br>{{ $data->number_suites ? __($data->number_suites) : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Personen', [], $data->locale) }}</strong><br>{{ $data->number_guests ? __($data->number_guests) : '-' }}
</div>
<div class="text-base pb-large">
  <strong>{{ __('Bevorzugter Suitentyp', [], $data->locale) }}</strong><br>{{ $data->room->title }}
</div>
<div class="text-base pb-base">
  {{ __('Gerne prüfen wir unsere Verfügbarkeiten im gewünschten Zeitraum und lassen Ihnen ein entsprechendes Angebot zukommen.', [], $data->locale) }}
</div>
<div class="text-base pb-base">
  {{ __('Vielen Dank für Ihre Geduld!', [], $data->locale) }}
</div>
<div class="text-base">
  {{ __('Ihr Fine Hotel & Hideaway Berghoferin', [], $data->locale) }}
</div>
</x-mail::message>
