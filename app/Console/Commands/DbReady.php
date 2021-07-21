<?php

namespace App\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DbReadyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dbready';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Waits for the Database to be ready.';

    public function handle(): void
   {
        do {
            try {
                $result = DB::select('SHOW TABLES')
            } catch (\Exception $e) {
                sleep(1);
            }
        } while(!isset($result));
    }
}
