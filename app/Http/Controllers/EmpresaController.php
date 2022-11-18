<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\HistorialEmpresa;
use App\Models\InfoEmpresa;
use Illuminate\Support\Facades\Redirect;
use Session;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return View("empresas.index")->with("empresas", $empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View("empresas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = new Empresa;
        $empresa->nombre = $request->nombre;
        $empresa->rut = $request->rut;
        $empresa->email = $request->email;
        $empresa->telefono = $request->telefono;
        $empresa->giro = $request->giro;
        $empresa->direccion = $request->direccion;
        $empresa->cargo = $request->cargo;
        $empresa->dotacion = $request->dotacion;
        $empresa->save();

        Session::flash('message', "Se creo correctamente la empresa.");
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $empresa = InfoEmpresa::where("id_empresa",$id)->get();
        if (count($empresa) != 0) {
            # code...
            return InfoEmpresa::where("id_empresa",$id)->get()[0];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return Empresa::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function EditarEmpresa(Request $request)
    {
        //
        $empresa = Empresa::find($request->idEmpresa_Editar);
        $empresa->nombre = $request->nombreEmpresa;
        $empresa->rut = $request->rut;
        $empresa->email = $request->email;
        $empresa->telefono = $request->telefono;
        $empresa->giro = $request->giro;
        $empresa->direccion = $request->direccion;
        $empresa->cargo = $request->cargo;
        $empresa->dotacion = $request->dotacion;
        $empresa->save();
        Session::flash('message', "Se actualizo correctamente.");
        return Redirect::back();
    }
    public function EliminarEmpresa(Request $request)
    {
        //
        $empresa = Empresa::find($request->idEmpresa_Eliminar);

        $empresa->delete();
        Session::flash('message', "Se elimino correctamente.");
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function obtenerDatos()
    {
        return Empresa::all();
    }

    public function GuardarEmpresa(Request $request){
        $empresa = InfoEmpresa::firstOrCreate(['id_empresa' => intval($request->id_empresa_info)]);
        if($request->hasFile("convenio")){
    
            $file = $request->file('convenio');
            $filename = time() . '_' . $file->getClientOriginalName();
    
            // File upload location
            $location = 'storage/empresas/'.$request->id_empresa_info;
    
            // Upload file
            $file->move($location, $filename);
            $empresa->convenio_colaboracion= $location."/". $filename;

        }
        if (isset($request->fecha_reunion)) {
            $empresa->fecha_reunion_inicial = $request->fecha_reunion;
        }
        if (isset($request->enviado)) {
            $empresa->enviado = 1;
        }
        if (isset($request->recibido)) {
            $empresa->recibido = 1;
        }
        if (isset($request->fecha_levantamiento)) {
            $empresa->fecha_levantamiento = $request->fecha_levantamiento;
        }
        if (isset($request->fecha_candidatos)) {
            $empresa->fecha_candidatos = $request->fecha_candidatos;
        }
        if (isset($request->id_empresa_info)) {
            $empresa->id_empresa = intval($request->id_empresa_info);
        }
        // $empresa["id_empresa"] = 1;
        $empresa->save();
        return $request->all();
    }

    public function HistorialContacto(Request $request)
    {
        $historial = new HistorialEmpresa();
        $historial->id_empresa = $request->id_empresa_info_historial;
        $historial->fecha_contacto = $request->fecha_contacto;
        $historial->estado = $request->estado_contacto;
        $historial->save();
        Session::flash('message', "Se guardo correctamente.");
        return Redirect::back();
    }

    public function obtenerHistorialContacto($id){
        $historial = HistorialEmpresa::where("id_empresa",$id)->get();
        return $historial;
    }

}
