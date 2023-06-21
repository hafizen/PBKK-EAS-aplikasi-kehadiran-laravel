<?php

namespace App\Core\Models\Pertemuan;

use App\Core\Exception\PertemuanException;
use App\Core\Models\Kelas\Kelas;
use DateTime;

class Pertemuan
{
    private const JEDA_PRESENSI = '30';
    private const MINIMAL_MASA_BERLAKU_KODE_PRESENSI = '15';

    private PertemuanId $id;
    private Kelas $kelas;
    private UrutanPertemuan $pertemuanKe;
    private ?RuanganId $ruanganId;
    private JadwalPertemuan $jadwal;
    private ?TopikPerkuliahan $topik;
    private ModePertemuan $mode;
    private StatusPertemuan $status;
    private ?KodePresensi $kodePresensi;

    /**
     * @param PertemuanId $id
     * @param Kelas $kelas
     * @param UrutanPertemuan $urutan_pertemuan
     * @param RuanganId|null $ruangan_id
     * @param JadwalPertemuan $jadwal_pertemuan
     * @param TopikPerkuliahan|null $topik_perkuliahan
     * @param ModePertemuan $mode_pertemuan
     * @param StatusPertemuan|null $status_pertemuan
     * @param KodePresensi|null $kode_presensi
     */
    public function __construct(
        PertemuanId $id,
        Kelas $kelas,
        UrutanPertemuan $pertemuanKe,
        ?RuanganId $ruanganId = null,
        JadwalPertemuan $jadwal,
        ?TopikPerkuliahan $topik = null,
        ModePertemuan $mode,
        ?StatusPertemuan $status = null,
        ?KodePresensi $kodePresensi = null
    ) {
        $this->id = $id;
        $this->kelas = $kelas;
        $this->pertemuanKe = $pertemuanKe;
        $this->ruanganId = $ruanganId;
        $this->jadwal = $jadwal;
        $this->topik = $topik;
        $this->mode = $mode;
        $this->kodePresensi = $kodePresensi;

        if (!$status) {
            $now = new DateTime('now');

            if ($now < $this->jadwal->getJamSelesai() && is_null($this->kodePresensi)) {
                $this->status = StatusPertemuan::belumDimulai();
            } elseif ($now > $this->jadwal->getJamSelesai() && is_null($this->kodePresensi)) {
                $this->status = StatusPertemuan::terlewat();
            } elseif ($now > $this->jadwal->getJamSelesai() && !is_null($this->kodePresensi)) {
                $this->status = StatusPertemuan::selesai();
            } else {
                $this->status = StatusPertemuan::sedangBerlangsung();
            }
        } else {
            $this->status = $status;
        }
    }

    public function ubah(
        UrutanPertemuan $urutan,
        ?RuanganId $ruanganId,
        JadwalPertemuan $jadwal,
        TopikPerkuliahan $topik,
        ModePertemuan $mode
    ): void {
        if ($this->kelas->isPermanen()) {
            throw new PertemuanException('tidak_dapat_mengubah_pertemuan_karena_nilai_sudah_permanen');
        }

        if ($mode->isOffline() && $ruanganId == null) {
            throw new PertemuanException('mode_tatap_muka_offline_harus_memiliki_ruangan');
        }

        if ($mode->isHybrid() && $ruanganId == null) {
            throw new PertemuanException('mode_tatap_muka_hybrid_harus_memiliki_ruangan');
        }

        $this->pertemuanKe = $urutan;
        $this->ruanganId = $ruanganId;
        $this->jadwal = $jadwal;
        $this->topik = $topik;
        $this->mode = $mode;
    }

