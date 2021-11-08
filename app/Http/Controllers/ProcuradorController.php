<?php

namespace App\Http\Controllers;

use App\Models\Attorney;
use App\Models\Lawyer;
use App\Models\Caso;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;

class ProcuradorController extends Controller
{
    
    public function index(){ // solo mostrar los proc del abog logueado

        $user = auth()->user();
        $usuario = User::find($user->id); 
        $roles = $usuario->roles()->select('name')->get(); 

        $Esadmin = false;
        foreach ($roles as $names) {
             if ($names->name == "Admin")
                 $Esadmin = true;    
        } 
    
        if ($Esadmin){//Obtenemos todos los procuradores del sistema 
             $procuradores = Attorney::select('attorneys.id','users.name')
                  ->join('users','attorneys.user_id','=','users.id')
                  ->get();
        }else{

             $idabog = Lawyer::select('lawyers.id')
                 ->join('users','lawyers.user_id','=','users.id')
                 ->where('lawyers.user_id','=',$usuario->id)->first();    

             $procuradores = Invitation::select('attorneys.id','users.name')
                 ->join('attorneys','invitations.attorney_id','=','attorneys.id')
                 ->leftjoin('users','attorneys.user_id','=','users.id')
                 ->where('invitations.lawyer_id','=',$idabog->id)
                 ->get();
        }
            
     
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
        //Obtenemos todos los casos donde participa como procurador 
              
        return view('procuradores.perfil',compact('procurador','casos'));
    }

    public function buscar(){
        $attorneys = Attorney::select('attorneys.*','users.name')
        ->join('users','attorneys.user_id','=','users.id')->get();
        
        return view('procuradores.buscar',compact('attorneys'));
    }

    public function invitar($id){
        
        $attorney = Attorney::select('attorneys.*','users.name')
        ->join('users','attorneys.user_id','=','users.id')
        ->where('attorneys.id',$id)->first();

        $idabog = Lawyer::select('lawyers.id')//(solo los abogados sino nulo)si o si devuelve un id por que este metodo es solo para los abog
             ->join('users','lawyers.user_id','=','users.id')
             ->where('users.id','=',auth()->user()->id)->first(); 
                

        $casos = Caso::select('casos.*')
               ->where('casos.lawyerA_id',$idabog->id)
               ->orwhere('casos.lawyerB_id',$idabog->id) 
               ->get(); 
         //return $casos;      
        
        //mandar solo los casos del abogado logueado

        return view('procuradores.invitar',compact('casos','attorney'));
    }

    public function store($id,Request $request){
  
        $idcaso = Caso::select('casos.id')
                 ->where('casos.code','=',$request->codecaso)->first(); 
        //return $idcaso;    

        $idlawyer = Lawyer::select('lawyers.id')
                 ->join('users','lawyers.user_id','=','users.id')
                 ->where('lawyers.user_id','=',auth()->user()->id)->first();     

        //return $idlawyer;    
        $invitacion = new Invitation();
        $invitacion->title = $request->titlecaso;
        $invitacion->Descripcion = $request->descripcion;
        $invitacion->status = false; //No aceptado por el procurador por el momento
        $invitacion->attorney_id = $id;
        $invitacion->lawyer_id = $idlawyer->id;
        $invitacion->caso_id = $idcaso->id;
        $invitacion->save();

        return redirect()->route('procuradores.invitar',compact('id'));
    }

}
