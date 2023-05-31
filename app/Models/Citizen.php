<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;

    public function Delegates()
    {
        return $this->belongsTo(Delegate::class, 'delegate_id');
    }
}
