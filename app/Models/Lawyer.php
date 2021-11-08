<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lawyer extends Model
{
    use HasFactory;

    /* Uno a muchos */ // casos en los que el abog es demandante
    public function casosA(){
        return $this->hasMany('App\Models\Caso','lawyerA_id');
    }
                       // casos en los que el abog es demandado
    public function casosB(){
        return $this->hasMany('App\Models\Caso','lawyerB_id');
    }
      
    public function invitaciones(){
        return $this->hasMany('App\Models\Invitation');
    }

}
