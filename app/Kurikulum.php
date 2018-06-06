<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $table = 'kurikulums';
    protected $fillable = ['nama_kurikulum','ket_kurikulum','nama_kepsek','nama_wkepsek','guru_id','staf_id'];
    public $timestamps = true;

    public function Guru()
    {
    	return $this->belongsTo('App\Guru','guru_id');
    }

    public function Staf()
    {
    	return $this->belongsTo('App\Staf','staf_id');
    }
}
