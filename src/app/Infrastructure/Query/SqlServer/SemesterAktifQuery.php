<?php

namespace App\Infrastructure\Query\SqlServer;

use App\Application\Query\SemesterAktif\SemesterAktifDto;
use App\Application\Query\SemesterAktif\SemesterAktifQueryInterface;
use Illuminate\Support\Facades\DB;

class SemesterAktifQuery implements SemesterAktifQueryInterface
{
    public function execute() : SemesterAktifDto
    {
        $sql = "SELECT s.id_semester, s.nama, s.nama_en
                FROM semester s
                WHERE s.is_smt_aktif = 1";

        $result = DB::select($sql, []);

        return new SemesterAktifDto(
            semester_id: $result[0]->id_semester,
            nama: $result[0]->nama
        );
    }
}
