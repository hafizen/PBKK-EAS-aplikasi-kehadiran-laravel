<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosen')->insert([
            'id_dosen' => '2f7f755c-d544-4397-887d-6344cbbdf947',
            'nama' => 'Rizky Januar Akbar',
            'id_user_sso' => 'd0a4ec88-3406-478e-825c-f0f6e60a1712',
        ]);
    }
}
