<?php

namespace App\Http\Controllers;
require 'conexion.php';



use App\Models\Archive;
use App\Models\File;
use App\Models\Caso;
use App\Models\State;
use App\Models\Type;
use Illuminate\Http\Request;


class ExpedienteController extends Controller
{

   
   public function index(){
      /* entre 3 tablas 1ra forma */  
      $expedientes = File::select('files.id','files.title','states.name','files.created_at')
      ->join("casos","files.caso_id","=","casos.id")
      ->leftJoin('states',function($join){
        $join->on('casos.state_id','=','states.id');
      })->where('states.id','=',2)->get();
      
      
      return view('expedientes.index',compact('expedientes'));
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
