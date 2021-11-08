<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    public function attorney(){
        return $this->belongsTo('App\Models\Attorney');
    }

    public function lawyer(){
        return $this->belongsTo('App\Models\Lawyer');
    }

    public function invitacion(){
        return $this->belongsTo('App\Models\Invitation');
    }

}
