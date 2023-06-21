<?php

declare(strict_types=1);

namespace App\Core\Models\Pertemuan;

class Mahasiswa
{
    private MahasiswaId $id;
    private string $nama;

    public function __construct(
        MahasiswaId $id,
        string $nama
    ) {
        $this->id = $id;
        $this->nama = $nama;
    }

    public function getId(): MahasiswaId
    {
        return $this->id;
    }

    public function getNama(): string
    {
        return $this->nama;
    }
}
