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
  public function store(InquiryStoreRequest $request )
  { 
    $title = $request->input('firstname') . ' ' . $request->input('name') . ', ' . $request->input('city');

    $departure_date = date('Y-m-d', strtotime($request->input('departure_date')));
    $arrival_date = date('Y-m-d', strtotime($request->input('arrival_date')));

    $inquiry = Entry::make()
      ->collection('inquiries')
      ->slug($title)
      ->data(
        array_merge(
          [
            'title' => $title,
            'arrival_date' => $arrival_date,
            'departure_date' => $departure_date,
            'state' => 'new'
          ], 
          $request->except(
            ['departure_date', 'arrival_date']
          )
        )
      );
    $inquiry->save();
    Notification::route('mail', env('MAIL_TO'))->notify(new InquiryNotification($inquiry));
    Notification::route('mail', $request->input('email'))->notify(new ConfirmationNotification($inquiry));
    return response()->json($inquiry->id, 201);
  }
}
