<x-mail::message>
@if ($data->state == 'preview')
<div class="text-base" style="border: 2px solid red; display: inline-block; padding: 8px 25px 5px 25px; width: auto; line-height: 1">
  <strong style="color: red">Preview</strong>
</div>
<br><br>
@endif
@if ($data->email_greeting)
<div class="text-base pb-xlarge">
  {!! nl2br($data->email_greeting) !!}
</div>
@endif
@if ($data->email_button_text)
<div class="text-base pb-xlarge">
  <a href="{{ config('app.url') }}/angebot/{{ $data->slug}}" class="btn-offer text-chestnut" target="_blank" title="{{ $data->email_button_text }}">
    <img src="{{ config('app.url') }}/img/mail/chevron-right.png" height="12" width="7" style="display:inline-block; height: 12px; width: 7px;">
    <span>{{ $data->email_button_text }}</span>
  </a>
</div>
@endif
@if ($data->email_closing)
<div class="text-base">
  {!! nl2br($data->email_closing) !!}
</div>
@endif
</x-mail::message>