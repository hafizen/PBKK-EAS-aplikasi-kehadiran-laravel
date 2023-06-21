<?php

namespace App\Infrastructure\Repository\PostgreSQL;

use App\Core\Models\Dosen\Dosen;
use App\Core\Models\Dosen\DosenId;
use App\Core\Repository\DosenRepositoryInterface;
use Illuminate\Support\Facades\DB;

class DosenRepository implements DosenRepositoryInterface
{
    public function byId(DosenId $id): ?Dosen {
        $script = "SELECT d.id_dosen, d.nama FROM dosen AS d WHERE d.id_dosen = :id_dosen";

        $hasilQuery = DB::select($script, [
            "id_dosen" => $id->id()
        ]);

        if (count($hasilQuery) == 0) {
            return null;
        }
        return new Dosen(new DosenId($hasilQuery[0]->id_dosen), $hasilQuery[0]->nama);
    }
}
