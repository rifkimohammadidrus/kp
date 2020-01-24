<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perencanaan extends Model
{
    protected $table="perencanaan";
    protected $primaryKey="id";
    protected $fillable = ['tanggal', 'deskripsi', 'kode', 'debit', 'kredit'];
}
