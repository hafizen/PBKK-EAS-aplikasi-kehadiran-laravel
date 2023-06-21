<?php

namespace App\Application\Query\DaftarHadirMahasiswa;

interface DaftarHadirMahasiswaQueryInterface
{
    public function execute(string $pertemuanId) : array;
}