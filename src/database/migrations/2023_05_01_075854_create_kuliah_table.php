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
        Schema::create('kuliah', function (Blueprint $table) {
            $table->uuid('id_kelas')->primary();
            $table->uuid('id_mhs')->primary();
            $table->timestamps();
            $table->date('deleted_at')->nullable();
            $table->primary(['id_kelas', 'id_mhs']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuliah');
    }
};
