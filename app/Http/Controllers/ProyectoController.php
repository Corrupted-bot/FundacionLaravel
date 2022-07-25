<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\Proyecto;
use App\Models\MatrizEvaluacion;
use DB;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;



class ProyectoController extends Controller
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
        //
        return View("proyectos.index");
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

        $proyecto = new Proyecto;
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->idEmpresa = $request->idEmpresa;
        $proyecto->save();

        Session::flash('message', "Se creo correctamente el proyecto.");
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
        // return response()->json(Proyecto::find($id));
        $dato = DB::table("proyectos")->where("idEmpresa","=",$id)->get();
        return $dato;
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

    public function word($id){

        $proyecto = DB::table("proyectos")->where("id","=",$id)->get();
        $empresa = DB::table("empresas")->where("id","=",$proyecto[0]->idEmpresa)->get();

        // // Make sure you have `dompdf/dompdf` in your composer dependencies.
        // Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
        // // Any writable directory here. It will be ignored.
        // Settings::setPdfRendererPath('.');

        // $phpWord = IOFactory::load(public_path('descargables/APT.docx'), 'Word2007');
        // $phpWord->save(public_path('descargables/APT.pdf'), 'PDF');

        $templateWord = new TemplateProcessor(public_path('apt/Ficha de Análisis del Puesto de trabajo (APT).docx'));
        $templateWord->setValue('nombre_empresa',$empresa[0]->nombre);
        $templateWord->setValue('direccion_empresa',$empresa[0]->direccion);
        $templateWord->setValue('telefono_empresa',$empresa[0]->telefono);
        $templateWord->setValue('email_empresa',$empresa[0]->email);
        $templateWord->setValue('cargo_empresa',$empresa[0]->cargo);
        $templateWord->setValue('dotacion_empresa',$empresa[0]->dotacion);
        $templateWord->saveAs('descargables/APT.docx');
        return response()->download(public_path('descargables/APT.docx'));
    }

    public function MatrizEvaluacion(Request $request){

        // $templateWord = new TemplateProcessor(public_path('apt/Criterios de evaluación AU y plan anual asesoría e inclusión laboral.docx'));
        // $templateWord->setValue('criterio_estacionamiento_1',$request->estacionamiento_1);

        // $templateWord->saveAs('descargables/MatrizEvaluacion.docx');
        // return response()->download(public_path('descargables/MatrizEvaluacion.docx'));

        $matrizevaluacion = MatrizEvaluacion::firstOrCreate(['id_proyecto' => $request->id_proyecto]);
        $matrizevaluacion->id_proyecto = $request->id_proyecto;
        
        //ESTACIONAMIENTO
        $matrizevaluacion->estacionamiento_revision_1 = $request->estacionamiento_revision_1;
        $matrizevaluacion->estacionamiento_revision_2 = $request->estacionamiento_revision_2;
        $matrizevaluacion->estacionamiento_revision_3 = $request->estacionamiento_revision_3;
        $matrizevaluacion->estacionamiento_revision_4 = $request->estacionamiento_revision_4;
        $matrizevaluacion->estacionamiento_revision_5 = $request->estacionamiento_revision_5;
        $matrizevaluacion->estacionamiento_revision_6 = $request->estacionamiento_revision_6;


        $matrizevaluacion->estacionamiento_criterio_1 = $request->estacionamiento_1;
        $matrizevaluacion->estacionamiento_criterio_2 = $request->estacionamiento_2;
        $matrizevaluacion->estacionamiento_criterio_3 = $request->estacionamiento_3;
        $matrizevaluacion->estacionamiento_criterio_4 = $request->estacionamiento_4;
        $matrizevaluacion->estacionamiento_criterio_5 = $request->estacionamiento_5;
        $matrizevaluacion->estacionamiento_criterio_6 = $request->estacionamiento_6;


        $matrizevaluacion->estacionamiento_logro_1 = $request->logro_estacionamiento_1;
        $matrizevaluacion->estacionamiento_logro_2 = $request->logro_estacionamiento_2;
        $matrizevaluacion->estacionamiento_logro_3 = $request->logro_estacionamiento_3;
        $matrizevaluacion->estacionamiento_logro_4 = $request->logro_estacionamiento_4;
        $matrizevaluacion->estacionamiento_logro_5 = $request->logro_estacionamiento_5;
        $matrizevaluacion->estacionamiento_logro_6 = $request->logro_estacionamiento_6;


        //INGRESO

        $matrizevaluacion->ingreso_revision_1 = $request->ingreso_revision_1;
        $matrizevaluacion->ingreso_revision_2 = $request->ingreso_revision_2;
        $matrizevaluacion->ingreso_revision_3 = $request->ingreso_revision_3;
        $matrizevaluacion->ingreso_revision_4 = $request->ingreso_revision_4;
        $matrizevaluacion->ingreso_revision_5 = $request->ingreso_revision_5;
        $matrizevaluacion->ingreso_revision_6 = $request->ingreso_revision_6;
        $matrizevaluacion->ingreso_revision_7 = $request->ingreso_revision_7;
        $matrizevaluacion->ingreso_revision_8 = $request->ingreso_revision_8;


        $matrizevaluacion->ingreso_criterio_1 = $request->ingreso_1;
        $matrizevaluacion->ingreso_criterio_2 = $request->ingreso_2;
        $matrizevaluacion->ingreso_criterio_3 = $request->ingreso_3;
        $matrizevaluacion->ingreso_criterio_4 = $request->ingreso_4;
        $matrizevaluacion->ingreso_criterio_5 = $request->ingreso_5;
        $matrizevaluacion->ingreso_criterio_6 = $request->ingreso_6;
        $matrizevaluacion->ingreso_criterio_7 = $request->ingreso_7;
        $matrizevaluacion->ingreso_criterio_8 = $request->ingreso_8;


        $matrizevaluacion->ingreso_logro_1 = $request->logro_ingreso_1;
        $matrizevaluacion->ingreso_logro_2 = $request->logro_ingreso_2;
        $matrizevaluacion->ingreso_logro_3 = $request->logro_ingreso_3;
        $matrizevaluacion->ingreso_logro_4 = $request->logro_ingreso_4;
        $matrizevaluacion->ingreso_logro_5 = $request->logro_ingreso_5;
        $matrizevaluacion->ingreso_logro_6 = $request->logro_ingreso_6;
        $matrizevaluacion->ingreso_logro_7 = $request->logro_ingreso_7;
        $matrizevaluacion->ingreso_logro_8 = $request->logro_ingreso_8;

        //PUERTA
        $matrizevaluacion->puerta_revision_1 = $request->puerta_revision_1;
        $matrizevaluacion->puerta_revision_2 = $request->puerta_revision_2;
        $matrizevaluacion->puerta_revision_3 = $request->puerta_revision_3;
        $matrizevaluacion->puerta_revision_4 = $request->puerta_revision_4;
        $matrizevaluacion->puerta_revision_5 = $request->puerta_revision_5;

        $matrizevaluacion->puerta_criterio_1 = $request->puerta_1;
        $matrizevaluacion->puerta_criterio_2 = $request->puerta_2;
        $matrizevaluacion->puerta_criterio_3 = $request->puerta_3;
        $matrizevaluacion->puerta_criterio_4 = $request->puerta_4;
        $matrizevaluacion->puerta_criterio_5 = $request->puerta_5;

        $matrizevaluacion->puerta_logro_1 = $request->logro_puerta_1;
        $matrizevaluacion->puerta_logro_2 = $request->logro_puerta_2;
        $matrizevaluacion->puerta_logro_3 = $request->logro_puerta_3;
        $matrizevaluacion->puerta_logro_4 = $request->logro_puerta_4;
        $matrizevaluacion->puerta_logro_5 = $request->logro_puerta_5;

        $matrizevaluacion->save();

        return $request->all();
    }
    public function getMatrizEvaluacion($id)
    {
        $matrizevaluacion = MatrizEvaluacion::where("id_proyecto",$id)->get();
        return $matrizevaluacion;
    }

}
