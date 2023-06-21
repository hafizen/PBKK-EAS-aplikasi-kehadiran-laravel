<?php

namespace App\Application\Query\DaftarRuangan;

interface DaftarRuanganQueryInterface
{
    /**
     * @return RuanganDto[]
     */
    public function execute() : array;
}
