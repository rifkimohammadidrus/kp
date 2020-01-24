<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tahun_akademik');
            $table->string('kode_akun');
            $table->string('jenis_anggaran');
            $table->string('sub_kode_akun');
            $table->string('rincian_anggaran');
            $table->string('kode_akun_lengkap');
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
        Schema::dropIfExists('anggarans');
    }
}
