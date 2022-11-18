@extends('adminlte::page')

@section('title', 'Candidatos')

@section('content_header')
<h1></h1>
@stop

@section('content')
<div class="container-fluid ">

    <div class="card shadow-lg  bg-white rounded">
        <div class="card-header">
            Candidatos
        </div>
        <div class="card-body">
            <table id="candidatos" class="table table-bordered" style="width: 100%">
                <thead style="background-color: #2257a3;color: white;">
                    <tr>
                        <th>Nombre</th>
                        <th>Rut</th>
                        <th>Fecha nacimiento</th>
                        <th>Correo</th>
                        <th>Telefono particular</th>
                        <th>Telefono de recado</th>
                        <th>Comuna</th>
                        <th>Regíon</th>
                        <th>Pais</th>
                        <th>Nacionalidad</th>
                        <th>Tipo de discapacidad</th>
                        <th>Nivel de discapacidad</th>
                        <th>Detalle de discapacidad</th>
                        <th>Nivel educacional</th>
                        <th>Profesión u Oficio</th>
                        <th>Experiencia</th>
                        <th>Inglés</th>
                        <th>Situación laboral</th>
                        <th>Búsqueda laboral</th>
                        <th>Pretencio de renta</th>
                        <th>Jornada de preferencia</th>
                        <th>Modalidad de trabajo</th>
                        <th>Programa Formativo</th>
                        <th>Observaciones</th>
                        <th>CV</th>
                        <th>RND</th>
                        <th>CI</th>
                        <th>Entrevistas</th>
                        <th>Acciones</th>
                        <!-- <th>Cv</th>
                            <th>RND</th>
                            <th>Certificado de estudios</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidatos as $candidato)
                    <tr>
                        <td>{{$candidato->nombrecompleto}}</td>
                        <td>{{$candidato->rut}}</td>
                        <td>{{$candidato->fnacimiento}}</td>
                        <td>{{$candidato->correoelectrónico}}</td>
                        <td>{{$candidato->telefonoparticular}}</td>
                        <td>{{$candidato->telefonoderecado}}</td>
                        <td>{{$candidato->comuna}}</td>
                        <td>{{$candidato->región}}</td>
                        <td>{{$candidato->pais}}</td>
                        <td>{{$candidato->nacionalidad}}</td>
                        <td>{{$candidato->tipodiscapacidad}}</td>
                        <td>{{$candidato->niveldiscapacidad}}</td>
                        <td>{{$candidato->detallediscapacidad}}</td>
                        <td>{{$candidato->niveleducacional}}</td>
                        <td>{{$candidato->profesiónuoficio}}</td>
                        <td>{{$candidato->detallesdeformaciónoexperiencia}}</td>
                        <td>{{$candidato->inglés}}</td>
                        <td>{{$candidato->situaciónlaboral}}</td>
                        <td>{{$candidato->búsquedalaboral}}</td>
                        <td>{{$candidato->pretencionesderenta}}</td>
                        <td>{{$candidato->jornadapreferencia}}</td>
                        <td>{{$candidato->modalidaddetrabajo}}</td>
                        <td>{{$candidato->programaformativo}}</td>
                        <td>{{$candidato->observaciones}}</td>
                        <td>{{$candidato->cv}}</td>

                        <td>{{$candidato->rnd}}</td>
                        <td>{{$candidato->ci}}</td>
                        <td>{{$candidato->entrevistas}}</td>
                        <td>
                            <div class="d-flex justify-content-center" style="gap: 5px;">
                                <button class="btn btn-warning" onclick="EditarModal({{$candidato->id}})"><i class="fa-solid fa-pencil fa-1x"></i></button>
                                <a href="/descargar/candidato/cv/{{$candidato->id}}" class="btn btn-success">CV <i class="fa-solid fa-download"></i></a>
                                <a href="/descargar/candidato/rnd/{{$candidato->id}}" class="btn btn-warning">RND<i class="fa-solid fa-download"></i></a>
                                <a href="/descargar/candidato/certificado_estudio/{{$candidato->id}}" class="btn btn-primary">CI <i class="fa-solid fa-download"></i></a>
                            </div>
                        </td>
                        <!-- <td><a href="/descargar/candidato/cv/{{$candidato->id}}" class="btn btn-success"><i class="fa-solid fa-file-arrow-down"></i></a></td>
                            <td><a href="/descargar/candidato/rnd/{{$candidato->id}}" class="btn btn-success"><i class="fa-solid fa-file-arrow-down"></i></a>
                            </td>
                            <td><a href="/descargar/candidato/certificado_estudio/{{$candidato->id}}" class="btn btn-success"><i class="fa-solid fa-file-arrow-down"></i></a>
                            </td> -->
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


