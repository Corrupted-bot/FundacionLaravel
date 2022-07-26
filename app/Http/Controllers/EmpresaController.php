<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
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
        // return Empresa::find($id);
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
}
