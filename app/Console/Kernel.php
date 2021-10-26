<?php

namespace App\Console;

use App\Console\Commands\transaksis;
use App\Console\Commands\transaksisDetail;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        transaksis::class,
        transaksisDetail::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            DB::table('transaksi')->delete();
        })->timezone('Asia/Jakarta')->daily();
        // $schedule->command('transaksis:day')->hourly();
        $schedule->command('transaksis:day')->everyMinute();
        $schedule->command('transaksisDetail:day')->daily();
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
