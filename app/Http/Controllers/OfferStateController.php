<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// use App\Notifications\Inquiry as InquiryNotification;
// use App\Notifications\Confirmation as ConfirmationNotification;
use Statamic\Facades\Entry;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class OfferStateController extends Controller
{
  /**
   * Sets the state of an inquiry to accepted.
   * 
   * @param Request $request 
   * @return \Illuminate\Http\Response
   */
  public function accept(Request $request)
  { 
    $entry = Entry::find($request->input('id'));
    $entry->set('state', 'accepted');
    $entry->save();
    return redirect()->back();
  }

  /**
   * Sets the state of an inquiry to accepted.
   * 
   * @param Request $request 
   * @return \Illuminate\Http\Response
   */
  public function decline(Request $request)
  { 
    $entry = Entry::find($request->input('id'));
    $entry->set('state', 'declined');
    $entry->save();
    return redirect()->back();
  }
}
