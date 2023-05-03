<?php
namespace App\Http\Controllers\Api;
use App\Http\Requests\InquiryStoreRequest;
use App\Http\Controllers\Controller;
use App\Notifications\Inquiry as InquiryNotification;
use App\Notifications\Confirmation as ConfirmationNotification;
use Statamic\Facades\Entry;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
  /**
   * Stores an inquiry in the database and 
   * sends notification/confirmation emails 
   * to the hotel and the guest.
   * 
   * @param InquiryStoreRequest $request 
   * @return \Illuminate\Http\Response
   */
  public function store(InquiryStoreRequest $request)
  { 
    $title = $request->input('firstname') . ' ' . $request->input('name') . ', ' . $request->input('city');
    $departure_date = \Carbon\Carbon::createFromFormat('d.m.Y', $request->input('departure_date'));
    $arrival_date = \Carbon\Carbon::createFromFormat('d.m.Y', $request->input('arrival_date'));
    $number_nights = $arrival_date->diffInDays($departure_date);
    $created_at = date('d.m.Y', time());
    $room = $request->input('room_id');
    $user_lang = $request->input('user_lang');

    $inquiry = Entry::make()
      ->collection('inquiries')
      ->slug($title)
      ->data(
        array_merge(
          [
            'title' => $title,
            'arrival_date' => $arrival_date,
            'departure_date' => $departure_date,
            'number_nights' => $number_nights,
            'room' => $room,
            'created_at' => $created_at,
            'state' => 'new',
            'is_offer' => '1',
            'theme' => 'chestnut',
          ], 
          $request->except(
            ['departure_date', 'arrival_date', 'room']
          )
        )
      );
    $inquiry->save();

    // Update inquire to extend slug with id
    $inquiry->slug($inquiry->slug() . '-' . $inquiry->id());
    $inquiry->save();

    Notification::route('mail', env('MAIL_TO'))->notify(new InquiryNotification($inquiry));
    Notification::route('mail', $request->input('email'))->notify(new ConfirmationNotification($inquiry));
    return response()->json($inquiry->id, 201);
  }
}
