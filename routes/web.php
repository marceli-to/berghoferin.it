<?php

use Illuminate\Support\Facades\Route;
use Statamic\Facades\Entry;
use App\Http\Controllers\OfferStateController;
use App\Http\Controllers\MaillogController;
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

Route::post('/accept-offer', [OfferStateController::class, 'accept'])->name('accept-inquiry');
Route::post('/decline-offer', [OfferStateController::class, 'decline'])->name('decline-inquiry');

Route::get('/maillog', [MaillogController::class, 'index']);

// Route::get('/mailable/confirmation', function () {
//   $entry = Entry::find('c80cd251-f09b-4f83-942d-0a94bc77e839');
//   return (new \App\Notifications\Confirmation($entry))->toMail($entry->email);
// });

// Route::get('/mailable/inquiry', function () {
//   $entry = Entry::find('c80cd251-f09b-4f83-942d-0a94bc77e839');
//   return (new \App\Notifications\Inquiry($entry))->toMail($entry->email);
// });