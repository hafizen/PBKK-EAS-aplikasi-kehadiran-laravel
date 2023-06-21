<?php

namespace App\Http\Controllers;

use App\Application\Command\AkhiriPertemuan\AkhiriPertemuanCommand;
use App\Application\Command\AkhiriPertemuan\AkhiriPertemuanRequest;
use App\Application\Command\BuatPertemuan\BuatPertemuanCommand;
use App\Application\Command\BuatPertemuan\BuatPertemuanRequest;
use App\Application\Command\MulaiPertemuan\MulaiPertemuanCommand;
use App\Application\Command\MulaiPertemuan\MulaiPertemuanRequest;
use App\Application\Command\UbahPertemuan\UbahPertemuanCommand;
use App\Application\Command\UbahPertemuan\UbahPertemuanRequest;
use App\Application\Exception\ApplicationException;
use App\Application\Query\DaftarHadirMahasiswa\DaftarHadirMahasiswaQueryInterface;
use App\Application\Query\DaftarRuangan\DaftarRuanganQueryInterface;
use App\Application\Query\Dosen\DosenQueryInterface;
use App\Application\Query\Pertemuan\PertemuanQueryInterface;
use App\Core\Repository\DosenRepositoryInterface;
use App\Core\Repository\KehadiranDosenRepositoryInterface;
use App\Core\Repository\KelasRepositoryInterface;
use App\Core\Repository\PertemuanRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;
use function abort;
use function back;
use function response;
use function route;
use function view;

class PertemuanController extends Controller
{

    public function __construct(
        private PertemuanQueryInterface $pertemuanQuery,
        private DaftarHadirMahasiswaQueryInterface $daftarHadirMahasiswaQuery,
        private DaftarRuanganQueryInterface $daftarRuanganQuery,
        private DosenQueryInterface $dosenQuery,
        private KelasRepositoryInterface $kelasRepository,
        private PertemuanRepositoryInterface $pertemuanRepository,
        private DosenRepositoryInterface $dosenRepository,
        private KehadiranDosenRepositoryInterface $kehadiranDosenRepository,
    ) {
    }

    public function get($id)
    {
        $pertemuan = $this->pertemuanQuery->execute(pertemuanId: $id);


        if (!$pertemuan) {
            return "Pertemuan tidak ditemukan";
        }

        $daftarHadirMahasiswa = $this->daftarHadirMahasiswaQuery->execute(pertemuanId: $id);

        return view('pertemuan.dosen', [
            'pertemuan' => $pertemuan,
            'daftar_hadir_mahasiswa' => $daftarHadirMahasiswa
        ]);
    }


    public function tambah($kelasId)
    {
        $user = Auth::user();
        if ($user->group !== 'dosen') {
            abort(403);
        }

        $list_ruangan = $this->daftarRuanganQuery->execute();

        return view('pertemuan.tambah', [
            'list_ruangan' => $list_ruangan,
            'id_kelas' => $kelasId
        ]);
    }

    public function tambahAction(Request $request, $kelasId, BuatPertemuanCommand $command)
    {
        $user = Auth::user();
        if ($user->group !== 'dosen') {
            abort(403);
        }
        $dosenId = $this->dosenQuery->execute($user->id_user)?->dosen_id;
        $pertemuanKe = $request->input('pertemuan-ke');
        $ruanganId = $request->input('ruangan');
        $tanggal = $request->input('tanggal');
        $jamMulai = $request->input('jam-mulai');
        $jamSelesai = $request->input('jam-selesai');
        $topik = $request->input('topik');
        $topikEn = $request->input('topik-en');
        $mode = $request->input('mode-perkuliahan');

        $tambahRequest = new BuatPertemuanRequest(
            $kelasId,
            $dosenId,
            $pertemuanKe,
            $ruanganId,
            $tanggal,
            $jamMulai,
            $jamSelesai,
            $topik,
            $topikEn,
            $mode
        );

        try {
            $command->execute($tambahRequest);
        } catch (Throwable $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }

        return response()->redirectTo(route('kelas', ['id' => $kelasId]))
            ->with('success', 'berhasil_membuat_tatap_muka');
    }

    public function ubah($kelasId, $pertemuanId)
    {
        $user = Auth::user();
        if ($user->group !== 'dosen') {
            abort(403);
        }

        $listRuangan = $this->daftarRuanganQuery->execute();
        $pertemuan = $this->pertemuanQuery->execute($pertemuanId);

        return view('pertemuan.ubah', [
            'list_ruangan' => $listRuangan,
            'id_kelas' => $kelasId,
            'pertemuan' => $pertemuan
        ]);
    }

    public function ubahAction(Request $request, $kelasId, $pertemuanId, UbahPertemuanCommand $command)
    {
        $user = Auth::user();
        if ($user->group !== 'dosen') {
            abort(403);
        }

        $pertemuanKe = $request->input('pertemuan-ke');
        $ruanganId = $request->input('ruangan');
        $tanggal = $request->input('tanggal');
        $jamMulai = $request->input('jam-mulai');
        $jamSelesai = $request->input('jam-selesai');
        $topik = $request->input('topik');
        $topikEn = $request->input('topik-en');
        $mode = $request->input('jenis-perkuliahan');

        $ubahRequest = new UbahPertemuanRequest(
            $kelasId,
            $pertemuanId,
            $pertemuanKe,
            $ruanganId,
            $tanggal,
            $jamMulai,
            $jamSelesai,
            $topik,
            $topikEn,
            $mode
        );

        $command = new UbahPertemuanCommand(
            $this->pertemuanRepository
        );

        try {
            $command->execute($ubahRequest);
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }

        return response()->redirectToRoute('kelas', ['id' => $kelasId])
            ->with('success', 'berhasil_mengubah_tatap_muka');
    }

    public function mulaiAction(Request $request, $pertemuanId, MulaiPertemuanCommand $command)
    {
        $user = Auth::user();
        if ($user->group !== 'dosen') {
            abort(403);
        }

        $dosenId = $this->dosenQuery->execute($user->id_user)?->dosen_id;
        $masaBerlaku = $request->input('opsi_kode_presensi');
        $menitBerlaku = $masaBerlaku === 'auto' ? null : $request->input('menit-berlaku');

        $request = new MulaiPertemuanRequest(
            pertemuanId: $pertemuanId,
            dosenId: $dosenId,
            modePertemuan: $request->input('opsi_mode_pertemuan'),
            bentukKehadiran: $request->input('opsi_mengajar'),
            menitBerlaku: $menitBerlaku
        );

        try {
            $command->execute($request);
        } catch (Throwable $e) {
            return back()->withErrors($e->getMessage());
        }

        return response()->redirectTo(route('pertemuan', $pertemuanId));
    }

    public function akhiriAction(Request $request, $pertemuanId, AkhiriPertemuanCommand $command)
    {
        $user = Auth::user();
        if ($user->group !== 'dosen') {
            abort(403);
        }

        $dosenId = $this->dosenQuery->execute($user->id_user)?->dosen_id;
        $request = new AkhiriPertemuanRequest(
            pertemuanId: $pertemuanId,
            dosenId: $dosenId
        );

        try {

            $command->execute($request);
        } catch (Throwable $e) {
            return back()->withErrors($e->getMessage());
        }

        return response()->redirectTo(route('pertemuan', $pertemuanId));
    }
}
