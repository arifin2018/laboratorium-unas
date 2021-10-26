<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\transaksi;
use Illuminate\Console\Command;

class transaksis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaksis:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cronjob berhasil dijalankan';

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
        $transaksis = transaksi::all();
        foreach ($transaksis as $transaksi) {
            if ($transaksi->status != 'Expired' && ($transaksi->waktu < Carbon::now('Asia/Dhaka')->format('H:i'))) {
                $transaksi->status = 'Expired';
                $transaksi->save();
                $this->info('Succeess cornjob');
            }
        }
    }
}
