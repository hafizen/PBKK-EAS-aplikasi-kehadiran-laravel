<?php

namespace App\Application\Query\DaftarKelasMahasiswa;

class DaftarKelasMahasiswaDto
{
    public function __construct(
        public string $kelas_id,
        public string $kode_mk,
        public string $nama_mk,
        public string $nama_kelas,
        public string $prodi,
        public string $ruangan,
        public string $hari,
        public string $jam_mulai,
        public string $jam_selesai
    ) {
    }
}
