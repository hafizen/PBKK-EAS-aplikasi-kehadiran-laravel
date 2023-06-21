<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mata_kuliah')->insert([
            "id_mk" => "00b034f5-191c-4308-aa51-9979dc12042a",
            "kode_mk" => "IF184301",
            "nama" => "Pemrograman Berorientasi Objek",
            "nama_en" => "Object Oriented Programming",
            "sks_mk" => 3,
        ]);
        DB::table('mata_kuliah')->insert([
            "id_mk" => "2cc86a7f-6b04-4faa-a84b-1693e352134f",
            "kode_mk" => "IF184974",
            "nama" => "Konstruksi Perangkat Lunak",
            "nama_en" => "Software Construction",
            "sks_mk" => 3,
        ]);
        DB::table('mata_kuliah')->insert([
            "id_mk" => "7050a453-8418-42af-87dc-90408ab9b7fa",
            "kode_mk" => "IF184971",
            "nama" => "Arsitektur Perangkat Lunak",
            "nama_en" => "Software Architecture",
            "sks_mk" => 3,
        ]);
        DB::table('mata_kuliah')->insert([
            "id_mk" => "8aa9640d-9e94-494c-bcde-732358d37733",
            "kode_mk" => "IF184605",
            "nama" => "Pemrograman Berbasis Kerangka Kerja",
            "nama_en" => "Framework-based Programming",
            "sks_mk" => 3,
        ]);
    }
}
