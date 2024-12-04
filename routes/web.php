<?php

use App\Http\Controllers\SomatometriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\UniformeController;
use App\Http\Controllers\EstimuloController;
use App\Models\Somatometria;

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

route::get('/', function () {
    return view('login');
});
route::post('valida',[UsuariosController::class,'valida'])->name('valida');
route::get('cerrar_sesion',[UsuariosController::class,'cerrar_sesion'])->name('cerrar_sesion');

route::get('home',[UniformeController::class,'home'])->name('home');
route::any('/getInfoServPub',[UniformeController::class,'getInfoServPub'])->name('getInfoServPub');
route::any('/getnumEmp',[UniformeController::class,'getnumEmp'])->name('getnumEmp');
route::any('/comprobantepdf',[UniformeController::class,'comprobantepdf'])->name('comprobantepdf');
route::get('reporte', [UniformeController::class, 'reporte'])->name('reporte');
route::get('comprobantespdf',[UniformeController::class,'comprobantespdf'])->name('comprobantespdf');
route::get('listado',[UniformeController::class,'listado'])->name('listado');

route::get('fichas',[UniformeController::class,'fichas'])->name('fichas');

route::post('datosemp',[UniformeController::class ,'datosemp'])->name('datosemp');
route::post('datosemp2',[UniformeController::class ,'datosemp2'])->name('datosemp2');
route::post('datosemp3',[UniformeController::class ,'datosemp3'])->name('datosemp3');
route::post('recepcionTarjeta',[UniformeController::class ,'recepcionTarjeta'])->name('recepcionTarjeta');
route::post('recepcionUniforme',[UniformeController::class ,'recepcionUniforme'])->name('recepcionUniforme');
route::post('recepcion3Uniforme',[UniformeController::class ,'recepcion3Uniforme'])->name('recepcion3Uniforme');

route::post('recepcion2TarjetaUniforme',[UniformeController::class ,'recepcion2TarjetaUniforme'])->name('recepcion2TarjetaUniforme');
route::post('recepcion2Tarjeta',[UniformeController::class ,'recepcion2Tarjeta'])->name('recepcion2Tarjeta');



route::get('listaTurnos',[UniformeController::class,'listaTurnos'])->name('listaTurnos');

route::get('showRecepcion1',[UniformeController::class,'showRecepcion1'])->name('showRecepcion1');
route::get('showRecepcion2',[UniformeController::class,'showRecepcion2'])->name('showRecepcion2');
route::get('showRecepcion3',[UniformeController::class,'showRecepcion3'])->name('showRecepcion3');
route::get('showNoAcepta',[UniformeController::class, 'showNoAcepta'])->name('showNoAcepta');

route::get('muestraTurno',[UniformeController::class,'muestraTurno'])->name('muestraTurno');

route::get('reporteConcluidos',[UniformeController::class,'reporteConcluidos'])->name('reporteConcluidos');

Route::get('sincronizar',[UniformeController::class,'sincronizaRegistros'])->name('sincronizar');

// Somatometria Controller
Route::resource('somatometria', SomatometriaController::class);
Route::post('recep1', [SomatometriaController::class,'recep1'])->name('recep1');
Route::post('recep2', [SomatometriaController::class,'recep2'])->name('recep2');
Route::get('recep2', [SomatometriaController::class,'recep2'])->name('recep2');
Route::post('recep3', [SomatometriaController::class,'recep3'])->name('recep3');
route::get('reporteRegistros',[SomatometriaController::class,'reporte'])->name('reporteRegistros');
Route::post('noAceptar',[SomatometriaController::class,'noAceptar'])->name('noAceptar');
Route::get('noAceptar',[SomatometriaController::class,'noAceptar'])->name('noAceptar');
Route::post('chkFolio',[SomatometriaController::class,'chkFolio'])->name('chkFolio');
Route::post('reactivarEmp',[SomatometriaController::class,'reactivarEmp'])->name('reactivarEmp');
Route::post('guardaNuevoEmp',[SomatometriaController::class,'guardaNuevoEmp'])->name('guardaNuevoEmp');
Route::get('reporteDia',[SomatometriaController::class,'reporteDia'])->name('reporteDia');
Route::post('reportePeriodo',[SomatometriaController::class,'reportePeriodo'])->name('reportePeriodo');


// ESTIMULOS
route::get('muestraRecepcion1',[EstimuloController::class,'muestraRecepcion1'])->name('muestraRecepcion1');
Route::post('recepcion1', [EstimuloController::class,'recepcion1'])->name('recepcion1');
route::get('reporteEstimulos',[EstimuloController::class,'reporte'])->name('reporteEstimulos');
route::post('reporteEstimulosPeriodo',[EstimuloController::class,'reporteEstimulosPeriodo'])->name('reporteEstimulosPeriodo');






