<?php

namespace App\Core\Repository;


use App\Core\Models\Kelas\Kelas;
use App\Core\Models\Kelas\KelasId;

interface KelasRepositoryInterface
{
    public function byId(KelasId $id): ?Kelas;
}
