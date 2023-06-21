<?php

namespace App\Http\Controllers;

use App\Application\Query\Kelas\KelasQueryInterface;
use App\Application\Query\DaftarPertemuan\DaftarPertemuanQueryInterface;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{

    public function __construct(
        private KelasQueryInterface $kelasQuery,
        private DaftarPertemuanQueryInterface $pertemuanQuery
    ) {
    }

    public function get($id)
    {
        $user = auth()->user();

        $kelas = $this->kelasQuery->execute(kelasId: $id);

        $list_pertemuan = $this->pertemuanQuery->execute(kelasId: $id);

        if ($user->group == 'mahasiswa') {
            return view('kelas.mahasiswa', [
                'kelas' => $kelas,
                'list_pertemuan' => $list_pertemuan
            ]);
        }

        return view('kelas.dosen', [
            'kelas' => $kelas,
            'list_pertemuan' => $list_pertemuan
        ]);
    }
}
