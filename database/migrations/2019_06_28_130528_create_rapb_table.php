<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRapbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapb', function (Blueprint $table) {
            $table->bigIncrements('id_rapb');
            $table->string('kode_akun_rapb');
            $table->string('sub_kode_rapb');
            $table->string('kategori_rapb');
            $table->string('tahun_akademik');
            $table->string('semester');
            $table->integer('jumlah_mahasiswa');
            $table->string('jumlah_sks');
            $table->string('besarnya');
            $table->string('jumlah_100');
            $table->string('jumlah_90');
            $table->string('kode_akun_lengkap_rapb');
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
        Schema::dropIfExists('RAPB');
    }
}
