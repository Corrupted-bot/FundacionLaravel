<x-app-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #empresas_filter {
            text-align: end;
        }

        .pagination {
            justify-content: flex-end !important;
        }

        #empresas_wrapper {
            width: fit-content;
        }

        td {
            white-space: nowrap;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrar Empresas') }}
        </h2>
    </x-slot>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container" style="width: fit-content;">

                <table id="empresas" class="table table-striped table-hover " style="width:100%">
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
                        @foreach($empresas as $empresa)
                        <tr>
                            <td>{{$empresa->nombre}}</td>
                            <td>{{$empresa->rut}}</td>
                            <td>{{$empresa->email}}</td>
                            <td>{{$empresa->telefono}}</td>
                            <td>{{$empresa->giro}}</td>
                            <td>{{$empresa->direccion}}</td>
                            <td>{{$empresa->cargo}}</td>
                            <td>{{$empresa->dotacion}}</td>
                            <td>
                                <div style="display: flex;align-items: center;">
                                    <button class="btn btn-success" style="margin-right: 10px;width: max-content;" onclick="AbrirProyecto({{$empresa->id}})">Crear Proyecto <i class="fa-solid fa-folder"></i></button>
                                    <button class="btn btn-warning" style="margin-right: 10px;width: max-content;" onclick="AbrirEmpresa({{$empresa->id}})">Editar <i class="fa-solid fa-pencil"></i></button>
                                    <button class="btn btn-danger" style="margin-right: 10px;width: max-content;" onclick="AbrirEmpresaEliminar({{$empresa->id}})">Eliminar <i class="fa-solid fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(Session::has('message'))

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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/editar-empresa">
                        @csrf
                        <div class="row">
                            <div class="col">

                                <div class="mb-3">
                                    <label for="nombreEmpresa" class="form-label">Nombre<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa">
                                </div>
                            </div>
                            <div class="col">

                                <div class="mb-3">
                                    <label for="rut" class="form-label">Rut<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="rut" name="rut">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email<span style="color: red;"> *</span></label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="telefono" name="telefono">
                                </div>
                            </div>
                            <div class="col">

                                <div class="mb-3">
                                    <label for="giro" class="form-label">Giro<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="giro" name="giro">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="direccion" name="direccion">
                                </div>
                            </div>
                            <div class="col">

                                <div class="mb-3">
                                    <label for="cargo" class="form-label">Cargo<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="cargo" name="cargo">
                                </div>
                            </div>
                            <div class="col">

                                <div class="mb-3">
                                    <label for="dotacion" class="form-label">Dotación<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="dotacion" name="dotacion">
                                </div>
                            </div>
                        </div>
                        <input type="text" id="idEmpresa_Editar" name="idEmpresa_Editar" hidden>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#empresas').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json",
            },
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
</script>