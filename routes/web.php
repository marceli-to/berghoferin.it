<?php

use Illuminate\Support\Facades\Route;
use Statamic\Facades\Entry;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);

Route::get('/mailable/confirmation', function () {
  $entry = Entry::find('49bf9d5c-f470-410a-92be-5e0fb6e74834');
  return (new \App\Notifications\Confirmation($entry))->toMail($entry->email);
});

Route::get('/mailable/inquiry', function () {
  $entry = Entry::find('49bf9d5c-f470-410a-92be-5e0fb6e74834');
  return (new \App\Notifications\Inquiry($entry))->toMail($entry->email);
});