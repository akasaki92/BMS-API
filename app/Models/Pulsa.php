<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pulsa extends Model
{
    protected $table = 'pulsa';
    protected $fillable = [
        'users_id', 'nama_langganan', 'nomor_telp'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}