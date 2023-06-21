<?php

namespace App\Core\Repository;

use App\Core\Models\Kelas\KelasId;
use App\Core\Models\Pertemuan\Pertemuan;
use App\Core\Models\Pertemuan\PertemuanId;

interface PertemuanRepositoryInterface
{
    public function byId(PertemuanId $pertemuanId): ?Pertemuan;
    public function byKelasId(KelasId $kelasId): array;
    public function save(Pertemuan $pertemuan): void;
    public function update(Pertemuan $pertemuan): void;
}
