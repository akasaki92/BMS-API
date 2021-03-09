<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listrik extends Model
{
    protected $table = 'listrik';
    protected $fillable = [
        'users_id', 'nama_langganan', 'id_pelanggan','jenis_pembayaran'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}