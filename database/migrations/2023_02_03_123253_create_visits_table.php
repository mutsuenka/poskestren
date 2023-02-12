<?php

use Carbon\Carbon;
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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained();
            $table->date('tanggal_visit');
            $table->integer('no_antrian');
            $table->string('vital_tekanan_darah')->nullable();
            $table->integer('vital_nadi')->nullable();
            $table->float('vital_suhu')->nullable();
            $table->integer('vital_respiratory_rate')->nullable();
            $table->integer('vital_spo')->nullable();
            $table->integer('vital_vas')->nullable();
            $table->integer('vital_gcs')->nullable();
            $table->integer('vital_berat_badan')->nullable();
            $table->integer('vital_tinggi_badan')->nullable();
            $table->string('keluhan_utama')->nullable();
            $table->string('riwayat_penyakit_dulu')->default('Tidak ada');
            $table->string('riwayat_penyakit_sekarang')->default('Tidak ada');
            $table->string('riwayat_penyakit_keluarga')->default('Tidak ada');
            $table->string('sg_kepala_leher')->default('Dalam Batas Normal');
            $table->string('sg_thorax')->default('Dalam Batas Normal');
            $table->string('sg_cob')->default('Dalam Batas Normal');
            $table->string('sg_abdomen')->default('Dalam Batas Normal');
            $table->string('sg_ekstremitas')->default('Dalam Batas Normal');
            $table->string('status_lokalis')->nullable();
            $table->text('diagnosa')->nullable();
            $table->text('planning')->nullable();
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('visits');
    }
};
