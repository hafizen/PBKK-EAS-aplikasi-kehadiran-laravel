<?php

namespace Tests\Feature;

use App\Application\Command\AkhiriPertemuan\AkhiriPertemuanCommand;
use App\Application\Command\AkhiriPertemuan\AkhiriPertemuanRequest;
use App\Core\Models\Kelas\KelasId;
use App\Core\Models\Pertemuan\BentukKehadiran;
use App\Core\Models\Pertemuan\JadwalPertemuan;
use App\Core\Models\Pertemuan\ModePertemuan;
use App\Core\Models\Pertemuan\StatusPertemuan;
use App\Core\Models\Pertemuan\TopikPerkuliahan;
use App\Core\Models\Pertemuan\UrutanPertemuan;
use App\Core\Repository\KelasRepositoryInterface;
use App\Core\Repository\PertemuanRepositoryInterface;
use App\Infrastructure\Repository\PostgreSQL\KehadiranDosenRepository;
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
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Tests\DbRefresher;
use Tests\TestCase;

class AkhiriPertemuanTest extends TestCase
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

    public function testCanAkhiriPertemuan()
    {
        /** @var KelasRepositoryInterface $kelas_repo */
        $kelas_repo = $this->app->make(KelasRepositoryInterface::class);
        $kelas = $kelas_repo->byId(new KelasId(DB::table('kelas')->first()->id_kelas));
        $pertemuan = $kelas->buatPertemuan(
            new UrutanPertemuan(50),
            null,
            new JadwalPertemuan(
                new DateTime(),
                new DateTime(),
                (new DateTime())->add(new DateInterval('PT1H'))
            ),
            new TopikPerkuliahan(
                "esse pop udud jablay", "esse pop is a joke"
            ),
            new ModePertemuan(ModePertemuan::ONLINE)
        );
        /** @var PertemuanRepositoryInterface $pertemuan_repo */
        $pertemuan_repo = $this->app->make(PertemuanRepositoryInterface::class);
        $pertemuan_repo->save($pertemuan);
        $user = User::where('group', 'dosen')->first();
        $this->actingAs($user);
        $this->post("/pertemuan/{$pertemuan->getId()->id()}/mulai",[
            'opsi_mode_pertemuan' => ModePertemuan::ONLINE,
            'opsi_mengajar' => BentukKehadiran::HADIR_ONLINE,
            'opsi_kode_presensi' => 'auto'
        ]);
        $this->post("/pertemuan/{$pertemuan->getId()->id()}/akhiri");
        $updated_pertemuan = $pertemuan_repo->byId($pertemuan->getId());
        $this->assertTrue($updated_pertemuan->getStatus()->getStatus() == StatusPertemuan::SELESAI);
    }

    public function testFailAkhiriPertemuan()
    {
        /** @var AkhiriPertemuanCommand $command */
        $command = $this->app->make(AkhiriPertemuanCommand::class);

        $this->expectExceptionMessage("pertemuan_tidak_ditemukan");
        $command->execute(new AkhiriPertemuanRequest(Uuid::uuid4(), Uuid::uuid4()));
        $this->expectExceptionMessage("dosen_tidak_ditemukan");

        $pertemuan = DB::table('pertemuan_kuliah')->first();
        $command->execute(new AkhiriPertemuanRequest($pertemuan->id_pertemuan_kuliah, Uuid::uuid4()));

        $this->expectExceptionMessage("kehadiran_dosen_tidak_ditemukan");
        $dosen = DB::table('dosen')->first();
        $pertemuan = DB::table('pertemuan_kuliah')->where('id_dosen', '!=', $dosen->id_dosen)->first();
        $command->execute(new AkhiriPertemuanRequest($pertemuan->id_pertemuan_kuliah, $dosen->id_dosen));
    }
}
