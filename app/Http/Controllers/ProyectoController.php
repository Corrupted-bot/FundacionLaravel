<?php

namespace App\Http\Controllers;

use App\Models\AscensorMatriz;
use App\Models\EscalerasMatriz;
use App\Models\EspaciosMatriz;
use App\Models\EstacionamientoMatriz;
use App\Models\EvacuacionMatriz;
use App\Models\IngresoMatriz;
use App\Models\InteriorMatriz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\Proyecto;
use App\Models\MatrizEvaluacion;
use App\Models\PuertaMatriz;
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
        $dato = DB::table("proyectos")->where("idEmpresa", "=", $id)->get();
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

    public function word($id)
    {

        $proyecto = DB::table("proyectos")->where("id", "=", $id)->get();
        $empresa = DB::table("empresas")->where("id", "=", $proyecto[0]->idEmpresa)->get();

        // // Make sure you have `dompdf/dompdf` in your composer dependencies.
        // Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
        // // Any writable directory here. It will be ignored.
        // Settings::setPdfRendererPath('.');

        // $phpWord = IOFactory::load(public_path('descargables/APT.docx'), 'Word2007');
        // $phpWord->save(public_path('descargables/APT.pdf'), 'PDF');

        $templateWord = new TemplateProcessor(public_path('apt/Ficha de Análisis del Puesto de trabajo (APT).docx'));
        $templateWord->setValue('nombre_empresa', $empresa[0]->nombre);
        $templateWord->setValue('direccion_empresa', $empresa[0]->direccion);
        $templateWord->setValue('telefono_empresa', $empresa[0]->telefono);
        $templateWord->setValue('email_empresa', $empresa[0]->email);
        $templateWord->setValue('cargo_empresa', $empresa[0]->cargo);
        $templateWord->setValue('dotacion_empresa', $empresa[0]->dotacion);
        $templateWord->saveAs('descargables/APT.docx');
        return response()->download(public_path('descargables/APT.docx'));
    }



    public function MatrizEvaluacion(Request $request)
    {

        // $templateWord = new TemplateProcessor(public_path('apt/Criterios de evaluación AU y plan anual asesoría e inclusión laboral.docx'));
        // $templateWord->setValue('criterio_estacionamiento_1',$request->estacionamiento_1);

        // $templateWord->saveAs('descargables/MatrizEvaluacion.docx');
        // return response()->download(public_path('descargables/MatrizEvaluacion.docx'));


        $datos = [["estacionamiento", 6], ["ingreso", 8], ["puerta", 5], ["evacuacion", 7], ["espacios", 5], ["interior", 5], ["escaleras", 6], ["ascensor", 10]];
        $matrizevaluacion = MatrizEvaluacion::firstOrCreate(['id_proyecto' => $request->id_proyecto]);
        $matrizevaluacion->id_proyecto = $request->id_proyecto;
        //ESTACIONAMIENTO
        $estacionamiento = EstacionamientoMatriz::firstOrCreate(['id' => $matrizevaluacion->id_estacionamiento]);
        $matrizevaluacion->id_estacionamiento = $estacionamiento->id;
        //INGRESO
        $ingreso = IngresoMatriz::firstOrCreate(['id' => $matrizevaluacion->id_ingreso]);
        $matrizevaluacion->id_ingreso = $ingreso->id;
        //PUERTA
        $puerta = PuertaMatriz::firstOrCreate(['id' => $matrizevaluacion->id_puerta]);
        $matrizevaluacion->id_puerta = $puerta->id;
        //EVACUACION
        $evacuacion = EvacuacionMatriz::firstOrCreate(['id' => $matrizevaluacion->id_evacuacion]);
        $matrizevaluacion->id_evacuacion = $evacuacion->id;
        //ESPACIOS
        $espacios = EspaciosMatriz::firstOrCreate(['id' => $matrizevaluacion->id_espacios]);
        $matrizevaluacion->id_espacios = $espacios->id;
        //INTERIOR
        $interior = InteriorMatriz::firstOrCreate(['id' => $matrizevaluacion->id_interior]);
        $matrizevaluacion->id_interior = $interior->id;
        //ESCALERAS
        $escaleras = EscalerasMatriz::firstOrCreate(['id' => $matrizevaluacion->id_escaleras]);
        $matrizevaluacion->id_escaleras = $escaleras->id;
        //ASCENSOR
        $ascensor = AscensorMatriz::firstOrCreate(['id' => $matrizevaluacion->id_ascensor]);
        $matrizevaluacion->id_ascensor = $ascensor->id;


        foreach ($datos as $data) {
            if ($data[0] == "estacionamiento") {
                $matrizevaluacion->AgregarMatriz($data[0], $data[1], $estacionamiento, $request->all());
            }
            if ($data[0] == "ingreso") {
                $matrizevaluacion->AgregarMatriz($data[0], $data[1], $ingreso, $request->all());
            }
            if ($data[0] == "puerta") {
                $matrizevaluacion->AgregarMatriz($data[0], $data[1], $puerta, $request->all());
            }
            if ($data[0] == "evacuacion") {
                $matrizevaluacion->AgregarMatriz($data[0], $data[1], $evacuacion, $request->all());
            }
            if ($data[0] == "espacios") {
                $matrizevaluacion->AgregarMatriz($data[0], $data[1], $espacios, $request->all());
            }
            if ($data[0] == "interior") {
                $matrizevaluacion->AgregarMatriz($data[0], $data[1], $interior, $request->all());
            }
            if ($data[0] == "escaleras") {
                $matrizevaluacion->AgregarMatriz($data[0], $data[1], $escaleras, $request->all());
            }
            if ($data[0] == "ascensor") {
                $matrizevaluacion->AgregarMatriz($data[0], $data[1], $ascensor, $request->all());
            }
        }
        $matrizevaluacion->save();

        // return redirect("/proyectos"); 

    }
    public function getMatrizEvaluacion($id)
    {
        // $matrizevaluacion = MatrizEvaluacion::where("id_proyecto", $id)->get();
        // return $matrizevaluacion;

        $matrizevaluacion = DB::table('matriz_evaluacion')
        ->where('id_proyecto', '=', $id)
        ->join('estacionamiento', 'matriz_evaluacion.id_estacionamiento', '=', 'estacionamiento.id')
        ->join('ingreso', 'matriz_evaluacion.id_ingreso', '=', 'ingreso.id')
        ->join('puerta', 'matriz_evaluacion.id_puerta', '=', 'puerta.id')
        ->join('evacuacion', 'matriz_evaluacion.id_evacuacion', '=', 'evacuacion.id')
        ->join('espacios', 'matriz_evaluacion.id_espacios', '=', 'espacios.id')
        ->join('interior', 'matriz_evaluacion.id_interior', '=', 'interior.id')
        ->join('escaleras', 'matriz_evaluacion.id_escaleras', '=', 'escaleras.id')
        ->join('ascensor', 'matriz_evaluacion.id_ascensor', '=', 'ascensor.id')
        ->select('matriz_evaluacion.*', 'estacionamiento.*','ingreso.*','puerta.*','evacuacion.*','espacios.*','interior.*','escaleras.*','ascensor.*')
        ->get();
        return $matrizevaluacion;


    }
}
