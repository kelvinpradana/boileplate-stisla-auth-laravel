<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    //
    protected $fillable = [
        'diklat_id','sub_diklat_id','jumlah','tahun','status','user_id'
    ];
}
