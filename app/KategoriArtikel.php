<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    protected $table = 'kategori_artikels';
    protected $fillable = ['nama_artikel'];
    public $timestamps = true;

    public function Artikel()
    {
    	return $this->hasMany('App\Artikel','kategoriartikel_id');
    }
}
