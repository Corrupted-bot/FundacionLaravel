<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\Proyecto;
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
        $templateWord = new TemplateProcessor(public_path('apt/Criterios de evaluación AU y plan anual asesoría e inclusión laboral.docx'));
        $templateWord->setValue('criterio_estacionamiento_1',$request->estacionamiento_1);

        $templateWord->saveAs('descargables/MatrizEvaluacion.docx');
        return response()->download(public_path('descargables/MatrizEvaluacion.docx'));
    }

}
