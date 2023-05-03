<?php
namespace App\Tasks;
use Statamic\Facades\Entry;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Offer as OfferNotification;

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
        Notification::route('mail', $to)->notify(new OfferNotification($entry));
        $entry->set('state', $entry->state == 'preview' ? 'new' : 'offered');
        $entry->save();
      } 
      catch(\Throwable $e) {
        \Log::error($e);
      }
    }
  }
}