<?php

namespace App\Application\Query\KodePresensi;

interface KodePresensiQueryInterface
{
    public function execute(string $pertemuanId) : ?KodePresensiDto;
}