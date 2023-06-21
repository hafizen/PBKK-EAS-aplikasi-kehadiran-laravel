<?php

declare(strict_types=1);

namespace App\Core\Models\Dosen;

class Dosen
{
    private DosenId $id;
    private string $nama;

    public function __construct(
        DosenId $id,
        string $nama,
    ) {
        $this->id = $id;
        $this->nama = $nama;
    }

    public function getId(): DosenId
    {
        return $this->id;
    }

    public function getNama(): string
    {
        return $this->nama;
    }
}
