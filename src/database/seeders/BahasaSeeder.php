<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bahasa')->insert([
            'id_bahasa' => 'EN',
            'nama' => 'Bahasa Inggris',
            'nama_en' => 'English',
            'is_default' => '0'
        ]);
        DB::table('bahasa')->insert([
            'id_bahasa' => 'ID',
            'nama' => 'Bahasa Indonesia',
            'nama_en' => 'Indonesian',
            'is_default' => '1'
        ]);
    }
}
