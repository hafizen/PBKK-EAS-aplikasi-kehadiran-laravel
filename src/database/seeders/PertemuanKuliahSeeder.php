<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;
use function database_path;
use function file_get_contents;

class PertemuanKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path('/seeders/pertemuan_kuliah.sql'));
        try {

            DB::unprepared($sql);
        } catch (Throwable $exception) {
            Log::error($exception->getMessage());
        }
    }
}
