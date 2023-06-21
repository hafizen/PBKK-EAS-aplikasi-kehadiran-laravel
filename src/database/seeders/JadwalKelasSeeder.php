<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jadwal_kelas')->insert([
            "id_jadwal_kelas" => "1530eb83-5619-451a-b2f7-ffec38183a69",
            "id_kelas" => "b1272a3b-b0a4-49ca-8377-efa6bc175f3e",
            "id_ruangan" => "27f55c85-395a-4dd4-a2a5-6e1f37704bc2",
            "id_hari" => 4,
            "jam_mulai" => "10:00:00",
            "jam_selesai" => "12:50:00"
        ]);
        DB::table('jadwal_kelas')->insert([
            "id_jadwal_kelas" => "1de59940-452b-4433-ac5b-18ea0423c064",
            "id_kelas" => "b1f491d4-a16d-4572-8761-df35e5bb1550",
            "id_ruangan" => "099483c1-eeae-4829-be36-ec105a6bf1fa",
            "id_hari" => 2,
            "jam_mulai" => "16:30:00",
            "jam_selesai" => "19:20:00"
        ]);
        DB::table('jadwal_kelas')->insert([
            "id_jadwal_kelas" => "587de642-07d7-4fe3-87da-f7219148851e",
            "id_kelas" => "d2e0bf6e-754d-49be-bed5-ebb5c23286c7",
            "id_ruangan" => "78bff096-ce0e-4553-b733-363d0a326c38",
            "id_hari" => 2,
            "jam_mulai" => "13:30:00",
            "jam_selesai" => "16:20:00"
        ]);
        DB::table('jadwal_kelas')->insert([
            "id_jadwal_kelas" => "750defbc-01d4-440e-9d59-8bbaa82119e8",
            "id_kelas" => "e5500328-5bef-4896-b98d-db9b2d5df7a8",
            "id_ruangan" => "1e5c0e43-a4c2-458b-b9e3-471513135aa3",
            "id_hari" => 2,
            "jam_mulai" => "07:00:00",
            "jam_selesai" => "09:50:00",
        ]);
        DB::table('jadwal_kelas')->insert([
            "id_jadwal_kelas" => "8f4a34c5-6398-4e8c-ab2d-5569a5b67d87",
            "id_kelas" => "56d701bc-3430-4b9a-a2ea-606104f3652a",
            "id_ruangan" => "a138752e-6664-4bef-b1c7-3f155afdc004",
            "id_hari" => 2,
            "jam_mulai" => "13:30:00",
            "jam_selesai" => "16:20:00",
        ]);
        DB::table('jadwal_kelas')->insert([
            "id_jadwal_kelas" => "a9359a32-36ed-4e90-b69a-a50d985f4886",
            "id_kelas" => "b1e367f3-ee88-465c-b08d-9fc5fcc89e50",
            "id_ruangan" => "78bff096-ce0e-4553-b733-363d0a326c38",
            "id_hari" => 4,
            "jam_mulai" => "13:30:00",
            "jam_selesai" => "16:20:00",
        ]);
        DB::table('jadwal_kelas')->insert([
            "id_jadwal_kelas" => "bca5c0b5-e9f2-4b83-b92a-06737981fadc",
            "id_kelas" => "cba78e6f-e3ba-46d5-945e-625a6c018182",
            "id_ruangan" => "1e5c0e43-a4c2-458b-b9e3-471513135aa3",
            "id_hari" => 2,
            "jam_mulai" => "10:00:00",
            "jam_selesai" => "12:50:00",
        ]);
        DB::table('jadwal_kelas')->insert([
            "id_jadwal_kelas" => "dec3d485-f9f7-47d1-9e0f-ca62461aae5c",
            "id_kelas" => "fff89323-a56c-4d7e-a9ff-1361e4396d47",
            "id_ruangan" => "600a0c95-7e57-4e20-98f1-4159bd7da202",
            "id_hari" => 4,
            "jam_mulai" => "16:30:00",
            "jam_selesai" => "19:20:00",
        ]);
        DB::table('jadwal_kelas')->insert([
            "id_jadwal_kelas" => "df235214-6c6b-46cb-ab64-794dfd6c0f8a",
            "id_kelas" => "297074f7-b94d-478e-a9f9-c69296bf6566",
            "id_ruangan" => "78bff096-ce0e-4553-b733-363d0a326c38",
            "id_hari" => 2,
            "jam_mulai" => "16:30:00",
            "jam_selesai" => "19:20:00",
        ]);
    }
}
