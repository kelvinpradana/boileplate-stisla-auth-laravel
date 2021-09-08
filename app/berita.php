<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    //

    protected $fillable = ['judul','img','tanggal','isi','user_id','user_update','status'];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
