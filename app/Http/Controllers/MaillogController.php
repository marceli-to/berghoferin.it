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
    return view('maillog', ['data' => $data]);
  }

  public function dump()
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
    dd($data);
  }
}
