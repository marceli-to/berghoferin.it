<x-mail::message>
<h1 class="text-base pb-large">
  {{ __('Buchungsanfrage', [], $data->locale) }}
  <span class="font-regular">
    {{ __('vom', [], $data->locale) }} {{ $data->created_at ? \Carbon\Carbon::parse($data->created_at)->translatedFormat('d.m.Y') : '-' }}
  </span>
</h1>
<div class="text-base pb-base">
  <strong>{{ __('Anrede', [], $data->locale) }}</strong><br>{{ $data->salutation ? $data->salutation : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Vorname', [], $data->locale) }}</strong><br>{{ $data->firstname ? $data->firstname : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Name', [], $data->locale) }}</strong><br>{{ $data->name ? $data->name : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Straße', [], $data->locale) }}</strong><br>{{ $data->street ? $data->street : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Hausnummer', [], $data->locale) }}</strong><br>{{ $data->street_number ? $data->street_number : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Postleitzahl', [], $data->locale) }}</strong><br>{{ $data->zip ? $data->zip : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Ort', [], $data->locale) }}</strong><br>{{ $data->city ? $data->city : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Land', [], $data->locale) }}</strong><br>{{ $data->country ? $data->country : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('E-Mail', [], $data->locale) }}</strong><br>{{ $data->email ? $data->email : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Telefon', [], $data->locale) }}</strong><br>{{ $data->phone ? $data->phone : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Anmerkungen', [], $data->locale) }}</strong><br>{{ $data->message ? $data->message : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Anreise', [], $data->locale) }}</strong><br>{{ $data->arrival_date ? \Carbon\Carbon::parse($data->arrival_date)->translatedFormat('d.m.Y') : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Abreise', [], $data->locale) }}</strong><br>{{ $data->departure_date ? \Carbon\Carbon::parse($data->departure_date)->translatedFormat('d.m.Y') : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Anzahl Suiten', [], $data->locale) }}</strong><br>{{ $data->number_suites ? $data->number_suites : '-' }}
</div>
<div class="text-base pb-base">
  <strong>{{ __('Personen', [], $data->locale) }}</strong><br>{{ $data->number_guests ? __($data->number_guests) : '-' }}
</div>
<div class="text-base pb-large">
  <strong>{{ __('Bevorzugter Suitentyp', [], $data->locale) }}</strong><br>{{ $data->room->title ? $data->room->title : '-'}}
</div>
</x-mail::message>
