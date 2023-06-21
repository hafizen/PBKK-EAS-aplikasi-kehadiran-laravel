<?php

namespace App\Application\Query\Dosen;

interface DosenQueryInterface
{
    public function execute(string $userId) : ?DosenDto;
}