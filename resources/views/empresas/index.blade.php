@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
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
                            <th></th>
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
                                <td><button class="btn btn-info" onclick="AbrirEmpresaInfo({{ $empresa->id }})"><i
                                            class="fa-solid fa-eye"></i></button></td>
                                <td>
                                    <div style="display: flex;gap: 5px;flex-wrap: wrap;">
                                        <button class="btn btn-success"
                                            onclick="AbrirProyecto({{ $empresa->id }})">Puesto de Trabajos <i
                                                class="fa-solid fa-folder"></i></button>
                                        <button class="btn btn-warning" onclick="AbrirEmpresa({{ $empresa->id }})"> <i
                                                class="fa-solid fa-pencil"></i></button>
                                        <button class="btn btn-danger" onclick="AbrirEmpresaEliminar({{ $empresa->id }})">
                                            <i class="fa-solid fa-trash"></i></button>
                                        <button class="btn btn-secondary"
                                            onclick="AbrirPlanAnual({{ $empresa->id }})">Plan
                                            Anual Asesoría<br> e
                                            Inclusión</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


            </div>
        </div>
    </div>


    <div class="modal fade" id="ProyectoModal" tabindex="-1" aria-labelledby="ProyectoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ProyectoModalLabel">Crear Puesto de trabajo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/proyectos">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="col-form-label">Nombre del puesto de trabajo</label>
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
    <div class="modal fade" id="PlanAnualModal" tabindex="-1" role="dialog" aria-labelledby="PlanAnualModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="card-header"
                        style="text-align: center;background-color: #2257a3;color:white;width:-webkit-fill-available;">
                        <b style="font-size: xx-large;">Plan Anual Asesoría e Inclusión</b>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/matrizasesoria">
                        @csrf
                        <input type="hidden" name="id_empresa" id="id_empresa">
                        <div class="card">

                            <div class="card-body">

                                <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 20px;">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                            type="button" role="tab" aria-controls="home"
                                            aria-selected="true">DIAGNÓSTICO INSTITUCIONAL</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                            type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">GESTIÓN DE LA INCLUSIÓN LABORAL</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                            type="button" role="tab" aria-controls="contact"
                                            aria-selected="false">PLAN DE CAPACITACIÓN</a>
                                    </li>

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="tableFixHead">
                                            <table class="table table-striped table-hover table-bordered "
                                                style="width:100%">
                                                <thead style="background-color: #2257a3;color: white;">
                                                    <tr>
                                                        <th colspan="9" class="text-center">DIAGNÓSTICO INSTITUCIONAL
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>ESTRATEGIA</th>
                                                        <th>ACCIÓN</th>
                                                        <th>RESPONSABLE</th>
                                                        <th>Fecha Inicio</th>
                                                        <th>Fecha Termino</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class='FilaPrincipal'>
                                                        <td rowspan='4'>1. Analisis documentación institucional
                                                        </td>
                                                        <td rowspan='1'>Revisión de documentación (organigrama, bases de
                                                            datos RR.HH, Comité Paritario de Higiene y Salud, Departamento
                                                            de
                                                            Prevención de Riesgo, Sindicatos, etc.)
                                                        </td>
                                                        <td rowspan='4'>
                                                            <div class="mb-3">
                                                                <label for="1_diagnostico_responsable_nombre"
                                                                    class="form-label">Nombre</label>
                                                                <input type="text" class="form-control"
                                                                    id="1_diagnostico_responsable_nombre"
                                                                    name="1_diagnostico_responsable_nombre">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="1_diagnostico_responsable_cargo"
                                                                    class="form-label">Cargo</label>
                                                                <input type="text" class="form-control"
                                                                    id="1_diagnostico_responsable_cargo"
                                                                    name="1_diagnostico_responsable_cargo">
                                                            </div>

                                                        </td>
                                                        <td rowspan='4'>
                                                            <input type="date" id="1_diagnostico_fecha_inicio"
                                                                name="1_diagnostico_fecha_inicio" class="form-control">
                                                        </td>
                                                        <td rowspan='4'>
                                                            <input type="date" id="1_diagnostico_fecha_termino"
                                                                name="1_diagnostico_fecha_termino" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Ajustes razonables a documentación analizada
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Proceso de aprobación</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Sociabilización de ajustes</td>
                                                    </tr>
                                                    <tr class='FilaPrincipal'>
                                                        <td rowspan='7'>2. Caracterización de colaboradores/as</td>
                                                        <td rowspan='1'>Diseño de instrumento de indagación</td>

                                                        <td rowspan='7'>
                                                            <div class="mb-3">
                                                                <label for="2_diagnostico_responsable_nombre"
                                                                    class="form-label">Nombre</label>
                                                                <input type="text" class="form-control"
                                                                    id="2_diagnostico_responsable_nombre"
                                                                    name="2_diagnostico_responsable_nombre">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="2_diagnostico_responsable_cargo"
                                                                    class="form-label">Cargo</label>
                                                                <input type="text" class="form-control"
                                                                    id="2_diagnostico_responsable_cargo"
                                                                    name="2_diagnostico_responsable_cargo">
                                                            </div>

                                                        </td>
                                                        <td rowspan='7'>
                                                            <input type="date" id="2_diagnostico_fecha_inicio"
                                                                name="2_diagnostico_fecha_inicio" class="form-control">
                                                        </td>
                                                        <td rowspan='7'>
                                                            <input type="date" id="2_diagnostico_fecha_termino"
                                                                name="2_diagnostico_fecha_termino" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Validación de instrumento</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Aplicación de estudio demográfico</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Analisis de datos
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Diseño de informe de resultados
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Validación de informe
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Presentación y sociabilización de resultados
                                                        </td>
                                                    </tr>
                                                    <tr class='FilaPrincipal'>
                                                        <td rowspan='6'>3. Diagnostico Gestión Interna
                                                        </td>
                                                        <td rowspan='1'>Diseño de instrumento de indagación
                                                        </td>

                                                        <td rowspan='6'>
                                                            <div class="mb-3">
                                                                <label for="3_diagnostico_responsable_nombre"
                                                                    class="form-label">Nombre</label>
                                                                <input type="text" class="form-control"
                                                                    id="3_diagnostico_responsable_nombre"
                                                                    name="3_diagnostico_responsable_nombre">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="3_diagnostico_responsable_cargo"
                                                                    class="form-label">Cargo</label>
                                                                <input type="text" class="form-control"
                                                                    id="3_diagnostico_responsable_cargo"
                                                                    name="3_diagnostico_responsable_cargo">
                                                            </div>

                                                        </td>
                                                        <td rowspan='6'>
                                                            <input type="date" id="3_diagnostico_fecha_inicio"
                                                                name="3_diagnostico_fecha_inicio" class="form-control">
                                                        </td>
                                                        <td rowspan='6'>
                                                            <input type="date" id="3_diagnostico_fecha_termino"
                                                                name="3_diagnostico_fecha_termino" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Charlas de concientización e informativas sobre
                                                            el proceso
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Aplicación instrumento de indagación a
                                                            informantes claves(FODA - FOCUS GROUP)
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Analisis de resultados
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Diseño de informe de resultados
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Entrega de informe y sociabilización
                                                        </td>
                                                    </tr>
                                                    <tr class='FilaPrincipal'>
                                                        <td rowspan='6'>4. Accesibilidad Universal
                                                        </td>
                                                        <td rowspan='1'>Visita y evaluación en terreno de dependencias
                                                        </td>

                                                        <td rowspan='6'>
                                                            <div class="mb-3">
                                                                <label for="4_diagnostico_responsable_nombre"
                                                                    class="form-label">Nombre</label>
                                                                <input type="text" class="form-control"
                                                                    id="4_diagnostico_responsable_nombre"
                                                                    name="4_diagnostico_responsable_nombre">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="4_diagnostico_responsable_cargo"
                                                                    class="form-label">Cargo</label>
                                                                <input type="text" class="form-control"
                                                                    id="4_diagnostico_responsable_cargo"
                                                                    name="4_diagnostico_responsable_cargo">
                                                            </div>

                                                        </td>
                                                        <td rowspan='6'>
                                                            <input type="date" id="4_diagnostico_fecha_inicio"
                                                                name="4_diagnostico_fecha_inicio" class="form-control">
                                                        </td>
                                                        <td rowspan='6'>
                                                            <input type="date" id="4_diagnostico_fecha_termino"
                                                                name="4_diagnostico_fecha_termino" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Informe de brechas detectadas
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Analisis de gravedada y plan de mejora
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Levantamiento de capex
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Gestión de obras de mejora
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Medición y mejora continua
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="tableFixHead">
                                            <table id="empresas" class="table table-striped table-hover table-bordered "
                                                style="width:100%">
                                                <thead style="background-color: #2257a3;color: white;">
                                                    <tr>
                                                        <th colspan="9" class="text-center">GESTIÓN DE LA INCLUSIÓN
                                                            LABORAL</th>
                                                    </tr>
                                                    <tr>
                                                        <th>ESTRATEGIA</th>
                                                        <th>ACCIÓN</th>
                                                        <th>RESPONSABLE</th>
                                                        <th>Fecha Inicio</th>
                                                        <th>Fecha Termino</th>
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
                                                                <label for="1_inclusion_responsable_nombre"
                                                                    class="form-label">Nombre</label>
                                                                <input type="text" class="form-control"
                                                                    id="1_inclusion_responsable_nombre"
                                                                    name="1_inclusion_responsable_nombre">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="1_inclusion_responsable_cargo"
                                                                    class="form-label">Cargo</label>
                                                                <input type="text" class="form-control"
                                                                    id="1_inclusion_responsable_cargo"
                                                                    name="1_inclusion_responsable_cargo">
                                                            </div>

                                                        </td>
                                                        <td rowspan='9'>
                                                            <input type="date" id="1_inclusion_fecha_inicio"
                                                                name="1_inclusion_fecha_inicio" class="form-control">
                                                        </td>
                                                        <td rowspan='9'>
                                                            <input type="date" id="1_inclusion_fecha_termino"
                                                                name="1_inclusion_fecha_termino" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Ajustes descriptores de cargo
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Evaluación Puesto de Trabajo.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Proceso de reclutamiento. </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Proceso de Selección. </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Ongoarding (charlas a equipo de trabajo)</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Acompañamiento a nuevo/a trabajador/a
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Reporte de seguimiento </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Finalización de acompañamiento</td>
                                                    </tr>
                                                    <tr class='FilaPrincipal'>
                                                        <td rowspan='5'>2. Plan de Inclusión
                                                        </td>
                                                        <td rowspan='1'>Coordinar el diseño de un plan de inclusión
                                                        </td>
                                                        <td rowspan='5'>
                                                            <div class="mb-3">
                                                                <label for="2_inclusion_responsable_nombre"
                                                                    class="form-label">Nombre</label>
                                                                <input type="text" class="form-control"
                                                                    id="2_inclusion_responsable_nombre"
                                                                    name="2_inclusion_responsable_nombre">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="2_inclusion_responsable_cargo"
                                                                    class="form-label">Cargo</label>
                                                                <input type="text" class="form-control"
                                                                    id="2_inclusion_responsable_cargo"
                                                                    name="2_inclusion_responsable_cargo">
                                                            </div>

                                                        </td>
                                                        <td rowspan='5'>
                                                            <input type="date" id="2_inclusion_fecha_inicio"
                                                                name="2_inclusion_fecha_inicio" class="form-control">
                                                        </td>
                                                        <td rowspan='5'>
                                                            <input type="date" id="2_inclusion_fecha_termino"
                                                                name="2_inclusion_fecha_termino" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Planificar la implementación del plan de
                                                            inclusión</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Coordinar la ejecución del plan de inclusión
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Evaluación de indicadores </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Mejora continua </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel"
                                        aria-labelledby="contact-tab">
                                        <div class="tableFixHead">
                                            <table id="empresas" class="table table-striped table-hover table-bordered "
                                                style="width:100%">
                                                <thead style="background-color: #2257a3;color: white;">
                                                    <tr>
                                                        <th colspan="9" class="text-center">PLAN DE CAPACITACIÓN</th>
                                                    </tr>
                                                    <tr>
                                                        <th>ESTRATEGIA</th>
                                                        <th>ACCIÓN</th>
                                                        <th>RESPONSABLE</th>
                                                        <th>Fecha Inicio</th>
                                                        <th>Fecha Termino</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class='FilaPrincipal'>
                                                        <td rowspan='5'>1. Capacitaciones Técnicas para las distintas
                                                            áreas
                                                        </td>
                                                        <td rowspan='1'>Detección de necesidades de capacitación
                                                        </td>
                                                        <td rowspan='5'>
                                                            <div class="mb-3">
                                                                <label for="1_capacitacion_responsable_nombre"
                                                                    class="form-label">Nombre</label>
                                                                <input type="text" class="form-control"
                                                                    id="1_capacitacion_responsable_nombre"
                                                                    name="1_capacitacion_responsable_nombre">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="1_responsable_cargo"
                                                                    class="form-label">Cargo</label>
                                                                <input type="text" class="form-control"
                                                                    id="1_capacitacion_responsable_cargo"
                                                                    name="1_capacitacion_responsable_cargo">
                                                            </div>

                                                        </td>
                                                        <td rowspan='5'>
                                                            <input type="date" id="1_capacitacion_fecha_inicio"
                                                                name="1_capacitacion_fecha_inicio" class="form-control">
                                                        </td>
                                                        <td rowspan='5'>
                                                            <input type="date" id="1_capacitacion_fecha_termino"
                                                                name="1_capacitacion_fecha_termino" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Diseño de propuesta de plan de capacitaión</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Articular plan de capacitación</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Monitoreo de actividades </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Medición y mejora continua </td>
                                                    </tr>
                                                    <tr class='FilaPrincipal'>
                                                        <td rowspan='3'>2. Cultura Inclusiva
                                                        </td>
                                                        <td rowspan='1'>Charlas de concientización y talleres de
                                                            liderazgo inclusivo
                                                        </td>

                                                        <td rowspan='3'>
                                                            <div class="mb-3">
                                                                <label for="2_capacitacion_responsable_nombre"
                                                                    class="form-label">Nombre</label>
                                                                <input type="text" class="form-control"
                                                                    id="2_capacitacion_responsable_nombre"
                                                                    name="2_capacitacion_responsable_nombre">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="2_capacitacion_responsable_cargo"
                                                                    class="form-label">Cargo</label>
                                                                <input type="text" class="form-control"
                                                                    id="2_capacitacion_responsable_cargo"
                                                                    name="2_capacitacion_responsable_cargo">
                                                            </div>

                                                        </td>
                                                        <td rowspan='3'>
                                                            <input type="date" id="2_capacitacion_fecha_inicio"
                                                                name="2_capacitacion_fecha_inicio" class="form-control">
                                                        </td>
                                                        <td rowspan='3'>
                                                            <input type="date" id="2_capacitacion_fecha_termino"
                                                                name="2_capacitacion_fecha_termino" class="form-control">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Actividades de promoción y educación</td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan='1'>Marketing inclusivo </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="VerModal" tabindex="-1" aria-labelledby="VerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="VerModalLabel">Información de la empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="inicio-tab" data-toggle="tab" data-target="#inicio"
                                    type="button" role="tab" aria-controls="inicio" aria-selected="true">Información
                                    Inicial</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="historial-tab" data-toggle="tab" data-target="#historial"
                                    type="button" role="tab" aria-controls="contact" aria-selected="false">Historial de
                                    Contacto</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-4" id="myTabContent">
                            <div class="tab-pane fade show active" id="inicio" role="tabpanel"
                                aria-labelledby="inicio-tab">
                                <form method="POST" action="guardar-empresa-info" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="fecha_reunion" class="col-sm-2 col-form-label">Fecha de reunion
                                            inicial</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="fecha_reunion" name="fecha_reunion">
                                                <input type="hidden" name="id_empresa_info" id="id_empresa_info">
                                        </div>
                                    </div>
    
                                    <fieldset class="form-group row ">
                                        <label class="col-form-label col-sm-2 float-sm-left pt-0">Convenio de
                                            colaboración</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file mb-3">
                                                <label for="convenio" class="custom-file-upload">
                                                    <i class="fa fa-cloud-upload"></i> Subir Archivo
                                                </label>
                                                <input id="convenio" name="convenio" type="file" style="display:none;">
                                                
                                                <a href="#" class="custom-file-upload btn btn-success" style="visibility:hidden;" id="botondescargaconvenio"><i class="fa-solid fa-download"></i></a>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="enviado" name="enviado">
                                                <label class="form-check-label" for="enviado">
                                                    Enviado
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline ">
                                                <input class="form-check-input" type="checkbox" id="recibido" name="recibido">
                                                <label class="form-check-label" for="recibido">
                                                    Recibido
                                                </label>
                                            </div>
     
                                        </div>
                                    </fieldset>

                                    <label class="">Cumplimiento de cuota</label>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="cuota" id="cuota" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Si</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="cuota" id="cuota" value="0">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Puestos requeridos</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Numero total de funcionarios</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1" >
                                    </div>

                                    {{-- <div class="form-group row">
                                        <label for="fecha_levantamiento" class="col-sm-2 col-form-label">Fecha de levantamiento de
                                            cargo</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="fecha_levantamiento" name="fecha_levantamiento">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fecha_candidatos" class="col-sm-2 col-form-label">Fecha de envio de
                                            candidatos</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="fecha_candidatos" name="fecha_candidatos">
                                        </div>
                                    </div> --}}
    
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancelar</button>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                                </form>
                            </div>
    
                            <div class="tab-pane fade" id="historial" role="tabpanel" aria-labelledby="historial-tab">
    
                                <form class="form-inline" method="POST" action="/guardar-empresa-historial-info" >
                                    @csrf

                                    <div class="form-group">
                                      <label for="inputPassword6">Fecha de contacto</label>
                                      <input type="date" id="fecha_contacto" class="form-control mx-sm-3" name="fecha_contacto">
                                      <input type="hidden" name="id_empresa_info_historial" id="id_empresa_info_historial">

                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="estado_contacto" id="estado_contacto" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Respondio</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="estado_contacto" id="estado_contacto" value="0">
                                        <label class="form-check-label" for="inlineRadio2">No respondio</label>
                                      </div>
                                      <button type="submit" class="btn btn-primary mb-2">Agregar</button>
    
                                    </div>
                                  </form>
                                <hr>
                                <table class="table table-hover" id="tabla_historial">
                                    <thead style="color: white">
                                        <tr>
                                            <th>N°</th>
                                            <th>Fecha de Contacto</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody >


    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>

    
