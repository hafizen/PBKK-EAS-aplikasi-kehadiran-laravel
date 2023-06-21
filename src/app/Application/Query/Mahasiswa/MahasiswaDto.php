<?php

namespace App\Application\Query\Mahasiswa;

class MahasiswaDto
{
    public function __construct(
        public string $mhs_id,
        public string $nama
    ) {
    }
}
