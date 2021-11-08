<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    /* Uno a Uno */
    public function caso(){
        return $this->belongsTo('App\Models\Caso');
    }

    public function archives(){
        return $this->hasMany('App\Models\Archive');
    }

}
