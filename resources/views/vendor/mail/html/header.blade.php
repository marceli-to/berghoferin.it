@props(['url'])
<tr>
  <td class="header">
    <table class="header__content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
      <tr>
        <td style="width: 50%; vertical-align:top">
          <img class="logo" src="{{ config('app.url') }}/img/mail/berghoferin-logo.png" title="Berghoferin" alt="Berghoferin" height="335" width="528" style="display:block; height:auto; width: 220px;">
        </td>
        <td style="width: 50%; vertical-align: bottom; text-align: right">
          <span class="text-chestnut text-xsmall">
            {{ __('Radein') }}, {{ \Carbon\Carbon::now()->translatedFormat('d. F Y') }}
          </span>
        </td>
      </tr>
    </table>
  </td>
</tr>