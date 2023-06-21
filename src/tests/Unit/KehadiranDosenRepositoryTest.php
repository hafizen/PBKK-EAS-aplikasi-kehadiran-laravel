<?php

namespace Tests\Unit;

use App\Core\Models\Dosen\DosenId;
use App\Core\Models\Pertemuan\BentukKehadiran;
use App\Core\Models\Pertemuan\KehadiranDosen;
use App\Core\Models\Pertemuan\KehadiranDosenId;
use App\Core\Models\Pertemuan\PertemuanId;
use App\Core\Repository\KehadiranDosenRepositoryInterface;
use App\Infrastructure\Repository\PostgreSQL\KehadiranDosenRepository;
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
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Tests\DbRefresher;
use Tests\TestCase;
use function config;

class KehadiranDosenRepositoryTest extends TestCase
{
    private KehadiranDosenRepositoryInterface $kehadiran_dosen_repository;
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
        $this->kehadiran_dosen_repository = $this->app->make(KehadiranDosenRepositoryInterface::class);
        DB::beginTransaction();
        if (config('app.automated')) DB::statement('PRAGMA foreign_keys = OFF;');
        else DB::statement('ALTER TABLE pertemuan_kuliah DISABLE TRIGGER ALL');
    }

    protected function tearDown(): void
    {
        DB::rollBack();
        if (config('app.automated')) DB::statement('PRAGMA foreign_keys = ON;');
        else DB::statement('ALTER TABLE pertemuan_kuliah ENABLE TRIGGER ALL');
        parent::tearDown();
    }

    public function testDependsOnTheRightClass()
    {
        $this->assertInstanceOf(KehadiranDosenRepository::class, $this->kehadiran_dosen_repository);
    }

    public function testCanGetDataById()
    {
        $row = DB::table('kehadiran_dosen')->whereNull('deleted_at')->get();
        $row = $row->random();
        $kehadiran = $this->kehadiran_dosen_repository->byId(new KehadiranDosenId(
            new PertemuanId($row->id_pertemuan_kuliah),
            new DosenId($row->id_dosen)
        ));
        $this->assertInstanceOf(KehadiranDosen::class, $kehadiran);
        $this->assertTrue($kehadiran->getId()->pertemuanId()->id() == $row->id_pertemuan_kuliah);
        $this->assertTrue($kehadiran->getId()->dosenId()->id() == $row->id_dosen);
        $this->assertTrue($kehadiran->isLupaPresensi() == (bool)$row->is_lupa_presensi);
        if ($row->jam_mulai == null) $this->assertNull($kehadiran->getJamMulai());
        else $this->assertTrue($kehadiran->getJamMulai() == new DateTime($row->jam_mulai));
        if ($row->jam_selesai == null) $this->assertNull($kehadiran->getJamSelesai());
        else $this->assertTrue($kehadiran->getJamSelesai() == new DateTime($row->jam_selesai));
        if ($row->bentuk_hadir == null) $this->assertNull($kehadiran->getBentukHadir());
        else $this->assertTrue($kehadiran->getBentukHadir()->getKehadiran() == $row->bentuk_hadir);
    }

    public function testCanGetDataByPertemuanId()
    {
        $row = DB::table('kehadiran_dosen')->whereNull('deleted_at')->get();
        $row = $row->random();
        $kehadiran = $this->kehadiran_dosen_repository->byPertemuanId(new PertemuanId($row->id_pertemuan_kuliah));
        $this->assertInstanceOf(KehadiranDosen::class, $kehadiran);
        $this->assertTrue($kehadiran->getId()->pertemuanId()->id() == $row->id_pertemuan_kuliah);
        $this->assertTrue($kehadiran->getId()->dosenId()->id() == $row->id_dosen);
        $this->assertTrue($kehadiran->isLupaPresensi() == (bool)$row->is_lupa_presensi);
        if ($row->jam_mulai == null) $this->assertNull($kehadiran->getJamMulai());
        else $this->assertTrue($kehadiran->getJamMulai() == new DateTime($row->jam_mulai));
        if ($row->jam_selesai == null) $this->assertNull($kehadiran->getJamSelesai());
        else $this->assertTrue($kehadiran->getJamSelesai() == new DateTime($row->jam_selesai));
        if ($row->bentuk_hadir == null) $this->assertNull($kehadiran->getBentukHadir());
        else $this->assertTrue($kehadiran->getBentukHadir()->getKehadiran() == $row->bentuk_hadir);
    }

    public function testCanUpdateData()
    {
        $row = DB::table('kehadiran_dosen')
            ->whereNull('deleted_at')
            ->get();
        $row = $row->random();
        $kehadiran = new KehadiranDosen(
            new KehadiranDosenId(
                new PertemuanId($row->id_pertemuan_kuliah),
                new DosenId($row->id_dosen)
            ),
            $jam_mulai = (new DateTime())->add(new DateInterval('PT5H')),
            $jam_selesai = (new DateTime())->add(new DateInterval('PT10H')),
            true,
            new BentukKehadiran(BentukKehadiran::HADIR_OFFLINE)
        );
        $this->kehadiran_dosen_repository->update($kehadiran);
        $row = DB::table('kehadiran_dosen')->where('id_pertemuan_kuliah', $kehadiran->getId()->pertemuanId()->id())
            ->where('id_dosen', $kehadiran->getId()->dosenId()->id())
            ->whereNull('deleted_at')
            ->first();
        $this->assertTrue($kehadiran->getId()->pertemuanId()->id() == $row->id_pertemuan_kuliah);
        $this->assertTrue($kehadiran->getId()->dosenId()->id() == $row->id_dosen);
        $this->assertTrue($kehadiran->isLupaPresensi() == (bool)$row->is_lupa_presensi);
        if ($row->jam_mulai == null) $this->assertNull($kehadiran->getJamMulai());
        else $this->assertTrue($kehadiran->getJamMulai()->format('Y-m-d H:i:s') == (new DateTime($row->jam_mulai))->format('Y-m-d H:i:s'));
        if ($row->jam_selesai == null) $this->assertNull($kehadiran->getJamSelesai());
        else $this->assertTrue($kehadiran->getJamSelesai()->format('Y-m-d H:i:s') == (new DateTime($row->jam_selesai))->format('Y-m-d H:i:s'));
        if ($row->bentuk_hadir == null) $this->assertNull($kehadiran->getBentukHadir());
        else $this->assertTrue($kehadiran->getBentukHadir()->getKehadiran() == $row->bentuk_hadir);
    }

    public function testCanSaveData()
    {
        $kehadiran = new KehadiranDosen(
            new KehadiranDosenId(
                new PertemuanId(Uuid::uuid4()),
                new DosenId(Uuid::uuid4())
            ),
            new DateTime(),
            (new DateTime())->add(new DateInterval('PT1H')),
            false,
            new BentukKehadiran(BentukKehadiran::HADIR_ONLINE)
        );
        $this->kehadiran_dosen_repository->save($kehadiran);
        $row = DB::table('kehadiran_dosen')->where('id_pertemuan_kuliah', $kehadiran->getId()->pertemuanId()->id())
            ->where('id_dosen', $kehadiran->getId()->dosenId()->id())
            ->whereNull('deleted_at')
            ->first();
        $this->assertTrue($kehadiran->getId()->pertemuanId()->id() == $row->id_pertemuan_kuliah);
        $this->assertTrue($kehadiran->getId()->dosenId()->id() == $row->id_dosen);
        $this->assertTrue($kehadiran->isLupaPresensi() == (bool)$row->is_lupa_presensi);
        if ($row->jam_mulai == null) $this->assertNull($kehadiran->getJamMulai());
        else $this->assertTrue($kehadiran->getJamMulai()->format('Y-m-d H:i:s') == (new DateTime($row->jam_mulai))->format('Y-m-d H:i:s'));
        if ($row->jam_selesai == null) $this->assertNull($kehadiran->getJamSelesai());
        else $this->assertTrue($kehadiran->getJamSelesai()->format('Y-m-d H:i:s') == (new DateTime($row->jam_selesai))->format('Y-m-d H:i:s'));
        if ($row->bentuk_hadir == null) $this->assertNull($kehadiran->getBentukHadir());
        else $this->assertTrue($kehadiran->getBentukHadir()->getKehadiran() == $row->bentuk_hadir);
    }
}
