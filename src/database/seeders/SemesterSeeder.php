<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semester')->insert([
            'id_semester' => '20191',
            'nama' => 'Gasal 2019/2020',
            'nama_en' => 'Odd 2019/2020',
            'is_smt_aktif' => '0',
        ]);
        DB::table('semester')->insert([
            'id_semester' => '20192',
            'nama' => 'Genap 2019/2020',
            'nama_en' => 'Even 2019/2020',
            'is_smt_aktif' => '0',
        ]);
        DB::table('semester')->insert([
            'id_semester' => '20201',
            'nama' => 'Gasal 2020/2021',
            'nama_en' => 'Odd 2020/2021',
            'is_smt_aktif' => '1',
        ]);
        DB::table('semester')->insert([
            'id_semester' => '20202',
            'nama' => 'Genap 2020/2021',
            'nama_en' => 'Even 2020/2021',
            'is_smt_aktif' => '0',
        ]);
    }
}
