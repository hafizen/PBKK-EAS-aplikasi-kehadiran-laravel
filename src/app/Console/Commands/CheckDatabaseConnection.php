<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PDO;
use Throwable;

class CheckDatabaseConnection extends Command
{
    protected $signature = "db:check";

    public function handle()
    {
        try {
            $db = DB::getPdo();
        } catch (Throwable $exception) {
            throw $exception;
        }
        $this->info($db->getAttribute(PDO::ATTR_CONNECTION_STATUS));
    }
}
