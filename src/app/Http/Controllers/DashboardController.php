<?php

namespace App\Http\Controllers;

use App\Application\Query\DaftarKelasDosen\DaftarKelasDosenQueryInterface;
use App\Application\Query\Dosen\DosenQueryInterface;

use App\Application\Query\DaftarKelasMahasiswa\DaftarKelasMahasiswaQueryInterface;
use App\Application\Query\Mahasiswa\MahasiswaQueryInterface;

use App\Application\Query\SemesterAktif\SemesterAktifQueryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(
        private SemesterAktifQueryInterface $semesterAktifQuery,

        // Dosen
        private DosenQueryInterface $dosenQuery,
        private DaftarKelasDosenQueryInterface $daftarKelasDosenQuery,

        // Mahasiswa
        private MahasiswaQueryInterface $mahasiswaQuery,
        private DaftarKelasMahasiswaQueryInterface $daftarKelasMahasiswaQuery
    ) {
    }

    public function index()
    {
        $user = Auth::user();

        $semester_aktif = $this->semesterAktifQuery->execute();
        if ($user->group == 'mahasiswa') {
            $mahasiswa = $this->mahasiswaQuery->execute($user->id_user);
            $list_kelas = $this->daftarKelasMahasiswaQuery->execute($mahasiswa->mhs_id, $semester_aktif->semester_id);
            return view('dashboard.mahasiswa', [
                'semester' => $semester_aktif,
                'mahasiswa' => $mahasiswa,
                'list_kelas' => $list_kelas
            ]);
        } else {
            $dosen = $this->dosenQuery->execute($user->id_user);
            $list_kelas = $this->daftarKelasDosenQuery->execute($dosen->dosen_id, $semester_aktif->semester_id);

            return view('dashboard.dosen', [
                'semester' => $semester_aktif,
                'dosen' => $dosen,
                'list_kelas' => $list_kelas
            ]);
        }
    }
}
