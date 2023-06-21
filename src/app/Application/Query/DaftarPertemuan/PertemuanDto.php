<?php

namespace App\Application\Query\DaftarPertemuan;

class PertemuanDto
{
    public function __construct(
        public string $pertemuan_id,
        public int $urutan,
        public string $tanggal,
        public string $jam_mulai,
        public string $jam_selesai,
        public ?string $ruangan,
        public ?string $pengajar,
        private string $status,
        public ?string $topik_kuliah,
        public ?string $topik_kuliah_en,
        public ?string $bentuk_pertemuan,
        public ?string $ruangan_id = NULL,
    ) {
    }

    public function getStatusPertemuan(): string
    {
        switch ($this->status) {
            case 1:
                return "Belum dimulai";
            case 2:
                return "Sedang berlangsung";
            case 3:
                return "Selesai";
            case 4:
                return "Terlewati/lupa presensi";
            default:
                return "Invalid status";
        }
    }
}
