<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class clearDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cronjob:clearDB14days';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears the data in visitors table who are older then 14 days.';

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
        $dateToOld = date("Y/m/d G:i:s", strtotime('-14 days'));
        DB::table('visitors')->where('created_at', '<',  $dateToOld)->delete();
    }
}
