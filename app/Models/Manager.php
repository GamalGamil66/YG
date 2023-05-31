<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;

    public function Directorates()
    {
        return $this->belongsTo('App\Models\Directorates', 'directorate_id');
    }
}
