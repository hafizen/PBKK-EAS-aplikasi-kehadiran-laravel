<?php 

declare(strict_types = 1);

namespace App\Application\Command\AkhiriPertemuan;

use App\Application\Exception\ApplicationException;
use App\Core\Models\Dosen\DosenId;
use App\Core\Models\Pertemuan\KehadiranDosenId;
use App\Core\Models\Pertemuan\Pertemuan;
use App\Core\Models\Pertemuan\PertemuanId;
use App\Core\Repository\DosenRepositoryInterface;
use App\Core\Repository\KehadiranDosenRepositoryInterface;
use App\Core\Repository\PertemuanRepositoryInterface;

class AkhiriPertemuanCommand {
    
    public function __construct(
        private PertemuanRepositoryInterface $pertemuanRepository,
        private DosenRepositoryInterface $dosenRepository,
        private KehadiranDosenRepositoryInterface $kehadiranDosenRepository
    )
    {
        
    }
    
    public function execute(AkhiriPertemuanRequest $request) {

        $idPertemuan = new PertemuanId($request->pertemuanId);
        $pertemuan = $this->pertemuanRepository->byId($idPertemuan);
        if ($pertemuan === null) {
            throw new ApplicationException("pertemuan_tidak_ditemukan");
        }

        $idDosen = new DosenId($request->dosenId);
        $dosen = $this->dosenRepository->byId($idDosen);
        if ($dosen === null) {
            throw new ApplicationException("dosen_tidak_ditemukan");
        }

        $kehadiranDosen = $this->kehadiranDosenRepository->byId(new KehadiranDosenId($idPertemuan, $idDosen));
        if ($kehadiranDosen === null) {
            throw new ApplicationException("kehadiran_dosen_tidak_ditemukan");
        }

        $pertemuan->akhiri();
        $this->pertemuanRepository->update($pertemuan);

        $kehadiranDosen->selesai();
        $this->kehadiranDosenRepository->update($kehadiranDosen);
    }
}

?>