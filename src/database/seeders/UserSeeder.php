<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('user')->insert([
            'id_user' => 'd0a4ec88-3406-478e-825c-f0f6e60a1712',
            'name' => 'Rizky Januar Akbar',
            'username' => 'dosen1',
            'password' => '$2a$12$CXDiBHhomR7gSkUcSB3ibOEuMPsQPwbqsgLNveLBULqINlQJZVH2u',
            'group' => 'dosen'
        ]);
        DB::table('user')->insert([
            'id_user' => 'a81bd8a4-8d9e-41c1-ac46-bdf1ebb1ce02',
            'name' => 'Mahasiswa 1',
            'username' => 'mhs1',
            'password' => '$2a$12$FvYtnzMNSezHEt7rqm8RT.BQbT9HSi/NJQum7W5GfM0fzRpYwSx2O',
            'group' => 'mahasiswa'
        ]);
    }
}
