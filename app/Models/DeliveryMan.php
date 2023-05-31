<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;
    protected $table = 'delivery_men';

    public function Managers()
    {
        return $this->belongsTo('App\Models\Manager', 'manager_id');
    }
}
