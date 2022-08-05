<?php

namespace App\Http\Controllers;

use App\Models\APT;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
class APTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $apt = APT::firstOrCreate(['id_proyecto' => $request->id_proyecto_apt]);
        $apt->id_proyecto = $request->id_proyecto_apt; 
        $apt->nombre_puesto = $request->nombre_puesto;
        $apt->descripcion_puesto = $request->descripcion_puesto;
        $apt->horario = $request->horario;
        $apt->detalles_horario = $request->detalles_horario;
        $apt->vestuario = $request->vestuario;
        $apt->detalles_vestuario = $request->detalles_vestuario;
        $apt->formacion_casa = $request->formacion_casa;
        $apt->detalles_formacion_casa = $request->detalles_formacion_casa;
        $apt->pension_empresa = $request->pension_empresa;
        $apt->detalles_pension_empresa = $request->detalles_pension_empresa;
        $apt->relacion_familia = $request->relacion_familia;
        $apt->detalles_relacion_familia = $request->detalles_relacion_familia;
        $apt->seguro_enfermedad = $request->seguro_enfermedad;
        $apt->detalles_seguro_enfermedad = $request->detalles_seguro_enfermedad;
        $apt->vacaciones = $request->vacaciones;
        $apt->detalles_vacaciones = $request->detalles_vacaciones;
        $apt->evaluacion_riesgo = $request->evaluacion_riesgo;
        $apt->detalles_evaluacion_riesgo = $request->detalles_evaluacion_riesgo;
        $apt->evaluacion_realizada = $request->evaluacion_realizada;
        $apt->detalles_evaluacion_realizada = $request->detalles_evaluacion_realizada;
        $apt->promocion_laboral = $request->promocion_laboral;
        $apt->flexibilidad_laboral = $request->flexibilidad_laboral;
        $apt->estar_pie = $request->estar_pie;
        $apt->caminar = $request->caminar;
        $apt->estar_sentado = $request->estar_sentado;
        $apt->levantar = $request->levantar;
        $apt->acarrear = $request->acarrear;
        $apt->empujar = $request->empujar;
        $apt->subir = $request->subir;
        $apt->mantener_equilibrio = $request->mantener_equilibrio;
        $apt->encorvarse = $request->encorvarse;
        $apt->arrodillarse = $request->arrodillarse;
        $apt->manipular_manos = $request->manipular_manos;
        $apt->manipular_destreza = $request->manipular_destreza;
        $apt->vision = $request->vision;
        $apt->audicion = $request->audicion;
        $apt->requisitos_adaptacion = $request->requisitos_adaptacion;
        $apt->apoyo_natural = $request->apoyo_natural;

        for ($i=0; $i <= 45; $i++) { 
            $apt["option".$i] = $request["option".$i];
        }

        $apt->cumplir_horario = $request->cumplir_horario;
        $apt->detalles_cumplir_horario = $request->detalles_cumplir_horario;
        $apt->asistencia = $request->asistencia;
        $apt->detalles_asistencia = $request->detalles_asistencia;
        $apt->comunicacion = $request->comunicacion;
        $apt->detalles_comunicacion = $request->detalles_comunicacion;
        $apt->conducta = $request->conducta;
        $apt->detalles_conducta = $request->detalles_conducta;
        $apt->vestido = $request->vestido;
        $apt->detalles_vestido = $request->detalles_vestido;
        $apt->interaccion_social = $request->interaccion_social;
        $apt->detalles_interaccion_social = $request->detalles_interaccion_social;
        $apt->motivacion = $request->motivacion;
        $apt->detalles_motivacion = $request->detalles_motivacion;
        $apt->flexibilidad = $request->flexibilidad;
        $apt->detalles_flexibilidad = $request->detalles_flexibilidad;
        $apt->iniciativa = $request->iniciativa;
        $apt->detalles_iniciativa = $request->detalles_iniciativa;
        $apt->trabajo_equipo = $request->trabajo_equipo;
        $apt->detalles_trabajo_equipo = $request->detalles_trabajo_equipo;
        $apt->salud_seguridad = $request->salud_seguridad;
        $apt->detalles_salud_seguridad = $request->detalles_salud_seguridad;
        $apt->consistencia = $request->consistencia;
        $apt->detalles_consistencia = $request->detalles_consistencia;
        $apt->trabajar_presion = $request->trabajar_presion;
        $apt->detalles_trabajar_presion = $request->detalles_trabajar_presion;
        $apt->save();
        



        Session::flash('message', "Se guardo correctamente los cambios en el informe APT.");
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
        $apt = DB::table('informe_apt')
        ->where('id_proyecto', '=', $id)
        ->get();
        return $apt;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
