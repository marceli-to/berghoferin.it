<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Notifications\Accept as AcceptNotification;
use App\Notifications\Decline as DeclineNotification;
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
    if ($request->input('is_alternative'))
    {
      $entry = Entry::find($request->input('parent_id'));
      $proposals = $entry->data()->get('alternative_proposals');
      $entry->set('alternative_proposals', array_map(function($proposal) use ($request) {
          $proposal['state'] = $proposal['id'] == $request->input('id') ? 'accepted' :  $proposal['state'];
          return $proposal;
        }, $proposals)
      );
      $entry->set('accepted_alternative_id', $request->input('id'));
      $entry->save();
    }
    else
    {
      $entry = Entry::find($request->input('id'));
    }

    $entry->set('state', 'accepted');
    $entry->save();
    Notification::route('mail', env('MAIL_TO'))->notify(new AcceptNotification($entry));
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
    if ($request->input('is_alternative'))
    {
      $entry = Entry::find($request->input('parent_id'));
      $proposals = $entry->data()->get('alternative_proposals');
      $entry->set('alternative_proposals', array_map(function($proposal) use ($request) {
          $proposal['state'] = $proposal['id'] == $request->input('id') ? 'declined' : $proposal['state'];
          return $proposal;
        }, $proposals)
      );
      $entry->save();

      // get proposal by id
      $proposal = array_filter($entry->data()->get('alternative_proposals'), function($proposal) use ($request) {
        return $proposal['id'] == $request->input('id');
      });

      // check if all alternative proposals are declined
      $allDeclined = true;
      foreach ($entry->data()->get('alternative_proposals') as $proposal)
      {
        if ($proposal['state'] == 'open')
        {
          $allDeclined = false;
        }
      }
      
      if ($allDeclined)
      {
        $entry->set('state', 'declined');
        $entry->save();
      }

      // send notification
      Notification::route('mail', env('MAIL_TO'))->notify(new DeclineNotification($entry, $proposal));
    }
    else 
    {
      $entry = Entry::find($request->input('id'));
      $entry->set('state', 'declined');
      $entry->save();
      Notification::route('mail', env('MAIL_TO'))->notify(new DeclineNotification($entry));
    }
    return redirect()->back();
  }
}
