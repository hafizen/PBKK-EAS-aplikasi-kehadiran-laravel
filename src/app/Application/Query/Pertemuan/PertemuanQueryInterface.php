<?php

namespace App\Application\Query\Pertemuan;

interface PertemuanQueryInterface
{
    public function execute(string $pertemuanId) : ?PertemuanDto;
}