<?php

namespace App\Console;

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
        $schedule->call(function () {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Unit::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        })->dailyAt('00:00');
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
