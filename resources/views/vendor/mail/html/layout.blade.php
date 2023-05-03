<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="it">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">
<style>
@font-face {
  font-family: 'League Spartan';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/leaguespartan/v11/kJEqBuEW6A0lliaV_m88ja5TwvZwLZmXD4Zh.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}

@font-face {
  font-family: 'League Spartan';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: url(https://fonts.gstatic.com/s/leaguespartan/v11/kJEqBuEW6A0lliaV_m88ja5TwvZwLZmXD4Zh.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0300-0301, U+0303-0304, U+0308-0309, U+0323, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}

@media only screen and (max-width: 600px) {

  .wrapper {
    width: 85% !important;
  }

  .header {
    padding: 30px 0 !important;
  }

  .content-cell {
    padding: 25px 0 !important;
  }

  .inner-body {
    width: 100% !important;
  }

  .footer {
    width: 100% !important;
  }

  .footer .content-cell {
    padding-top: 15px !important;
  }
}
</style>
</head>
<body>
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table class="content text-base" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<!-- Email Body -->
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0" style="border: hidden !important;">
<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
  {{ $header ?? '' }}
<tr>
<td class="content-cell">
{{ Illuminate\Mail\Markdown::parse($slot) }}
</td>
</tr>
</table>
</td>
</tr>
{{ $footer ?? '' }}
</table>
</td>
</tr>
</table>
</body>
</html>