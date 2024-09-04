<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        Commands\ClearCache::class,
    ];
     

    protected function schedule(Schedule $schedule)
    {

        $schedule->command('cache:hourly')->hourly();
        $schedule->command('config:clear')->hourly();
        $schedule->command('view:clear')->hourly();
        $schedule->command('route:clear')->hourly();
        $schedule->command('optimize:clear')->hourly();

        // $schedule->call(function () {
        //     Artisan::call('cache:clear'); 
        //     // you can move this part to Job
        // })
        // ->daily();

        $now = \Carbon\Carbon::now();
        $schedule->call(function () {
        DB::table('notifications')->delete()
        ->where('read_at', '<', $now->subDays(7));
        })->hourly();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
