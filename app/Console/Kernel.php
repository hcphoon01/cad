<?php

namespace App\Console;

use App\Jobs\ClearControllers;
use App\Jobs\ClearUnits;
use App\Models\FMS\Unit;
use App\Jobs\CreateEvent;
use Illuminate\Support\Facades\DB;
use App\Models\Event\EventParticipant;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->job(new CreateEvent)->dailyAt('12:00');
        $schedule->job(new ClearUnits)->dailyAt('00:00');
        $schedule->job(new ClearControllers)->dailyAt('00:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
