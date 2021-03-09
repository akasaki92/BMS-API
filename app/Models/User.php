<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Traits\MustVerifyEmail;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
        use Authenticatable, Authorizable, HasFactory, Notifiable, MustVerifyEmail;
        // use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'username', 'name', 'email', 'tgl_lahir', 'avatar'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected $casts  = [
        'email_verified_at' => 'datetime',
    ];

    public function inet(){
        return $this->hasOne('App\Models\Inet');
    }
    public function listrik(){
        return $this->hasOne('App\Models\Listrik');
    }
    public function pulsa(){
        return $this->hasOne('App\Models\Pulsa');
    }
    public function kategori(){
        return $this->hasOne('App\Models\Kategori');
    }
    public function tagihan(){
        return $this->hasOne('App\Models\Tagihan');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    protected static function boot()
    {
        parent::boot();
        static::saved(function ($model) {
        /**
             * If user email have changed email verification is required
             */
            if( $model->isDirty('email') ) {
                $model->setAttribute('email_verified_at', null);
                $model->sendEmailVerificationNotification();
            }
        });
    }
}
