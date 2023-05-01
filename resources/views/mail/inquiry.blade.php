<x-mail::message>
<h1 class="text-base pb-large">
  Buchungsanfrage
  <span class="font-regular">
    vom {{ $data->created_at ? \Carbon\Carbon::parse($data->created_at)->translatedFormat('d.m.Y') : '-' }}
  </span>
</h1>
<div class="text-base pb-base">
  <strong>Anrede</strong><br>{{ $data->salutation ? $data->salutation : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Vorname</strong><br>{{ $data->firstname ? $data->firstname : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Name</strong><br>{{ $data->name ? $data->name : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Strasse</strong><br>{{ $data->street ? $data->street : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Hausnummer</strong><br>{{ $data->street_number ? $data->street_number : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Postleitzahl</strong><br>{{ $data->zip ? $data->zip : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Ort</strong><br>{{ $data->city ? $data->city : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Land</strong><br>{{ $data->country ? $data->country : '-' }}
</div>
<div class="text-base pb-base">
  <strong>E-Mail</strong><br>{{ $data->email ? $data->email : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Telefon</strong><br>{{ $data->phone ? $data->phone : '-' }}
</div>
<div class="text-base pb-base">
  <strong>Anmerkungen</strong><br>{{ $data->message ? $data->message : '-' }}
</div>
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
  <strong>Bevorzugter Suitentyp</strong><br>{{ $data->suite_type ? __($data->suite_type, [], 'de') : '-' }}
</div>
</x-mail::message>
