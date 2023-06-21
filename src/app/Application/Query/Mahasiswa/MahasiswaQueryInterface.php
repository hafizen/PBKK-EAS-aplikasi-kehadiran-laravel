<?php

namespace App\Application\Query\Mahasiswa;

interface MahasiswaQueryInterface
{
    public function execute(string $userId): ?MahasiswaDto;
}
