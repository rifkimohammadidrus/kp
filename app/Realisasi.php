<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    protected $table="realisasi";
    protected $fillable = ['tanggal', 'rincian_anggaran','kode_akun_lengkap', 'jumlah',];
}
