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
        Schema::create('mengajar', function (Blueprint $table) {
            $table->uuid('id_kelas');
            $table->uuid('id_dosen');
            $table->unsignedTinyInteger('urutan');
            $table->decimal('sks_ajar', 5, 2);
            $table->unsignedTinyInteger('rencana_tm');
            $table->unsignedTinyInteger('realisasi_tm');
            $table->timestamps();

            $table->primary(['id_kelas', 'id_dosen']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mengajar');
    }
};
