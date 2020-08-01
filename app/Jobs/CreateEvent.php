<?php

namespace App\Jobs;

use App\Models\Event\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateEvent implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    $startTime = strtotime('today 7:30 pm');
    $endTime = strtotime('today 10pm');

    $event = new Event();
    $event->name = 'Daily Patrol';
    $event->description = '';
    $event->start_time = date('Y-m-d H:i:s', $startTime);
    $event->end_time = date('Y-m-d H:i:s', $endTime);
    $event->max_participants = '32';

    $event->save();
  }
}
