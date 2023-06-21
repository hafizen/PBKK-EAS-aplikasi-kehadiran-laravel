<?php

namespace App\Infrastructure\Repository\PostgreSQL;

use App\Core\Models\Dosen\DosenId;
use App\Core\Models\Pertemuan\BentukKehadiran;
use App\Core\Models\Pertemuan\KehadiranDosen;
use App\Core\Models\Pertemuan\KehadiranDosenId;
use App\Core\Models\Pertemuan\PertemuanId;
use App\Core\Repository\KehadiranDosenRepositoryInterface;
use DateTime;
use Illuminate\Support\Facades\DB;

class KehadiranDosenRepository implements KehadiranDosenRepositoryInterface
{
    public function byId(KehadiranDosenId $kehadiranDosenId): ?KehadiranDosen {
        $script = "SELECT kd.id_pertemuan_kuliah, kd.id_dosen, kd.jam_mulai, kd.jam_selesai, kd.is_lupa_presensi, kd.bentuk_hadir FROM kehadiran_dosen AS kd 
            WHERE kd.id_pertemuan_kuliah = :id_pertemuan_kuliah AND kd.id_dosen = :id_dosen";
        
        $hasilQuery = DB::select($script, [
            "id_pertemuan_kuliah" => $kehadiranDosenId->pertemuanId()->id(),
            "id_dosen" => $kehadiranDosenId->dosenId()->id()
        ]);
        
        if (count($hasilQuery) == 0) {
            return null;
        }

        return new KehadiranDosen(
            new KehadiranDosenId(
                new PertemuanId($hasilQuery[0]->id_pertemuan_kuliah), new DosenId($hasilQuery[0]->id_dosen)
            ),
            new DateTime($hasilQuery[0]->jam_mulai), 
            $hasilQuery[0]->jam_selesai == null ? null : new DateTime($hasilQuery[0]->jam_selesai),
            $hasilQuery[0]->is_lupa_presensi == 1,
            $hasilQuery[0]->bentuk_hadir == null ? null : new BentukKehadiran($hasilQuery[0]->bentuk_hadir)
        );
    }

    public function byPertemuanId(PertemuanId $pertemuanId): ?KehadiranDosen {
        $script = "SELECT kd.id_pertemuan_kuliah, kd.id_dosen, kd.jam_mulai, kd.jam_selesai, kd.is_lupa_presensi, kd.bentuk_hadir FROM kehadiran_dosen AS kd 
            WHERE kd.id_pertemuan_kuliah = :id_pertemuan_kuliah";
        
        $hasilQuery = DB::select($script, [
            "id_pertemuan_kuliah" => $pertemuanId->id(),
        ]);
        
        if (count($hasilQuery) == 0) {
            return null;
        }

        return new KehadiranDosen(
            new KehadiranDosenId(
                new PertemuanId($hasilQuery[0]->id_pertemuan_kuliah), new DosenId($hasilQuery[0]->id_dosen)
            ),
            new DateTime($hasilQuery[0]->jam_mulai), 
            $hasilQuery[0]->jam_selesai == null ? null : new DateTime($hasilQuery[0]->jam_selesai),
            $hasilQuery[0]->is_lupa_presensi == 1,
            $hasilQuery[0]->bentuk_hadir == null ? null : new BentukKehadiran($hasilQuery[0]->bentuk_hadir)
        );
    }

    public function save(KehadiranDosen $kehadiranDosen): void {
        $dataBaru = $this->constructPayload($kehadiranDosen);

        DB::table("kehadiran_dosen")->insert($dataBaru);
    }

    public function update(KehadiranDosen $kehadiranDosen): void {
        $dataBaru = $this->constructPayload($kehadiranDosen);
        DB::table('kehadiran_dosen')
            ->where([
                ['id_pertemuan_kuliah', "=", $kehadiranDosen->getId()->pertemuanId()->id()],
                ['id_dosen', "=", $kehadiranDosen->getId()->dosenId()->id()]
            ])
            ->update($dataBaru);
    }

    private function constructPayload(KehadiranDosen $kehadiranDosen)
    {
        return [
            "id_pertemuan_kuliah" => $kehadiranDosen->getId()->pertemuanId()->id(),
            "id_dosen" => $kehadiranDosen->getId()->dosenId()->id(),
            "jam_mulai" => $kehadiranDosen->getJamMulai()->format("Y-m-d H:i:s"),
            "jam_selesai" => $kehadiranDosen->getJamSelesai() == null ? null : $kehadiranDosen->getJamSelesai()->format("Y-m-d H:i:s"),
            "is_lupa_presensi" => $kehadiranDosen->isLupaPresensi(),
            "bentuk_hadir" => $kehadiranDosen->getBentukHadir()->getKehadiran()
        ];
    }
}
