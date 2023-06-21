<?php

namespace App\Core\Service;

use App\Core\Models\Pertemuan\UrutanPertemuan;
use App\Core\Models\Pertemuan\Pertemuan;

class UrutanPertemuanService
{
    public function isUrutanTerpakai(
        UrutanPertemuan $urutan,
        array $listPertemuan,
        ?Pertemuan $pertemuanDiabaikan = null
    ): bool {
        foreach ($listPertemuan as $pertemuan) {
            if ($pertemuanDiabaikan && $pertemuanDiabaikan->getId()->equals($pertemuan->getId())) {
                continue;
            }

            if ($pertemuan->getPertemuanKe()->equals($urutan)) {
                return true;
            }
        }

        return false;
    }
}
