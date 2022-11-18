<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CandidatoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProyectoController;
use App\Models\Candidatos;
use App\Models\InfoEmpresa;
use App\Models\Seguimiento;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

Route::group(['middleware' => ['role:administrador']], function () {
    Route::get('/create/usuario', "App\Http\Controllers\UsuarioController@index")->name("crear-usuario");
    Route::post('/create/usuario', "App\Http\Controllers\UsuarioController@registerUsuario");
});

Route::resource('empresas', EmpresaController::class, [
    'names' => [
        'create' => 'empresas.create',
        'index' => 'empresas',
    ]
]);
Route::resource('proyectos', ProyectoController::class, ['names' => [
    'index' => 'proyectos',
]]);




Route::get("/word/{id}", "App\Http\Controllers\ProyectoController@word");
Route::post("/matriz", "App\Http\Controllers\ProyectoController@MatrizEvaluacion");

Route::post("/editar-empresa", 'App\Http\Controllers\EmpresaController@EditarEmpresa');
Route::post("/guardar-empresa-info", 'App\Http\Controllers\EmpresaController@GuardarEmpresa');
Route::post("/guardar-empresa-historial-info", 'App\Http\Controllers\EmpresaController@HistorialContacto');
Route::get("/guardar-empresa-historial-info/{id}", 'App\Http\Controllers\EmpresaController@obtenerHistorialContacto');
Route::post("/eliminar-empresa", 'App\Http\Controllers\EmpresaController@EliminarEmpresa');


Route::get('/empresas-datos', "App\Http\Controllers\EmpresaController@obtenerDatos");
Route::get('/asesoria/{id}', "App\Http\Controllers\MatrizasesoriaController@index");
Route::get('/matrizevaluacion/{id}', 'App\Http\Controllers\ProyectoController@getMatrizEvaluacion');



Route::post("/matrizasesoria", 'App\Http\Controllers\MatrizasesoriaController@store');

Route::post("/informe-apt", 'App\Http\Controllers\APTController@store');
Route::get("/informe-apt/{id}", 'App\Http\Controllers\APTController@show');

Route::get("/matrizasesoria/{id}", 'App\Http\Controllers\MatrizasesoriaController@show');

Route::get("/pauta", function () {
    return View("formulario.index");
});

Route::get("/descargar/{id}", function ($id) {
    $empresa = InfoEmpresa::where("id_empresa", $id)->get();
    $nombre = explode("/", $empresa[0]->convenio_colaboracion);
    // return $empresa[0]->convenio_colaboracion;

    return Response::download($empresa[0]->convenio_colaboracion, $nombre[count($nombre) - 1]);
});

Route::resource("/candidatos", CandidatoController::class);
Route::resource("/calendar", CalendarController::class);



Route::get("/descargar/candidato/{tipo}/{id}", function ($tipo, $id) {
    $candidato = Candidatos::where("id", $id)->get();
    $nombre = explode("/", $candidato[0][$tipo]);
    // print_r($nombre);

    // return $empresa[0]->convenio_colaboracion;

    return Response::download($candidato[0][$tipo], $nombre[count($nombre) - 1]);
});


Route::get("/obtener/nombre/{id}", function ($id) {
    $candidato = Candidatos::where("id", $id)->get();
    return $candidato[0]->nombrecompleto;
});


Route::get("/eventos/{id}", function ($id) {
    $eventos = DB::table("eventos")->where("id_puesto_trabajo", "=", $id)->get();
    return $eventos;
});

Route::post("/enviar/evento", function (Request $request) {

    if ($request->hasFile('file')) {
        $file = $request->file('file');

        $filename = time() . '_' . $file->getClientOriginalName();
        // $location = public_path()."/archivos";
        $location = 'storage/archivos';

        $file->move($location, $filename);
        DB::table('eventos')->insert([
            'title' => $request->titulo,
            'start' => Carbon::parse($request->fecha_inicio)->format('Y-m-d'),
            'end' => Carbon::parse($request->fecha_termino)->format('Y-m-d'),
            'path' => $location . "/" . $filename,
            'id_puesto_trabajo' => $request->id_puesto_trabajo,
        ]);
        return $request->file('file')->getClientOriginalName();
    } else {
        DB::table('eventos')->insert([
            'title' => $request->titulo,
            'start' => Carbon::parse($request->fecha_inicio)->format('Y-m-d'),
            'end' => Carbon::parse($request->fecha_termino)->format('Y-m-d'),
            'id_puesto_trabajo' => $request->id_puesto_trabajo,

        ]);
    }
});

Route::get("/evento/path/{id}", function ($id) {
    $eventos = DB::table("eventos")->where("id", "=", $id)->get();
    return $eventos;
});


Route::get("/descargar/evento/{id}", function ($id) {
    $eventos = DB::table("eventos")->where("id", "=", $id)->get();

    $nombre = explode("/", $eventos[0]->path);
    // print_r($nombre);

    // return $empresa[0]->convenio_colaboracion;

    return Response::download($eventos[0]->path, $nombre[count($nombre) - 1]);
});


//API PARA OBTENER LA INFORMACION  DEL PUESTO DE TRABAJO


Route::get("/obtener/info/candidatos/{id}", function ($id) {
    $seguimiento = Seguimiento::where('id_puesto_trabajo', $id)->first();
    $aux = $seguimiento;
    $aux->candidatos = unserialize($seguimiento->candidatos);
    return $aux;
});
Route::post("/crear/info/candidatos/", function (Request $request) {

    if (count($request->arreglo) > 0) {
        $seguimiento = Seguimiento::where('id_puesto_trabajo', $request->id)->first();
        $seguimiento->candidatos = serialize($request->arreglo);
        $seguimiento->estado = 2;
        $seguimiento->save();
        return $request->all();
    }
});
Route::post("/crear/info/candidato/", function (Request $request) {

    $seguimiento = Seguimiento::where('id_puesto_trabajo', $request->id)->first();
    $seguimiento->seleccionado = $request->candidato;
    $seguimiento->estado = 3;
    $seguimiento->save();
    return $request->all();
});




Route::post("/crear/info/documentos", function (Request $request) {
    $seguimiento = Seguimiento::where('id_puesto_trabajo', $request->id)->first();

    if ($request->hasFile('asistencia')) {
        $file = $request->file('asistencia');

        $filename = time() . '_' . $file->getClientOriginalName();
        // $location = public_path()."/archivos";
        $location = 'storage/archivos';

        $file->move($location, $filename);

        $seguimiento->asistencia = $location . "/" . $filename;
        // return $request->file('file')->getClientOriginalName();

    }
    if ($request->hasFile('ppl')) {
        $file = $request->file('ppl');

        $filename = time() . '_' . $file->getClientOriginalName();
        // $location = public_path()."/archivos";
        $location = 'storage/archivos';

        $file->move($location, $filename);
        $seguimiento->ppl = $location . "/" . $filename;

        // return $request->file('file')->getClientOriginalName();

    }
    $seguimiento->estado = 4;
    $seguimiento->save();

    return 202;
});


Route::get("/descargar/info/{id}/{tipo}", function ($id,$tipo) {
    $seguimiento = Seguimiento::where('id_puesto_trabajo', $id)->first();

    $nombre = explode("/", $seguimiento[$tipo]);


    return Response::download($seguimiento[$tipo], $nombre[count($nombre) - 1]);
});


