<?php

namespace App\Application\Query\Kelas;

class KelasDto
{
    public function __construct(
        public string $kelas_id,
        public string $kode_mk,
        public string $nama_mk,
        public string $nama_kelas,
        public string $ruangan,
        public string $hari,
        public string $jam_mulai,
        public string $jam_selesai,
        public ?array $pengajar
    )
    { }
    
}