<?php

declare(strict_types=1);

namespace App\Core\Models\Pertemuan;

use App\Core\Exception\TopikPerkuliahanException;

class TopikPerkuliahan
{
    private ?string $deskripsi;
    private ?string $deskripsiEn;

    public function __construct(?string $deskripsi, ?string $deskripsiEn)
    {
        $defaultDeskripsiEn = "-";

        if(!$deskripsiEn) {
            $deskripsiEn = $defaultDeskripsiEn;
        }

        $this->deskripsi = $deskripsi;
        $this->deskripsiEn = $deskripsiEn;
    }

    public function getDeskripsi(string $lang = 'id') : ?string
    {
        return $lang == 'en' ? $this->deskripsiEn : $this->deskripsi;
    }
}
