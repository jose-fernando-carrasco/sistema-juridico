<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Caso;
use App\Models\Judge;
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
        $caso->judge_id = null;
        $caso->state_id = 1; 
        $caso->lawyerA_id = 2;
        $caso->lawyerB_id = null;
        $caso->save(); 

        return redirect()->route('dashboard');
    }

    public function buscar(Caso $caso=null){
        
        return view('casos.buscar',compact('caso'));
    }

    public function index(){
        $casos = Caso::select('casos.id','casos.code','casos.title','casos.nameA','casos.created_at','states.name')
        ->join('states','casos.state_id','=','states.id')->get();

        return view('casos.index',compact('casos'));
    }

    public function show($id){ //laravel entiende y me devuelve el registro del $caso->id 
        $idjuez = Caso::select('judge_id')->where('id','=',$id)->first();
       
        if ($idjuez->judge_id != null) {
             $caso = Caso::select('casos.*','states.name','users.name as juez')
             ->join('states','casos.state_id','=','states.id')
             ->Join('judges','casos.judge_id','=','judges.id')
             ->leftjoin('users','judges.user_id','=','users.id')
             ->where('casos.id','=',$id)->first();
        }else{
             $caso = Caso::select('casos.*','states.name')
             ->join('states','casos.state_id','=','states.id')
             ->where('casos.id','=',$id)->first(); 
        } 
       
        return view('casos.show',compact('caso'));
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

        return redirect()->route('caso.solicitudes_index');
    }

    public function solicitar($id){

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
        ]);  // Me quedé aquí XDXDXDXDXDXD

        $caso = Caso::where('code','=',$request->code)->first();
       
        $caso->profesionB = $request->profesionB;
        $caso->domicilioB = $request->domicilioB;
        $caso->ciB = $request->ciB;
        $caso->lawyerA_id = 2;
        $caso->lawyerB_id = null;// el usuario Abogado logueado que esta en el sistema
        $caso->update();
        return redirect()->route('caso.buscar');
    }



}
