<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    use HasFactory;
    /* Uno a Uno */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    /* Uno a Muchos */
    public function casos(){
        return $this->hasMany('App\Models\Caso');
    }

}