@stop

@section('css')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <style>
        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }
        .custom-file-input:lang(es)~.custom-file-label::after {
            content: "Elegir";
        }

        .my-custom-scrollbar {
            position: relative;
            height: 500px;
            overflow: auto;
        }

        .table-wrapper-scroll-y {
            display: block;
        }

        /* Esto es scroll dentro de bodytable */
        .tableFixHead {
            overflow: auto;
            height: 500px;
        }

        .tableFixHead thead th {
            position: sticky;
            top: 0;
            z-index: 1;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px 16px;
        }

        th {
            background: #2257a3;
        }
    </style>
@stop

@section('js')

    <script>
        $(document).ready(function() {
            $('#convenio').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#convenio')[0].files[0].name;
                $(this).prev('label').text(file);
            });


            $("#PlanAnualModal").on("hidden.bs.modal", function() {
                // Aquí va el código a disparar en el evento
                for (let index = 1; index <= 4; index++) {
                    $(`#${index}_diagnostico_responsable_nombre`).val("");
                    $(`#${index}_diagnostico_responsable_cargo`).val("");
                    $(`#${index}_diagnostico_fecha_inicio`).val("");
                    $(`#${index}_diagnostico_fecha_termino`).val("");
                }
                for (let index = 1; index <= 2; index++) {
                    $(`#${index}_inclusion_responsable_nombre`).val("");
                    $(`#${index}_inclusion_responsable_cargo`).val("");
                    $(`#${index}_inclusion_fecha_inicio`).val("");
                    $(`#${index}_inclusion_fecha_termino`).val("");

                }
                for (let index = 1; index <= 2; index++) {
                    $(`#${index}_capacitacion_responsable_nombre`).val("");
                    $(`#${index}_capacitacion_responsable_cargo`).val("");
                    $(`#${index}_capacitacion_fecha_inicio`).val("");
                    $(`#${index}_capacitacion_fecha_termino`).val("");

                }
            });


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

        function AbrirPlanAnual(id) {
            $("#id_empresa").val(id);

            $.get(`/matrizasesoria/${id}`, function(data) {
                //ESTACIONAMIENTO
                if (data.length != 0) {
                    for (let index = 1; index <= 4; index++) {
                        $(`#${index}_diagnostico_responsable_nombre`).val(data[0][
                            `${index}_diagnostico_responsable_nombre`
                        ]);
                        $(`#${index}_diagnostico_responsable_cargo`).val(data[0][
                            `${index}_diagnostico_responsable_cargo`
                        ]);
                        $(`#${index}_diagnostico_fecha_inicio`).val(data[0][`${index}_diagnostico_fecha_inicio`]);
                        $(`#${index}_diagnostico_fecha_termino`).val(data[0][`${index}_diagnostico_fecha_termino`]);
                    }
                    for (let index = 1; index <= 2; index++) {
                        $(`#${index}_inclusion_responsable_nombre`).val(data[0][
                            `${index}_inclusion_responsable_nombre`
                        ]);
                        $(`#${index}_inclusion_responsable_cargo`).val(data[0][
                            `${index}_inclusion_responsable_cargo`
                        ]);
                        $(`#${index}_inclusion_fecha_inicio`).val(data[0][`${index}_inclusion_fecha_inicio`]);
                        $(`#${index}_inclusion_fecha_termino`).val(data[0][`${index}_inclusion_fecha_termino`]);

                    }
                    for (let index = 1; index <= 2; index++) {
                        $(`#${index}_capacitacion_responsable_nombre`).val(data[0][
                            `${index}_capacitacion_responsable_nombre`
                        ]);
                        $(`#${index}_capacitacion_responsable_cargo`).val(data[0][
                            `${index}_capacitacion_responsable_cargo`
                        ]);
                        $(`#${index}_capacitacion_fecha_inicio`).val(data[0][`${index}_capacitacion_fecha_inicio`]);
                        $(`#${index}_capacitacion_fecha_termino`).val(data[0][
                            `${index}_capacitacion_fecha_termino`
                        ]);

                    }

                }


            })


            $("#PlanAnualModal").modal('show');

        }


        async function AbrirEmpresaInfo(id) {
            $("#tabla_historial tbody").empty();

            $("#id_empresa_info").val(id);
            $("#id_empresa_info_historial").val(id);
            await $.get(`/empresas/${id}`,function(data){
                // console.log(data)
                if (data.length != 0) {
                    
                    $("#fecha_reunion").val(data.fecha_reunion_inicial)
                    // $("#enviado").val(data.enviado)
                    // $("#recibido").val(data.recibido)
                    if (data.enviado == 1) {
                        $("#enviado").prop('checked', true);
                    }
                    if (data.recibido == 1) {
                        $("#recibido").prop('checked', true);
                    }
                    // $("#fecha_levantamiento").val(data.fecha_levantamiento)
                    // $("#fecha_candidatos").val(data.fecha_candidatos)
                    
                    if (data.convenio_colaboracion != null) {
                        
                        $("#botondescargaconvenio").css("visibility","visible")
                        $("#botondescargaconvenio").attr("href", `/descargar/${id}`)
                    }
                }
            });

            $.get(`/guardar-empresa-historial-info/${id}`,function(data){
                // console.log(data);
                if (data.length != 0) {
                    var cont = 1;
                    data.forEach(function(element){
                        // console.log(element)
                        $("#tabla_historial >tbody:first").append(`<tr><td>${cont}</td><td>${element.fecha_contacto}</td><td>${element.estado == 0 ? '<span class="badge badge-danger">No respondio</span>' : '<span class="badge badge-success">Respondio</span>' }</td></tr>`)
                        cont += 1
                    })
                }
            })
            $("#VerModal").modal('show');

        }
    </script>
@stop
