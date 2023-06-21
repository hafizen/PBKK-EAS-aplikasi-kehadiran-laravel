<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KehadiranDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "0091f12b-faa4-41ef-a7d8-789f1695bce8",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2022-04-16",
            "jam_selesai" => "2022-04-16",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => "D"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "01dfb5d5-9994-42b8-aa52-da256f3cadb7",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-11-17",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "030031f0-07cc-42d5-8a98-30cbc26cbace",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-05-05",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "03e6d16d-6401-4954-977f-01a6fbffac63",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-31",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "043b72d6-9a57-49de-9f7b-1d699d767615",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-11-15",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "0747bcf3-75fa-4e50-8b21-1312fce2b633",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-08",
            "jam_selesai" => "2020-12-08",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "0767fd79-df9b-4451-91d8-7c5636b86104",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-12",
            "jam_selesai" => "2020-03-12",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "0ccadf2a-3540-4a1a-a58b-5e0f0adfb94e",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-10",
            "jam_selesai" => "2020-03-10",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "0d05a139-dd81-4959-8c16-eba92200b086",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-10-06",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "0d2f6bb1-ca9d-4401-94dc-482c2caa0482",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-03",
            "jam_selesai" => "2020-12-03",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "1043296a-9c31-4207-8b5e-c028bf512bab",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2022-02-08",
            "jam_selesai" => "2022-02-08",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => "L"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "1457fc59-1ebe-44e9-b922-078406acd524",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-17",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "1518f35b-5b47-4bf2-8a11-5343e6bbb9f2",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-04-28",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "157e8a98-d610-4ea4-ae0d-b3202f042641",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-05-19",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "1587187b-13ab-4344-bcf7-e2860c02db1b",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-03",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "1a67ab1a-7e37-4841-9323-ed81339334fc",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-11-06",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "1dd87720-01fb-42c2-be77-f15b3b10a964",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-12",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "1de04f21-ba93-4319-84e9-d383c0063915",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-04-28",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "1ee701fb-d4dc-4a4b-bad8-dace837857c3",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-01-07",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "1f9b38b9-a3e4-423f-9fbc-92ff85df7add",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-04",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "21650a29-2929-4233-b419-48a941c8ba15",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-11-05",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "22c1f2b7-1098-493d-b35d-5e1e35df953f",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-18",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "2442692b-4427-424d-b68a-fc42d24a44ce",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-02-25",
            "jam_selesai" => "2020-02-25",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "24b4a3e7-6577-46ff-b4a7-aef095450e51",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-10-06",
            "jam_selesai" => "2020-10-06",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "253b90cf-1848-43fe-b25e-53f39a4b19cf",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-11-24",
            "jam_selesai" => "2020-11-24",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "2806ec48-75ff-42d7-b30b-2bd17942fd18",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-12-21",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 1,
            "bentuk_hadir" => "L"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "29ce13c6-1f50-4387-99ce-877255028f04",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2022-04-17",
            "jam_selesai" => "2022-04-17",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => "D"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "2baac3c4-e3c1-4c85-8c66-0819ba93f093",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-24",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "2bd4f0e3-2661-4a3a-a7b7-4ac51dbfebae",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-23",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "2d01c44c-f81c-4f94-9a4a-9091e83b8b8d",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-05-12",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "2d5cfe9a-14cf-4bf7-996f-ccd7bea552c6",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-01-01",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "31cb5a0a-7e37-4ebf-bd59-b1df37194bd2",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-17",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "3254e86d-b476-4ddb-b6ba-a7b9a192e15a",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2022-04-16",
            "jam_selesai" => "2022-04-16",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => "L"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "33a7d270-e72a-4f5f-b01d-ba06d65fc3e1",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-03",
            "jam_selesai" => "2020-03-03",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "3669f0c8-88ae-4ccf-93e2-488629bf57bc",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-29",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "37e667ac-9d1a-4b86-9c22-4cb487d38d4b",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-05",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "38d8bd6d-f78b-414e-8517-f06cfebde05d",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-05",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "3a6952fe-034a-4602-99f3-fb6b8e868226",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-23",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "3b2a799d-ae26-4c70-a193-79777fcc2b3f",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-01-16",
            "jam_selesai" => "2021-01-16",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "4094874c-b7ac-4104-a888-67f0c922bcde",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-10",
            "jam_selesai" => "2020-12-10",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "4138baa0-5472-48c5-8376-85a67c4340cc",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-17",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "485b50b6-70e6-4ef3-9efa-63d1cb9c00a4",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-10-08",
            "jam_selesai" => "2020-10-08",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "48e497de-2f4b-453e-843d-09d1a73afc1d",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-28",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "49b6a1e5-30e4-43db-9284-a6105879dc1b",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-05-19",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "4b592802-df6b-4cb4-8c6d-61865e46f1b4",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-10-01",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "4dce736a-c160-4076-b2ab-a131ec3ea945",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-12-21",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 1,
            "bentuk_hadir" => "L"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "50085a9e-b716-41e0-832f-e9efac44147e",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-04-14",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "5088b341-5ad0-4427-9fcb-7dfd444904de",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-05-20",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "516efd7b-9eed-4a99-a813-f15ee77f72d8",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2022-04-18",
            "jam_selesai" => "2022-04-23",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => "D"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "533bc784-c418-47e2-a89a-97dc9f7284aa",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-24",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "53c61e5f-3ac4-4af3-907f-8f7975ea906b",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-12-21",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => "D"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "5662e705-5a0a-4bbd-bd5e-41b68ad45977",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-02-03",
            "jam_selesai" => "2020-02-04",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "56cd73a2-d474-449a-a85c-fa1835581f5d",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-28",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "58f28ad7-42c2-4765-9fda-6e44d9c68e82",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-02-25",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "58f3b762-b9db-456d-8813-41664fb7ba01",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-03",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "5b8ce2fc-51a2-45dd-8de3-53e552d0baba",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-02-18",
            "jam_selesai" => "2020-02-18",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "5ce1de93-cfeb-462c-869d-d19b4d144288",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-09-22",
            "jam_selesai" => "2020-09-22",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "5da5d5ec-eb91-47dc-b588-508d29d515c1",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-02-12",
            "jam_selesai" => "2020-02-18",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "5f89ca7a-360d-4c12-9bd4-9f42aa15278c",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-10-15",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "63cd7b5e-a44d-44e3-ba37-2dade6b455f3",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-24",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "6436909f-11c4-4337-9b31-a498f10f23a3",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-12-04",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "646aabd1-1f1c-49eb-9593-16ea3c623509",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-10-29",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "6586cb93-7932-430e-abc6-44fc8105bf89",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-02-04",
            "jam_selesai" => "2020-02-04",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "66ce25e0-2ae5-4086-8068-26294c75720b",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-01-12",
            "jam_selesai" => "2021-01-12",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "68688a88-67a8-488e-8866-b29d1840bd1a",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-11-03",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "6979723a-4186-42e6-8061-52a53a538a3e",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-10-20",
            "jam_selesai" => "2020-10-20",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "697bb210-408d-4f8a-8dc3-3b9bd5eb20ca",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-05-20",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "6ca0a06d-ea2c-43c4-b197-52bef1ed200b",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-01-14",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "6e955091-28da-4856-aed2-6db3186e346b",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-05-19",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "7109e29c-df8e-48a4-b849-99ed9cbd9559",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-12-21",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 1,
            "bentuk_hadir" => "D"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "719a0afd-ed02-4502-b5f0-639d1eca66fc",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-04-14",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "740b5658-5d43-46a6-b3b5-cc90ffb648dc",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-10-02",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "7667b2c6-2e19-446d-a45f-2bae0775fe4c",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-11-28",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "777c91ec-ce2b-4ead-b47c-02a2d6d9de45",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-05",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "77faf591-59fa-4921-a7ab-890a9f6d44f1",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-10-01",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "78946ddd-337f-4215-b92b-51f3682821d8",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-03",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "79ca15a4-63d0-4a73-8e48-a73352216a3a",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-10-27",
            "jam_selesai" => "2020-10-27",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "79efafa3-b1cd-40ba-9af6-e1b422e4cc7d",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-01-07",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "82f9a4f1-448d-404c-b09b-e2b5690b5d3b",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-12-04",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "83059e1d-056c-483f-bf7f-cabd279b19c7",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2022-04-17",
            "jam_selesai" => "2022-04-19",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => "D"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "83e9b367-0980-47bf-8c2e-7b33e723ad8d",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-05-05",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "84b2e9e5-0943-4d69-a1d4-4c5798b467fe",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-11-03",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "86034c52-eb07-4517-9984-eda47b3b14ea",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-23",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "8824891e-5231-48d8-ab4e-30b118b439c4",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-19",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "899aad19-fa69-4887-b442-593514617de5",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-10",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "89af7853-2410-4d8b-84bd-62b661047ff4",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-10-15",
            "jam_selesai" => "2020-10-15",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "93629a79-0633-4538-bc99-44283373d33a",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-05-19",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "95a078b6-b102-4b06-a790-492fd62af308",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-17",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "989d0770-19c5-4d8d-bb8b-74b9a691ded0",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-10-27",
            "jam_selesai" => "2020-10-27",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "99e442a1-f8d5-43ae-a4a7-4043e3383cbb",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-26",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "99f1012e-daf1-4557-8d78-18e296ce80f4",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2022-02-12",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => "L"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "9a349edc-d1b2-42c5-9925-c3738ce85913",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-04-07",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "9f9a26da-f062-4312-b262-030b263d902b",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-04-26",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "a2a3c216-da9d-4647-885e-f73fbdf9fd22",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-11-22",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "a6c564b1-6024-4003-af46-85aac8f0f55a",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-01-14",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "a8f25079-3775-4994-b92f-48038666a937",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-11-17",
            "jam_selesai" => "2020-11-17",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "a91d4b6e-4157-447f-8489-26dd75d1f12a",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-04-09",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "abf7a618-4843-4a30-a655-950e8a6f61e6",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-01-05",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "b002ef12-e4c3-4a66-926c-26d33acbb09b",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-15",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "b2a2c706-f331-4846-b2b0-0d3657a8f37e",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-04-16",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "b337f173-64a8-4c56-806a-3ccadc1a4fd6",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-10-20",
            "jam_selesai" => "2020-10-20",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "b81a3aa3-44a4-41ef-b55b-866504251c01",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-04",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "b82c53a0-44a1-47b9-851c-53f1a942738f",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-04-23",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "b834502b-c3c0-46cf-8b99-e08a3a66020b",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-15",
            "jam_selesai" => "2020-12-15",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "b947f0e8-1281-4064-8acf-0095f2f50ecb",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2022-02-13",
            "jam_selesai" => "2022-02-16",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => "L"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "ba23f922-e234-4ebe-9e95-d5956f74d8a1",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-12-04",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "bb195075-653d-43b2-a559-a10662d28481",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2022-02-16",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => "L"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "bbe8665d-9823-42dd-8d62-7da67667a272",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-11-12",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "bcf71f95-938b-449f-9e5f-d0ca9a42a97d",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-10-23",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "bd66d8ed-9bfb-4660-8289-e53daeb26ed5",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-04-23",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "bd8a7aca-241b-471c-babb-8fb9a985b4fa",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-11-26",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "c3a93ff5-4d37-4e19-a729-26f07a73077d",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-27",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "c42b10ff-ed55-4734-8517-38be0596e44e",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-11-26",
            "jam_selesai" => "2020-11-26",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "c780f517-9eae-427f-8af2-d554ad994dc3",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-29",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "c8a9085a-83f7-4e4f-a757-daa0d9741e3e",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-12-21",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => "L"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "c8e6669c-2c61-4bac-ae1e-3dccd836b1e3",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-11-12",
            "jam_selesai" => "2020-11-12",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "c9855c3e-e1c3-4cab-bf71-176f2b2c1484",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-31",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "c9abb43c-810d-4d46-9f9f-357159851afd",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-11-12",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "caffbee2-9363-4b34-8599-50fe3c06ce45",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-02-06",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "d1c0985d-7008-4dc7-9893-f4d67bec527f",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-12-21",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => "D"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "d2e6dd23-bf09-42bb-a696-7142a1d5e970",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-31",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "d3f9d267-56ea-442c-8c92-82ea9d8a6d18",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-10-01",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "d747264c-3403-4225-b516-59a65ceec6c4",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-11-29",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "d9b40e74-fc7f-4ff2-bbef-5cc9d63338f3",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-05",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "da13987c-4d15-482e-b147-5804290d0dc9",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2022-04-23",
            "jam_selesai" => "2022-04-23",
            "is_lupa_presensi" => 1,
            "bentuk_hadir" => "D"
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "da8252d5-fc9d-43cd-a6fc-b5de059768e9",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-08",
            "jam_selesai" => "2020-12-08",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "da82886e-c001-402c-8062-f7b1ab8a319c",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2021-01-01",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "dabff64d-b20d-43bb-8a13-ced68d4bb51c",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-10-13",
            "jam_selesai" => "2020-10-13",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "db1e166c-606b-4282-9fe0-091ccc88b96e",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-11-07",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "dbc20e3c-a9c0-4de6-98be-795005493929",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-10-17",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "e05f635b-6e89-4680-bf97-67d5e7218c01",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-03",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "e0765a41-c578-4e3c-aa0b-714f3b6f8ddd",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-02-27",
            "jam_selesai" => "2020-02-27",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "e17283cd-fa55-4e96-bd39-738d8d1099ae",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-05-07",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "e2b275ae-dfb9-4974-b1b8-bd3b65d4ccf8",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-10-30",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "e3e2e24b-9dd9-404e-8bca-2a7be975f7bc",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-04-02",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "e7619512-3fd9-4779-a79c-311dfab2c504",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-10-08",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "e9d73d9f-cc40-4c61-89b4-ab2ed0f67735",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-10-13",
            "jam_selesai" => "2020-10-13",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "e9e68018-db6a-4154-a816-d371d98fc8b7",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-11-05",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "e9fc8a9e-adf6-4cbd-9d49-af2aab0b437e",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-04-07",
            "jam_selesai" => "2020-04-07",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "ebec85a0-6fda-4008-9339-ea5b9d423e37",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-26",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "ec2b5307-6d86-4d8a-9e2a-db216ca12783",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-02-13",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "eca25989-e2cf-4d33-b8a6-3b7683ac5c39",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-28",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "f24b4a60-6ea2-485c-9166-294df67729ee",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-31",
            "jam_selesai" => "2020-12-31",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "f376cb1e-91a9-4cc1-a992-e5806a85fe60",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-09-24",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "f4794fdd-f03a-42f3-85ee-0e1218faf9e7",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-04-23",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "f4e352dc-ba46-4c1f-8e5d-5176ce324d84",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-10-01",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "f5b62c5e-869e-4c7d-b440-a8bc1ed75fb5",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-03-23",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "f87b6bc7-b6b8-469a-b9de-bcfe64dc57f0",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-11-19",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "fd2621b8-74e2-4cf3-a74c-4d3707d67e43",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2019-10-22",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "fe5c780e-088d-4b43-ad4f-dde90d8ca85e",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-09-29",
            "jam_selesai" => "2020-09-29",
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "fe5ccd26-058a-4a87-becb-c6a771a8b5d1",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-11-24",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
        DB::table('kehadiran_dosen')->insert([
            "id_pertemuan_kuliah" => "fe9ac4dd-82b5-4b0b-8758-d7260eed1726",
            "id_dosen" => "2f7f755c-d544-4397-887d-6344cbbdf947",
            "jam_mulai" => "2020-12-23",
            "jam_selesai" => NULL,
            "is_lupa_presensi" => 0,
            "bentuk_hadir" => NULL
        ]);
    }
}
