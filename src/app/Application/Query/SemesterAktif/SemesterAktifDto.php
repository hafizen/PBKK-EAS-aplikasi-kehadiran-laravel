<?php

namespace App\Application\Query\SemesterAktif;

class SemesterAktifDto
{
    public function __construct(
        public int $semester_id,
        public string $nama
    )
    { }
}