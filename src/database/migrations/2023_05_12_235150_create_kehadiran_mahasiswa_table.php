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
        Schema::create('kehadiran_mahasiswa', function (Blueprint $table) {
            $table->uuid('id_pertemuan_kuliah')->nullable();
            $table->uuid('id_mhs')->nullable();
            $table->char('jenis_hadir', 1);
            $table->date('jam_catat')->nullable();
            $table->char('kode_akses_masuk', 6)->nullable();
            $table->char('jenis_izin', 1)->nullable();
            $table->string('alasan')->nullable();
            $table->date('tgl_izin')->nullable();
            $table->boolean('is_pengisi_berita_acara')->nullable()->default(0);
            $table->string('berita_acara')->nullable();
            $table->date('jam_mulai')->nullable();
            $table->date('jam_selesai')->nullable();
            $table->string('pencatat')->nullable();
            $table->char('bentuk_hadir', 1)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kehadiran_mahasiswa');
    }
};
