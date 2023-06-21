<?php

namespace Tests\Unit;

use App\Core\Models\Dosen\Dosen;
use App\Core\Models\Dosen\DosenId;
use App\Core\Repository\DosenRepositoryInterface;
use App\Infrastructure\Repository\PostgreSQL\DosenRepository;
use Database\Seeders\DosenSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Tests\DbRefresher;
use Tests\TestCase;

class DosenRepositoryTest extends TestCase
{
    private DosenRepositoryInterface $dosen_repository;
    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('config:clear');
        DbRefresher::refresh($this->app, [
            DosenSeeder::class,
            UserSeeder::class,
        ]);
        $this->dosen_repository = $this->app->make(DosenRepositoryInterface::class);
        DB::beginTransaction();
    }
    protected function tearDown(): void
    {
        DB::rollBack();
        parent::tearDown();
    }

    public function testDependsOnTheRightClass()
    {
        $this->assertInstanceOf(DosenRepository::class, $this->dosen_repository);
    }

    public function testCanGetAndConstructData()
    {
        $dosen = DB::table('dosen')->first();
        $fetched_dosen = $this->dosen_repository->byId(new DosenId($dosen->id_dosen));
        $this->assertInstanceOf(Dosen::class, $fetched_dosen);
        $this->assertTrue($dosen->nama == $fetched_dosen->getNama());
        $this->assertTrue($dosen->id_dosen == $fetched_dosen->getId()->id());
    }

    public function testDataNotFound()
    {
        $fetched_dosen = $this->dosen_repository->byId(new DosenId(Uuid::uuid4()));
        $this->assertNull($fetched_dosen);
    }
}
