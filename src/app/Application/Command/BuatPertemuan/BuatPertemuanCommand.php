<?php

declare(strict_types=1);

namespace App\Application\Command\BuatPertemuan;

use App\Core\Models\Kelas\KelasId;
use App\Core\Models\Pertemuan\JadwalPertemuan;
use App\Core\Models\Pertemuan\ModePertemuan;
use App\Core\Models\Pertemuan\RuanganId;
use App\Core\Models\Pertemuan\TopikPerkuliahan;
use App\Core\Models\Pertemuan\UrutanPertemuan;
use App\Core\Repository\KelasRepositoryInterface;
use App\Core\Repository\PertemuanRepositoryInterface;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use Throwable;
use function intval;

class BuatPertemuanCommand
{
    public function __construct(
        private KelasRepositoryInterface $kelasRepository,
        private PertemuanRepositoryInterface $pertemuanRepository
    ) { }

    public function execute(BuatPertemuanRequest $request): void
    {
        $kelas = $this->kelasRepository->byId(new KelasId($request->kelasId));
        if (!$kelas) throw new InvalidArgumentException("kelas tidak ditemukan");
        DB::beginTransaction();
        try {
            $pertemuan = $kelas->buatPertemuan(
                new UrutanPertemuan(intval($request->pertemuanKe)),
                $request->ruanganId ? new RuanganId($request->ruanganId) : null,
                new JadwalPertemuan(
                    new DateTime($request->tanggal, new DateTimeZone("Asia/Jakarta")),
                    new DateTime($request->jamMulai, new DateTimeZone("Asia/Jakarta")),
                    new DateTime($request->jamSelesai, new DateTimeZone("Asia/Jakarta")),
                ),
                new TopikPerkuliahan($request->topik, $request->topikEn),
                new ModePertemuan($request->mode)
            );
            $this->pertemuanRepository->save($pertemuan);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
    }
}

