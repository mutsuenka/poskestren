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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->date('dob');
            $table->tinyInteger('jenis_kelamin');
            $table->string('nik')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->text('alamat')->nullable();
            $table->text('alergi');
            $table->string('kategori')->default('Umum');
            $table->string('no_rekam_medis');
            $table->string('nama_wali')->nullable();
            $table->boolean('status_kawin');
            $table->string('Agama')->default('Islam');
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
        Schema::dropIfExists('pasiens');
    }
};
