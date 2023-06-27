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
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('tgl_pergi');
            $table->date('tgl_pulang');
            $table->string('karyawan');
            $table->string('tujuan');
            $table->timestamps();
            // $table->foreign('id_karyawan')->references('id')->on('employees')->onDelete('cascade');
            // $table->foreign('id_atasan')->references('id')->on('employees')->onDelete('cascade');
            // $table->foreign('id_tiket')->references('id')->on('tikets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_tugas');
    }
};
