<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class Bitacoracontroller extends Controller
{
    public function index(){
        $bits = Activity::select('description','causer_id','created_at','updated_at')
              ->orderBy('id', 'asc')->get(); 

        //return $bit;
        return view('Bitacora.index',compact('bits'));
    }
}
