<?php

namespace App\Infrastructure\Repository\PostgreSQL;

use App\Core\Models\Kelas\Kelas;
use App\Core\Models\Kelas\KelasId;
use App\Core\Models\Pertemuan\JadwalPertemuan;
use App\Core\Models\Pertemuan\KodePresensi;
use App\Core\Models\Pertemuan\ModePertemuan;
use App\Core\Models\Pertemuan\Pertemuan;
use App\Core\Models\Pertemuan\PertemuanId;
use App\Core\Models\Pertemuan\RuanganId;
use App\Core\Models\Pertemuan\StatusPertemuan;
use App\Core\Models\Pertemuan\TopikPerkuliahan;
use App\Core\Models\Pertemuan\UrutanPertemuan;
use App\Core\Repository\KelasRepositoryInterface;
use App\Core\Repository\PertemuanRepositoryInterface;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;

class PertemuanRepository implements PertemuanRepositoryInterface
{
    private KelasRepositoryInterface $kelas_repository;

    /**
     * @param KelasRepositoryInterface $kelas_repository
     */
    public function __construct(KelasRepositoryInterface $kelas_repository)
    {
        $this->kelas_repository = $kelas_repository;
    }

    public function byId(PertemuanId $id): ?Pertemuan
    {
        $row = DB::table('pertemuan_kuliah')->where('id_pertemuan_kuliah', $id->id())
            ->first();

        if (!$row) return null;
        $kelas = $this->kelas_repository->byId(new KelasId($row->id_kelas));
        if (!$kelas) return null;
        
        return new Pertemuan(
            new PertemuanId($row->id_pertemuan_kuliah),
            $kelas,
            new UrutanPertemuan($row->pertemuan_ke),
            $row->id_ruangan ? new RuanganId($row->id_ruangan) : null,
            new JadwalPertemuan(
                new DateTime($row->tgl_kuliah, new DateTimeZone("Asia/Jakarta")),
                new DateTime($row->jam_mulai, new DateTimeZone("Asia/Jakarta")),
                new DateTime($row->jam_selesai, new DateTimeZone("Asia/Jakarta")),
            ),
            $row->topik_kuliah ? new TopikPerkuliahan($row->topik_kuliah, $row->topik_kuliah_en) : null,
            new ModePertemuan($row->bentuk_tm),
            new StatusPertemuan($row->status_pertemuan),
            $row->kode_akses ? new KodePresensi($row->kode_akses, new DateTime($row->berlaku_sampai, new DateTimeZone("Asia/Jakarta"))) : null
        );
    }

    public function byKelasId(KelasId $kelasId): array
    {
        $sql = "SELECT p.id_pertemuan_kuliah, p.id_kelas, k.rencana_tm, k.is_nilai_final, p.id_ruangan,
                        p.pertemuan_ke, p.tgl_kuliah, p.jam_mulai, p.jam_selesai, p.topik_kuliah, p.topik_kuliah_en,
                        p.bentuk_tm, p.kode_akses, p.berlaku_sampai, p.status_pertemuan
                FROM pertemuan_kuliah p
                INNER JOIN kelas k ON k.id_kelas = p.id_kelas
                WHERE p.id_kelas = :id_kelas AND p.deleted_at IS NULL AND k.deleted_at IS NULL";

        $result = DB::select($sql, [
            'id_kelas' => $kelasId->id()
        ]);

        $list = array();

        foreach ($result as $pertemuan) {
            $list[] = new Pertemuan(
                id: new PertemuanId($pertemuan->id_pertemuan_kuliah),
                kelas: new Kelas(
                    id: new KelasId($pertemuan->id_kelas),
                    rencanaPertemuan: $pertemuan->rencana_tm,
                    permanen: $pertemuan->is_nilai_final
                ),
                pertemuanKe: new UrutanPertemuan($pertemuan->pertemuan_ke),
                ruanganId: $pertemuan->id_ruangan ? new RuanganId($pertemuan->id_ruangan) : null,
                jadwal: new JadwalPertemuan(
                    $pertemuan->tgl_kuliah ? new DateTime($pertemuan->tgl_kuliah) : null,
                    $pertemuan->jam_mulai ? new DateTime($pertemuan->jam_mulai) : null,
                    $pertemuan->jam_selesai ? new DateTime($pertemuan->jam_selesai) : null
                ),
                topik: new TopikPerkuliahan(
                    $pertemuan->topik_kuliah,
                    $pertemuan->topik_kuliah_en
                ),
                mode: new ModePertemuan($pertemuan->bentuk_tm),
                status: new StatusPertemuan($pertemuan->status_pertemuan),
                kodePresensi: $pertemuan->kode_akses ? new KodePresensi(
                    kode: $pertemuan->kode_akses,
                    berlakuSampai: $pertemuan->berlaku_sampai ? new DateTime($pertemuan->berlaku_sampai) : null
                ) : null
            );
        }

        return $list;
    }

    public function save(Pertemuan $pertemuan): void
    {
        $payload = $this->constructPayloadWithoutIdAndTime($pertemuan);
        $payload['id_pertemuan_kuliah'] = $pertemuan->getId()->id();
        $payload['created_at'] = new DateTime('now', new DateTimeZone("Asia/Jakarta"));
        DB::table('pertemuan_kuliah')->insert($payload);
    }

    public function update(Pertemuan $pertemuan): void
    {
        $payload = $this->constructPayloadWithoutIdAndTime($pertemuan);
        $payload['updated_at'] = new DateTime('now', new DateTimeZone("Asia/Jakarta"));
        DB::table('pertemuan_kuliah')
            ->where('id_pertemuan_kuliah', $pertemuan->getId()->id())
            ->update($payload);
    }

    private function constructPayloadWithoutIdAndTime(Pertemuan $pertemuan)
    {
        return [
            "id_ruangan" => $pertemuan->getRuanganId()?->id(),
            "id_kelas" => $pertemuan->getKelas()->getId()->id(),
            "pertemuan_ke" => $pertemuan->getPertemuanKe()->getUrutan(),
            "tgl_kuliah" => $pertemuan->getJadwal()->getTanggal()->format("Y-m-d H:i:s"),
            "jam_mulai" => $pertemuan->getJadwal()->getJamMulai()->format("Y-m-d H:i:s"),
            "jam_selesai" => $pertemuan->getJadwal()->getJamSelesai()->format("Y-m-d H:i:s"),
            "topik_kuliah" => $pertemuan->getTopik()->getDeskripsi(),
            "topik_kuliah_en" => $pertemuan->getTopik()->getDeskripsi("en"),
            "is_online" => $pertemuan->getMode()->isOnline(),
            "kode_akses" => $pertemuan->getKodePresensi()?->getKode(),
            "berlaku_sampai" => $pertemuan->getKodePresensi()?->getBerlakuSampai()->format("Y-m-d H:i:s"),
            "bentuk_tm" => $pertemuan->getMode()->getMode(),
            "status_pertemuan" => $pertemuan->getStatus()->getStatus(),
        ];
    }
}
