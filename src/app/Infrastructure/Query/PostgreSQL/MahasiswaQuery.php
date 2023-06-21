<?php

namespace App\Infrastructure\Query\PostgreSQL;

use App\Application\Query\Mahasiswa\MahasiswaDto;
use App\Application\Query\Mahasiswa\MahasiswaQueryInterface;
use Illuminate\Support\Facades\DB;

class MahasiswaQuery implements MahasiswaQueryInterface
{
    public function execute(string $userId): ?MahasiswaDto
    {
        $sql = "SELECT m.id_mhs, m.nama
                FROM mahasiswa m
                WHERE m.id_user_sso = :id_user AND m.deleted_at IS NULL";

        $result = DB::select($sql, [
            'id_user' => $userId
        ]);

        if ($result) {
            return new MahasiswaDto(
                mhs_id: $result[0]->id_mhs,
                nama: $result[0]->nama
            );
        }
        return null;
    }
}
