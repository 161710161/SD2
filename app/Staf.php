<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    protected $table = 'stafs';
    protected $fillable = ['nama_staf','jabatan'];
    public $timestamps = true;

    public function Kurikulum()
    {
    	return $this->hasMany('App\Kurikulum','staf_id');
    }
}
