<?php

namespace App\Core\Repository;

use App\Core\Models\Dosen\Dosen;
use App\Core\Models\Dosen\DosenId;

interface DosenRepositoryInterface
{
    public function byId(DosenId $id): ?Dosen;
}
