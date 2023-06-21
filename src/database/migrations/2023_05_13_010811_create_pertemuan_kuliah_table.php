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
        Schema::create('pertemuan_kuliah', function (Blueprint $table) {
            $table->uuid('id_pertemuan_kuliah');
            $table->uuid('id_ruangan')->nullable();
            $table->uuid('id_kelas');
            $table->integer('pertemuan_ke');
            $table->dateTime('tgl_kuliah');
            $table->dateTime('jam_mulai');
            $table->dateTime('jam_selesai');
            $table->string('topik_kuliah')->nullable();
            $table->string('topik_kuliah_en')->nullable();
            $table->boolean('is_online')->nullable();
            $table->integer('kode_akses')->nullable();
            $table->dateTime('berlaku_sampai')->nullable();
            $table->string('bentuk_tm');
            $table->integer('status_pertemuan');
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
        Schema::dropIfExists('pertemuan_kuliah');
    }
};
