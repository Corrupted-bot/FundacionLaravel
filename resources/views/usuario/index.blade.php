@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div></div>
@stop

@section('content')
    <div class="container">

        <form method="POST" action="/create/usuario">
            @csrf
            <div class="card">
                <div class="card-header" style="text-align: center;background-color: #2257a3;color:white;">
                    <b style="font-size: xx-large;">Crear Usuario</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre<span style="color: red;">
                                        *</span></label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electronico<span style="color: red;">
                                        *</span></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña<span style="color: red;">
                                        *</span></label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="password" class="form-label">Tipo de Usuario<span style="color: red;">
                                        *</span></label>
                                <select name="rol" id="rol" class="form-control" required>
                                    <option value="" selected disabled>Seleccionar un Rol</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="gestor">Gestor</option>
                                    <option value="empresa">Empresa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display: none" id="CampoEmpresa">
                        <div class="col">
                            <div class="mb-3">
                                <label for="password" class="form-label">Seleccionar Empresa<span style="color: red;">
                                        *</span></label>
                                <select name="empresa" id="empresa" class="form-control">
                                    <option value="" selected disabled>Seleccionar una Empresa</option>
                                    @foreach ($empresas as $empresa)
                                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="display: flex;justify-content: center;">
                        <button id="boton-enviar" class="btn btn-success btn-lg"
                            style="width: 20%;background-color: #2157a3;">Guardar</button>
                    </div>


                </div>
            </div>
        </form>
        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
@stop

@section('css')
    <style>
        .form-control {
            border-radius: 0.25rem !important;
        }

        #boton-enviar:hover {
            background-color: black !important;
        }
    </style>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    <script>
        $("#rol").change(function() {
            if ($("#rol").val() == "empresa") {
                $("#CampoEmpresa").css("display", "flex")
            } else {
                $("#CampoEmpresa").css("display", "none")
            }
        })
    </script>
@stop
