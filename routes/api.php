<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TranslationController;
use App\Http\Controllers\Api\InquiryController;
use App\Http\Controllers\Api\RoomController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/translations/{locale}', [TranslationController::class, 'fetch']);
Route::get('/rooms', [RoomController::class, 'get']);
Route::post('/inquiry', [InquiryController::class, 'store']);