<div class="modal fade" id="CandidatoModal" tabindex="-1" aria-labelledby="CandidatoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CandidatoModalLabel">Agregar Candidato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 2rem;">
                <form method="POST" action="/candidatos" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Nombre completo</label><input type="text" name="" id="" class="form-control"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Rut</label><input type="text" name="" id="" class="form-control"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Fecha nacimiento</label><input type="date" name="" id="" class="form-control"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="">Correo electrónico</label>
                                <input type="email" class="form-control" placeholder="example@email.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Teléfono Particular</label><input type="tel" name="" id="" class="form-control"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Teléfono de Recado</label><input type="tel" name="" id="" class="form-control"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Pais</label><input type="text" name="" id="" class="form-control"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Región</label><input type="text" name="" id="" class="form-control"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Comuna</label><input type="text" name="" id="" class="form-control"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Nacionalidad</label><input type="text" name="" id="" class="form-control"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Tipo de discapacidad</label>
                                <select name="" id="" class="form-select-tipo" style="width: 100%;">
                                    <option value="" disabled selected>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Nivel de discapacidad</label>
                                <select name="" id="" class="form-select-nivel" style="width: 100%;">
                                    <option value="" disabled selected>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Detalle de discapacidad</label>
                                <textarea name="" id="" style="height:7rem" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Nivel Educacional</label>
                                <select name="" id="" class="form-select-nivel-educacional" style="width: 100%;">
                                    <option value="" selected disabled>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Profesión u Oficio</label><input type="text" class="form-control"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Detalles de Formación o Experiencia</label>
                                <textarea name="" id="" class="form-control" style="height: 7rem;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Inglés</label>
                                <select name="" id="" class="form-select-ingles" style="width: 100%;">
                                    <option value="" selected disabled>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Situación Laboral</label>
                                <select name="" id="" class="form-select-laboral" style="width: 100%;">
                                    <option value="" selected disabled>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Pretención de Renta</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Búsqueda Laboral</label>
                                <select name="" id="" class="form-select-busqueda" style="width: 100%;">
                                    <option value="" selected disabled>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Jornada de preferencia</label>
                                <select name="" id="" class="form-select-jornada" style="width: 100%;">
                                    <option value="" selected disabled>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Modalidad de trabajo</label>
                                <select name="" id="" class="form-select-modalidad" style="width: 100%;">
                                    <option value="" selected disabled>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Programa Formativo</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Observaciones</label>
                                <textarea name="" id="" class="form-control" style="height: 7rem;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">CV</label>
                                <input class="form-control" type="file" id="formFile" style="height: 2.8rem;">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">RND</label>
                                <input class="form-control" type="file" id="formFile" style="height: 2.8rem;">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">CI</label>
                                <input class="form-control" type="file" id="formFile" style="height: 2.8rem;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Entrevistas</label>
                                <textarea name="" id="" class="form-control" style="height: 7rem;"></textarea>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="EditarModal" tabindex="-1" aria-labelledby="EditarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditarModalLabel">Editar Candidato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 2rem;">
                <form method="POST" action="/candidatos" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Nombre completo</label><input type="text" name="" id="nombre_editar" class="form-control"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Rut</label><input type="text" name="" id="rut_editar" class="form-control"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Fecha nacimiento</label><input type="date" name="" id="fecha_nacimiento_editar" class="form-control"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="">Correo electrónico</label>
                                <input type="email" class="form-control" placeholder="example@email.com" id="email_editar">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Teléfono Particular</label><input type="tel" name="" id="telefono_particular_editar" class="form-control"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Teléfono de Recado</label><input type="tel" name="" id="telefono_recado_editar" class="form-control"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Pais</label><input type="text" name="" id="pais_editar" class="form-control"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Región</label><input type="text" name="" id="region_editar" class="form-control"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Comuna</label><input type="text" name="" id="comuna_editar" class="form-control"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Nacionalidad</label><input type="text" name="" id="nacionalidad_editar" class="form-control"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Tipo de discapacidad</label>
                                <select name="" id="tipo_discapacidad_editar" class="form-select-tipo" style="width: 100%;">
                                    <option value="" disabled selected>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Nivel de discapacidad</label>
                                <select name="" id="nivel_discapacidad_editar" class="form-select-nivel" style="width: 100%;">
                                    <option value="" disabled selected>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Detalle de discapacidad</label>
                                <textarea name="" id="detalle_discapacidad_editar" style="height:7rem" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Nivel Educacional</label>
                                <select name="" id="nivel_educacional_editar" class="form-select-nivel-educacional" style="width: 100%;">
                                    <option value="" selected disabled>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label for="" class="form-label">Profesión u Oficio</label><input type="text" class="form-control" id="profesion_editar"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Detalles de Formación o Experiencia</label>
                                <textarea name="" id="detalles_formacion_editar" class="form-control" style="height: 7rem;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Inglés</label>
                                <select name="" id="ingles_editar" class="form-select-ingles" style="width: 100%;">
                                    <option value="" selected disabled>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Situación Laboral</label>
                                <select name="" id="situacion_laboral_editar" class="form-select-laboral" style="width: 100%;">
                                    <option value="" selected disabled>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Pretención de Renta</label>
                                <input type="text" class="form-control" id="pretencion_renta_editar">
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Búsqueda Laboral</label>
                                <select name="" id="busqueda_laboral_editar" class="form-select-busqueda" style="width: 100%;">
                                    <option value="" selected disabled>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Jornada de preferencia</label>
                                <select name="" id="jornada_preferencia_editar" class="form-select-jornada" style="width: 100%;">
                                    <option value="" selected disabled>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Modalidad de trabajo</label>
                                <select name="" id="modalidad_trabajo_editar" class="form-select-modalidad" style="width: 100%;">
                                    <option value="" selected disabled>--Seleccionar</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Programa Formativo</label>
                                <input type="text" class="form-control" id="programa_formativo_editar">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Observaciones</label>
                                <textarea name="" id="observacion_editar" class="form-control" style="height: 7rem;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">CV</label>
                                <input class="form-control" type="file" id="cv_editar" style="height: 2.8rem;" >
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">RND</label>
                                <input class="form-control" type="file" id="rnd_editar" style="height: 2.8rem;">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">CI</label>
                                <input class="form-control" type="file" id="ci_editar" style="height: 2.8rem;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Entrevistas</label>
                                <textarea name="" id="entrevistas_editar" class="form-control" style="height: 7rem;"></textarea>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>


