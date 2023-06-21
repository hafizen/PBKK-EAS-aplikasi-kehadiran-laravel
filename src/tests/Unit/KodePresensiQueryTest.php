<?php

namespace Tests\Unit;

use App\Application\Query\KodePresensi\KodePresensiDto;
use App\Application\Query\KodePresensi\KodePresensiQueryInterface;
use App\Infrastructure\Query\PostgreSQL\KodePresensiQuery;
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
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Tests\DbRefresher;
use Tests\TestCase;

class KodePresensiQueryTest extends TestCase
{
    private KodePresensiQueryInterface $kode_presensi_query;
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
        $this->kode_presensi_query = $this->app->make(KodePresensiQueryInterface::class);
        DB::beginTransaction();
    }

    protected function tearDown(): void
    {
        DB::rollBack();
        parent::tearDown();
    }

    public function testDependsOnTheRightClass()
    {
        $this->assertInstanceOf(KodePresensiQuery::class, $this->kode_presensi_query);
    }

    public function testCanGetKodePresensi()
    {
        $row = DB::table('pertemuan_kuliah')->whereNotNull('kode_akses')->get()->random();
        $kode_presensi = $this->kode_presensi_query->execute($row->id_pertemuan_kuliah);
        $this->assertInstanceOf(KodePresensiDto::class, $kode_presensi);
        $this->assertTrue($kode_presensi->pertemuan_id == $row->id_pertemuan_kuliah);
        $this->assertTrue($kode_presensi->berlaku_sampai == $row->berlaku_sampai);
        $this->assertTrue($kode_presensi->kode_akses == $row->kode_akses);
    }
}
