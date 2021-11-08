<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attorney extends Model
{
    use HasFactory;

    /* Uno a muchos */ // casos en los que el abog es demandante
    public function casosA(){
        return $this->hasMany('App\Models\Caso','attorneyA_id');
    }
                       // casos en los que el abog es demandado
    public function casosB(){
        return $this->hasMany('App\Models\Caso','attorneyB_id');
    }

    public function invitaciones(){
        return $this->hasMany('App\Models\Invitation');
    }

}
