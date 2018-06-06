<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'gurus';
    protected $fillable = ['nama_guru','jabatan'];
    public $timestamps = true;

    public function Kurikulum()
    {
    	return $this->hasMany('App\Kurikulum','guru_id');
    }
}
