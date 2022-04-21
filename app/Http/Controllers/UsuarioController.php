<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;




class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $empresas = DB::table("empresas")->get();
        return View("usuario.index")->with("empresas", $empresas);
    }


    public function registerUsuario(Request $request)
    {
        // Se crea el usuario con los datos del registro
        $user = User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        // Le asignamos el rol de Cliente
        $user->assignRole($request->rol);
        if ($request->rol == "empresa") {
            DB::table('roles_empresa')->insert([
                'email' => $request->email,
                'idEmpresa' => $request->empresa
            ]);
        }
        Session::flash('message', "Se creo correctamente el usuario.");
        return Redirect::back();
    }
}
