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
        Schema::create('kehadiran_dosen', function (Blueprint $table) {
            $table->uuid('id_pertemuan_kuliah')->primary();
            $table->uuid('id_dosen')->primary();
            $table->date('jam_mulai');
            $table->date('jam_selesai')->nullable();
            $table->boolean('is_lupa_presensi')->default(0);
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
        Schema::dropIfExists('kehadiran_dosen');
    }
};
