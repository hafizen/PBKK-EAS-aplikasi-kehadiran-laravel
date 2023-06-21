<?php 

declare(strict_types = 1);

namespace App\Application\Command\MulaiPertemuan;

use App\Application\Exception\ApplicationException;
use App\Core\Models\Dosen\DosenId;
use App\Core\Models\Pertemuan\BentukKehadiran;
use App\Core\Models\Pertemuan\KehadiranDosen;
use App\Core\Models\Pertemuan\ModePertemuan;
use App\Core\Models\Pertemuan\PertemuanId;
use App\Core\Repository\DosenRepositoryInterface;
use App\Core\Repository\KehadiranDosenRepositoryInterface;
use App\Core\Repository\PertemuanRepositoryInterface;
use DateTime;

class MulaiPertemuanCommand {

    public function __construct(
        private PertemuanRepositoryInterface $pertemuanRepository,
        private DosenRepositoryInterface $dosenRepository,
        private KehadiranDosenRepositoryInterface $kehadiranDosenRepository
    )
    {
        
    }

    public function execute(MulaiPertemuanRequest $request): void {

        $pertemuan = $this->pertemuanRepository->byId(new PertemuanId($request->pertemuanId));
        if ($pertemuan === null) {
            throw new ApplicationException("pertemuan_tidak_ditemukan");
        }

        $idDosen = new DosenId($request->dosenId);
        $dosen = $this->dosenRepository->byId($idDosen);
        if ($dosen === null) {
            throw new ApplicationException("dosen_tidak_ditemukan");
        }

        $kehadiranDosen = $this->kehadiranDosenRepository->byPertemuanId(new PertemuanId($request->pertemuanId));
        if ($kehadiranDosen != null && ! $kehadiranDosen->getId()->dosenId()->equals($idDosen)) {
            throw new ApplicationException("pertemuan_sudah_dihadiri_dosen_lain");
        }

        $bentukKehadiran = new BentukKehadiran($request->bentukKehadiran);
        $pertemuan->mulai(new ModePertemuan($request->modePertemuan), $bentukKehadiran, $request->menitBerlaku);
        $this->pertemuanRepository->update($pertemuan);

        $kehadiranDosen = KehadiranDosen::hadir($pertemuan, $idDosen, new DateTime("now"), $bentukKehadiran);

        $this->kehadiranDosenRepository->save($kehadiranDosen);
    }
}

?>