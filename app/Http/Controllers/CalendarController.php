<?php

namespace App\Http\Controllers;

use App\Models\Candidatos;
use App\Models\Seguimiento;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        if (!isset($id)) {
            return redirect("/proyectos");
        }
        $seguimiento = Seguimiento::where('id_puesto_trabajo', $id)->first();
        $candidatos = Candidatos::all();

        if(!$seguimiento){
            // print_r("aa");
            $seguimientovar = Seguimiento::create([
                'estado' => 1,
                'id_puesto_trabajo' => $id
            ]);
            $estado = 1;
            return View("calendar.index")->with("candidatos",$candidatos)->with("estado",$estado);
        }else{

            $estado = $seguimiento->estado;
            return View("calendar.index")->with("candidatos",$candidatos)->with("estado",$estado);
        }
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
        //
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
