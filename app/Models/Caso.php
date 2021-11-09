<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions; */

class Caso extends Model
{
    use HasFactory;
    //use LogsActivity;


    /* public function getActivitylogOptions(): LogOptions
    {
                
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "Action ".$eventName." done")
        ->useLogName('Registro')
        ->logOnly(['id', 'code','title', 'created_at']);
        // Chain fluent methods for configuration options
    } */

    /* protected $fillable = ['code','title','nameA','profesionA','domicilioA','ciA','nameB','Descripcion'];  */  // permite la asignacion masiva 
    protected $guarded = ['token'];
    /* Uno a Uno */
    public function file(){
        return $this->hasOne('App\Models\File');
    }

    /* uno a muchos */
    public function judge(){
        return $this->belongsTo('App\Models\Judge');
    }

    public function estado(){
        return $this->belongsTo('App\Models\State');
    }

    public function lawyerA(){
        return $this->belongsTo('App\Models\Lawyer','lawyerA_id');
    }
    // casos en los que el abog es demandado
    public function lawyerB(){
        return $this->belongsTo('App\Models\Lawyer','lawyerB_id');
    }

    public function attorneyA(){
        return $this->belongsTo('App\Models\Attorney','attorneyA_id');
    }
                       
    public function attorneyB(){
        return $this->belongsTo('App\Models\Attorney','attorneyB_id');
    }

    public function invitaciones(){
        return $this->hasMany('App\Models\Invitation');
    }
    
}
