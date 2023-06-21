<?php

namespace App\Application\Query\Dosen;

class DosenDto
{
    public function __construct(
        public string $dosen_id,
        public string $nama
    )
    { }
    
}