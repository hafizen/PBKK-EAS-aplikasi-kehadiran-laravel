<?php

namespace App\Application\Query\DaftarKelasMahasiswa;

interface DaftarKelasMahasiswaQueryInterface
{
    public function execute(string $mahasiswaId, int $semesterId): array;
}
