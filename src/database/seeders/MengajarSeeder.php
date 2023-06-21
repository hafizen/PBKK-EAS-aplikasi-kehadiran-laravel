<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mengajar')->insert([
            "id_kelas" => "297074f7-b94d-478e-a9f9-c69296bf6566",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "urutan" => 1,
            "sks_ajar" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
        ]);
        DB::table('mengajar')->insert([
            "id_kelas" => "56d701bc-3430-4b9a-a2ea-606104f3652a",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "urutan" => 1,
            "sks_ajar" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
        ]);
        DB::table('mengajar')->insert([
            "id_kelas" => "b1272a3b-b0a4-49ca-8377-efa6bc175f3e",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "urutan" => 1,
            "sks_ajar" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
        ]);
        DB::table('mengajar')->insert([
            "id_kelas" => "b1e367f3-ee88-465c-b08d-9fc5fcc89e50",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "urutan" => 1,
            "sks_ajar" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
        ]);
        DB::table('mengajar')->insert([
            "id_kelas" => "b1f491d4-a16d-4572-8761-df35e5bb1550",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "urutan" => 1,
            "sks_ajar" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
        ]);
        DB::table('mengajar')->insert([
            "id_kelas" => "cba78e6f-e3ba-46d5-945e-625a6c018182",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "urutan" => 1,
            "sks_ajar" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
        ]);
        DB::table('mengajar')->insert([
            "id_kelas" => "d2e0bf6e-754d-49be-bed5-ebb5c23286c7",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "urutan" => 1,
            "sks_ajar" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
        ]);
        DB::table('mengajar')->insert([
            "id_kelas" => "e5500328-5bef-4896-b98d-db9b2d5df7a8",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "urutan" => 1,
            "sks_ajar" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
        ]);
        DB::table('mengajar')->insert([
            "id_kelas" => "fff89323-a56c-4d7e-a9ff-1361e4396d47",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "urutan" => 1,
            "sks_ajar" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
        ]);
    }
}
