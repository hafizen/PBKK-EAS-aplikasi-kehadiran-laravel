<?php

namespace App\Core\Models\Kelas;

use App\Core\Exception\KelasException;
use App\Core\Models\Pertemuan\JadwalPertemuan;
use App\Core\Models\Pertemuan\ModePertemuan;
use App\Core\Models\Pertemuan\Pertemuan;
use App\Core\Models\Pertemuan\PertemuanId;
use App\Core\Models\Pertemuan\RuanganId;
use App\Core\Models\Pertemuan\TopikPerkuliahan;
use App\Core\Models\Pertemuan\UrutanPertemuan;
use Ramsey\Uuid\Uuid;

class Kelas
{
    private KelasId $id;
    private int $rencanaPertemuan;
    private bool $permanen;

    public function __construct(KelasId $id, int $rencanaPertemuan, bool $permanen)
    {
        $this->id = $id;
        $this->rencanaPertemuan = $rencanaPertemuan;
        $this->permanen = $permanen;
    }

    public function getId(): KelasId
    {
        return $this->id;
    }

    public function getRencanaPertemuan(): int
    {
        return $this->rencanaPertemuan;
    }

    public function isPermanen(): bool
    {
        return $this->permanen;
    }

    public function buatPertemuan(
        UrutanPertemuan $urutan,
        ?RuanganId $ruanganId,
        JadwalPertemuan $jadwal,
        TopikPerkuliahan $topik,
        ModePertemuan $mode
    ): Pertemuan {
        if ($this->rencanaPertemuan <= 0) {
            throw new KelasException('tidak_dapat_buat_pertemuan_baru_karena_belum_ada_rencana_pertemuan');
        }

        if ($this->isPermanen()) {
            throw new KelasException('tidak_dapat_membuat_pertemuan_baru_karena_nilai_sudah_permanen');
        }

        if ($mode->isOffline() && $ruanganId == null) {
            throw new KelasException('mode_tatap_muka_offline_harus_memiliki_ruangan');
        }

        if ($mode->isHybrid() && $ruanganId == null) {
            throw new KelasException('mode_tatap_muka_hybrid_harus_memiliki_ruangan');
        }

        return new Pertemuan(
            id: new PertemuanId(),
            kelas: $this,
            pertemuanKe: $urutan,
            ruanganId: $ruanganId,
            jadwal: $jadwal,
            topik: $topik,
            mode: $mode
        );
    }
}
