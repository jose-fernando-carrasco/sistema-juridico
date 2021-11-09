<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Caso;
use App\Models\Judge;
use App\Models\User;
use App\Models\Lawyer;
use App\Models\Attorney;
use App\Models\Invitation;
use App\Models\File;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class CasoController extends Controller
{
    
    public function create(){
        $estado = State::find(1);   //id 1 es de en espera
        return view('casos.create',compact('estado'));
    }

    public function store(Request $request){

        $request->validate([
            'code'=>'required',
            'title'=>'required',
            'nameA'=>'required',
            'profesionA'=>'required',
            'domicilioA'=>'required',
            'ciA'=>'required',
            'nameB'=>'required',
            'Descripcion'=>'required'
        ]);

        $idAbogA = Lawyer::select('lawyers.id')
                   ->where('user_id','=',auth()->user()->id)->first();

        $caso = new Caso();
        $caso->code = $request->code;
        $caso->title = $request->title;
        $caso->nameA = $request->nameA;
        $caso->profesionA = $request->profesionA;
        $caso->domicilioA = $request->domicilioA;
        $caso->ciA = $request->ciA;
        $caso->nameB = $request->nameB;
        $caso->profesionB = $request->profesionB;
        $caso->domicilioB = $request->domicilioB;
        $caso->ciB = $request->ciB;
        $caso->Descripcion = $request->Descripcion;
        //$caso->judge_id = null;
        $caso->state_id = 1;

        $caso->lawyerA_id = $idAbogA->id;
        //$caso->lawyerB_id = null;
        $caso->save(); 

        //return auth()->user()->id;

        return redirect()->route('dashboard');
    }

    public function buscar(Caso $caso=null){
        
        return view('casos.buscar',compact('caso'));
    }

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

                $casos = Caso::select('casos.*','states.name')
                       ->join('states','casos.state_id','=','states.id')->get();
            return view('casos.index',compact('casos'));
        }else{   //Obtenemos solo los casos al que ese usuario pertenece
       
             $jue = Judge::where('user_id','=',$usuario->id)->first();
             $abo = Lawyer::where('user_id','=',$usuario->id)->first();
             $proc = Attorney::where('user_id','=',$usuario->id)->first();
        
             if ($jue != null && $abo != null && $proc != null){//El user sea Abog, Juez y procu
                 $casos = Caso::select('casos.*','states.name')
                        ->join('states','casos.state_id','=','states.id') 
                        ->orwhere('judge_id','=',$jue->id)
                        ->orwhere('lawyerA_id','=',$abo->id)
                        ->orwhere('lawyerB_id','=',$abo->id)
                        ->orwhere('attorneyA_id','=',$proc->id)
                        ->orwhere('attorneyB_id','=',$proc->id)->get();
                 return view('casos.index',compact('casos'));     
             }

             if ($abo != null && $jue != null){//El user sea Abog y Juez
                 $casos = Caso::select('casos.*','states.name') 
                        ->join('states','casos.state_id','=','states.id')
                        ->orwhere('judge_id','=',$jue->id)
                        ->orwhere('lawyerA_id','=',$abo->id)
                        ->orwhere('lawyerB_id','=',$abo->id)->get();
                 return view('casos.index',compact('casos'));     
             }

             if ($abo != null && $proc != null){//El user sea Abog y Procu
                $casos = Caso::select('casos.*','states.name') 
                       ->join('states','casos.state_id','=','states.id')
                       ->orwhere('lawyerA_id','=',$abo->id)
                       ->orwhere('lawyerB_id','=',$abo->id)
                       ->orwhere('attorneyA_id','=',$proc->id)
                       ->orwhere('attorneyB_id','=',$proc->id)->get();
                return view('casos.index',compact('casos'));    
            }

            if ($jue != null && $proc != null){//El user sea Juez y Procu
                $casos = Caso::select('casos.*','states.name') 
                       ->join('states','casos.state_id','=','states.id')
                       ->orwhere('judge_id','=',$jue->id)
                       ->orwhere('attorneyA_id','=',$proc->id)
                       ->orwhere('attorneyB_id','=',$proc->id)->get();
                return view('casos.index',compact('casos'));     
            }

            if ($jue != null){//El user es Juez
                $casos = Caso::select('casos.*','states.name') 
                       ->join('states','casos.state_id','=','states.id')
                       ->orwhere('judge_id','=',$jue->id)->get();
                return view('casos.index',compact('casos'));    
            }

            if ($abo != null){//El user es Abog
                $casos = Caso::select('casos.*','states.name') 
                       ->join('states','casos.state_id','=','states.id')
                       ->orwhere('lawyerA_id','=',$abo->id)
                       ->orwhere('lawyerB_id','=',$abo->id)->get();
                return view('casos.index',compact('casos'));    
            }

            if ($proc != null){//El user es Proc
                $casos = Caso::select('casos.*','states.name')
                       ->join('states','casos.state_id','=','states.id') 
                       ->orwhere('attorneyA_id','=',$proc->id)
                       ->orwhere('attorneyB_id','=',$proc->id)->get();
                return view('casos.index',compact('casos'));     
            }
        }
    }

    public function show($id){ 
        

       $caso = Caso::select('casos.*','states.name')//Obtenemos el caso
             ->join('states','casos.state_id','=','states.id')
             ->where('casos.id','=',$id)->first();
                   

       $juez = Judge::select('users.name')
             ->join('users','judges.user_id','=','users.id')
             ->where('judges.id','=',$caso->judge_id)->first();      
             
       $abogadoA = Lawyer::select('users.name')
             ->join('users','lawyers.user_id','=','users.id')
             ->where('lawyers.id','=',$caso->lawyerA_id)->first(); 
        
       $abogadoB = Lawyer::select('users.name')
             ->join('users','lawyers.user_id','=','users.id')
             ->where('lawyers.id','=',$caso->lawyerB_id)->first();           
         
       $procuradorA = Attorney::select('users.name')
             ->join('users','attorneys.user_id','=','users.id')
             ->where('attorneys.id','=',$caso->attorneyA_id)->first();
             
       $procuradorB = Attorney::select('users.name')
             ->join('users','attorneys.user_id','=','users.id')
             ->where('attorneys.id','=',$caso->attorneyB_id)->first();
        
        return view('casos.show',compact('caso','juez','abogadoA','abogadoB','procuradorA','procuradorB'));
    }

    public function update( Caso $caso){

        $caso->state_id = 3;  // cambia a Concluido id =3
        $caso->update(); 
       
        return redirect()->route('caso.index')->with('concluir','ok');
    }

    public function search1(Request $request){
        $caso = Caso::where('code','=',$request->search)->first();
        if ($caso->state_id != 1)
            $caso = null;

        return redirect()->route('caso.buscar',compact('caso'));  
    }

    public function solicitudes_index(){
        $casos = Caso::select('casos.id','casos.code','casos.title','casos.nameA','casos.nameB','states.name','casos.created_at')
        ->join('states','casos.state_id','=','states.id')
        ->where('states.id','=',1)->get();
         
        return view('casos.solicitudes_index',compact('casos'));
    }

    public function analizar($id){

        $caso = Caso::select('casos.*','states.name','users.name as namelawyerA')
        ->join('states','casos.state_id','=','states.id')
        ->join('lawyers','casos.lawyerA_id','=','lawyers.id')
        ->leftjoin('users','lawyers.user_id','=','users.id')
        ->where('casos.id','=',$id)->first();

        $jueces = Judge::select('judges.id','users.name')
        ->join('users','judges.user_id','=','users.id')->get();
        
        
        return view('casos.analisis',compact('caso','jueces'));  
    }

    public function aprobar(Caso $caso,Request $request){
        $juezid = Judge::select('judges.id')
        ->join('users','judges.user_id','=','users.id')
        ->where('users.name','=',$request->juez)->first();

        $caso->judge_id = $juezid->id;
        $caso->state_id = 2;
        $caso->update();

        $file = new File();//asignando un nuevo expediente
        $file->title = "Expediente de ".$caso->title;
        $file->caso_id = $caso->id;
        $file->save();

        return redirect()->route('caso.solicitudes_index');
    }

    public function solicitar($id){ ///aquiiiii solicitar unirse al abogado

        $caso = Caso::select('casos.*','states.name')
        ->join('states','casos.state_id','=','states.id')
        ->where('casos.id','=',$id)->first(); 
        

        return view('casos.solicitar',compact('caso'));
    }

    public function solicitar_caso(Request $request){
        $request->validate([
            'profesionB'=>'required',
            'domicilioB'=>'required',
            'ciB'=>'required',
        ]);  

        $caso = Caso::where('code','=',$request->code)->first();
       
        $abogB = Lawyer::select('lawyers.id')
             ->join('users','lawyers.user_id','=','users.id')
             ->where('lawyers.user_id','=',auth()->user()->id)->first();  

        $caso->profesionB = $request->profesionB;
        $caso->domicilioB = $request->domicilioB;
        $caso->ciB = $request->ciB;
        $caso->lawyerB_id = $abogB->id;  // el usuario Abogado logueado que esta en el sistema
        $caso->update();
        return redirect()->route('caso.buscar');
    }


    public function invitaciones_index(){//acceso solo a procuradores

        $idproc = Attorney::select('attorneys.id')
                ->join('users','attorneys.user_id','=','users.id')
                ->where('attorneys.user_id','=',auth()->user()->id)->first();

        $invitaciones = Invitation::select('invitations.*','users.name as abogado',)
                 ->join('attorneys','invitations.attorney_id','=','attorneys.id')
                 ->join('lawyers','invitations.lawyer_id','=','lawyers.id')
                 ->leftjoin('users','lawyers.user_id','=','users.id')
                 ->where('invitations.attorney_id','=',$idproc->id)
                 ->where('invitations.status','=',false)
                 ->get();  
        //return $invitaciones;
        return view('casos.invitaciones.index',compact('invitaciones'));
    }

    public function invitacion_show($id){
        
        $invitacion = Invitation::select('invitations.*','users.name as abogado')
        ->join('lawyers','invitations.lawyer_id','=','lawyers.id')
        ->leftjoin('users','lawyers.user_id','=','users.id')
        ->where('invitations.id','=',$id)
        ->first(); 
        
        $procurador = Attorney::select('users.name')
         ->join('users','attorneys.user_id','=','users.id')
         ->where('attorneys.id','=',$invitacion->attorney_id)->first();
       
        return view('casos.invitaciones.show',compact('invitacion','procurador'));
    }

    public function invitacion_update(Invitation $invitation,Request $request){
    
       $invitation->status = true;
       $invitation->update();
       //return  $request->nameA;  
       $caso = Invitation::select('casos.*')
            ->join('casos','invitations.caso_id','=','casos.id')
            ->where('casos.id','=',$invitation->caso_id)->first(); 
        
        $abog = Invitation::select('lawyers.id')
            ->join('lawyers','invitations.lawyer_id','=','lawyers.id')
            ->leftjoin('users','lawyers.user_id','=','users.id')
            ->where('users.name','=',$request->nameA)->first();  

        $proc = Invitation::select('attorneys.id')
            ->join('attorneys','invitations.attorney_id','=','attorneys.id')
            ->leftjoin('users','attorneys.user_id','=','users.id')
            ->where('users.name','=',$request->nam)->first();     

        //return $abog;
        $caso1 = Caso::find($caso->id);
         if($caso1->lawyerA_id == $abog->id){
            $caso1->attorneyA_id = $proc->id;
            $caso1->update();
         }else{
             if ($caso1->lawyerB_id == $abog->id){
                $caso1->attorneyB_id = $proc->id;
                $caso1->update();
             }
         }      

       return redirect()->route('caso.invitaciones.index');
    }

}
