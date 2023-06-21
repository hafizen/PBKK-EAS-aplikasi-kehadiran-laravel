<?php

namespace App\Http\Controllers;

use App\Application\Query\KodePresensi\KodePresensiQueryInterface;

class KodePresensiController extends Controller
{
    public function __construct(
        private KodePresensiQueryInterface $kodePresensiQuery
    )
    {
        
    }

    public function index($pertemuanId)
    {
        $kode_presensi = $this->kodePresensiQuery->execute($pertemuanId);
        return view('pertemuan.kode_presensi', [
            'id_pertemuan' => $pertemuanId,
            'kode_presensi' => $kode_presensi
        ]);
    }
}
