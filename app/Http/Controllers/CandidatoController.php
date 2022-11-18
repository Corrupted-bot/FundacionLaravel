<?php

namespace App\Http\Controllers;

use App\Models\Candidatos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Candidatos::all();
        return  View("candidatos.index")->with("candidatos",$candidatos);
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
        $candidato = new Candidatos();
        $candidato->nombre = $request->nombre;
        if($request->hasFile("cv")){
    
            $file = $request->file('cv');
            $filename = time() . '_' . $file->getClientOriginalName();
    
            // File upload location
            $location = 'storage/candidato/'. $request->nombre;
    
            // Upload file
            $file->move($location, $filename);
            $candidato->cv= $location."/". $filename;

        }
        if($request->hasFile("rnd")){
    
            $file = $request->file('rnd');
            $filename = time() . '_' . $file->getClientOriginalName();
    
            // File upload location
            $location = 'storage/candidato/'. $request->nombre;
    
            // Upload file
            $file->move($location, $filename);
            $candidato->rnd= $location."/". $filename;

        }
        if($request->hasFile("cert_estudio")){
    
            $file = $request->file('cert_estudio');
            $filename = time() . '_' . $file->getClientOriginalName();
    
            // File upload location
            $location = 'storage/candidato/'. $request->nombre;
    
            // Upload file
            $file->move($location, $filename);
            $candidato->certificado_estudio= $location."/". $filename;

        }
        $candidato->save();
        Session::flash('message', "Se creo correctamente el candidato.");
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
        $candidato = Candidatos::where("id",$id)->first();
        return $candidato;
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