@stop

@section('css')
<style>
    .addNewRecord {
        background-color: #2257a3 !important;
        color: #ffffff !important;
    }

    div.dtr-modal {

        z-index: 999999;

    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $(".form-select-nivel").select2();
        $(".form-select-tipo").select2();
        $(".form-select-nivel-educacional").select2();
        $(".form-select-ingles").select2();
        $(".form-select-laboral").select2();7

        $(".form-select-busqueda").select2();
        $(".form-select-jornada").select2();
        $(".form-select-modalidad").select2();



        var table = $('#candidatos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json",
            },
            scrollX: true,
            dom: 'BPfrtip',
            // searchPanes: true,
            searchPanes: {
                initCollapsed: true,
                cascadePanes: true
                // columns: [2,6,7,8,9],
            },
            columnDefs: [{
                    searchPanes: {
                        show: false
                    },
                    targets: [0, 1, 3, 4, 5, 15, 23]
                },
                {
                    searchPanes: {
                        show: true
                    },
                    targets: [2]
                },
            ],
            buttons: [{
                    text: 'Agregar Candidato <i class="fa-solid fa-plus"></i>',
                    className: "addNewRecord",
                    action: function(e, dt, node, config) {
                        $("#CandidatoModal").modal('show');

                    }
                },
                {
                    extend: 'colvis',
                    collectionLayout: 'fixed columns',
                    collectionTitle: 'Column visibility control'
                }
            ],
            // responsive: {
            //     details: {
            //         display: $.fn.dataTable.Responsive.display.modal({
            //             header: function(row) {
            //                 var data = row.data();
            //                 return 'Detalles de ' + data[0] ;
            //             }
            //         }),
            //         renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            //             tableClass: 'table'
            //         })
            //     }
            // },
            lengthMenu: [
                [5],
                [5],
            ],
            "lengthChange": false,


        });
        table.columns([2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,21,22, 23, 24, 25, 26, 27]).visible(false);
        // table.searchPanes.container().prependTo(table.table().container());
        // table.searchPanes.resizePanes();
    });
    function EditarModal(id) {
        $.get(`/candidatos/${id}`,function(data){
            console.log(data);

            $("#nombre_editar").val(data.nombrecompleto)
            $("#rut_editar").val(data.rut)
            $("#fecha_nacimiento_editar").val(data.fnacimiento)
            $("#email_editar").val(data.correoelectrónico)
            $("#telefono_particular_editar").val(data.telefonoparticular)
            $("#telefono_recado_editar").val(data.telefonoderecado)
            $("#pais_editar").val(data.pais)
            $("#region_editar").val(data.región)
            $("#comuna_editar").val(data.comuna)
            $("#nacionalidad_editar").val(data.nacionalidad)
            $("#tipo_discapacidad_editar").val(data.tipodiscapacidad)
            $("#nivel_discapacidad_editar").val(data.niveldiscapacidad)
            $("#detalle_discapacidad_editar").val(data.detallediscapacidad)
            $("#nivel_educacional_editar").val(data.niveleducacional)
            $("#profesion_editar").val(data.profesiónuoficio)
            $("#detalles_formacion_editar").val(data.detallesdeformaciónoexperiencia)
            $("#ingles_editar").val(data.inglés)
            $("#situacion_laboral_editar").val(data.situaciónlaboral)
            $("#pretencion_renta_editar").val(data.pretencionesderenta)
            $("#busqueda_laboral_editar").val(data.búsquedalaboral)
            $("#jornada_preferencia_editar").val(data.jornadapreferencia)
            $("#modalidad_trabajo_editar").val(data.modalidaddetrabajo)
            $("#programa_formativo_editar").val(data.programaformativo)
            $("#observacion_editar").val(data.observaciones)
            $("#entrevistas_editar").val(data.entrevistas)
        });
        $("#EditarModal").modal("show")
    }
</script>
@stop