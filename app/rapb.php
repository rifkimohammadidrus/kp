<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapb extends Model
{
    protected $table="rapb";
    protected $primaryKey="id_rapb";
    protected $fillable = ['kode_akun_rapb', 'kategori_rapb', 'sub_kode_rapb', 'tahun_akademik', 'semester', 'jumlah_mahasiswa', 'jumlah_sks', 'besarnya', 'jumlah_100', 'jumlah_90', 'kode_akun_lengkap_rapb'];
}