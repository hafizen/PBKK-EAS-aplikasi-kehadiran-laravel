<?php

namespace App\Infrastructure\Query\PostgreSQL;

use App\Application\Query\Kelas\KelasDto;
use App\Application\Query\Kelas\KelasQueryInterface;
use DateTime;
use Illuminate\Support\Facades\DB;

class KelasQuery implements KelasQueryInterface
{

    public function execute(string $kelasId): ?KelasDto
    {
        $sql = "SELECT k.id_kelas
                    , mk.kode_mk
                    , mk.nama AS nama_mk
                    , k.nama AS nama_kelas
                    , r.kode AS ruangan
                    , h.nama AS hari
                    , jk.jam_mulai
                    , jk.jam_selesai
                FROM kelas k
                INNER JOIN mata_kuliah mk on mk.id_mk = k.id_mk 
                INNER JOIN jadwal_kelas jk on jk.id_kelas = k.id_kelas
                LEFT JOIN ruangan r on r.id_ruangan = jk.id_ruangan
                INNER JOIN hari h on h.id_hari = jk.id_hari
                WHERE k.id_kelas = :kelas_id";

        $kelas = DB::selectOne($sql, [
            'kelas_id' => $kelasId,
        ]);

        if (!$kelas) {
            return null;
        }

        $sql = "SELECT d.nama
                    FROM mengajar m
                    INNER JOIN dosen d on d.id_dosen = m.id_dosen
                    WHERE id_kelas = :kelas_id";

        $pengajar = DB::select($sql, [
            'kelas_id' => $kelas->id_kelas,
        ]);

        return new KelasDto(
            kelas_id: $kelas->id_kelas,
            kode_mk: $kelas->kode_mk,
            nama_mk: $kelas->nama_mk,
            nama_kelas: $kelas->nama_kelas,
            ruangan: $kelas->ruangan,
            hari: $kelas->hari,
            jam_mulai: date_format(new DateTime($kelas->jam_mulai), "H:i"),
            jam_selesai: date_format(new DateTime($kelas->jam_selesai), "H:i"),
            pengajar: $pengajar,
        );
    }
}
