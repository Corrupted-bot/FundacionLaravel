<x-app-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        #proyectos_filter {
            text-align: end;
        }

        .pagination {
            justify-content: flex-end !important;
        }



        td {
            white-space: nowrap;
        }

        .select2-selection__rendered {
            line-height: 41px !important;
        }

        .select2-container .select2-selection--single {
            height: 45px !important;
        }

        .select2-selection__arrow {
            height: 44px !important;
        }

        .select2 {
            width: 250px !important;
        }

        .py-12 {
            padding-top: 2rem !important;
            padding-bottom: 3rem;
            margin-left: 27vh !important;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrar Proyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="display: flex;margin-left: -290px;justify-content: flex-start;    position: absolute;">
                <div class="card">
                    <div class="card-header">
                        <b class="mb-2">Seleccionar una Empresa</b>

                    </div>
                    <div class="card-body">
                        <label style="display: grid;">
                            <select class="empresas">
                                <option selected disabled>Seleccionar Empresa</option>
                            </select>
                        </label>
                    </div>
                </div>

            </div>
            <div class="container">
                <table id="proyectos" class="table table-striped table-hover " style="width:100%">
                    <thead style="background-color: #2257a3;color: white;">
                        <tr>
                            <th style="text-align: center;">Id</th>
                            <th style="text-align: center;">Nombre</th>
                            <th style="text-align: center;">Descripcion</th>
                            <th style="text-align: center;">Herramientas</th>
                        </tr>
                    </thead>
                    <tbody>
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
        <iframe src="apt/Ficha de Análisis del Puesto de trabajo (APT).docx">  </iframe>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="informaApt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form method="POST" action="">
                    @csrf
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel"><b>Informe APT</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Subir Informe APT</label>
                            <input class="form-control" type="file" id="formFile">
                            <p class="mt-2">Descargar el formato del informe y subirlo. <a href="/apt/Ficha de Análisis del Puesto de trabajo (APT).docx">Descargar</a></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Subir Informe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        table = $('#proyectos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json",
            },
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                $('td', nRow).css('text-align', 'center');
            },
            "columns": [{
                    data: "id"
                },
                {
                    data: "nombre"
                },
                {
                    data: "descripcion"
                },
                {
                    "data": null,
                    render: function(data, type, row, meta) {
                        return type === 'display' ?
                            `<a  class="btn btn-success" style="width: max-content;" onClick=AbrirInformeAPT(${data.id})>Informe APT </a>` :
                            data;
                    }
                }

            ]
        });


        $('.empresas').select2({
            ajax: {
                url: "/empresas-datos",
                dataType: 'json',
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nombre,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });

        $(".empresas").change(function() {
            table.clear().draw();
            var datos = [];
            $.get(`/proyectos/${$('.empresas').val()}`, function(data) {

                console.log(data);
                data.forEach(element => {
                    $('#proyectos').dataTable().fnAddData([{
                        id: element.id,
                        nombre: element.nombre,
                        descripcion: element.descripcion
                    }]);
                });


            })

        });


    });


    function AbrirInformeAPT(id) {
        // $("#informaApt").val(id);
        $("#informaApt").modal('show');
    }
</script>