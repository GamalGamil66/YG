<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class DeliveryMan extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;
    protected $table = 'delivery_men';

    public function Managers()
    {
        return $this->belongsTo('App\Models\Manager', 'manager_id');
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }    
}
