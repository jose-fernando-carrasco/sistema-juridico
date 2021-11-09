<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Invitation extends Model
{
    use HasFactory;
    use LogsActivity;


    public function getActivitylogOptions(): LogOptions
    {
                
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "Action ".$eventName." done")
        ->useLogName('Invitacion')
        ->logOnly(['id','title','attorney_id','lawyer_id','created_at']);
        // Chain fluent methods for configuration options
    }


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
