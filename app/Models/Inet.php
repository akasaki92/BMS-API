<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inet extends Model
{
    protected $table = 'inet';
    protected $fillable = [
        'users_id', 'nama_langganan', 'id_pelanggan'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}