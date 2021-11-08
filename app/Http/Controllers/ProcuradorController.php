<?php

namespace App\Http\Controllers;

use App\Models\Attorney;
use App\Models\Caso;
use Illuminate\Http\Request;

class ProcuradorController extends Controller
{
    
    public function index(){
        $procuradores = Attorney::select('attorneys.id','users.name')
        ->join('users','attorneys.user_id','=','users.id')
        ->get();
    
        return view('procuradores.index',compact('procuradores'));
    }

    public function perfil($id){
        $procurador = Attorney::select('attorneys.*','users.name')
        ->join('users','attorneys.user_id','=','users.id')
        ->where('attorneys.id','=',$id)->first();

        $casos = Caso::select('casos.*','states.name')
        ->join('states','casos.state_id','=','states.id')
        ->where('attorneyA_id','=',$id)
        ->orWhere('attorneyB_id','=',$id)
        ->get();
        //Pendiente xdxdxd
              
        return view('procuradores.perfil',compact('procurador','casos'));
    }

    public function buscar(){
        $attorneys = Attorney::select('attorneys.*','users.name')
        ->join('users','attorneys.user_id','=','users.id')->get();
        
        return view('procuradores.buscar',compact('attorneys'));
    }

    public function invitar($id){
        $attorney = Attorney::select('attorneys.*','users.name')
        ->join('users','attorneys.user_id','=','users.id')->first();
        $casos = Caso::all(); 
        
        //mandar solo los casos del abogado logueado

        return view('procuradores.invitar',compact('casos','attorney'));
    }

}
