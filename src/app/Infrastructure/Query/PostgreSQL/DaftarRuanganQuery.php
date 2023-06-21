<?php

namespace App\Infrastructure\Query\PostgreSQL;

use App\Application\Query\DaftarRuangan\DaftarRuanganQueryInterface;
use App\Application\Query\DaftarRuangan\RuanganDto;
use Illuminate\Support\Facades\DB;

class DaftarRuanganQuery implements DaftarRuanganQueryInterface
{

    /**
     * @return array 
     */
    public function execute(): array
    {
        $result = DB::table('ruangan')
            ->select(['id_ruangan', 'kode'])
            ->orderBy('kode')
            ->get();

        $list_ruangan = array();

        foreach ($result as $ruangan) {
            $list_ruangan[] = new RuanganDto(
                ruangan_id: $ruangan->id_ruangan,
                kode: $ruangan->kode,
            );
        }

        return $list_ruangan;
    }
}
