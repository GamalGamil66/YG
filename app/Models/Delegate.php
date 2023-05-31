<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegate extends Model
{
    use HasFactory;

    protected $guarded=[];
    public $timestamps = false;

    public function Aqels()
    {
        return $this->belongsTo(Aqel::class, 'aqel_id');
    }
}
