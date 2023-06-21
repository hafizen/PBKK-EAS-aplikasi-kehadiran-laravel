<?php

namespace App\Infrastructure\Query\SqlServer;

use App\Application\Query\DaftarHadirMahasiswa\DaftarHadirMahasiswaQueryInterface;
use App\Application\Query\DaftarHadirMahasiswa\MahasiswaDto;
use Illuminate\Support\Facades\DB;

class DaftarHadirMahasiswaQuery implements DaftarHadirMahasiswaQueryInterface
{

    public function execute(string $pertemuanId): array
    {
        $result = DB::table('pertemuan_kuliah', 't')
                ->select(['mahasiswa.nama', 'mahasiswa.id_mhs', 'mahasiswa.nim','t.id_kelas', 'km.jenis_hadir', 'km.jam_catat', 'km.pencatat'])
                ->join('kuliah', 'kuliah.id_kelas', '=', 't.id_kelas')
                ->join('mahasiswa', 'mahasiswa.id_mhs', '=', 'kuliah.id_mhs')
                ->leftJoinSub(
                    DB::table('kehadiran_mahasiswa', 'km')
                        ->select(['km.jenis_hadir', 'km.id_mhs', 'km.jam_catat', 'km.pencatat'])
                        ->where('km.id_pertemuan_kuliah', '=', $pertemuanId),
                    'km',
                    'km.id_mhs',
                    '=',
                    'mahasiswa.id_mhs'
                )
                ->where('t.id_pertemuan_kuliah', '=', $pertemuanId)
                ->orderBy('mahasiswa.nim')
                ->get();

        $daftarMahasiswa = array();

        foreach($result as $mahasiswa) {
            $daftarMahasiswa[] = new MahasiswaDto(
                nrp: $mahasiswa->nim,
                nama: $mahasiswa->nama,
                id_mhs: $mahasiswa->id_mhs,
                id_kelas: $mahasiswa->id_kelas,
                jenis_kehadiran: $mahasiswa->jenis_hadir,
                jam_catat: (
                    $mahasiswa->jam_catat ?
                    \Carbon\CarbonImmutable::parse($mahasiswa->jam_catat)
                                        ->locale('id')
                                        ->setTimezone('Asia/Jakarta')
                                        ->isoFormat('dddd, D MMMM YYYY HH:mm')
                    : null
                ),
                pencatat: $mahasiswa->pencatat,
            );
        }

        return $daftarMahasiswa;
    }

}
