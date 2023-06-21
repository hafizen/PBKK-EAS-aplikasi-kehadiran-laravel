<?php 

declare(strict_types = 1);

namespace App\Infrastructure\Query\PostgreSQL;

use App\Application\Query\KodePresensi\KodePresensiDto;
use App\Application\Query\KodePresensi\KodePresensiQueryInterface;
use DateTime;
use Illuminate\Support\Facades\DB;

class KodePresensiQuery implements KodePresensiQueryInterface {
    
    public function execute(string $pertemuanId) : ?KodePresensiDto {
        $script = "SELECT pk.id_pertemuan_kuliah, pk.kode_akses, pk.berlaku_sampai FROM pertemuan_kuliah AS pk 
            WHERE pk.id_pertemuan_kuliah = :id_pertemuan_kuliah";

        $hasilQuery = DB::select($script, [
            "id_pertemuan_kuliah" => $pertemuanId
        ]);

        if (count($hasilQuery) == 0) {
            return null;
        }

        $kodePresensi = $hasilQuery[0];
        return new KodePresensiDto($kodePresensi->id_pertemuan_kuliah, strval($kodePresensi->kode_akses), new DateTime($kodePresensi->berlaku_sampai));
    }
}

?>