<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $fillable = ['visimisi','sejarah','email','telepon','lokasi'];
    public $timestamps = true;
}
