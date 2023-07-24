<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Statamic\Facades\Entry;

class UpdateInquiries extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'update:inquiries';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Adds the information ids to all existing inquiries';

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
    $inquiries = Entry::query()->where('collection', 'inquiries')->get();
    foreach($inquiries as $inquiry)
    {
      $information_items = Entry::query()->where('collection', 'information')->where('site', $inquiry->site())->where('show_in_offer', TRUE)->orderBy('order')->get();
      $information = [];
      foreach ($information_items as $information_item)
      {
        $information[] = $information_item->id();
      }
      $inquiry->set('information', $information);
      $inquiry->save();
    }
  }
}
