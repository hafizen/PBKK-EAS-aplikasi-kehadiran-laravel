<?php

namespace Tests\Feature;

use App\Application\Command\MulaiPertemuan\MulaiPertemuanCommand;
use App\Application\Command\MulaiPertemuan\MulaiPertemuanRequest;
use App\Core\Models\Kelas\KelasId;
use App\Core\Models\Pertemuan\BentukKehadiran;
use App\Core\Models\Pertemuan\JadwalPertemuan;
use App\Core\Models\Pertemuan\ModePertemuan;
use App\Core\Models\Pertemuan\StatusPertemuan;
use App\Core\Models\Pertemuan\TopikPerkuliahan;
use App\Core\Models\Pertemuan\UrutanPertemuan;
use App\Core\Repository\KelasRepositoryInterface;
use App\Core\Repository\PertemuanRepositoryInterface;
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

class MulaiPertemuanTest extends TestCase
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

    public function testCanMulaiPertemuan()
    {
        /** @var KelasRepositoryInterface $kelas_repo */
        $kelas_repo = $this->app->make(KelasRepositoryInterface::class);
        $kelas = $kelas_repo->byId(new KelasId(DB::table('kelas')->first()->id_kelas));
        $pertemuan = $kelas->buatPertemuan(
            new UrutanPertemuan(50),
            null,
            new JadwalPertemuan(
                new DateTime(),
                (new DateTime())->add(new DateInterval('PT30M')),
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
        $before = DB::table('pertemuan_kuliah')->where('id_pertemuan_kuliah', $pertemuan->getId()->id())->first();
        $this->assertTrue($before->status_pertemuan == StatusPertemuan::BELUM_DIMULAI);
        $user = User::where('group', 'dosen')->first();
        $this->actingAs($user);
        $this->post("/pertemuan/{$pertemuan->getId()->id()}/mulai",[
            'opsi_mode_pertemuan' => ModePertemuan::ONLINE,
            'opsi_mengajar' => BentukKehadiran::HADIR_ONLINE,
            'opsi_kode_presensi' => 'auto'
        ]);
        $updated_pertemuan = DB::table('pertemuan_kuliah')->where('id_pertemuan_kuliah', $pertemuan->getId()->id())->first();
        $this->assertTrue($updated_pertemuan->status_pertemuan == StatusPertemuan::SEDANG_BERLANGSUNG);
        $kehadiran_dosen = DB::table('kehadiran_dosen')
            ->where('id_pertemuan_kuliah', $pertemuan->getId()->id())
            ->first();
        $dosen = DB::table('dosen')->where('id_user_sso', $user->id_user)->first();
        $this->assertTrue($kehadiran_dosen->id_dosen == $dosen->id_dosen);
        $this->assertTrue($kehadiran_dosen->bentuk_hadir == BentukKehadiran::HADIR_ONLINE);
    }

    public function testFailMulaiPertemuan()
    {
        /**
         * Check throw error msg pada Application Command
         * Kalian bisa gunakan ini sebagai referensi error message
         */

        /** @var MulaiPertemuanCommand $command */
        $command = $this->app->make(MulaiPertemuanCommand::class);
        $this->expectExceptionMessage('pertemuan_tidak_ditemukan');
        $command->execute(new MulaiPertemuanRequest(Uuid::uuid4(), Uuid::uuid4(), ModePertemuan::ONLINE, BentukKehadiran::HADIR_ONLINE));

        $this->expectExceptionMessage('dosen_tidak_ditemukan');
        $pertemuan = DB::table('pertemuan_kuliah')->first();
        $command->execute(new MulaiPertemuanRequest($pertemuan->id_pertemuan_kuliah, Uuid::uuid4(), ModePertemuan::ONLINE, BentukKehadiran::HADIR_ONLINE));

        $this->expectExceptionMessage('pertemuan_sudah_dihadiri_dosen_lain');
        $dosen = DB::table('dosen')->first();
        $kehadiran_dosen = DB::table('kehadiran_dosen')->where('id_dosen', '!=', $dosen->id_dosen)->whereNull('deleted_at')->first();
        $command->execute(new MulaiPertemuanRequest($kehadiran_dosen->id_pertemuan_kuliah, $dosen->id_dosen, ModePertemuan::ONLINE, BentukKehadiran::HADIR_ONLINE));
    }
}
