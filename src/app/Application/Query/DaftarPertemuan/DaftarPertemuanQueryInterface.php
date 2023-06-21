<?php

namespace App\Application\Query\DaftarPertemuan;

interface DaftarPertemuanQueryInterface
{
    /**
     * @param string $kelasId
     * @return PertemuanDto[]
     */
    public function execute(string $kelasId) : array;
}
