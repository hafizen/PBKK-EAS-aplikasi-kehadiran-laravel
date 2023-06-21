<?php

namespace App\Application\Query\DaftarKelasDosen;

interface DaftarKelasDosenQueryInterface
{
    public function execute(string $pengajarId, int $semesterId) : array;
}