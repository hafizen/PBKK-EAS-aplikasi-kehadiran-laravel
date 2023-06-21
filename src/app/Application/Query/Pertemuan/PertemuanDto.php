<?php

namespace App\Application\Query\Pertemuan;

use Carbon\CarbonImmutable;
use DateTime;

class PertemuanDto
{
    private const JEDA_PRESENSI = '30';

    public string $pertemuan_id;
    public string $kelas_id;
    public bool $is_permanen;
    public int $urutan;
    public string $kode_mk;
    public string $nama_mk;
    public string $nama_kelas;
    public ?string $ruangan_id;
    public string $tanggal;
    public ?string $jam_mulai;
    public ?string $jam_selesai;
    public ?string $nama_pengajar;
    public ?string $topik_kuliah;
    public ?string $topik_kuliah_en;
    public ?string $mode_pertemuan;
    public ?string $bentuk_kehadiran;
    public string $status_pertemuan;
    public string $jam_boleh_mulai;
    public bool $is_boleh_mulai_pertemuan;
    public bool $is_kode_presensi_berlaku_sampai_akhir;
    public bool $is_terlewat;
    public ?string $jam_mulai_mengajar;
    public ?string $jam_selesai_mengajar;

    public function __construct(
        string $pertemuanId,
        string $kelasId,
        bool $permanen,
        int $urutan,
        string $kodeMk,
        string $namaMk,
        string $namaKelas,
        ?string $ruanganId,
        DateTime $tanggal,
        ?DateTime $jamMulai,
        ?DateTime $jamSelesai,
        ?string $namaPengajar,
        ?string $topikKuliah,
        ?string $topikKuliahEn,
        ?string $modePertemuan,
        ?string $bentukKehadiran,
        string $statusPertemuan,
        ?DateTime $masaBerlakuKodePresensi,
        ?DateTime $jamMulaiMengajar,
        ?DateTime $jamSelesaiMengajar
    ) {
        $this->pertemuan_id = $pertemuanId;
        $this->kelas_id = $kelasId;
        $this->is_permanen = $permanen;
        $this->urutan = $urutan;
        $this->kode_mk = $kodeMk;
        $this->nama_mk = $namaMk;
        $this->nama_kelas = $namaKelas;
        $this->ruangan_id = $ruanganId;
        $this->tanggal = date_format($tanggal, "d-m-Y");
        $this->jam_mulai = $jamMulai ? CarbonImmutable::instance($jamMulai)->locale('id')->isoFormat('HH:mm') : null;
        $this->jam_selesai = $jamSelesai ? CarbonImmutable::instance($jamSelesai)->locale('id')->isoFormat('HH:mm z') : null;
        $this->nama_pengajar = $namaPengajar;
        $this->topik_kuliah = $topikKuliah;
        $this->topik_kuliah_en = $topikKuliahEn;
        $this->mode_pertemuan = $modePertemuan;
        $this->bentuk_kehadiran = $bentukKehadiran;
        $this->status_pertemuan = $statusPertemuan;

        $jeda = new \DateInterval('PT' . self::JEDA_PRESENSI . 'M');
        $jamBolehMulai = $jamMulai->sub($jeda);
        $this->jam_boleh_mulai = CarbonImmutable::instance($jamBolehMulai)
            ->locale('id')
            ->isoFormat('dddd, D MMMM YYYY HH:mm z');

        $sekarang = new DateTime('now');
        // $this->is_boleh_mulai_pertemuan = ($sekarang >= $jamBolehMulai && $sekarang <= $jamSelesai) ? true : false;
        $this->is_boleh_mulai_pertemuan = true;
        $this->is_terlewat = ($sekarang > $jamSelesai && ($statusPertemuan == 1 || $statusPertemuan == 4)) ? true : false;

        $this->is_kode_presensi_berlaku_sampai_akhir = $masaBerlakuKodePresensi ? false : true;

        if ($jamMulaiMengajar) {
            $this->jam_mulai_mengajar = CarbonImmutable::instance($jamMulaiMengajar)
                ->locale('id')
                ->isoFormat('D MMMM YYYY HH:mm z');
        }

        if ($jamSelesaiMengajar) {
            $this->jam_selesai_mengajar = CarbonImmutable::instance($jamSelesaiMengajar)
                ->locale('id')
                ->isoFormat('HH:mm z');
        }
    }
}
