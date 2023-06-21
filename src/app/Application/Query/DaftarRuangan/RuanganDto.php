<?php

namespace App\Application\Query\DaftarRuangan;

class RuanganDto
{
    public function __construct(
        public string $ruangan_id,
        public string $kode
    )
    { }
    
}