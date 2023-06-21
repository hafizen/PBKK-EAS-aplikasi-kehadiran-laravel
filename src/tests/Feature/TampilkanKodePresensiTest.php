<?php

namespace Tests\Feature;

use App\Application\Query\KodePresensi\KodePresensiDto;
use App\Models\User;
use Database\Seeders\DosenSeeder;
use Database\Seeders\HariSeeder;
use Database\Seeders\JadwalKelasSeeder;
use Database\Seeders\KehadiranDosenSeeder;
use Database\Seeders\KelasSeeder;
use Database\Seeders\MataKuliahSeeder;
use Database\Seeders\MengajarSeeder;
use Database\Seeders\PertemuanKuliahSeeder;
use Database\Seeders\ProgramStudiSeeder;
use Database\Seeders\RuanganSeeder;
use Database\Seeders\SemesterSeeder;
use Database\Seeders\UserSeeder;
use DateTime;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Tests\DbRefresher;
use Tests\TestCase;

class TampilkanKodePresensiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('config:clear');
        DbRefresher::refresh($this->app, [
            DosenSeeder::class,
            KelasSeeder::class,
            SemesterSeeder::class,
            JadwalKelasSeeder::class,
            MataKuliahSeeder::class,
            HariSeeder::class,
            ProgramStudiSeeder::class,
            RuanganSeeder::class,
            MengajarSeeder::class,
            PertemuanKuliahSeeder::class,
            KehadiranDosenSeeder::class,
            UserSeeder::class,
        ]);
        DB::beginTransaction();
    }
    protected function tearDown(): void
    {
        DB::rollBack();
        parent::tearDown();
    }

    public function testCanGetKodePresensi()
    {
        $this->actingAs(User::where('group', 'dosen')->first());
        $pertemuan = DB::table('pertemuan_kuliah')->first();
        $this->followingRedirects()->get("/kode-presensi/{$pertemuan->id_pertemuan_kuliah}")
            ->assertViewIs('pertemuan.kode_presensi')
            ->assertViewHas([
                'id_pertemuan' => $pertemuan->id_pertemuan_kuliah,
                'kode_presensi' => new KodePresensiDto($pertemuan->id_pertemuan_kuliah, $pertemuan->kode_akses, new DateTime($pertemuan->berlaku_sampai))
            ]);
    }
}
