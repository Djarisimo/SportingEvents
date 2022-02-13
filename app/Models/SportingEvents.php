<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportingEvents extends Model
{
    protected $table='sportingevents';
    protected $fillable=['title', 'sport', 'timelength'];
}
