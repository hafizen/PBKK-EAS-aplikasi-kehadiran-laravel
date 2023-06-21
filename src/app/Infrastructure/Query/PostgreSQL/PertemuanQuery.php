<?php

namespace App\Infrastructure\Query\PostgreSQL;

use App\Application\Query\Pertemuan\PertemuanDto;
use App\Application\Query\Pertemuan\PertemuanQueryInterface;
use Carbon\CarbonImmutable;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;

class PertemuanQuery implements PertemuanQueryInterface
{

    public function execute(string $pertemuanId): ?PertemuanDto
    {
        $sql = "SELECT t.id_pertemuan_kuliah, r.kode as ruangan, t.pertemuan_ke, t.tgl_kuliah,
                t.jam_mulai, t.jam_selesai, t.id_ruangan, t.topik_kuliah, t.topik_kuliah_en, d.nama as nama_dosen,
                mk.kode_mk, mk.nama AS nama_mk, k.id_kelas, k.nama AS nama_kelas, k.is_nilai_final, t.bentuk_tm, t.status_pertemuan,
                h.bentuk_hadir AS bentuk_hadir_dosen, h.is_lupa_presensi, t.berlaku_sampai,
                h.jam_mulai AS jam_mulai_mengajar, h.jam_selesai AS jam_selesai_mengajar, h.id_dosen
                FROM pertemuan_kuliah t
                LEFT JOIN kehadiran_dosen h ON h.id_pertemuan_kuliah = t.id_pertemuan_kuliah
                LEFT JOIN dosen d ON d.id_dosen = h.id_dosen
                LEFT JOIN ruangan r ON r.id_ruangan = t.id_ruangan
                INNER JOIN kelas k ON k.id_kelas = t.id_kelas
                INNER JOIN mata_kuliah mk on mk.id_mk = k.id_mk
                WHERE t.id_pertemuan_kuliah = :pertemuan_id
                ORDER BY t.pertemuan_ke";

        $pertemuan = DB::selectOne($sql, [
            'pertemuan_id' => $pertemuanId
        ]);

        if (empty($pertemuan)) {
            return null;
        }

        return new PertemuanDto(
            pertemuanId: $pertemuan->id_pertemuan_kuliah,
            kodeMk: $pertemuan->kode_mk,
            namaMk: $pertemuan->nama_mk,
            kelasId: $pertemuan->id_kelas,
            permanen: boolval($pertemuan->is_nilai_final),
            namaKelas: $pertemuan->nama_kelas,
            urutan: $pertemuan->pertemuan_ke,
            tanggal: new DateTime($pertemuan->tgl_kuliah),
            jamMulai: $pertemuan->jam_mulai ? new DateTime($pertemuan->jam_mulai) : null,
            jamSelesai: $pertemuan->jam_selesai ? new DateTime($pertemuan->jam_selesai) : null,
            ruanganId: $pertemuan->id_ruangan,
            namaPengajar: $pertemuan->nama_dosen,
            topikKuliah: $pertemuan->topik_kuliah,
            topikKuliahEn: $pertemuan->topik_kuliah_en,
            modePertemuan: $pertemuan->bentuk_tm,
            statusPertemuan: $pertemuan->status_pertemuan,
            bentukKehadiran: $pertemuan->bentuk_hadir_dosen,
            masaBerlakuKodePresensi: $pertemuan->berlaku_sampai ? new DateTime($pertemuan->berlaku_sampai) : null,
            jamMulaiMengajar: $pertemuan->jam_mulai_mengajar ? new DateTime($pertemuan->jam_mulai_mengajar) : null,
            jamSelesaiMengajar: $pertemuan->jam_selesai_mengajar ? new DateTime($pertemuan->jam_selesai_mengajar) : null,
        );
    }
}
