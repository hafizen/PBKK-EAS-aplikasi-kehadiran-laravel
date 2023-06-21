<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Throwable;

class ResetDatabase extends Command
{
    protected $signature = "reset:pertemuan";

    public function handle()
    {
        DB::beginTransaction();
        try {
            $pertemuan = DB::table('pertemuan_kuliah')->where('created_at', '>', Carbon::createFromFormat('d-m-Y', '00-05-2023'));
            $pertemuan->delete();
        } catch (Throwable $exception) {
            try {
                DB::table('kehadiran_dosen')->whereIn('id_pertemuan_kuliah', $pertemuan->get()->pluck('id_pertemuan_kuliah')->toArray())->delete();
                DB::table('kehadiran_mahasiswa')->whereIn('id_pertemuan_kuliah', $pertemuan->get()->pluck('id_pertemuan_kuliah')->toArray())->delete();
                $pertemuan->delete();
            } catch (Throwable $exception) {
                DB::rollBack();
                throw $exception;
            }
        }
        DB::commit();
    }
}
