<x-mail::message>
@if ($data->state == 'preview')
<div class="text-base" style="border: 2px solid red; display: inline-block; padding: 8px 25px 5px 25px; width: auto; line-height: 1">
  <strong style="color: red">Preview</strong>
</div>
<br><br>
@endif
@if ($data->email_salutation)
<div class="text-base pb-xlarge">
  {!! nl2br($data->email_salutation) !!}
</div>
@endif
@if ($data->deny_text)
<div class="text-base pb-xlarge">
  {!! nl2br($data->deny_text) !!}
</div>
@endif
@if ($data->email_remarks_greetings)
<div class="text-base">
  {!! nl2br($data->email_remarks_greetings) !!}
</div>
@endif
</x-mail::message>
