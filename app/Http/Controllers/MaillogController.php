<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MaillogController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $response = Http::withBasicAuth('api', env('MAILGUN_SECRET'))
      ->get('https://api.eu.mailgun.net/v3/mg.berghoferin.it/events',
      [
        'begin' => 'Fri, 3 May 2013 09:00:00 -0000',
        'ascending' => 'yes',
        'limit' => 100,
        'pretty' => 'yes',
      ]
    );
    $data = $response->json();
    $data = collect($data['items'])->sortByDesc('timestamp')->values()->all();

    // filter out recipients that match:
    // @mailinator.com
    // @marceli.to
    $data = collect($data)->filter(function ($value, $key) {
      return !str_contains($value['recipient'], '@mailinator.com') && !str_contains($value['recipient'], '@marceli.to');
    })->values()->all();

    $first = collect($data)->first();
    $last = collect($data)->last();
    return view(
      'templates.content.maillog', 
      [
        'data' => $data,
        'first' => $first,
        'last' => $last,
      ]
    );
  }
}
