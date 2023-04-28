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

Route::get('/mailable', function () {
  $entry = Entry::find('b2195ee4-0b6e-4bdb-a146-b42650644457');
  return (new \App\Notifications\Confirmation($entry))->toMail($entry->email);
});