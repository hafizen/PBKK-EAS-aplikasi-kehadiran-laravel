<?php

namespace App\Providers;

use App\Application\Query\DaftarHadirMahasiswa\DaftarHadirMahasiswaQueryInterface;
use App\Application\Query\DaftarKelasDosen\DaftarKelasDosenQueryInterface;
use App\Application\Query\DaftarKelasMahasiswa\DaftarKelasMahasiswaQueryInterface;
use App\Application\Query\DaftarPertemuan\DaftarPertemuanQueryInterface;
use App\Application\Query\DaftarRuangan\DaftarRuanganQueryInterface;
use App\Application\Query\Dosen\DosenQueryInterface;
use App\Application\Query\Kelas\KelasQueryInterface;
use App\Application\Query\KodePresensi\KodePresensiQueryInterface;
use App\Application\Query\Mahasiswa\MahasiswaQueryInterface;
use App\Application\Query\Pertemuan\PertemuanQueryInterface;
use App\Application\Query\SemesterAktif\SemesterAktifQueryInterface;
use App\Core\Repository\DosenRepositoryInterface;
use App\Core\Repository\KehadiranDosenRepositoryInterface;
use App\Core\Repository\KelasRepositoryInterface;
use App\Core\Repository\PertemuanRepositoryInterface;
use App\Infrastructure\Query\PostgreSQL\DaftarHadirMahasiswaQuery;
use App\Infrastructure\Query\PostgreSQL\DaftarKelasDosenQuery;
use App\Infrastructure\Query\PostgreSQL\DaftarKelasMahasiswaQuery;
use App\Infrastructure\Query\PostgreSQL\DaftarPertemuanQuery;
use App\Infrastructure\Query\PostgreSQL\DaftarRuanganQuery;
use App\Infrastructure\Query\PostgreSQL\DosenQuery;
use App\Infrastructure\Query\PostgreSQL\KelasQuery;
use App\Infrastructure\Query\PostgreSQL\KodePresensiQuery;
use App\Infrastructure\Query\PostgreSQL\MahasiswaQuery;
use App\Infrastructure\Query\PostgreSQL\PertemuanQuery;
use App\Infrastructure\Query\PostgreSQL\SemesterAktifQuery;
use App\Infrastructure\Repository\PostgreSQL\DosenRepository;
use App\Infrastructure\Repository\PostgreSQL\KehadiranDosenRepository;
use App\Infrastructure\Repository\PostgreSQL\KelasRepository;
use App\Infrastructure\Repository\PostgreSQL\PertemuanRepository;
use Illuminate\Support\ServiceProvider;

class DependencyServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Query
        $this->app->bind(DaftarKelasDosenQueryInterface::class, DaftarKelasDosenQuery::class);
        $this->app->bind(DosenQueryInterface::class, DosenQuery::class);
        $this->app->bind(DaftarKelasMahasiswaQueryInterface::class, DaftarKelasMahasiswaQuery::class);
        $this->app->bind(MahasiswaQueryInterface::class, MahasiswaQuery::class);
        $this->app->bind(SemesterAktifQueryInterface::class, SemesterAktifQuery::class);
        $this->app->bind(KelasQueryInterface::class, KelasQuery::class);
        $this->app->bind(DaftarPertemuanQueryInterface::class, DaftarPertemuanQuery::class);
        $this->app->bind(DaftarHadirMahasiswaQueryInterface::class, DaftarHadirMahasiswaQuery::class);
        $this->app->bind(PertemuanQueryInterface::class, PertemuanQuery::class);
        $this->app->bind(DaftarRuanganQueryInterface::class, DaftarRuanganQuery::class);
        $this->app->bind(KodePresensiQueryInterface::class, KodePresensiQuery::class);
        // Repository
        $this->app->bind(KelasRepositoryInterface::class, KelasRepository::class);
        $this->app->bind(PertemuanRepositoryInterface::class, PertemuanRepository::class);
        $this->app->bind(DosenRepositoryInterface::class, DosenRepository::class);
        $this->app->bind(KehadiranDosenRepositoryInterface::class, KehadiranDosenRepository::class);
        //Service
    }
}
