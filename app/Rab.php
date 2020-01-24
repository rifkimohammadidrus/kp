<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rab extends Model
{
    protected $table="rab";
    protected $primaryKey="id";
    protected $fillable = ['kode_akun_rab', 'jenis_anggaran_rab', 'tahun_akademik_rab', 'sub_kode_akun_rab', 'rincian_anggaran_rab', 'jumlah_mata_anggaran', 'kode_akun_lengkap_rab', 'jumlah_total'];
}