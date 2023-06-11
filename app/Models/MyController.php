<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class MyController extends Authenticatable
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;
    protected $table = 'controllers';

}
