<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->uuid('id_kelas')->primary();
            $table->string('nama', 20);
            $table->smallInteger('daya_tampung');
            $table->smallInteger('jml_terisi');
            $table->decimal('sks_kelas', 5, 2);
            $table->unsignedTinyInteger('rencana_tm');
            $table->unsignedTinyInteger('realisasi_tm');
            $table->unsignedTinyInteger('is_nilai_final');
            $table->date('tgl_nilai_final');
            $table->string('id_bahasa', 2);
            $table->string('id_semester', 5);
            $table->uuid('id_prodi');
            $table->uuid('id_mk');
            $table->dateTime('deleted_at')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
};
