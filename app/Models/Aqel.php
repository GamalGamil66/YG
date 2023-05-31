<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aqel extends Model
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
}
