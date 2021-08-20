<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class upt extends Model
{
    protected $fillable = ['nama','kanwil_id'];

    public function getKanwil ()
    {
       return $this->belongsTo(kanwil::class,'kanwil_id','id');
    }
}
