<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasis';
    protected $fillable = ['nama_prestasi','ket_prestasi'];
    public $timestamps = true;
}
