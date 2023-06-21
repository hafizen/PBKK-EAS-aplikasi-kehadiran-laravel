<?php

namespace App\Infrastructure\Query\PostgreSQL;

use App\Application\Query\DaftarKelasMahasiswa\DaftarKelasMahasiswaDto;
use App\Application\Query\DaftarKelasMahasiswa\DaftarKelasMahasiswaQueryInterface;
use Illuminate\Support\Facades\DB;

class DaftarKelasMahasiswaQuery implements DaftarKelasMahasiswaQueryInterface
{
    public function execute(string $mahasiswaId, int $semesterId): array
    {
        $sql = "SELECT kls.id_kelas, mk.kode_mk, mk.nama AS nama_mk, kls.nama AS nama_kelas,
                ps.id_prodi, ps.nama AS nama_prodi, r.kode AS ruangan, h.nama AS nama_hari,
                jk.jam_mulai, h.id_hari, jk.jam_selesai
                FROM jadwal_kelas jk
                INNER JOIN kuliah k ON k.id_kelas = jk.id_kelas
                INNER JOIN kelas kls ON kls.id_kelas = jk.id_kelas
                INNER JOIN program_studi ps ON ps.id_prodi = kls.id_prodi
                LEFT JOIN ruangan r ON r.id_ruangan = jk.id_ruangan
                INNER JOIN hari h ON h.id_hari = jk.id_hari
                INNER JOIN mahasiswa mhs ON mhs.id_mhs = k.id_mhs
                INNER JOIN mata_kuliah mk ON mk.id_mk = kls.id_mk
                WHERE mhs.id_mhs = :id_mhs and kls.id_semester = :id_semester";

        $sql .= " ORDER BY h.id_hari, jam_mulai";

        $result = DB::select($sql, [
            'id_semester' => (string)$semesterId,
            'id_mhs' => $mahasiswaId,
        ]);

        $list_kelas = array();

        foreach ($result as $kelas) {
            $list_kelas[] = new DaftarKelasMahasiswaDto(
                kelas_id: $kelas->id_kelas,
                kode_mk: $kelas->kode_mk,
                nama_mk: $kelas->nama_mk,
                nama_kelas: $kelas->nama_kelas,
                prodi: $kelas->nama_prodi,
                ruangan: $kelas->ruangan,
                hari: $kelas->nama_hari,
                jam_mulai: $kelas->jam_mulai,
                jam_selesai: $kelas->jam_selesai
            );
        }

        return $list_kelas;
    }
}
