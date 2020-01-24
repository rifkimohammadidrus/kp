<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    protected $table="anggarans";
    protected $primaryKey="id";
    protected $fillable = ['tahun_akademik','kode_akun', 'jenis_anggaran', 'sub_kode_akun', 'rincian_anggaran', 'kode_akun_lengkap'];
}
