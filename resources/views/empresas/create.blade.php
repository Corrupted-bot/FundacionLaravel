@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div>
</div>
@stop

@section('content')
    <div class="container">
        <form method="POST" action="/empresas">
            @csrf
            <div class="card">
                <div class="card-header" style="text-align: center;background-color: #2257a3;color:white;">
                    <b style="font-size: xx-large;">Crear Empresa</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="rut" class="form-label">Rut<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" id="rut" name="rut" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email<span style="color: red;"> *</span></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                            </div>
                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="giro" class="form-label">Giro<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" id="giro" name="giro" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">

                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección<span style="color: red;">
                                        *</span></label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="cargo" class="form-label">Cargo<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" id="cargo" name="cargo" required>
                            </div>
                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="dotacion" class="form-label">Dotación<span style="color: red;"> *</span></label>
                                <input type="text" class="form-control" id="dotacion" name="dotacion" required>
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
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
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
@stop
