<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:hourly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Cache Hourly ';

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
        Artisan::call('cache:clear'); 
       
        Log::info("Cron is working fine!");
         // return 0;
    }
}
