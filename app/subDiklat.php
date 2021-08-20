<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subDiklat extends Model
{
    protected $fillable = ['nama','diklat_id'];

    public function getDiklat()
    {
       return $this->belongsTo(diklat::class,'diklat_id','id');
    }
}
