<?php

namespace App\Console;

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
        // Otomatisasi sinkronisasi mesin absensi jika diaktifkan di konfigurasi (.env: ARAP_AUTO_SYNC_ENABLED=true)
        if (config('services.arap.auto_sync_enabled', false)) {
            $time = config('services.arap.auto_sync_time', '17:00');
            $schedule->command('arap:sync-machine')
                     ->dailyAt($time)
                     ->withoutOverlapping()
                     ->appendOutputTo(storage_path('logs/machine_sync.log'));
        }
    }

    /**
     * Register the commands for the application.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
