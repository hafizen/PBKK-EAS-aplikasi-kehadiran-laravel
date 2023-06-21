<?php

namespace App\Application\Query\Kelas;

interface KelasQueryInterface
{
    public function execute(string $kelasId) : ?KelasDto;
}