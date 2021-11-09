<?php

namespace App\Http\Controllers;
require 'conexion.php';



use App\Models\Archive;
use App\Models\File;
use App\Models\Caso;
use App\Models\State;
use App\Models\Type;
use App\Models\Lawyer;
use App\Models\Attorney;
use App\Models\Judge;
use App\Models\User;
use Illuminate\Http\Request;


class ExpedienteController extends Controller
{

   
   public function index(){

      $user = auth()->user();
      $usuario = User::find($user->id); 
      $roles = $usuario->roles()->select('name')->get(); 
      
      $Esadmin = false;
      foreach ($roles as $names) {
           if ($names->name == "Admin")
               $Esadmin = true;    
      } 
  
      if ($Esadmin){//Obtenemos todos los casos del sistema 

         $expedientes = File::select('files.id','files.title','states.name','files.created_at')
                   ->join("casos","files.caso_id","=","casos.id")
                   ->leftJoin('states','casos.state_id','=','states.id')
                   ->where('states.id','=',2)->get();

         return view('expedientes.index',compact('expedientes'));

      }else{   //Obtenemos solo los expedientes al que ese usuario pertenece
     
           $jue = Judge::where('user_id','=',$usuario->id)->first();
           $abo = Lawyer::where('user_id','=',$usuario->id)->first();
           $proc = Attorney::where('user_id','=',$usuario->id)->first();
      
           if ($jue != null && $abo != null && $proc != null){//El user sea Abog, Juez y procu
               $expedientes = File::select('files.*','states.name')
                          ->join('casos','files.caso_id','=','casos.id')
                          ->leftjoin('states','casos.state_id','=','states.id') 
                          ->orwhere('casos.judge_id','=',$jue->id)
                          ->orwhere('casos.lawyerA_id','=',$abo->id)
                          ->orwhere('casos.lawyerB_id','=',$abo->id)
                          ->orwhere('casos.attorneyA_id','=',$proc->id)
                          ->orwhere('casos.attorneyB_id','=',$proc->id)->get();
               return view('expedientes.index',compact('expedientes'));   
           }

           if ($abo != null && $jue != null){//El user sea Abog y Juez
               $expedientes = File::select('files.*','states.name') 
                      ->join('casos','files.caso_id','=','casos.id')
                      ->leftjoin('states','casos.state_id','=','states.id')
                      ->orwhere('casos.judge_id','=',$jue->id)
                      ->orwhere('casos.lawyerA_id','=',$abo->id)
                      ->orwhere('casos.lawyerB_id','=',$abo->id)->get();
               return view('expedientes.index',compact('expedientes'));    
           }

           if ($abo != null && $proc != null){//El user sea Abog y Procu
               $expedientes = File::select('files.*','states.name') 
                     ->join('casos','files.caso_id','=','casos.id')
                     ->leftjoin('states','casos.state_id','=','states.id')
                     ->orwhere('casos.lawyerA_id','=',$abo->id)
                     ->orwhere('casos.lawyerB_id','=',$abo->id)
                     ->orwhere('casos.attorneyA_id','=',$proc->id)
                     ->orwhere('casos.attorneyB_id','=',$proc->id)->get();
               return view('expedientes.index',compact('expedientes'));    
          }

          if ($jue != null && $proc != null){//El user sea Juez y Procu
              $expedientes = File::select('files.*','states.name') 
                     ->join('casos','files.caso_id','=','casos.id')
                     ->leftjoin('states','casos.state_id','=','states.id')
                     ->orwhere('casos.judge_id','=',$jue->id)
                     ->orwhere('casos.attorneyA_id','=',$proc->id)
                     ->orwhere('casos.attorneyB_id','=',$proc->id)->get();
              return view('expedientes.index',compact('expedientes'));     
          }

          if ($jue != null){//El user es Juez
              $expedientes = File::select('files.*','states.name') 
                     ->join('casos','files.caso_id','=','casos.id')
                     ->leftjoin('states','casos.state_id','=','states.id')
                     ->orwhere('casos.judge_id','=',$jue->id)->get();
              return view('expedientes.index',compact('expedientes'));     
          }

          if ($abo != null){//El user es Abog
              $expedientes = File::select('files.*','states.name') 
                     ->join('casos','files.caso_id','=','casos.id')
                     ->leftjoin('states','casos.state_id','=','states.id')
                     ->orwhere('casos.lawyerA_id','=',$abo->id)
                     ->orwhere('casos.lawyerB_id','=',$abo->id)->get();
              return view('expedientes.index',compact('expedientes'));    
          }

          if ($proc != null){//El user es Proc
              $expedientes = File::select('files.*','states.name') 
                     ->join('casos','files.caso_id','=','casos.id')
                     ->leftjoin('states','casos.state_id','=','states.id')
                     ->orwhere('casos.attorneyA_id','=',$proc->id)
                     ->orwhere('casos.attorneyB_id','=',$proc->id)->get();
              return view('expedientes.index',compact('expedientes'));     
          }
      }

        /* $user = auth()->user();
        $usuario = User::find($user->id); 
        $roles = $usuario->roles()->select('name')->get(); 

        $Esadmin = false;
        foreach ($roles as $names) {
             if ($names->name == "Admin"){
                 $Esadmin = true;  
                 break;
             }  
        }
        
        $expedientes = null;
        $expeAbog = null;
        $expeJuez = null;
        $expeproc = null;
        ;
        if ($Esadmin){//Obtenemos todos los expedientes del sistema 
               $expedientes = File::select('files.id','files.title','states.name','files.created_at')
               ->join("casos","files.caso_id","=","casos.id")
               ->leftJoin('states',function($join){
                 $join->on('casos.state_id','=','states.id');
               })->where('states.id','=',2)->get();

               return view('expedientes.index',compact('expedientes'));

         }else{
            $roles = $usuario->roles()->select('name')->get();
            $Esabogado = false;
            foreach ($roles as $names) {
               if ($names->name == "Abogado"){
                     $Esabogado = true; 
                     break;
               }
            }
            if($Esabogado){
               $idabo = Lawyer::select('lawyers.id')
                      ->join('users','lawyers.user_id','=','users.id')
                      ->where('lawyers.user_id','=',$usuario->id)->first();

               //return $idabo;        
               $expeAbog = File::select('files.id','files.title','states.name','files.created_at')
               ->join("casos","files.caso_id","=","casos.id")
               ->leftJoin('states','casos.state_id','=','states.id')
               ->where('states.id','=',2)
               ->where('casos.lawyerA_id','=',$idabo->id)
               ->orwhere('casos.lawyerB_id','=',$idabo->id)
               ->get();
               //return $expeAbogA;
            }
            
            $roles = $usuario->roles()->select('name')->get();
            $Esjuez = false;
            foreach ($roles as $names) {
               if ($names->name == "Juez"){
                     $Esjuez = true; 
                     break;
               }
            }
            if($Esjuez){
               $idjue = Judge::select('judges.id')
                      ->join('users','judges.user_id','=','users.id')
                      ->where('judges.user_id','=',$usuario->id)->first();

               $expeJuez = File::select('files.id','files.title','states.name','files.created_at')
               ->join("casos","files.caso_id","=","casos.id")
               ->leftJoin('states','casos.state_id','=','states.id')
               ->where('states.id','=',2)
               ->where('casos.judge_id','=',$idjue->id)
               ->get();
               return $expeJuez;
            }

            $roles = $usuario->roles()->select('name')->get();
            $Esproc = false;
            foreach ($roles as $names) {
               if ($names->name == "Procurador"){
                     $Esproc = true; 
                     break;
               }
            }

            if($Esproc){
               $idproc = Attorney::select('attorneys.id')
                      ->join('users','attorneys.user_id','=','users.id')
                      ->where('attorneys.user_id','=',$usuario->id)->first();

               $expeproc = File::select('files.id','files.title','states.name','files.created_at')
               ->join("casos","files.caso_id","=","casos.id")
               ->leftJoin('states','casos.state_id','=','states.id')
               ->where('states.id','=',2)
               ->where('casos.attorneyA_id','=',$idproc->id)
               ->orwhere('casos.attorneyB_id','=',$idproc->id)
               ->get();
               //return $expeproc;
            }
         }
      
      return view('expedientes.index',compact('expedientes','expeAbog','expeJuez','expeproc')); */
   }

