<?php
namespace App\Http\Controllers\Api;
use App\Models\Inquiry;
use App\Http\Requests\InquiryStoreRequest;
use App\Http\Controllers\Controller;
use App\Notifications\Inquiry as InquiryNotification;
use App\Notifications\Confirmation as ConfirmationNotification;
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
    $inquiry = Inquiry::create($request->all());
    Notification::route('mail', env('MAIL_TO'))->notify(new InquiryNotification($inquiry));
    Notification::route('mail', $request->input('email'))->notify(new ConfirmationNotification($inquiry));
    return response()->json($inquiry->id, 201);
  }
}
