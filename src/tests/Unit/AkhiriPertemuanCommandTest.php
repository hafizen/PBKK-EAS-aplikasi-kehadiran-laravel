<?php

namespace Tests\Unit;

use App\Application\Command\AkhiriPertemuan\AkhiriPertemuanCommand;
use App\Application\Command\AkhiriPertemuan\AkhiriPertemuanRequest;
use App\Core\Models\Dosen\Dosen;
use App\Core\Models\Pertemuan\KehadiranDosen;
use App\Core\Models\Pertemuan\Pertemuan;
use App\Core\Repository\DosenRepositoryInterface;
use App\Core\Repository\KehadiranDosenRepositoryInterface;
use App\Core\Repository\PertemuanRepositoryInterface;
use Mockery\MockInterface;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

class AkhiriPertemuanCommandTest extends TestCase
{
    public function testUsesTheRightInterface()
    {
        $this->mock(PertemuanRepositoryInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('update')->once();
            $mock->shouldReceive('byId')->once()->andReturn($this->instance(Pertemuan::class, $this->mock(Pertemuan::class, function (MockInterface $mock) {
                $mock->shouldReceive('akhiri')->once();
            })));
        });
        $this->mock(DosenRepositoryInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('byId')->once()->andReturn($this->instance(Dosen::class, $this->mock(Dosen::class)));
        });
        $this->mock(KehadiranDosenRepositoryInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('update')->once();
            $mock->shouldReceive('byId')->once()->andReturn($this->instance(KehadiranDosen::class, $this->mock(KehadiranDosen::class, function (MockInterface $mock) {
                $mock->shouldReceive('selesai')->once();
            })));
        });
        /** @var AkhiriPertemuanCommand $command */
        $command = $this->app->make(AkhiriPertemuanCommand::class);
        $command->execute(new AkhiriPertemuanRequest(Uuid::uuid4(), Uuid::uuid4()));
    }
}
