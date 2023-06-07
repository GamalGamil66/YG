<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Aqel extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;

    public function Neighborhoods()
    {
        return $this->belongsTo('App\Models\Neighborhood', 'neighborhood_id');
    }

    public function Managers()
    {
        return $this->belongsTo('App\Models\Manager', 'manager_id');
    }
    public function Aqels()
    {
        return $this->hasManyThrough(Citizen::class, Delegate::class);
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
