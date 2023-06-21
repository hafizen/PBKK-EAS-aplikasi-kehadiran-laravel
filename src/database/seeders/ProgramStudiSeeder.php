<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('program_studi')->insert([
            'id_prodi' => '354de48e-9d73-4b81-9768-8c7bc3e9693a',
            'nama' => 'S-1 TEKNIK INFORMATIKA',
        ]);
    }
}
