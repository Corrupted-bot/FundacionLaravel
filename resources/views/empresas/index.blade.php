@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div>
</div>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            Administrar Empresas
        </div>
        <div class="card-body">
            <table id="empresas" class="table table-striped table-hover table-bordered " style="width:100%">
                <thead style="background-color: #2257a3;color: white;">
                    <tr>
                        <th>Nombre</th>
                        <th>Rut</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Giro</th>
                        <th>Dirección</th>
                        <th>Cargo</th>
                        <th>Dotación</th>
                        <th style="text-align: center;">Herramientas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->nombre }}</td>
                            <td>{{ $empresa->rut }}</td>
                            <td>{{ $empresa->email }}</td>
                            <td>{{ $empresa->telefono }}</td>
                            <td>{{ $empresa->giro }}</td>
                            <td>{{ $empresa->direccion }}</td>
                            <td>{{ $empresa->cargo }}</td>
                            <td>{{ $empresa->dotacion }}</td>
                            <td>
                                <div style="display: flex;align-items: center;">
                                    <button class="btn btn-success" style="margin-right: 10px;width: max-content;"
                                        onclick="AbrirProyecto({{ $empresa->id }})">Proyecto <i
                                            class="fa-solid fa-folder"></i></button>
                                    <button class="btn btn-warning" style="margin-right: 10px;width: max-content;"
                                        onclick="AbrirEmpresa({{ $empresa->id }})"> <i
                                            class="fa-solid fa-pencil"></i></button>
                                    <button class="btn btn-danger" style="margin-right: 10px;width: max-content;"
                                        onclick="AbrirEmpresaEliminar({{ $empresa->id }})"> <i
                                            class="fa-solid fa-trash"></i></button>
                                    <button class="btn btn-secondary" style="margin-right: 10px;width: max-content;"
                                        onclick="AbrirPlanAnual({{ $empresa->id }})">Plan Anual Asesoría<br> e
                                        Inclusión</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>

    <div class="modal fade" id="ProyectoModal" tabindex="-1" aria-labelledby="ProyectoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ProyectoModalLabel">Crear Proyecto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/proyectos">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="col-form-label">Nombre del Proyecto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="col-form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" style="height: 185px;"></textarea>
                        </div>
                        <input type="text" id="idEmpresa" name="idEmpresa" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="EliminarModal" tabindex="-1" aria-labelledby="EliminarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EliminarModalLabel">¿Estas seguro que deseas eliminar la empresa?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <form method="POST" action="/eliminar-empresa">
                    @csrf

                    <div class="modal-footer" style="display: flex;justify-content: center;">
                        <input type="text" id="idEmpresa_Eliminar" name="idEmpresa_Eliminar" hidden>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="EmpresaModal" tabindex="-1" aria-labelledby="EmpresaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EmpresaModalLabel">Editar Empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/editar-empresa">
                        @csrf
                        <div class="row">
                            <div class="col">

                                <div class="mb-3">
                                    <label for="nombreEmpresa" class="form-label">Nombre<span style="color: red;">
                                            *</span></label>
                                    <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa">
                                </div>
                            </div>
                            <div class="col">

                                <div class="mb-3">
                                    <label for="rut" class="form-label">Rut<span style="color: red;">
                                            *</span></label>
                                    <input type="text" class="form-control" id="rut" name="rut">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email<span style="color: red;">
                                            *</span></label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono<span style="color: red;">
                                            *</span></label>
                                    <input type="text" class="form-control" id="telefono" name="telefono">
                                </div>
                            </div>
                            <div class="col">

                                <div class="mb-3">
                                    <label for="giro" class="form-label">Giro<span style="color: red;">
                                            *</span></label>
                                    <input type="text" class="form-control" id="giro" name="giro">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección<span style="color: red;">
                                            *</span></label>
                                    <input type="text" class="form-control" id="direccion" name="direccion">
                                </div>
                            </div>
                            <div class="col">

                                <div class="mb-3">
                                    <label for="cargo" class="form-label">Cargo<span style="color: red;">
                                            *</span></label>
                                    <input type="text" class="form-control" id="cargo" name="cargo">
                                </div>
                            </div>
                            <div class="col">

                                <div class="mb-3">
                                    <label for="dotacion" class="form-label">Dotación<span style="color: red;">
                                            *</span></label>
                                    <input type="text" class="form-control" id="dotacion" name="dotacion">
                                </div>
                            </div>
                        </div>
                        <input type="text" id="idEmpresa_Editar" name="idEmpresa_Editar" hidden>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Plan  -->
    <div class="modal fade" id="PlanAnualModal" tabindex="-1" role="dialog" aria-labelledby="PlanAnualModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                                          <div class="card-header" style="text-align: center;background-color: #2257a3;color:white;width:-webkit-fill-available;">
                            <b style="font-size: xx-large;">Plan Anual Asesoría e Inclusión</b>
                        </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                                    <form method="POST" action="/empresas">
                    @csrf
                    <div class="card">

                        <div class="card-body">
                            <style>

                                #myTab .nav-link {
                                    background-color: #2257a3 !important;
                                    color: white !important;
                                    margin: 2px !important;
                                }

                                #myTab .nav-link:hover {
                                    background-color: #5194f3 !important;
                                }

                                #myTab .nav-link:active {
                                    background-color: black !important;
                                }




                                .my-custom-scrollbar {
                                    position: relative;
                                    height: 500px;
                                    overflow: auto;
                                }

                                .table-wrapper-scroll-y {
                                    display: block;
                                }
                            </style>
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 20px;">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" type="button" role="tab" aria-controls="home" aria-selected="true">DIAGNÓSTICO INSTITUCIONAL</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">GESTIÓN DE LA INCLUSIÓN LABORAL</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">PLAN DE CAPACITACIÓN</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <table id="empresas" class="table table-striped table-hover table-bordered my-custom-scrollbar table-wrapper-scroll-y" style="width:100%">
                                        <thead style="background-color: #2257a3;color: white;">
                                            <tr>
                                                <th colspan="9" class="text-center">DIAGNÓSTICO INSTITUCIONAL</th>
                                            </tr>
                                            <tr>
                                                <th>ESTRATEGIA</th>
                                                <th>ACCIÓN</th>
                                                <th>RESPONSABLE</th>
                                                <th style="text-align: center;">Herramientas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class='FilaPrincipal'>
                                                <td rowspan='4'>1. Levantamiento de información
                                                </td>
                                                <td rowspan='1'>Entrega de documentación (organigrama, bases de datos
                                                    RR.HH,
                                                    Comité Paritario de Higiene y Salud, Departamento de Prevención de
                                                    Riesgo,
                                                    Sindicatos, etc.)
                                                </td>
                                                <td rowspan='4'>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>

                                                </td>
                                                <td rowspan='4'>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Asignar Fecha
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Reunión dependencias Empresa</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Revisión de documentación / información</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Informe 1 (preliminar)</td>
                                            </tr>
                                            <tr class='FilaPrincipal'>
                                                <td rowspan='13'>2. Diseño y aplicación de instrumentos
                                                </td>
                                                <td rowspan='1'>Diseño de encuesta online</td>

                                                <td rowspan='13'>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>

                                                </td>
                                                <td rowspan='13'>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Asignar Fecha
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Jornadas informativas empresa</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Validación de instrumento</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Envío de encuesta a colaboradores. 1° convocatoria</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Entrega de primer reporte</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>* Estrategia de contingencia</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Envío de encuesta a colaboradores. 2° convocatoria</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Entrega segundo reporte</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>* Estrategia de contingencia</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Envío de encuesta a colaboradores. 3° convocatoria</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Entrega tercer reporte</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>* Estrategia de contingencia</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Aplicación y recepción de información</td>
                                            </tr>
                                            <tr class='FilaPrincipal'>
                                                <td rowspan='3'>3. Sistematización y análisis
                                                </td>
                                                <td rowspan='1'>Sistematización de información (encuestas)</td>

                                                <td rowspan='3'>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>

                                                </td>
                                                <td rowspan='3'>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Asignar Fecha
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Analisis de información</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Informe 2 (preliminar)</td>
                                            </tr>
                                            <tr class='FilaPrincipal'>
                                                <td rowspan='6'>4. Información especifica colaboradores con discapacidad
                                                </td>
                                                <td rowspan='1'>Diseño de instrumentos (entrevista)</td>

                                                <td rowspan='6'>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>

                                                </td>
                                                <td rowspan='6'>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Asignar Fecha
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Validación de instrumentos</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Aplicación de intrumentos</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Analisis de información</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Informe final</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Presentación resultados</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <table id="empresas" class="table table-striped table-hover table-bordered my-custom-scrollbar table-wrapper-scroll-y" style="width:100%">
                                        <thead style="background-color: #2257a3;color: white;">
                                            <tr>
                                                <th colspan="9" class="text-center">ASESORÍA EN INTERMEDIACIÓN LABORAL</th>
                                            </tr>
                                            <tr>
                                                <th>ESTRATEGIA</th>
                                                <th>ACCIÓN</th>
                                                <th>RESPONSABLE</th>
                                                <th style="text-align: center;">Herramientas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class='FilaPrincipal'>
                                                <td rowspan='9'>1. Atracción de Talento Inclusivo
                                                </td>
                                                <td rowspan='1'>Levantamiento de cargos.
                                                </td>
                                                <td rowspan='9'>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>

                                                </td>
                                                <td rowspan='9'>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Asignar Fecha
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Evaluación Puesto de Trabajo.</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Evaluación de accesibilidad </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Levantamiento de perfiles de cargos. </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Proceso de reclutamiento. </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Proceso de Selección. </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Presentación de ternas de los cargos a considerar. </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Charlas equipos de trabajo. </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Sesiones de Coaching o Mentoring a colaboradores seleccionado. </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <table id="empresas" class="table table-striped table-hover table-bordered my-custom-scrollbar table-wrapper-scroll-y" style="width:100%">
                                        <thead style="background-color: #2257a3;color: white;">
                                            <tr>
                                                <th colspan="9" class="text-center">ASESORÍA EN POSTULACIÓN AL SELLO CHILE INCLUSIVO</th>
                                            </tr>
                                            <tr>
                                                <th>ESTRATEGIA</th>
                                                <th>ACCIÓN</th>
                                                <th>RESPONSABLE</th>
                                                <th style="text-align: center;">Herramientas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class='FilaPrincipal'>
                                                <td rowspan='6'>1. Accesibilidad Universal
                                                </td>
                                                <td rowspan='1'>Visita y evaluación en terreno
                                                </td>
                                                <td rowspan='6'>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>

                                                </td>
                                                <td rowspan='6'>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Asignar Fecha
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Informe sobre la visita realizada</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Propuesta con posible mejoras</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Evaluación Sello Chile Inclusivo</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Postulación Sello Chile Inclusivo</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Expediente de Accesibilidad</td>
                                            </tr>
                                            <tr class='FilaPrincipal'>
                                                <td rowspan='11'>2. Inclusión Laboral
                                                </td>
                                                <td rowspan='1'>Revisión de la política de Diversidad e Inclusión </td>

                                                <td rowspan='11'>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>

                                                </td>
                                                <td rowspan='11'>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Asignar Fecha
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Plan de emergencia que incorpore a las personas con discapacidad</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Plan interno de Orden Higiene y Seguridad que incorpora a personas con discapacidad y explecite el procedimiento para suministrar ajustes razonables</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Protocolo o Documento de ajuste razonable en los procesos de reclutamiento y selección para las personas con discapacidad</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Protocolo o Documento de ajuste razonable en los procesos de inducción para las personas con discapacidad</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Protocolo o Documento de ajuste razonable en los procesos de capacitación interna en donde participen las personas con discapacidad</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Protocolo o Documento de ajuste razonable en los procesos de evaluación de desempeño, en donde participen los trabajadores/as con discapacidad</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Protocolo o Documento de ajuste razonable en los procesos de promoción y/o asenso de los que sea parte los trabajadores/as con discapacidad</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Protocolo o Documento institucional en el cual se detallen las acciones y actividades específicas a desarrollar para la reinserción laboral de un trabajador/a que producto de un accidente de trabajo y/o Trayecto se encuentre con discapacidad </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Concientización interna a los equipos de trabajos, sobre no discriminación, igualdad de oportunidades y buen trato que incorpore al colectivo de personas con discapacidad</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Capacitaciones en lengua de señas chilenas a los trabajadores/as de la organización</td>
                                            </tr>

                                            <tr class='FilaPrincipal'>
                                                <td rowspan='9'>3. Accesibilidad Web 
                                                </td>
                                                <td rowspan='1'>Toma de requerimientos</td>

                                                <td rowspan='9'>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>

                                                </td>
                                                <td rowspan='9'>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Asignar Fecha
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Análisis</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Wiframe UX</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Desarrollo</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Integración componentes de accesibilidad</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Validación de Accesibilidad Norma WCAG</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>QA y pruebas de regresión</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Pruebas AM</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Delta correcciones</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>


@stop

@section('css')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

@stop

@section('js')

    <script>
        $(document).ready(function() {
            $('#empresas').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json",
                },
                responsive: true,
            });
        });

        function AbrirProyecto(id) {
            $("#idEmpresa").val(id);
            $("#ProyectoModal").modal('show');
        }

        function AbrirEmpresaEliminar(id) {
            $("#idEmpresa_Eliminar").val(id);
            $("#EliminarModal").modal('show');
        }

        function AbrirEmpresa(id) {
            // $("#idEmpresa").val(id);
            $("#idEmpresa_Editar").val(id);

            $.get(`empresas/${id}/edit`, function(data) {
                $("#nombreEmpresa").val(data.nombre);
                $("#rut").val(data.rut);
                $("#email").val(data.email);
                $("#telefono").val(data.telefono);
                $("#giro").val(data.giro);
                $("#direccion").val(data.direccion);
                $("#cargo").val(data.cargo);
                $("#dotacion").val(data.dotacion);
            });
            $("#EmpresaModal").modal('show');
        }

        function AbrirPlanAnual(id){
            $("#PlanAnualModal").modal('show');

        }


    </script>
@stop
