<?php

namespace Tests\Unit;

use App\Application\Command\MulaiPertemuan\MulaiPertemuanCommand;
use App\Application\Command\MulaiPertemuan\MulaiPertemuanRequest;
use App\Core\Models\Dosen\Dosen;
use App\Core\Models\Dosen\DosenId;
use App\Core\Models\Kelas\Kelas;
use App\Core\Models\Pertemuan\BentukKehadiran;
use App\Core\Models\Pertemuan\KehadiranDosen;
use App\Core\Models\Pertemuan\KehadiranDosenId;
use App\Core\Models\Pertemuan\ModePertemuan;
use App\Core\Models\Pertemuan\Pertemuan;
use App\Core\Models\Pertemuan\PertemuanId;
use App\Core\Models\Pertemuan\StatusPertemuan;
use App\Core\Repository\DosenRepositoryInterface;
use App\Core\Repository\KehadiranDosenRepositoryInterface;
use App\Core\Repository\PertemuanRepositoryInterface;
use App\Infrastructure\Repository\PostgreSQL\DosenRepository;
use App\Infrastructure\Repository\PostgreSQL\KehadiranDosenRepository;
use Mockery\MockInterface;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

class MulaiPertemuanCommandTest extends TestCase
{
    public function testUsesTheRightInterface()
    {
        $pertemuan_mock = $this->mock(Pertemuan::class, function (MockInterface $mock) {
            $mock->shouldReceive('mulai')->once();
            $mock->shouldReceive('getKelas')->once()->andReturn($this->instance(Kelas::class, $this->mock(Kelas::class, function (MockInterface $mock) {
                $mock->shouldReceive('isPermanen')->once()->andReturn(false);
            })));
            $mock->shouldReceive('getStatus')->once()->andReturn($this->instance(StatusPertemuan::class, $this->mock(StatusPertemuan::class, function (MockInterface $mock) {
                $mock->shouldReceive('isSedangBerlangsung')->once()->andReturn(true);
            })));
            $mock->shouldReceive('getId')->once()->andReturn($this->instance(PertemuanId::class, $this->mock(PertemuanId::class)));
        });
        $pertemuan = $this->instance(Pertemuan::class, $pertemuan_mock);
        /** @var PertemuanRepositoryInterface $pertemuan_repo */
        $this->mock(PertemuanRepositoryInterface::class, function (MockInterface $mock) use ($pertemuan) {
            $mock->shouldReceive('byId')->once()->andReturn($pertemuan);
            $mock->shouldReceive('update')->once();
        });
        $this->mock(DosenRepositoryInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('byId')->once()->andReturn($this->instance(Dosen::class, $this->mock(Dosen::class)));
        });
        $this->mock(KehadiranDosenRepositoryInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('save')->once();
            $mock->shouldReceive('byPertemuanId')->once()->andReturn(
                $this->instance(KehadiranDosen::class, $this->mock(KehadiranDosen::class, function (MockInterface $mock) {
                    $mock->shouldReceive('getId')->once()->andReturn(
                            $this->instance(KehadiranDosenId::class, $this->mock(KehadiranDosenId::class, function (MockInterface $mock) {
                                $mock->shouldReceive('dosenId')->once()->andReturn($this->instance(DosenId::class, $this->mock(DosenId::class, function (MockInterface $mock) {
                                    $mock->shouldReceive('equals')->once()->andReturn(true);
                                })));
                        }))
                    );
                }))
            );
        });
        /** @var MulaiPertemuanCommand $command */
        $command = $this->app->make(MulaiPertemuanCommand::class);
        $command->execute(new MulaiPertemuanRequest(
            Uuid::uuid4(),
            Uuid::uuid4(),
            ModePertemuan::ONLINE,
            BentukKehadiran::HADIR_ONLINE
        ));
    }
}
