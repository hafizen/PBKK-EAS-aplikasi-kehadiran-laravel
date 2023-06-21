<?php

namespace App\Core\Repository;

use App\Core\Models\Pertemuan\KehadiranDosen;
use App\Core\Models\Pertemuan\KehadiranDosenId;
use App\Core\Models\Pertemuan\PertemuanId;

interface KehadiranDosenRepositoryInterface
{
    public function byId(KehadiranDosenId $kehadiranDosenId): ?KehadiranDosen;
    public function byPertemuanId(PertemuanId $pertemuanId): ?KehadiranDosen;
    public function save(KehadiranDosen $kehadiranDosen): void;
    public function update(KehadiranDosen $kehadiranDosen): void;
}
