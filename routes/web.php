<?php

use App\Http\Controllers\CasoController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ProcuradorController;
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
Route::get('Casos/registrar',[CasoController::class,'create'])->name('caso.crear');
Route::post('Casos/store',[CasoController::class,'store'])->name('caso.store');
Route::get('Casos/buscar/{caso?}',[CasoController::class,'buscar'])->name('caso.buscar');
Route::get('Casos/index',[CasoController::class,'index'])->name('caso.index');
Route::get('Casos/index/show/{id}',[CasoController::class,'show'])->name('caso.show');
Route::put('Casos/index/update/{caso}',[CasoController::class,'update'])->name('caso.update');
Route::get('Casos/search1',[CasoController::class,'search1'])->name('caso.search1');
Route::get('Casos/solicitudes',[CasoController::class,'solicitudes_index'])->name('caso.solicitudes_index');
Route::get('Casos/solicitudes/Analizar/{id}',[CasoController::class,'analizar'])->name('caso.analizar');
Route::put('Casos/solicitudes/Analizar/{caso}',[CasoController::class,'aprobar'])->name('caso.aprobar');
Route::get('Casos//buscar/solicitar/{id}',[CasoController::class,'solicitar'])->name('caso.solicitar');
Route::put('Casos/buscar/solicitar',[CasoController::class,'solicitar_caso'])->name('caso.solicitar_caso');

/*Sector de Expedientes*/
Route::get('Expedientes/index',[ExpedienteController::class,'index'])->name('expediente.index');
Route::get('Expedientes/ver/{id}',[ExpedienteController::class,'show'])->name('expediente.show');
Route::post('Expedientes/subir_archivo',[ExpedienteController::class,'store'])->name('expediente.store');
Route::get('Expedientes/Archivados/index',[ExpedienteController::class,'archivadosindex'])->name('expediente.archivadosindex'); 
Route::put('Expedientes/Archivados/{id}',[ExpedienteController::class,'update'])->name('expediente.update');
Route::get('Expediente/Archivados/ver/{id}',[ExpedienteController::class,'show_archivados'])->name('expediente.show_archivados');

/*Sector de Procuradores*/
Route::get('Procuradores/Ver',[ProcuradorController::class,'index'])->name('procuradores.index');
Route::get('Procuradores/Ver/Perfil/{id}',[ProcuradorController::class,'perfil'])->name('procuradores.perfil');
Route::get('Procuradores/Buscar',[ProcuradorController::class,'buscar'])->name('procuradores.buscar');
Route::get('Procuradores/Invitar/{id}',[ProcuradorController::class,'invitar'])->name('procuradores.invitar');
