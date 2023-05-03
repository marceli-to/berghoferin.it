<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Statamic\Facades\Entry;
use Illuminate\Http\Request;

class RoomController extends Controller
{
  /**
   * Get all rooms
   * 
   * @param InquiryStoreRequest $request 
   * @return \Illuminate\Http\Response
   */
  public function get()
  { 
    $rooms = Entry::query()->where('collection', 'rooms')->where('site', 'de')->orderBy('order')->get();
    $rooms = $rooms->map(function ($room) {
      return [
        'id' => $room->id,
        'title' => $room->title,
        'slug' => $room->slug,
      ];
    });
    return response()->json($rooms);
  }
}
