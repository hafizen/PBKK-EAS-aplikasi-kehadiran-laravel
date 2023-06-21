<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            "id_kelas" => "297074f7-b94d-478e-a9f9-c69296bf6566",
            "nama" => "H",
            "daya_tampung" => 29,
            "jml_terisi" => 29,
            "sks_kelas" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
            "is_nilai_final" => 0,
            "tgl_nilai_final" => "2021-02-06",
            "id_bahasa" => "ID",
            "id_semester" => 20201,
            "id_prodi" => "354de48e-9d73-4b81-9768-8c7bc3e9693a",
            "id_mk" => "00b034f5-191c-4308-aa51-9979dc12042a",
        ]);
        DB::table('kelas')->insert([
            "id_kelas" => "56d701bc-3430-4b9a-a2ea-606104f3652a",
            "nama" => "C",
            "daya_tampung" => 30,
            "jml_terisi" => 30,
            "sks_kelas" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
            "is_nilai_final" => 0,
            "tgl_nilai_final" => "2020-06-07",
            "id_bahasa" => "ID",
            "id_semester" => 20192,
            "id_prodi" => "354de48e-9d73-4b81-9768-8c7bc3e9693a",
            "id_mk" => "8aa9640d-9e94-494c-bcde-732358d37733",
        ]);
        DB::table('kelas')->insert([
            "id_kelas" => "b1272a3b-b0a4-49ca-8377-efa6bc175f3e",
            "nama" => "_",
            "daya_tampung" => 30,
            "jml_terisi" => 25,
            "sks_kelas" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
            "is_nilai_final" => 1,
            "tgl_nilai_final" => "2020-01-01",
            "id_bahasa" => "ID",
            "id_semester" => 20191,
            "id_prodi" => "354de48e-9d73-4b81-9768-8c7bc3e9693a",
            "id_mk" => "8aa9640d-9e94-494c-bcde-732358d37733",
        ]);
        DB::table('kelas')->insert([
            "id_kelas" => "b1e367f3-ee88-465c-b08d-9fc5fcc89e50",
            "nama" => "_",
            "daya_tampung" => 36,
            "jml_terisi" => 29,
            "sks_kelas" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
            "is_nilai_final" => 0,
            "tgl_nilai_final" => "2020-06-07",
            "id_bahasa" => "ID",
            "id_semester" => 20192,
            "id_prodi" => "354de48e-9d73-4b81-9768-8c7bc3e9693a",
            "id_mk" => "7050a453-8418-42af-87dc-90408ab9b7fa",
        ]);
        DB::table('kelas')->insert([
            "id_kelas" => "b1f491d4-a16d-4572-8761-df35e5bb1550",
            "nama" => "D",
            "daya_tampung" => 30,
            "jml_terisi" => 30,
            "sks_kelas" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
            "is_nilai_final" => 1,
            "tgl_nilai_final" => "2020-06-07",
            "id_bahasa" => "ID",
            "id_semester" => 20192,
            "id_prodi" => "354de48e-9d73-4b81-9768-8c7bc3e9693a",
            "id_mk" => "8aa9640d-9e94-494c-bcde-732358d37733",
        ]);
        DB::table('kelas')->insert([
            "id_kelas" => "cba78e6f-e3ba-46d5-945e-625a6c018182",
            "nama" => "_",
            "daya_tampung" => 40,
            "jml_terisi" => 33,
            "sks_kelas" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
            "is_nilai_final" => 0,
            "tgl_nilai_final" => "2020-01-01",
            "id_bahasa" => "ID",
            "id_semester" => 20191,
            "id_prodi" => "354de48e-9d73-4b81-9768-8c7bc3e9693a",
            "id_mk" => "2cc86a7f-6b04-4faa-a84b-1693e352134f",
        ]);
        DB::table('kelas')->insert([
            "id_kelas" => "d2e0bf6e-754d-49be-bed5-ebb5c23286c7",
            "nama" => "G",
            "daya_tampung" => 30,
            "jml_terisi" => 30,
            "sks_kelas" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
            "is_nilai_final" => 0,
            "tgl_nilai_final" => "2021-02-06",
            "id_bahasa" => "ID",
            "id_semester" => 20201,
            "id_prodi" => "354de48e-9d73-4b81-9768-8c7bc3e9693a",
            "id_mk" => "00b034f5-191c-4308-aa51-9979dc12042a",
        ]);
        DB::table('kelas')->insert([
            "id_kelas" => "e5500328-5bef-4896-b98d-db9b2d5df7a8",
            "nama" => "E",
            "daya_tampung" => 31,
            "jml_terisi" => 30,
            "sks_kelas" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
            "is_nilai_final" => 0,
            "tgl_nilai_final" => "2020-01-01",
            "id_bahasa" => "ID",
            "id_semester" => 20191,
            "id_prodi" => "354de48e-9d73-4b81-9768-8c7bc3e9693a",
            "id_mk" => "00b034f5-191c-4308-aa51-9979dc12042a",
        ]);
        DB::table('kelas')->insert([
            "id_kelas" => "fff89323-a56c-4d7e-a9ff-1361e4396d47",
            "nama" => "A",
            "daya_tampung" => 44,
            "jml_terisi" => 43,
            "sks_kelas" => 3,
            "rencana_tm" => 16,
            "realisasi_tm" => 16,
            "is_nilai_final" => 0,
            "tgl_nilai_final" => "2021-02-07",
            "id_bahasa" => "ID",
            "id_semester" => 20201,
            "id_prodi" => "354de48e-9d73-4b81-9768-8c7bc3e9693a",
            "id_mk" => "2cc86a7f-6b04-4faa-a84b-1693e352134f",
        ]);
    }
}
