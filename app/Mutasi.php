<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model{
    protected $table="rapb";
    protected $primaryKey="id";
    protected $fillable = ['KATEGORI_RAPB', 'SEMESTER', 'JML_MHS', 'JML_SKS', 'BESARNYA', 'JML_100', 'JML_90'];
}