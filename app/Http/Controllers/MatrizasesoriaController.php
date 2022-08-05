<?php

namespace App\Http\Controllers;

use App\Models\MACapacitacion;
use App\Models\MADiagnostico;
use App\Models\MAInclusion;
use App\Models\MatrizAsesoria;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

class MatrizasesoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return View("matrizasesoria.index");
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
        //BUSCAR MATRIZ DE ASESORIA - O CREARLA
        $matrizasesoria = MatrizAsesoria::firstOrCreate(['id_empresa' => $request->id_empresa]);
        $matrizasesoria->id_empresa = $request->id_empresa;

        //BUSCAR Y CREAR LOS PILARES
        $madiagnostico = MADiagnostico::firstOrCreate(['id' => $matrizasesoria->id_diagnostico]);
        $matrizasesoria->id_diagnostico = $madiagnostico->id;
        for ($i=1; $i <= 4; $i++) { 
            $madiagnostico[$i."_diagnostico_responsable_nombre"] = $request[$i."_diagnostico_responsable_nombre"];
            $madiagnostico[$i."_diagnostico_responsable_cargo"] = $request[$i."_diagnostico_responsable_cargo"];
            $madiagnostico[$i."_diagnostico_fecha_inicio"] = $request[$i."_diagnostico_fecha_inicio"];
            $madiagnostico[$i."_diagnostico_fecha_termino"] = $request[$i."_diagnostico_fecha_termino"];
        }
        $madiagnostico->save();
        // <------------------------------------------------->
        $mainclusion = MAInclusion::firstOrCreate(['id' => $matrizasesoria->id_inclusion_laboral]);
        $matrizasesoria->id_inclusion_laboral = $mainclusion->id;

        for ($i=1; $i <= 2; $i++) { 
            $mainclusion[$i."_inclusion_responsable_nombre"] = $request[$i."_inclusion_responsable_nombre"];
            $mainclusion[$i."_inclusion_responsable_cargo"] = $request[$i."_inclusion_responsable_cargo"];
            $mainclusion[$i."_inclusion_fecha_inicio"] = $request[$i."_inclusion_fecha_inicio"];
            $mainclusion[$i."_inclusion_fecha_termino"] = $request[$i."_inclusion_fecha_termino"];
        }
        $mainclusion->save();

        // <------------------------------------------------->

        $macapacitacion = MACapacitacion::firstOrCreate(['id' => $matrizasesoria->id_capacitacion]);
        $matrizasesoria->id_capacitacion = $macapacitacion->id;

        for ($i=1; $i <= 2; $i++) { 
            $macapacitacion[$i."_capacitacion_responsable_nombre"] = $request[$i."_capacitacion_responsable_nombre"];
            $macapacitacion[$i."_capacitacion_responsable_cargo"] = $request[$i."_capacitacion_responsable_cargo"];
            $macapacitacion[$i."_capacitacion_fecha_inicio"] = $request[$i."_capacitacion_fecha_inicio"];
            $macapacitacion[$i."_capacitacion_fecha_termino"] = $request[$i."_capacitacion_fecha_termino"];
        }
        $macapacitacion->save();

        $matrizasesoria->save();

        
        Session::flash('message', "Se guardo correctamente el plan anual.");
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
        $matrizevaluacion = DB::table('matriz_asesoria')
        ->where('id_empresa', '=', $id)
        ->join('ma_diagnostico_institucional', 'matriz_asesoria.id_diagnostico', '=', 'ma_diagnostico_institucional.id')
        ->join('ma_inclusion_laboral', 'matriz_asesoria.id_inclusion_laboral', '=', 'ma_inclusion_laboral.id')
        ->join('ma_capacitacion', 'matriz_asesoria.id_capacitacion', '=', 'ma_capacitacion.id')
        ->select('ma_diagnostico_institucional.*', 'ma_inclusion_laboral.*','ma_capacitacion.*')
        ->get();
        return $matrizevaluacion;
        // return response($status=200)
        
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
