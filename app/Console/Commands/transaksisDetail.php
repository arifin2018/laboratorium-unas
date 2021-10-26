<?php

namespace App\Console\Commands;

use App\Models\TransaksiDetail;
use App\Models\transaksi;
use Illuminate\Console\Command;

class transaksisDetail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaksisDetail:day';

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
        TransaksiDetail::truncate();
        transaksi::truncate();
    }
}
