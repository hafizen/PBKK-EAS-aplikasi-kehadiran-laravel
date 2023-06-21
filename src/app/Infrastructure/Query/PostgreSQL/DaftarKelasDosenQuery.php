<?php

namespace App\Infrastructure\Query\PostgreSQL;

use App\Application\Query\DaftarKelasDosen\DaftarKelasDosenDto;
use App\Application\Query\DaftarKelasDosen\DaftarKelasDosenQueryInterface;
use DateTime;
use Illuminate\Support\Facades\DB;

class DaftarKelasDosenQuery implements DaftarKelasDosenQueryInterface
{

    public function execute(string $pengajar_id, int $semester_id): array
    {
        $sql = "SELECT k.id_kelas, h.id_hari, h.nama AS nama_hari, h.nama_en AS nama_hari_en,
                jk.jam_mulai, jk.jam_selesai, mk.kode_mk, mk.nama AS nama_mk, mk.nama_en AS nama_mk_en,
                k.nama AS nama_kelas, ps.id_prodi, ps.nama AS nama_prodi, r.kode AS ruangan
                FROM jadwal_kelas jk
                INNER JOIN kelas k ON k.id_kelas = jk.id_kelas
                INNER JOIN mata_kuliah mk ON mk.id_mk = k.id_mk
                INNER JOIN hari h ON h.id_hari = jk.id_hari
                INNER JOIN program_studi ps ON ps.id_prodi = k.id_prodi
                LEFT JOIN ruangan r ON r.id_ruangan = jk.id_ruangan
                INNER JOIN mengajar m ON m.id_kelas = k.id_kelas
                WHERE k.id_semester = :id_semester and m.id_dosen = :id_dosen";

        $sql .= " ORDER BY h.id_hari, jam_mulai";

        $result = DB::select($sql, [
            'id_semester' => (string)$semester_id,
            'id_dosen' => $pengajar_id,
        ]);

        $list_kelas = array();

        foreach ($result as $kelas) {
            $list_kelas[] = new DaftarKelasDosenDto(
                kelas_id: $kelas->id_kelas,
                kode_mk: $kelas->kode_mk,
                nama_mk: $kelas->nama_mk,
                nama_kelas: $kelas->nama_kelas,
                prodi: $kelas->nama_prodi,
                ruangan: $kelas->ruangan,
                hari: $kelas->nama_hari,
                jam_mulai: date_format(new DateTime($kelas->jam_mulai), "H:i"),
                jam_selesai: date_format(new DateTime($kelas->jam_selesai), "H:i")
            );
        }

        return $list_kelas;
    }
}
