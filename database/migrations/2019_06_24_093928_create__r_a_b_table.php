<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRABTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rab', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_akun_rab');
            $table->string('jenis_anggaran_rab');
            $table->string('tahun_akademik_rab');
            $table->string('sub_kode_akun_rab');
            $table->string('rincian_anggaran_rab');
            $table->string('jumlah_mata_anggaran');
            $table->string('kode_akun_lengkap_rab');
            $table->string('jumlah_total');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('RAB');
    }
}
