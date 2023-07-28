<?php
namespace App\Tasks;
use Statamic\Facades\Entry;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Offer as OfferNotification;
use App\Notifications\Deny as DenyNotification;

class Job
{
  public function __invoke()
  {
    $entries = Entry::query()->where('state', 'queued')->orWhere('state', 'preview')->get();
    $entry_jobs = collect($entries)->splice(0,1);

    foreach($entry_jobs as $entry)
    {
      try {
        $to = $entry->state == 'preview' ? env('MAIL_TO') : $entry->email;
        if ($entry->deny_request == true)
        {
          Notification::route('mail', $to)->notify(new DenyNotification($entry));
          $entry->set('state', $entry->state == 'preview' ? 'new' : 'declined');
        }
        else
        {
          Notification::route('mail', $to)->notify(new OfferNotification($entry));
          $entry->set('state', $entry->state == 'preview' ? 'new' : 'offered');
          $entry->set('valid_until', now()->addDays(2));
        }
        $entry->save();
      } 
      catch(\Throwable $e) {
        \Log::error($e);
      }
    }
  }
}