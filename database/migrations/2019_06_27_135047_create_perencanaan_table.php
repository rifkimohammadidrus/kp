<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerencanaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perencanaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal'); 
            $table->string('deskripsi');
            $table->string('kode')->unique();
            $table->integer('debit');
            $table->integer('kredit'); 
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
        Schema::dropIfExists('perencanaan');
    }
}
