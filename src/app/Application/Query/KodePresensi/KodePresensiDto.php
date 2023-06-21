<?php

namespace App\Application\Query\KodePresensi;

use Carbon\CarbonImmutable;
use DateTime;

class KodePresensiDto
{
    public string $pertemuan_id;
    public string $kode_akses;
    public string $berlaku_sampai;
    public string $payload;

    public function __construct(
        string $pertemuanId,
        string $kodeAkses,
        DateTime $berlakuSampai
    )
    {
        $this->pertemuan_id = $pertemuanId;
        $this->kode_akses = $kodeAkses;
        $this->berlaku_sampai = $berlakuSampai->format("Y-m-d");
        $this->payload = base64_encode(json_encode([
            'pertemuan_id' => $pertemuanId,
            'kode_akses' => $kodeAkses
        ]));
    }
}
