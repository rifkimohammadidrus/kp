<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amprahan extends Model
{
    
    protected $table="amprahan";
    protected $fillable = ['tanggal', 'rincian_anggaran', 'kode_akun_lengkap','jumlah'];
}
