<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Citizen extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;

    public function Delegates()
    {
        return $this->belongsTo(Delegate::class, 'delegate_id');
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
