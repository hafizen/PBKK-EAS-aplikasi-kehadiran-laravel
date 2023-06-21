<?php

declare(strict_types=1);

namespace App\Core\Models\Pertemuan;

use Ramsey\Uuid\Uuid;

class PertemuanId
{
    private $id;

    public function __construct(string $id = null)
    {
        $this->id = $id ? : Uuid::uuid4()->toString();
    }

    public function id() : string
    {
        return $this->id;
    }

    public function equals(PertemuanId $pertemuanId) : bool
    {
        return $this->id === $pertemuanId->id;
    }
}
