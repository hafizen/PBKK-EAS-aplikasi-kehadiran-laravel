<?php

namespace App\Infrastructure\Repository\PostgreSQL;

use App\Core\Models\Kelas\Kelas;
use App\Core\Models\Kelas\KelasId;
use App\Core\Repository\KelasRepositoryInterface;
use Illuminate\Support\Facades\DB;

class KelasRepository implements KelasRepositoryInterface
{

    public function byId(KelasId $id): ?Kelas
    {
        $row = DB::table('kelas')->where('id_kelas', $id->id())->first();
        if (!$row) return null;
        return new Kelas(
            new KelasId($row->id_kelas),
            $row->rencana_tm,
            $row->is_nilai_final
        );
    }
}
