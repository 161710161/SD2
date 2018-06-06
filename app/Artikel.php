<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikels';
    protected $fillable = ['judul_artikel','dibuat','ket_artikel','kategoriartikel_id'];
    public $timestamps = true;

    public function KategoriArtikel()
    {
    	return $this->belongsTo('App\KategoriArtikel','kategoriartikel_id');
    }
}