   public function show($id){
      $expediente =File::find($id); 

      $archivos = Archive::select('archives.id','archives.title','archives.created_at','types.name')
      ->join("types","archives.type_id","=","types.id")
      ->where('file_id',$id)->get();

      $tipos = Type::all();
      return view('expedientes.show',compact('expediente','archivos','tipos'));
   }

   public function archivadosindex(){
      /* entre 3 tablas 2da forma */
      $archivados = File::select('files.id','files.title','states.name','files.created_at','files.updated_at')
      ->join('casos', 'files.caso_id', '=', 'casos.id')
      ->leftJoin('states', 'casos.state_id','=','states.id')
      ->where('states.id','=',3)
      ->get(); 

      return view('expedientes.archivadosindex',compact('archivados'));
   }

   public function update($id){
       $casoid = File::select('casos.id')
      ->join('casos','files.caso_id','=','casos.id')
      ->where('files.id','=',$id)->first(); 
 
      $caso = Caso::findOrFail($casoid)->first(); 
      $caso->state_id = 3;  // cambia a Concluido id =3
      $caso->update(); 

      return redirect()->route('expediente.index');
   }


   public function show_archivados($id){
      $expediente =File::find($id); 

      $archivos = Archive::select('archives.id','archives.title','archives.created_at','types.name')
      ->join("types","archives.type_id","=","types.id")
      ->where('file_id',$id)->get();
      
      return view('expedientes.show_archivados',compact('expediente','archivos'));
   }

   public function store(Request $request){
      
    //A media 

       return "upload.php";

   }

   
}
