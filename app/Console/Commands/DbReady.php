<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DbReadyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:ready';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Waits for the Database to be ready.';

    public function handle()
    {
        do {
            try {
                $result = DB::select('SHOW TABLES');
            } catch(\Exception $e) {
                sleep(1);
            }
        } while(!isset($result));
    }
}
