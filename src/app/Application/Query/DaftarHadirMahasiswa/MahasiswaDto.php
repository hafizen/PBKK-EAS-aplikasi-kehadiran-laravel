<?php

namespace App\Application\Query\DaftarHadirMahasiswa;

class MahasiswaDto
{
    public function __construct(
        public string $nrp,
        public string $nama,
        public string $id_mhs,
        public string $id_kelas,
        public ?string $jenis_kehadiran = null,
        public ?string $jam_catat = null,
        public ?string $pencatat = null,
    )
    { }
    
}