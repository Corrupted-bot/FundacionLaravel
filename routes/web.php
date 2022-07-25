<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProyectoController;

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
    return redirect("/login");
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => ['role:administrador' ]], function () {
    Route::get('/create/usuario', "App\Http\Controllers\UsuarioController@index")->name("crear-usuario");
    Route::post('/create/usuario', "App\Http\Controllers\UsuarioController@registerUsuario");

});

 
Route::resource('empresas', EmpresaController::class, [
    'names' => [
        'create' => 'empresas.create',
        'index' => 'empresas',
    ]
]);

Route::get("/word/{id}","App\Http\Controllers\ProyectoController@word");
Route::post("/matriz","App\Http\Controllers\ProyectoController@MatrizEvaluacion");

Route::post("/editar-empresa",'App\Http\Controllers\EmpresaController@EditarEmpresa');
Route::post("/eliminar-empresa",'App\Http\Controllers\EmpresaController@EliminarEmpresa');

Route::resource('proyectos', ProyectoController::class,['names' => [
    'index' => 'proyectos',
]]);
Route::get('/empresas-datos', "App\Http\Controllers\EmpresaController@obtenerDatos");
Route::get('/asesoria/{id}', "App\Http\Controllers\MatrizasesoriaController@index");
Route::get('/matrizevaluacion/{id}','App\Http\Controllers\ProyectoController@getMatrizEvaluacion');



