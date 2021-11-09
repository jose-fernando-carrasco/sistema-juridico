<?php

use App\Http\Controllers\CasoController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ProcuradorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Bitacoracontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*Sector de Casos*/
Route::get('Casos/registrar',[CasoController::class,'create'])->middleware('can:caso.crear')->name('caso.crear');
Route::post('Casos/store',[CasoController::class,'store'])->middleware('can:caso.crear')->name('caso.store');//el mismo permiso que crear
Route::get('Casos/buscar/{caso?}',[CasoController::class,'buscar'])->middleware('can:caso.buscar')->name('caso.buscar');
Route::get('Casos/index',[CasoController::class,'index'])->middleware('can:caso.index')->name('caso.index');
Route::get('Casos/index/show/{id}',[CasoController::class,'show'])->name('caso.show');
Route::put('Casos/index/update/{caso}',[CasoController::class,'update'])->name('caso.update');
Route::get('Casos/search1',[CasoController::class,'search1'])->name('caso.search1');
Route::get('Casos/solicitudes',[CasoController::class,'solicitudes_index'])->middleware('can:caso.solicitudes_index')->name('caso.solicitudes_index');
Route::get('Casos/solicitudes/Analizar/{id}',[CasoController::class,'analizar'])->name('caso.analizar');
Route::put('Casos/solicitudes/Analizar/{caso}',[CasoController::class,'aprobar'])->name('caso.aprobar');
Route::get('Casos/buscar/solicitar/{id}',[CasoController::class,'solicitar'])->middleware('can:caso.buscar')->name('caso.solicitar');//doy el mismo permiso de abogado ya que vienen ligados->middleware('can:caso.buscar')
Route::put('Casos/buscar/solicitar',[CasoController::class,'solicitar_caso'])->name('caso.solicitar_caso');
Route::get('Casos/invitaciones/index',[CasoController::class,'invitaciones_index'])->middleware('can:caso.invitaciones.index')->name('caso.invitaciones.index');
Route::get('Casos/invitaciones/index/show/{id}',[CasoController::class,'invitacion_show'])->name('caso.invitaciones.show');
Route::put('Casos/invitaciones/update/{invitation}',[CasoController::class,'invitacion_update'])->name('caso.invitaciones.update');

/*Sector de Expedientes*/
Route::get('Expedientes/index',[ExpedienteController::class,'index'])->name('expediente.index');
Route::get('Expedientes/ver/{id}',[ExpedienteController::class,'show'])->name('expediente.show');
Route::post('Expedientes/subir_archivo',[ExpedienteController::class,'store'])->name('expediente.store');
Route::get('Expedientes/Archivados/index',[ExpedienteController::class,'archivadosindex'])->middleware('can:expediente.archivadosindex')->name('expediente.archivadosindex'); 
Route::put('Expedientes/Archivados/{id}',[ExpedienteController::class,'update'])->name('expediente.update');
Route::get('Expediente/Archivados/ver/{id}',[ExpedienteController::class,'show_archivados'])->name('expediente.show_archivados');

/*Sector de Procuradores*/
Route::get('Procuradores/Ver',[ProcuradorController::class,'index'])->middleware('can:procuradores.index')->name('procuradores.index');
Route::get('Procuradores/Ver/Perfil/{id}',[ProcuradorController::class,'perfil'])->name('procuradores.perfil');
Route::get('Procuradores/Buscar',[ProcuradorController::class,'buscar'])->middleware('can:procuradores.buscar')->name('procuradores.buscar');
Route::get('Procuradores/Invitar/{id}',[ProcuradorController::class,'invitar'])->name('procuradores.invitar');
Route::post('Procuradores/Invitar/store/{id}',[ProcuradorController::class,'store'])->name('procuradores.store');

/* Usuarios*/

Route::resource('users', UserController::class)->names('admin.users');

Route::get('Bitacora',[Bitacoracontroller::class,'index'])->middleware('can:bitacora.index')->name('bitacora.index');
