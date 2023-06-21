<?php

namespace App\Application\Query\SemesterAktif;

interface SemesterAktifQueryInterface
{
    public function execute() : SemesterAktifDto;
}