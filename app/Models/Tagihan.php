<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tagihan';
    protected $fillable = [
        'users_id', 'kategori', 'kategori_id', 'mulai_tagihan', 'rentang_waktu', 'harga_tagihan'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}