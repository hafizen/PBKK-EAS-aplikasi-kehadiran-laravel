<?php

namespace App\Infrastructure\Query\PostgreSQL;

use App\Application\Query\DaftarPertemuan\PertemuanDto;
use App\Application\Query\DaftarPertemuan\DaftarPertemuanQueryInterface;
use DateTime;
use Illuminate\Support\Facades\DB;

class DaftarPertemuanQuery implements DaftarPertemuanQueryInterface
{

    public function execute(string $kelasId): array
    {
        $sql = "SELECT t.id_pertemuan_kuliah, r.kode as ruangan, t.pertemuan_ke, 
                t.tgl_kuliah, t.jam_mulai, t.jam_selesai, t.bentuk_tm,
                t.topik_kuliah,  t.topik_kuliah_en, t.status_pertemuan, 
                d.nama as nama_dosen, r.id_ruangan
                FROM pertemuan_kuliah t
                LEFT JOIN kehadiran_dosen h ON h.id_pertemuan_kuliah = t.id_pertemuan_kuliah
                LEFT JOIN dosen d ON d.id_dosen = h.id_dosen
                LEFT JOIN ruangan r ON r.id_ruangan = t.id_ruangan
                WHERE t.id_kelas = :id_kelas
                ORDER BY t.pertemuan_ke";

        $result = DB::select($sql, [
            'id_kelas' => $kelasId,
        ]);

        $list_pertemuan = array();

        foreach ($result as $pertemuan) {
            $list_pertemuan[] = new PertemuanDto(
                pertemuan_id: $pertemuan->id_pertemuan_kuliah,
                urutan: $pertemuan->pertemuan_ke,
                tanggal: $pertemuan->tgl_kuliah,
                jam_mulai: date_format(new DateTime($pertemuan->jam_mulai), "H:i"),
                jam_selesai: date_format(new DateTime($pertemuan->jam_selesai), "H:i"),
                ruangan: $pertemuan->ruangan,
                pengajar: $pertemuan->nama_dosen == null ? '-' : $pertemuan->nama_dosen,
                status: $pertemuan->status_pertemuan,
                topik_kuliah: $pertemuan->topik_kuliah,
                topik_kuliah_en: $pertemuan->topik_kuliah_en,
                bentuk_pertemuan: $pertemuan->bentuk_tm
            );
        }

        return $list_pertemuan;
    }
}
