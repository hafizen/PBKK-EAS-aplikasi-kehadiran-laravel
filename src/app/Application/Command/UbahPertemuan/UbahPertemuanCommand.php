<?php

declare(strict_types=1);

namespace App\Application\Command\UbahPertemuan;

use App\Application\Exception\ApplicationException;
use App\Core\Exception\PertemuanException;
use App\Core\Models\Pertemuan\JadwalPertemuan;
use App\Core\Models\Pertemuan\ModePertemuan;
use App\Core\Models\Pertemuan\PertemuanId;
use App\Core\Models\Pertemuan\RuanganId;
use App\Core\Models\Pertemuan\TopikPerkuliahan;
use App\Core\Models\Pertemuan\UrutanPertemuan;
use App\Core\Repository\PertemuanRepositoryInterface;
use App\Core\Service\UrutanPertemuanService;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use Throwable;

class UbahPertemuanCommand
{
    public function __construct(
        private PertemuanRepositoryInterface $pertemuan_repository
    ) {
    }

    public function execute(UbahPertemuanRequest $request): void
    {
        $pertemuan = $this->pertemuan_repository->byId(new PertemuanId($request->pertemuanId));

        if (!$pertemuan) {
            throw new ApplicationException('pertemuan_tidak_ditemukan');
        }

        $urutan = new UrutanPertemuan(intval($request->pertemuanKe));
        $listPertemuan = $this->pertemuan_repository->byKelasId($pertemuan->getKelas()->getId());

        $urutanPertemuanService = new UrutanPertemuanService();
        if ($urutanPertemuanService->isUrutanTerpakai($urutan, $listPertemuan, $pertemuan)) {
            throw new ApplicationException('urutan_pertemuan_sudah_terpakai');
        }

        try {
            $pertemuan->ubah(
                urutan: new UrutanPertemuan($request->pertemuanKe),
                ruanganId: $request->ruanganId ? new RuanganId($request->ruanganId) : null,
                jadwal: new JadwalPertemuan(
                    new DateTime($request->tanggal, new DateTimeZone("Asia/Jakarta")),
                    new DateTime($request->jamMulai, new DateTimeZone("Asia/Jakarta")),
                    new DateTime($request->jamSelesai, new DateTimeZone("Asia/Jakarta")),
                ),
                topik: new TopikPerkuliahan($request->topik, $request->topikEn),
                mode: new ModePertemuan($request->mode)
            );

            $this->pertemuan_repository->update($pertemuan);
        } catch (PertemuanException $e) {
            throw new ApplicationException($e->getMessage());
        }
    }
}