    public function mulai(
        ModePertemuan $modePertemuan,
        BentukKehadiran $bentukKehadiran,
        ?int $menitBerlaku
    ): void {
        if ($this->kelas->isPermanen()) {
            throw new PertemuanException('tidak_dapat_memulai_pertemuan_karena_nilai_sudah_permanen');
        }

        if (!$this->isBolehMulaiPertemuan()) {
            throw new PertemuanException('pertemuan_belum_boleh_dimulai');
        }

        if ($this->isTerlewat()) {
            throw new PertemuanException('pertemuan_sudah_terlewati');
        }

        if ($modePertemuan->isOnline() && !$bentukKehadiran->isOnline()) {
            throw new PertemuanException('kehadiran_dosen_harus_online_untuk_mode_pertemuan_online');
        }

        if ($modePertemuan->isOffline() && !$bentukKehadiran->isOffline()) {
            throw new PertemuanException('kehadiran_dosen_harus_offline_untuk_mode_pertemuan_offline');
        }

        if ($menitBerlaku && $menitBerlaku < self::MINIMAL_MASA_BERLAKU_KODE_PRESENSI) {
            throw new PertemuanException('menit_berlaku_kode_presensi_tidak_boleh_kurang_dari_'
                . self::MINIMAL_MASA_BERLAKU_KODE_PRESENSI . '_menit');
        }

        $kodePresensiBerlakuSampai = $this->jadwal->getJamSelesai();
        if ($menitBerlaku) {
            $jeda = new \DateInterval('PT' . $menitBerlaku . 'M');
            $jamMulai = $this->jadwal->getJamMulai();
            $kodePresensiBerlakuSampai = $jamMulai->add($jeda);
        }

        $this->kodePresensi = KodePresensi::generate($kodePresensiBerlakuSampai);
        $this->status = StatusPertemuan::sedangBerlangsung();
    }

    public function getId(): PertemuanId
    {
        return $this->id;
    }

    public function getKelas(): Kelas
    {
        return $this->kelas;
    }

    public function getPertemuanKe(): UrutanPertemuan
    {
        return $this->pertemuanKe;
    }

    public function getRuanganId(): ?RuanganId
    {
        return $this->ruanganId;
    }

    public function getJadwal(): JadwalPertemuan
    {
        return $this->jadwal;
    }

    public function getTopik(): ?TopikPerkuliahan
    {
        return $this->topik;
    }

    public function getMode(): ModePertemuan
    {
        return $this->mode;
    }

    public function getStatus(): StatusPertemuan
    {
        return $this->status;
    }

    public function getKodePresensi(): ?KodePresensi
    {
        return $this->kodePresensi;
    }

    private function isBolehMulaiPertemuan(): bool
    {
        $jeda = new \DateInterval('PT' . self::JEDA_PRESENSI . 'M');
        $jamMulai = $this->jadwal->getJamMulai();
        $jamAwalDiperbolehkan = $jamMulai->sub($jeda);
        $sekarang = new DateTime('now');

        if ($sekarang >= $jamAwalDiperbolehkan) {
            return true;
        }

        return false;
    }

    private function isTerlewat(): bool
    {
        $jamSelesai = $this->jadwal->getJamSelesai();
        $sekarang = new DateTime('now');

        if ($sekarang > $jamSelesai) {
            return true;
        }

        return false;
    }

    public function gantiKodePresensi(): void
    {
        if ($this->kelas->isPermanen()) {
            throw new PertemuanException('tidak_dapat_mengubah_kode_presensi_karena_nilai_sudah_permanen');
        }

        if (!$this->status->isSedangBerlangsung()) {
            throw new PertemuanException('tidak_dapat_mengubah_kode_presensi_jika_pertemuan_belum_berlangsung');
        }

        if (!$this->kodePresensi) {
            throw new PertemuanException('pertemuan_belum_dimulai_sehingga_kode_presensi_tidak_ditemukan');
        }

        $this->kodePresensi = $this->kodePresensi->gantiKode();
    }

    public function akhiri(): void
    {
        if ($this->kelas->isPermanen()) {
            throw new PertemuanException('tidak_dapat_mengakhiri_pertemuan_karena_nilai_sudah_permanen');
        }

        if ($this->status->isBelumDimulai()) {
            throw new PertemuanException('tidak_dapat_mengakhiri_pertemuan_yang_belum_dimulai');
        }

        if ($this->status->isTerlewat()) {
            throw new PertemuanException('tidak_dapat_mengakhiri_pertemuan_yang_terlewat');
        }

        $this->status = StatusPertemuan::selesai();
    }
}
