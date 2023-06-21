<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hari')->insert([
            'nama' => 'Senin',
            'nama_en' => 'Monday',
        ]);
        DB::table('hari')->insert([
            'nama' => 'Selasa',
            'nama_en' => 'Tuesday',
        ]);
        DB::table('hari')->insert([
            'nama' => 'Rabu',
            'nama_en' => 'Wednesday',
        ]);
        DB::table('hari')->insert([
            'nama' => 'Kamis',
            'nama_en' => 'Thursday',
        ]);
        DB::table('hari')->insert([
            'nama' => 'Jumat',
            'nama_en' => 'Friday',
        ]);
        DB::table('hari')->insert([
            'nama' => 'Sabtu',
            'nama_en' => 'Saturday',
        ]);
        DB::table('hari')->insert([
            'nama' => 'Minggu',
            'nama_en' => 'Sunday',
        ]);
    }
}
