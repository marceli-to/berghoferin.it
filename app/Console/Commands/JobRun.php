<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Statamic\Facades\Entry;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Offer as OfferNotification;
use App\Notifications\Deny as DenyNotification;

class JobRun extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'job:run';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Run the job task';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
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
          $entry->set('valid_until', now()->addDays(3));
        }
        $entry->save();
      } 
      catch(\Throwable $e) {
        \Log::error($e);
      }
    }

    $this->info('The command was successful!');
  }
}
