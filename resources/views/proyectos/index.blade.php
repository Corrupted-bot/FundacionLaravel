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

        .bg-dark2 {
            justify-content: center;
            margin-top: 50px;
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
                @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="informaApt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <style>
            .nav-link2 {
                background-color: #a32626 !important;
                color: white !important;
                margin: 2px !important;
            }

            .nav-link2:hover {
                background-color: #be2c2c !important;
            }

            .nav-link2:active {
                background-color: black !important;
            }

            .nav-link {
                background-color: #2257a3 !important;
                color: white !important;
                margin: 2px !important;
            }

            .nav-link:hover {
                background-color: #5194f3 !important;
            }

            .nav-link:active {
                background-color: black !important;
            }

            .formulario {
                width: 300px;
                /* width: 535px; */
                padding: 16px;
                /* border-radius: 10px; */
                margin: auto;
                margin-top: 41px;
                /* background: #212529; */
                background: #a32626;
                /* box-shadow: 10px 5px 5px black; */
                color: white;
                text-align: center;
            }

            .formulario-2 {
                width: 600px;
            }

            .formulario-2 label {
                width: 214px;
            }

            .formulario label {

                /* width: 214px; */
                font-weight: bold;
                display: inline-block;
            }

            .formulario input[type="text"],
            .formulario input[type="email"] {
                width: 246px;
                padding: 3px 10px;
                border: 1px solid #f6f6f6;
                border-radius: 3px;
                background-color: #f6f6f6;
                margin: 8px 0;
                display: inline-block;
            }

            select {
                padding: 10px;
            }

            .estilos textarea {
                width: 100%;
                height: 200px;
                border: 1px solid #f6f6f6;
                border-radius: 3px;
                background-color: #f6f6f6;
                margin: 8px 0;
                /*resize: vertical | horizontal | none | both*/
                resize: none;
                display: block;
            }

            .negro {
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form method="POST" action="">
                    @csrf
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel"><b>Informe APT</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="padding: 0rem!important;">
                        <ul class="nav nav-tabs bg-dark2" id="myTab2" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-link2 " id="puesto-trabajo" data-bs-toggle="tab" data-bs-target="#trabajo" type="button" role="tab" aria-controls="puestoTrabajo" aria-selected="true">Puesto de Trabajo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-link2 " id="profile2-tab" data-bs-toggle="tab" data-bs-target="#profile2" type="button" role="tab" aria-controls="profile2" aria-selected="false">Salud y Seguridad</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-link2" id="contact2-tab" data-bs-toggle="tab" data-bs-target="#contact2" type="button" role="tab" aria-controls="contact2" aria-selected="false">Habilidad Fisica</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-link2" id="prueba-tab" data-bs-toggle="tab" data-bs-target="#prueba" type="button" role="tab" aria-controls="prueba" aria-selected="false">Trabajo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-link2" id="prueba-tab2" data-bs-toggle="tab" data-bs-target="#prueba2" type="button" role="tab" aria-controls="prueba2" aria-selected="false">Habilidades Requeridas</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-link2" id="prueba-tab3" data-bs-toggle="tab" data-bs-target="#prueba3" type="button" role="tab" aria-controls="prueba3" aria-selected="false">Apoyo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-link2" id="prueba-tab4" data-bs-toggle="tab" data-bs-target="#prueba4" type="button" role="tab" aria-controls="prueba4" aria-selected="false">Apoyo 2</button>
                            </li>
                        </ul>
                        <div class="tab-content estilos" id="myTabContent2">
                            <div class="tab-pane fade show active" id="trabajo" role="tabpanel" aria-labelledby="puesto-trabajo">
                                <div style="width: 900px; height: 600px" class="formulario-2 formulario centro my-custom-scrollbar">
                                    <div>
                                        <h1>Puesto de Trabajo</h1>
                                    </div>
                                    <label>Nombre de Puesto </label>
                                    <input type="text" placeholder="Nombre del puesto">
                                    <br />
                                    <label>Descripción del Puesto</label>
                                    <input type="text" placeholder="Descripcion Puesto disponible">
                                    <br />
                                    <label>Control Horario</label>
                                    <select class="form-select" aria-label="Control Horario">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>

                                    <textarea type="text" placeholder="Detalles Control Horario" maxLength="500"> </textarea>
                                    <br />
                                    <label> Normas de Vestuario </label>
                                    <select class="form-select" aria-label="Normas de Vestuario">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles de Normas de Vestuario" maxLength="500"></textarea>
                                    <br />
                                    <label> Formación en Casa </label>
                                    <select class="form-select" aria-label="Formacion en Casa">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Formacion en Casa" maxLength="500"></textarea>

                                    <br />
                                    <label> Pensión de Empresa </label>
                                    <select class="form-select" aria-label="Pensión de empresa">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Pension de Empresa" maxLength="500"></textarea>

                                    <br />
                                    <label>Relación con la familia</label>
                                    <select class="form-select" aria-label="Relacion con la Familia">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Relacion Familia" maxLength="500"></textarea>

                                    <br />
                                    <label>Seguro de enfermedad </label>
                                    <select class="form-select" aria-label="Seguro de Enfermedad">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>

                                    <textarea type="text" placeholder="Detalles Seguro de Enfermedad" maxLength="500"></textarea>

                                    <br />

                                    <label>Vacaciones </label>
                                    <select class="form-select" aria-label="Vacaciones">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>

                                    <textarea type="text" placeholder="Detalles Vacaciones" maxLength="500"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile2-tab">
                                <div class="formulario-2 formulario centro my-custom-scrollbar" style="width: 900px ; height: 600px">
                                    <div>
                                        <h1>SALUD Y SEGURIDAD</h1>
                                    </div>
                                    <label>Evaluacion de riesgo</label>
                                    <select class="form-select" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>

                                    <textarea type="text" placeholder="Detalles Evaluacion de Riesgo" maxLength="500"></textarea>
                                    <br />
                                    <label>Evaluacion Realizada</label>
                                    <select class="form-select" aria-label="Evaluacion Realizada">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>

                                    <textarea type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Promocion Laboral</label>
                                    <textarea type="text" placeholder="Perspectiva de promocion Laboral" maxLength="500"></textarea>
                                    <div>

                                        <label>Flexibilidad Laboral</label>
                                        <textarea type="text" placeholder="Flexibilidad Laboral" maxLength="500"></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">
                                <div style=" width: 900px; height: 600px" class="formulario-2 formulario centro my-custom-scrollbar">
                                    <h1>HABILIDAD FISICA</h1>

                                    <label>Estar de pie</label>
                                    <select class="form-select" aria-label="Estar de pie">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Caminar</label>
                                    <select class="form-select" aria-label="Caminar">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Estar Sentado</label>
                                    <select class="form-select" aria-label="Estar Sentado">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Levantar</label>
                                    <select class="form-select" aria-label="Levantar">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Acarrear</label>
                                    <select class="form-select" aria-label="Acarrear">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Empujar</label>
                                    <select class="form-select" aria-label="Empujar">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Subir</label>
                                    <select class="form-select" aria-label="Subir">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Mantener Equilibrio</label>
                                    <select class="form-select" aria-label="Mantener Equilibrio">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Encorvarse</label>
                                    <select class="form-select" aria-label="Encorvarse">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Arrodillarse</label>
                                    <select class="form-select" aria-label="Arrodillarse">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Manipular con las manos</label>
                                    <select class="form-select" aria-label="Manipular con las manos">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">UNA MANO</option>
                                        <option value="2">AMBAS MANOS</option>
                                    </select>
                                    <label>Manipular con destreza</label>
                                    <select class="form-select" aria-label="Manipular con destreza">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">FINA</option>
                                        <option value="2">GRUESA</option>
                                    </select>
                                    <label>Vision</label>
                                    <select class="form-select" aria-label="Vision">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Audicion</label>
                                    <select class="form-select" aria-label="Audicion">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Requisitos de adaptacion</label>
                                    <textarea type="text" placeholder="Requisitos de adaptacion" maxLength="500"></textarea>
                                    <label>Expetativas de supervicion/ apoyo natural</label>
                                    <textarea type="text" placeholder="Expetativas de supervicion/apoyo natural" maxLength="500"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="prueba" role="tabpanel" aria-labelledby="prueba-tab">
                                <div style="width: 900px; height: 600px" class="formulario-2 formulario centro my-custom-scrollbar">
                                    <h1>El trabajo es:</h1>
                                    <table class="table-dark table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">1</th>
                                                <th scope="col">2</th>
                                                <th scope="col">3</th>
                                                <th scope="col">4</th>
                                                <th scope="col">5</th>
                                                <th scope="col">6</th>
                                                <th scope="col">7</th>
                                                <th scope="col">8</th>
                                                <th scope="col">9</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Jornada Completa</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Media Jornada</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Dentro</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">En el exterior</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Estando en un lugar</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Cambiando de lugar</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Donde haya mucha actividad</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Donde haya poca actividad</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Donde haga calor</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Donde haga frío</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">En un lugar ruidoso</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">En un lugar silencioso</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">En un sitio limpio</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">En un sitio desaliñado, sucio</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Una tarea constante</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Haciendo diferentes tareas</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">En un espacio grande</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">En un espacio pequeño</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Principalmente con hombres</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Principalmente con mujeres</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Con uniforme</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Sin uniforme</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Con palabras / libros</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No con palabras ni libros</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Con números</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No con números</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Utilizando transporte público</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Sin usar transporte público</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Con otros</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No con otros</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="prueba2" role="tabpanel" aria-labelledby="prueba-tab2">
                                <div style="width: 900px; height: 600px" class="formulario-2 formulario centro my-custom-scrollbar">
                                    <h1>Habilidades Requeridas</h1>
                                    <table class="table-dark table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">1</th>
                                                <th scope="col">2</th>
                                                <th scope="col">3</th>
                                                <th scope="col">4</th>
                                                <th scope="col">5</th>
                                                <th scope="col">6</th>
                                                <th scope="col">7</th>
                                                <th scope="col">8</th>
                                                <th scope="col">9</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Usar manos</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options0" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Buena visión</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options1" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Buen oido</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options2" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Comunicarse bien</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options3" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Levantar pesos</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options4" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tener fuerza</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options5" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder Leer</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options6" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder usar números</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options7" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder usar dinero</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options8" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber decir la hora</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options9" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber trabajar rapido</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options10" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber conseguir calidad</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options11" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Concentrarse + de 2 hs</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options12" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder hacer varias tareas</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options13" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Solo 1 ó 2 tareas</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tener buen equilibrio</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options14" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder andar</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options15" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options15" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options15" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options15" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options15" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options15" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options15" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options15" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options15" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder estar de pie + de 2 hs</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options16" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options16" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options16" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options16" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options16" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options16" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options16" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options16" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options16" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder estar sentado + de 2 hs</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options17" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options17" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options17" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options17" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options17" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options17" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options17" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options17" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options17" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder utilizar escaleras</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options18" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options18" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options18" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options18" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options18" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options18" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options18" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options18" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options18" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">No enfadarse a menudo</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options19" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options19" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options19" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options19" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options19" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options19" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options19" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options19" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options19" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder recordar instrucciones</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options20" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options20" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options20" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options20" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options20" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options20" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options20" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options20" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options20" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber utilizar el teléfono</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options21" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options21" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options21" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options21" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options21" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options21" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options21" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options21" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options21" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber conducir</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options22" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options22" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options22" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options22" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options22" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options22" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options22" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options22" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options22" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber utilizar el ordenador</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options23" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options23" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options23" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options23" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options23" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options23" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options23" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options23" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options23" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber deletrear</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options24" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options24" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options24" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options24" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options24" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options24" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options24" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options24" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options24" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tener buena letra</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options25" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options25" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options25" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options25" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options25" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options25" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options25" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options25" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options25" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tener opinion,criterio,juicio</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options26" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options26" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options26" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options26" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options26" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options26" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options26" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options26" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options26" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder trabajar sin apoyo</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options27" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options27" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options27" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options27" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options27" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options27" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options27" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options27" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options27" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Se requiere apoyo directo</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tener iniciativa</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options28" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options28" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options28" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options28" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options28" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options28" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options28" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options28" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options28" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber cuidar su apariencia</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options29" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options29" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options29" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options29" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options29" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options29" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options29" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options29" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options29" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tener buena higiene personal</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options30" id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options30" id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options30" id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options30" id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options30" id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options30" id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options30" id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options30" id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="options30" id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="prueba3" role="tabpanel" aria-labelledby="prueba-tab3">
                                <div style="width: 900px; height: 600px" class="formulario-2 formulario centro my-custom-scrollbar">
                                    <div>
                                        <h1>Listado de comprobacion de necesidades de apoyo</h1>
                                    </div>
                                    <label>Cumplir el Horario</label>
                                    <select class="form-select" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Asistencia</label>
                                    <select class="form-select" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Comunicacion</label>
                                    <select class="form-select" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Conducta</label>
                                    <select class="form-select" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Vestido/apariencia</label>
                                    <select class="form-select" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Interaccion social</label>
                                    <select class="form-select" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="prueba4" role="tabpanel" aria-labelledby="prueba-tab4">
                                <div style="width: 900px; height: 600px" class="formulario-2 formulario centro my-custom-scrollbar">
                                    <div>
                                        <h1>Listado de comprobacion de necesidades de apoyo</h1>
                                    </div>
                                    <label>Motivacion</label>
                                    <select class="form-select" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Flexibilidad</label>
                                    <select class="form-select" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Iniciativa</label>
                                    <select class="form-select" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Trabajo en equipo</label>
                                    <select class="form-select" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Salud y seguridad</label>
                                    <select class="form-select" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Consistencia</label>
                                    <select class="form-select" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Trabajar con presion</label>
                                    <select class="form-select" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opción</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>

                                    <div>
                                    </div>
                                </div>
                            </div>
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
    <div class="modal fade" id="matriz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form method="POST" action="">
                    @csrf
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel"><b>Matriz de evaluación de Accesibilidad
                                Universal</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">ÍTEM Nº1 ESTACIONAMIENTOS</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">ÍTEM Nº2 INGRESO</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">ÍTEM Nº3 PUERTA DE INGRESO</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact3-tab" data-bs-toggle="tab" data-bs-target="#contact3" type="button" role="tab" aria-controls="contact3" aria-selected="false">ÍTEM Nº4 EVACUACIÓN</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact4-tab" data-bs-toggle="tab" data-bs-target="#contact4" type="button" role="tab" aria-controls="contact4" aria-selected="false">ÍTEM Nº5 ESPACIOS DE ATENCIÓN DE PÚBLICO</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact5-tab" data-bs-toggle="tab" data-bs-target="#contact5" type="button" role="tab" aria-controls="contact5" aria-selected="false">ÍTEM Nº6 RUTA ACCESIBLE INTERIOR</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact6-tab" data-bs-toggle="tab" data-bs-target="#contact6" type="button" role="tab" aria-controls="contact6" aria-selected="false">ÍTEM Nº7 CONEXIÓN VERTICAL: ESCALERA</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact7-tab" data-bs-toggle="tab" data-bs-target="#contact7" type="button" role="tab" aria-controls="contact7" aria-selected="false">ÍTEM Nº8 CONEXIÓN VERTICAL: ASCENSOR</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisión</th>
                                            <th scope="col">Criterio </th>
                                            <th scope="col">% Logro </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ubicación: a) Es propio de la institución y se encuentra en el mismo
                                                predio</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="estacionamiento_1" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-select" style="width:150px;text-align: center;visibility: hidden" id="logro_estacionamiento_1" >
                                                    @for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}%</option>
                                                        @endfor

                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dimensiones: Sus dimensiones mínimas son 2,5 mt de ancho x 5,00 mt
                                                <br>de largo,mas una franja de circulacion segura de 1,1 metro de ancho.
                                            </td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="estacionamiento_2" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-select" style="width:150px;text-align: center;visibility: hidden" id="logro_estacionamiento_2" >
                                                    <option value="" selected disabled>Seleccionar logro</option>

                                                    @for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}%</option>
                                                        @endfor

                                                </select>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Conexión: El estacionamiento está conectado a un ruta accesible
                                                <br>conectada a su vez al acceso al edificio, considera demarcación<br>
                                                de tránsito peatonal
                                            </td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="estacionamiento_3" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-select" style="width:150px;text-align: center;visibility: hidden" id="logro_estacionamiento_3" >
                                                    <option value="" selected disabled>Seleccionar logro</option>

                                                    @for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}%</option>
                                                        @endfor

                                                </select>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Señalización Vertical: Se encuentra señalizado sobre poste o sujeto a
                                                un<br> muro y tiene el Símbolo Internacional de Accesibilidad</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="estacionamiento_4" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-select" style="width:150px;text-align: center;visibility: hidden" id="logro_estacionamiento_4" >

                                                    <option value="" selected disabled>Seleccionar logro</option>
                                                    @for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}%</option>
                                                        @endfor

                                                </select>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Señalización Horizontal: Se encuentra señalizado sobre el piso del<br>
                                                estacionamiento con el Símbolo Internacional de Accesibilidad (SIA)
                                                en<br> blanco sobre un fondo azul</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="estacionamiento_5" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-select" style="width:150px;text-align: center;visibility: hidden" id="logro_estacionamiento_5" >
                                                    <option value="" selected disabled>Seleccionar logro</option>

                                                    @for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}%</option>
                                                        @endfor

                                                </select>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Demarcación área peatonal: Incorpora dentro de sus dimensiones, a
                                                uno<br> de sus costados longitudinales, la demarcación de tránsito
                                                peatonal de<br> ancho 1,10 mt (puede ser compartida con otro
                                                estacionamiento)</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="estacionamiento_6" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-select" style="width:150px;text-align: center;visibility: hidden" id="logro_estacionamiento_6" >
                                                    <option value="" selected disabled>Seleccionar logro</option>

                                                    @for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}%</option>
                                                        @endfor
                                                </select>
                                            </td>

                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th><button type="button" class="btn btn-info" style="width: -webkit-fill-available;" onclick="TotalEstacionamiento()">Ver Total</button></th>
                                            <th colspan="2">Total:<span id="total_estacionamiento"></span>%</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisión</th>
                                            <th scope="col">Criterio </th>
                                            <th scope="col">% Logro </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Acceso plano: El acceso al edificio no presenta desniveles, o bien
                                                tiene<br> un plano inclinado, es decir hasta un 5% de pendiente</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ingreso_1" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-select" style="width:150px;text-align: center;visibility: hidden" id="logro_ingreso_1" >
                                                    <option value="" selected disabled>Seleccionar logro</option>

                                                    @for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}%</option>
                                                        @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Existe una rampa de acceso con una pendiente preferentemente de 8%<br>
                                                (si tiene 8 cm de alto, la rampa mide mínimo un metro). La pendiente<br>
                                                puede variar hasta un máximo de 12% cuando tiene 2 mt de largo)</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ingreso_2" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-select" style="width:150px;text-align: center;visibility: hidden" id="logro_ingreso_2" >
                                                    <option value="" selected disabled>Seleccionar logro</option>

                                                    @for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}%</option>
                                                        @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Acceso plano: El pavimento es homogéneo, estable, antideslizante en<br>
                                                seco y en mojado</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ingreso_3" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-select" style="width:150px;text-align: center;visibility: hidden" id="logro_ingreso_3" >
                                                    <option value="" selected disabled>Seleccionar logro</option>

                                                    @for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}%</option>
                                                        @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Acceso por rampa: El pavimento de la rampa es homogéneo, estable,<br>
                                                antideslizante en seco y en mojado (cumple atributos de ruta accesible)
                                            </td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ingreso_4" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-select" style="width:150px;text-align: center;visibility: hidden" id="logro_ingreso_4" >
                                                    <option value="" selected disabled>Seleccionar logro</option>

                                                    @for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}%</option>
                                                        @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Acceso por rampa: Ancho: El ancho mínimo de la rampa es igual o
                                                <br>mayor al ancho de las vías de evacuación,<br> con un ancho mínimo de
                                                1,10 mt
                                            </td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ingreso_5" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-select" style="width:150px;text-align: center;visibility: hidden" id="logro_ingreso_5" >
                                                    <option value="" selected disabled>Seleccionar logro</option>

                                                    @for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}%</option>
                                                        @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Acceso por rampa: Longitud: La rampa tiene un largo máximo de 9,00<br>
                                                mt sin descanso (puede tener mayor longitud considerando descanso)</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ingreso_6" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-select" style="width:150px;text-align: center;visibility: hidden" id="logro_ingreso_6" >
                                                    <option value="" selected disabled>Seleccionar logro</option>

                                                    @for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}%</option>
                                                        @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>"Acceso por rampa: Pasamanos: Si el largo de la rampa es mayor a 1,5
                                                mt<br> debe tener pasamanos doble a ambos costados de la rampa (0.70
                                                mt<br> y 0,95 mt cada altura)"</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ingreso_7" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-select" style="width:150px;text-align: center;visibility: hidden" id="logro_ingreso_7" >
                                                    <option value="" selected disabled>Seleccionar logro</option>

                                                    @for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}%</option>
                                                        @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>"Acceso por rampa: Descanso: Plano horizontal que permite
                                                circunscribir<br> un círculo de diámetro 1,50 mt que permita<br> un giro
                                                en 360°"</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ingreso_8" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-select" style="width:150px;text-align: center;visibility: hidden" id="logro_ingreso_8" >
                                                    <option value="" selected disabled>Seleccionar logro</option>

                                                    @for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}%</option>
                                                        @endfor
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th><button type="button" class="btn btn-info" style="width: -webkit-fill-available;" onclick="TotalIngreso()">Ver Total</button></th>
                                            <th colspan="2">Total:<span id="total_ingreso"></span>%</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisión</th>
                                            <th scope="col">Criterio </th>
                                            <th scope="col">% Logro </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ancho puerta: El ancho libre de paso en puerta de ingreso, que no<br>
                                                corresponda a puerta de evacuación, es de 0,90 mt mínimos</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="puerta_1" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Espacio libre: La puerta principal de ingreso cuenta con espacio libre
                                                en<br> interior y exterior a ella, de mínimo 1,20 mt fuera del barrido
                                                de la(s)<br> puerta(s)</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="puerta_2" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Apertura y manillas: La puerta es de fácil accionamiento, por simple<br>
                                                empuje o con sensor, las manillas, o tiradores se encuentran a una<br>
                                                altura entre 0,95 mt y 1,20 mt y son tipo barra o palanca (no pomo)</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="puerta_3" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Contraste: La puerta es claramente perceptible respecto a los
                                                elementos<br> verticales adyacentes (Muros, paneles vidriados u otros)
                                            </td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="puerta_4" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Percepción: La puerta de ingreso es fácilmente localizable, en caso
                                                de<br> puertas transparentes, cuenta con tratamiento adhesivo para su
                                                clara<br> percepción</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="puerta_5" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact3-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisión</th>
                                            <th scope="col">Criterio </th>
                                            <th scope="col">% Logro </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ancho puertas de evacuación: El ancho libre de paso en puertas de<br>
                                                evacuación es de 1,10 mt mínimos</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="evacuacion_1" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Puertas de Evacuación: La puerta es de fácil accionamiento es por
                                                empuje<br> y su uso requiere un mínimo esfuerzo</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="evacuacion_2" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Puertas de Evacuación: Percepción: La puerta de evacuación es<br>
                                                fácilmente localizable, conectada a la ruta accesible, se encuentra<br>
                                                señalizada para su clara identificación</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="evacuacion_3" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Vías de evacuación: La vía de evacuación está conectada a la ruta<br>
                                                accesible, y a su vez se encuentra conectada a zona de seguridad</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="evacuacion_4" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Vías de evacuación: Percepción: Las vías de evacuación son
                                                fácilmente<br> identificables, se encuentran señalizadas para su optimo
                                                recorrido</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="evacuacion_5" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Iluminación: El recorrido interior de las vías de evacuación, se
                                                encuentra bien<br> iluminado. La iluminación es uniforme y<br>
                                                homogénea."</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="evacuacion_6" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>El recinto cuenta con sistema sonoro y lumínico de alarma para
                                                orientar<br> a público con discapacidad auditiva, visual o cognitiva en
                                                caso de<br> emergencia</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="evacuacion_7" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact4-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisión</th>
                                            <th scope="col">Criterio </th>
                                            <th scope="col">% Logro </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Mesón de atención o recepción: Tiene al menos una cubierta baja a 0,80
                                                mt<br> con espacio libre para la atención de una persona en silla de
                                                ruedas. </td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="espacios_1" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Espacio de aproximación y uso: El mesón de atención y/o recepción<br>
                                                tiene un espacio que permite el giro en 360°, considerando un
                                                diámetro<br> de 1,50 mt y tiene espacio libre bajo cubierta de altura
                                                0,70 mt y mínimo<br> 0,60 mt profundidad"</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="espacios_2" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Atención preferencial: Cuenta con al menos una unidad de atención<br>
                                                preferencial a personas con discapacidad y personas con<br> movilidad
                                                reducida"</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="espacios_3" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Dimensiones de cajas de pago o mesón de atención preferencial:
                                                Tiene<br> una altura de atención de 0,80 mt y tiene un ancho mínimo de
                                                0,90 mt<br> y tiene un espacio libre bajo cubierta de altura mínima 0,70
                                                mt<br> y profundidad mínima 0,60 mt"</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="espacios_4" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Zona de espera: Considera espacio libre señalizado para la silla de<br>
                                                ruedas de mínimo 0,80 mt x 1,20 mt conectado a ruta accesible</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="espacios_5" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>



                                    </tbody>

                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact5" role="tabpanel" aria-labelledby="contact5-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisión</th>
                                            <th scope="col">Criterio </th>
                                            <th scope="col">% Logro </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>"Continuidad: No existen desniveles interiores, y en caso de haberlos
                                                son<br> salvados con rampas cumpliendo las mismas exigencias
                                                establecidas en<br> la norma."</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="interior_1" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Pasillo: Pasillo más angosto de ancho mayor o igual a 1,50 mt. No<br>
                                                incluye bodegas</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="interior_2" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>En todo su recorrido, la ruta accesible se encuentra libre de
                                                elementos<br> que interfieran su ancho mínimo de 1,50 mt como
                                                extintores, basureros<br>, muebles o elementos ornamentales</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="interior_3" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Elementos fuera de altura: Elementos como letreros, lámparas u
                                                otros<br>, ubicados en la ruta accesible están a una altura mínima de
                                                2,10 mt</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="interior_4" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Iluminación: La iluminación es uniforme y homogénea en todo su<br>
                                                desarrollo no se generan zonas oscuras o de encandilamiento</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="interior_5" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>



                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact6" role="tabpanel" aria-labelledby="contact6-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisión</th>
                                            <th scope="col">Criterio </th>
                                            <th scope="col">% Logro </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Conexión: La escalera se encuentra conectada a la Ruta Accesible</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="escaleras_1" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Huella escalera (parte horizontal del peldaño): Existe
                                                diferenciación<br> entre la nariz de grada (punta del peldaño) y el
                                                resto de la huella</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="escaleras_2" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Pasamanos: Cuenta con pasamanos doble a ambos costados, al menos<br>
                                                uno es continuo (si el ancho de la escalera es superior a 3,00 mt<br>,
                                                considera doble pasamanos central dividiendo la<br> escalera en dos
                                                secciones paralelas)"</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="escaleras_3" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Pavimento podotáctil de alerta/contraste cromático: La escalera cuenta
                                                <br>con pavimento de alerta (botones en sobrerrelieve) o pavimento
                                                con<br> contraste cromático y una textura distinta, en su<br> inicio,
                                                descanso y término"
                                            </td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="escaleras_4" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Altura peldaños: La altura de los peldaños es regular y se encuentra
                                                en<br> un rango entre 0,15 mt y 0,18 mt</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="escaleras_5" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Zona sombra escaleras: La zona bajo la escalera se encuentra<br>
                                                protegida para impedir el tránsito, hasta cubrir la altura de 2,10 mt
                                            </td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="escaleras_6" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>



                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact7" role="tabpanel" aria-labelledby="contact7-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisión</th>
                                            <th scope="col">Criterio </th>
                                            <th scope="col">% Logro </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Conexión: El ascensor o salva escaleras/plataforma elevadora se<br>
                                                encuentra conectado a la Ruta Accesible</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ascensor_1" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Puerta: El ancho libre de paso en la <br>puerta es de mínimo 0,90 mt"
                                            </td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ascensor_2" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Dimensiones de Cabina: La dimensión mínima de la cabina será de 1,40 mt
                                                <br>de ancho por 1,40 mt de profundidad"
                                            </td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ascensor_3" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Zona exterior: El espacio exterior al acceso al ascensor permite giro
                                                en 360°<br> considerando un diámetro de 1,50 mt"</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ascensor_4" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Pasamanos interior: Cuenta con pasamanos <br> a ambos costados de la
                                                cabina"</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ascensor_5" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Información táctil: Cuenta con botonera interior y exterior, con braille
                                                y/o<br> sobre relieve</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ascensor_6" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Botonera interior: Se encuentra a una altura entre 1 mt y 1,4 mt</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ascensor_7" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Botonera exterior: Se encuentra a una altura entre 1 mt y 1,4 mt</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ascensor_8" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Información sensorial: Cuenta con dispositivos audiovisuales que
                                                indican<br> llegada al piso</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ascensor_9" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Sensor: Cuenta con sensor de movimiento o protección, que detenga el<br>
                                                movimiento de cierre de las puertas en caso de que una persona entre
                                                o<br> salga durante el cierre. El sensor cubre un rango entre 0,70 mt y
                                                1,50 mt</td>
                                            <td>
                                                <textarea></textarea>
                                            </td>
                                            <td><select id="ascensor_10" class="form-select">
                                                    <option selected disabled>Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td></td>
                                        </tr>



                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Crear Matriz</button>
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






        //Estacionamiento









        $("#estacionamiento_1").change(function() {
            if ($("#estacionamiento_1").val() == "cumple") {
                $("#logro_estacionamiento_1").css("visibility", "visible");
                $("#logro_estacionamiento_1").attr("disabled",false);
            }
            if ($("#estacionamiento_1").val() == "no_cumple") {
                $("#logro_estacionamiento_1").css("visibility", "visible");
                $("#logro_estacionamiento_1").val("0");
                $("#logro_estacionamiento_1").attr("disabled",true);
                
            }
            if ($("#estacionamiento_1").val() == "no_aplica") {
                $("#logro_estacionamiento_1").css("visibility", "hidden");
                $("#logro_estacionamiento_1").val("");
            }
        })
        $("#estacionamiento_2").change(function() {
            if ($("#estacionamiento_2").val() == "cumple") {
                $("#logro_estacionamiento_2").css("visibility", "visible");
                $("#logro_estacionamiento_2").attr("disabled",false);

            }
            if ($("#estacionamiento_2").val() == "no_cumple") {
                $("#logro_estacionamiento_2").css("visibility", "visible");
                $("#logro_estacionamiento_2").val("0");
                $("#logro_estacionamiento_2").attr("disabled",true);
            }
            if ($("#estacionamiento_2").val() == "no_aplica") {
                $("#logro_estacionamiento_2").css("visibility", "hidden");
                $("#logro_estacionamiento_2").val("");

            }
        })
        $("#estacionamiento_3").change(function() {
            if ($("#estacionamiento_3").val() == "cumple") {
                $("#logro_estacionamiento_3").css("visibility", "visible");
                $("#logro_estacionamiento_3").attr("disabled",false);

            }
            if ($("#estacionamiento_3").val() == "no_cumple") {
                $("#logro_estacionamiento_3").css("visibility", "visible");
                $("#logro_estacionamiento_3").val("0");
                $("#logro_estacionamiento_3").attr("disabled",true);
            }
            if ($("#estacionamiento_3").val() == "no_aplica") {
                $("#logro_estacionamiento_3").css("visibility", "hidden");
                $("#logro_estacionamiento_3").val("");
                
            }
        })
        $("#estacionamiento_4").change(function() {
            if ($("#estacionamiento_4").val() == "cumple") {
                $("#logro_estacionamiento_4").css("visibility", "visible");
                $("#logro_estacionamiento_4").attr("disabled",false);

            }
            if ($("#estacionamiento_4").val() == "no_cumple") {
                $("#logro_estacionamiento_4").css("visibility", "visible");
                $("#logro_estacionamiento_4").val("0");
                $("#logro_estacionamiento_4").attr("disabled",true);
            }
            if ($("#estacionamiento_4").val() == "no_aplica") {
                $("#logro_estacionamiento_4").css("visibility", "hidden");
                $("#logro_estacionamiento_4").val("");
                
            }
        })
        $("#estacionamiento_5").change(function() {
            if ($("#estacionamiento_5").val() == "cumple") {
                $("#logro_estacionamiento_5").css("visibility", "visible");
                $("#logro_estacionamiento_5").attr("disabled",false);

            }
            if ($("#estacionamiento_5").val() == "no_cumple") {
                $("#logro_estacionamiento_5").css("visibility", "visible");
                $("#logro_estacionamiento_5").val("0");
                $("#logro_estacionamiento_5").attr("disabled",true);
            }
            if ($("#estacionamiento_5").val() == "no_aplica") {
                $("#logro_estacionamiento_5").css("visibility", "hidden");
                $("#logro_estacionamiento_5").val("");
                
            }
        })
        $("#estacionamiento_6").change(function() {
            if ($("#estacionamiento_6").val() == "cumple") {
                $("#logro_estacionamiento_6").css("visibility", "visible");
                $("#logro_estacionamiento_6").attr("disabled",false);
            }
            if ($("#estacionamiento_6").val() == "no_cumple") {
                $("#logro_estacionamiento_6").css("visibility", "visible");
                $("#logro_estacionamiento_6").val("0");
                $("#logro_estacionamiento_6").attr("disabled",true);
            }
            if ($("#estacionamiento_6").val() == "no_aplica") {
                $("#logro_estacionamiento_6").css("visibility", "hidden");
                $("#logro_estacionamiento_6").val("");
                
            }
        })
        //INGRESOOOOO
        $("#ingreso_1").change(function() {
            if ($("#ingreso_1").val() == "cumple") {
                $("#logro_ingreso_1").css("visibility", "visible");
                $("#logro_ingreso_1").attr("disabled",false);
            }
            if ($("#ingreso_1").val() == "no_cumple") {
                $("#logro_ingreso_1").css("visibility", "visible");
                $("#logro_ingreso_1").val("0");
                $("#logro_ingreso_1").attr("disabled",true);
            }
            if ($("#ingreso_1").val() == "no_aplica") {
                $("#logro_ingreso_1").css("visibility", "hidden");
                $("#logro_ingreso_1").val("");
                
            }
        })
        $("#ingreso_2").change(function() {
            if ($("#ingreso_2").val() == "cumple") {
                $("#logro_ingreso_2").css("visibility", "visible");
                $("#logro_ingreso_2").attr("disabled",false);
            }
            if ($("#ingreso_2").val() == "no_cumple") {
                $("#logro_ingreso_2").css("visibility", "visible");
                $("#logro_ingreso_2").val("0");
                $("#logro_ingreso_2").attr("disabled",true);
            }
            if ($("#ingreso_2").val() == "no_aplica") {
                $("#logro_ingreso_2").css("visibility", "hidden");
                $("#logro_ingreso_2").val("");
                
            }
        })
        $("#ingreso_3").change(function() {
            if ($("#ingreso_3").val() == "cumple") {
                $("#logro_ingreso_3").css("visibility", "visible");
                $("#logro_ingreso_3").attr("disabled",false);
            }
            if ($("#ingreso_3").val() == "no_cumple") {
                $("#logro_ingreso_3").css("visibility", "visible");
                $("#logro_ingreso_3").val("0");
                $("#logro_ingreso_3").attr("disabled",true);
            }
            if ($("#ingreso_3").val() == "no_aplica") {
                $("#logro_ingreso_3").css("visibility", "hidden");
                $("#logro_ingreso_3").val("");
                
            }
        })
        $("#ingreso_4").change(function() {
            if ($("#ingreso_4").val() == "cumple") {
                $("#logro_ingreso_4").css("visibility", "visible");
                $("#logro_ingreso_4").attr("disabled",false);
            }
            if ($("#ingreso_4").val() == "no_cumple") {
                $("#logro_ingreso_4").css("visibility", "visible");
                $("#logro_ingreso_4").val("0");
                $("#logro_ingreso_4").attr("disabled",true);
            }
            if ($("#ingreso_4").val() == "no_aplica") {
                $("#logro_ingreso_4").css("visibility", "hidden");
                $("#logro_ingreso_4").val("");
                
            }
        })
        $("#ingreso_5").change(function() {
            if ($("#ingreso_5").val() == "cumple") {
                $("#logro_ingreso_5").css("visibility", "visible");
                $("#logro_ingreso_5").attr("disabled",false);
            }
            if ($("#ingreso_5").val() == "no_cumple") {
                $("#logro_ingreso_5").css("visibility", "visible");
                $("#logro_ingreso_5").val("0");
                $("#logro_ingreso_5").attr("disabled",true);
            }
            if ($("#ingreso_5").val() == "no_aplica") {
                $("#logro_ingreso_5").css("visibility", "hidden");
                $("#logro_ingreso_5").val("");
                
            }
        })
        $("#ingreso_6").change(function() {
            if ($("#ingreso_6").val() == "cumple") {
                $("#logro_ingreso_6").css("visibility", "visible");
                $("#logro_ingreso_6").attr("disabled",false);
            }
            if ($("#ingreso_6").val() == "no_cumple") {
                $("#logro_ingreso_6").css("visibility", "visible");
                $("#logro_ingreso_6").val("0");
                $("#logro_ingreso_6").attr("disabled",true);
            }
            if ($("#ingreso_6").val() == "no_aplica") {
                $("#logro_ingreso_6").css("visibility", "hidden");
                $("#logro_ingreso_6").val("");
                
            }
        })
        $("#ingreso_7").change(function() {
            if ($("#ingreso_7").val() == "cumple") {
                $("#logro_ingreso_7").css("visibility", "visible");
                $("#logro_ingreso_7").attr("disabled",false);
            }
            if ($("#ingreso_7").val() == "no_cumple") {
                $("#logro_ingreso_7").css("visibility", "visible");
                $("#logro_ingreso_7").val("0");
                $("#logro_ingreso_7").attr("disabled",true);
            }
            if ($("#ingreso_7").val() == "no_aplica") {
                $("#logro_ingreso_7").css("visibility", "hidden");
                $("#logro_ingreso_7").val("");
                
            }
        })
        $("#ingreso_8").change(function() {
            if ($("#ingreso_8").val() == "cumple") {
                $("#logro_ingreso_8").css("visibility", "visible");
                $("#logro_ingreso_8").attr("disabled",false);
            }
            if ($("#ingreso_8").val() == "no_cumple") {
                $("#logro_ingreso_8").css("visibility", "visible");
                $("#logro_ingreso_8").val("0");
                $("#logro_ingreso_8").attr("disabled",true);
            }
            if ($("#ingreso_8").val() == "no_aplica") {
                $("#logro_ingreso_8").css("visibility", "hidden");
                $("#logro_ingreso_8").val("");
                
            }
        })




















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
                            `<a  class="btn btn-success" style="width: max-content;" onClick=AbrirInformeAPT(${data.id})>Informe APT </a>
                            <a  class="btn btn-warning" style="width: max-content;" onClick=AbrirMatriz(${data.id})>Matriz de Evaluacion</a>
                            ` :
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
    function TotalEstacionamiento(){


        Aux = []
        Aux2 = 0;
        for (let index = 1; index <= 6; index++) {
            if($(`#logro_estacionamiento_${index}`).val() != null){
                Aux.push($(`#logro_estacionamiento_${index}`).val())
                Aux2 += parseInt($(`#logro_estacionamiento_${index}`).val())
            }
        }
        total = Aux2/Aux.length;
        $("#total_estacionamiento").text(total.toFixed());
    }
    function TotalIngreso(){


        Aux = []
        Aux2 = 0;
        for (let index = 1; index <= 6; index++) {
            if($(`#logro_ingreso_${index}`).val() != null){
                Aux.push($(`#logro_ingreso_${index}`).val())
                Aux2 += parseInt($(`#logro_ingreso_${index}`).val())
            }
        }
        total = Aux2/Aux.length;
        $("#total_ingreso").text(total.toFixed());
    }

    function AbrirInformeAPT(id) {
        // $("#informaApt").val(id);
        $("#informaApt").modal('show');
    }
    function sumar(array) {
            let sum = 0;

            for (let i = 0; i < array.length; i++) {
                sum += array[i];
            }
            return sum;
        }
    function AbrirMatriz(id) {
        // $("#informaApt").val(id);
        $("#matriz").modal('show');
    }
</script>