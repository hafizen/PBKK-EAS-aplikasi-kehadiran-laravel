<?php

namespace App\Infrastructure\Query\PostgreSQL;

use App\Application\Query\Dosen\DosenDto;
use App\Application\Query\Dosen\DosenQueryInterface;
use Illuminate\Support\Facades\DB;

class DosenQuery implements DosenQueryInterface
{

    /**
     * @param string $user_id 
     * @return DosenDto 
     */
    public function execute(string $user_id): ?DosenDto
    {
        $sql = "SELECT d.id_dosen, d.nama
                FROM dosen d
                WHERE d.id_user_sso = :id_user AND d.deleted_at IS NULL";

        $result = DB::select($sql, [
            'id_user' => $user_id
        ]);

        if ($result) {
            return new DosenDto(
                dosen_id: $result[0]->id_dosen,
                nama: $result[0]->nama
            );
        }

        return null;
    }
}
