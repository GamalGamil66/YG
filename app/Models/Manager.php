<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Manager extends Authenticatable
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;

    public function Directorates()
    {
        return $this->belongsTo('App\Models\Directorates', 'directorate_id');
    }
}
