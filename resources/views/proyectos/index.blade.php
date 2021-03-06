@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div></div>
@stop

@section('content')


    <div class="row">
        <div class="col-auto">
            <div class="card">
                <div class="card-header">
                    <i class="fa-solid fa-filter"></i> Seleccionar una Empresa

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
        <div class="col-10">
            <div class="card">
                <div class="card-header">Proyectos</div>
                <div class="card-body">
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

    </div>


    <div class="modal fade" id="informaApt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form method="POST" action="">
                    @csrf
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel"><b>Informe APT</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding: 0rem!important;">
                        <ul class="nav nav-tabs bg-dark2" id="myTab2" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-link2 " id="puesto-trabajo" data-bs-toggle="tab"
                                    data-bs-target="#trabajo" type="button" role="tab" aria-controls="puestoTrabajo"
                                    aria-selected="true">Puesto de Trabajo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-link2 " id="profile2-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile2" type="button" role="tab" aria-controls="profile2"
                                    aria-selected="false">Salud y Seguridad</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-link2" id="contact2-tab" data-bs-toggle="tab"
                                    data-bs-target="#contact2" type="button" role="tab" aria-controls="contact2"
                                    aria-selected="false">Habilidad Fisica</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-link2" id="prueba-tab" data-bs-toggle="tab"
                                    data-bs-target="#prueba" type="button" role="tab" aria-controls="prueba"
                                    aria-selected="false">Trabajo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-link2" id="prueba-tab2" data-bs-toggle="tab"
                                    data-bs-target="#prueba2" type="button" role="tab" aria-controls="prueba2"
                                    aria-selected="false">Habilidades Requeridas</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-link2" id="prueba-tab3" data-bs-toggle="tab"
                                    data-bs-target="#prueba3" type="button" role="tab" aria-controls="prueba3"
                                    aria-selected="false">Apoyo</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link nav-link2" id="prueba-tab4" data-bs-toggle="tab"
                                    data-bs-target="#prueba4" type="button" role="tab" aria-controls="prueba4"
                                    aria-selected="false">Apoyo 2</button>
                            </li>
                        </ul>
                        <div class="tab-content estilos" id="myTabContent2">
                            <div class="tab-pane fade show active" id="trabajo" role="tabpanel"
                                aria-labelledby="puesto-trabajo">
                                <div style="width: 900px; height: 600px"
                                    class="formulario-2 formulario centro my-custom-scrollbar">
                                    <div>
                                        <h1>Puesto de Trabajo</h1>
                                    </div>
                                    <label>Nombre de Puesto </label>
                                    <input type="text" placeholder="Nombre del puesto">
                                    <br />
                                    <label>Descripci??n del Puesto</label>
                                    <input type="text" placeholder="Descripcion Puesto disponible">
                                    <br />
                                    <label>Control Horario</label>
                                    <select class="form-control" aria-label="Control Horario">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>

                                    <textarea class="form-control" type="text" placeholder="Detalles Control Horario" maxLength="500"> </textarea>
                                    <br />
                                    <label> Normas de Vestuario </label>
                                    <select class="form-control" aria-label="Normas de Vestuario">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles de Normas de Vestuario" maxLength="500"></textarea>
                                    <br />
                                    <label> Formaci??n en Casa </label>
                                    <select class="form-control" aria-label="Formacion en Casa">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Formacion en Casa" maxLength="500"></textarea>

                                    <br />
                                    <label> Pensi??n de Empresa </label>
                                    <select class="form-control" aria-label="Pensi??n de empresa">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Pension de Empresa" maxLength="500"></textarea>

                                    <br />
                                    <label>Relaci??n con la familia</label>
                                    <select class="form-control" aria-label="Relacion con la Familia">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Relacion Familia" maxLength="500"></textarea>

                                    <br />
                                    <label>Seguro de enfermedad </label>
                                    <select class="form-control" aria-label="Seguro de Enfermedad">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>

                                    <textarea class="form-control" type="text" placeholder="Detalles Seguro de Enfermedad" maxLength="500"></textarea>

                                    <br />

                                    <label>Vacaciones </label>
                                    <select class="form-control" aria-label="Vacaciones">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>

                                    <textarea class="form-control" type="text" placeholder="Detalles Vacaciones" maxLength="500"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile2-tab">
                                <div class="formulario-2 formulario centro my-custom-scrollbar"
                                    style="width: 900px ; height: 600px">
                                    <div>
                                        <h1>SALUD Y SEGURIDAD</h1>
                                    </div>
                                    <label>Evaluacion de riesgo</label>
                                    <select class="form-control" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>

                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion de Riesgo" maxLength="500"></textarea>
                                    <br />
                                    <label>Evaluacion Realizada</label>
                                    <select class="form-control" aria-label="Evaluacion Realizada">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>

                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Promocion Laboral</label>
                                    <textarea class="form-control" type="text" placeholder="Perspectiva de promocion Laboral" maxLength="500"></textarea>
                                    <div>

                                        <label>Flexibilidad Laboral</label>
                                        <textarea class="form-control" type="text" placeholder="Flexibilidad Laboral" maxLength="500"></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">
                                <div style=" width: 900px; height: 600px"
                                    class="formulario-2 formulario centro my-custom-scrollbar">
                                    <h1>HABILIDAD FISICA</h1>

                                    <label>Estar de pie</label>
                                    <select class="form-control" aria-label="Estar de pie">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Caminar</label>
                                    <select class="form-control" aria-label="Caminar">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Estar Sentado</label>
                                    <select class="form-control" aria-label="Estar Sentado">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Levantar</label>
                                    <select class="form-control" aria-label="Levantar">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Acarrear</label>
                                    <select class="form-control" aria-label="Acarrear">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Empujar</label>
                                    <select class="form-control" aria-label="Empujar">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Subir</label>
                                    <select class="form-control" aria-label="Subir">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Mantener Equilibrio</label>
                                    <select class="form-control" aria-label="Mantener Equilibrio">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Encorvarse</label>
                                    <select class="form-control" aria-label="Encorvarse">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Arrodillarse</label>
                                    <select class="form-control" aria-label="Arrodillarse">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Manipular con las manos</label>
                                    <select class="form-control" aria-label="Manipular con las manos">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">UNA MANO</option>
                                        <option value="2">AMBAS MANOS</option>
                                    </select>
                                    <label>Manipular con destreza</label>
                                    <select class="form-control" aria-label="Manipular con destreza">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">FINA</option>
                                        <option value="2">GRUESA</option>
                                    </select>
                                    <label>Vision</label>
                                    <select class="form-control" aria-label="Vision">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Audicion</label>
                                    <select class="form-control" aria-label="Audicion">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                    <label>Requisitos de adaptacion</label>
                                    <textarea class="form-control" type="text" placeholder="Requisitos de adaptacion" maxLength="500"></textarea>
                                    <label>Expetativas de supervicion/ apoyo natural</label>
                                    <textarea class="form-control" type="text" placeholder="Expetativas de supervicion/apoyo natural" maxLength="500"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="prueba" role="tabpanel" aria-labelledby="prueba-tab">
                                <div style="width: 900px; height: 600px"
                                    class="formulario-2 formulario centro my-custom-scrollbar">
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
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Media Jornada</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Dentro</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">En el exterior</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Estando en un lugar</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Cambiando de lugar</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Donde haya mucha actividad</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Donde haya poca actividad</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Donde haga calor</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Donde haga fr??o</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">En un lugar ruidoso</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">En un lugar silencioso</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">En un sitio limpio</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">En un sitio desali??ado, sucio</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Una tarea constante</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Haciendo diferentes tareas</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">En un espacio grande</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">En un espacio peque??o</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Principalmente con hombres</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Principalmente con mujeres</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Con uniforme</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="9"></div>
                                                </td>
                                                <th scope="row">Sin uniforme</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Con palabras / libros</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="1"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="2"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="3"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="4"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="5"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="6"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="7"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="8"></div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No con palabras ni libros</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Con n??meros</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No con n??meros</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Utilizando transporte p??blico</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">Sin usar transporte p??blico</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Con otros</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No con otros</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="prueba2" role="tabpanel" aria-labelledby="prueba-tab2">
                                <div style="width: 900px; height: 600px"
                                    class="formulario-2 formulario centro my-custom-scrollbar">
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
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options0"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Buena visi??n</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options1"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Buen oido</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options2"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Comunicarse bien</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options3"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Levantar pesos</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options4"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tener fuerza</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options5"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder Leer</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options6"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder usar n??meros</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options7"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder usar dinero</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options8"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber decir la hora</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options9"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber trabajar rapido</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options10"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber conseguir calidad</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options11"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Concentrarse + de 2 hs</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options12"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder hacer varias tareas</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options13"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">Solo 1 ?? 2 tareas</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tener buen equilibrio</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options14"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder andar</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options15"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options15"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options15"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options15"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options15"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options15"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options15"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options15"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options15"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder estar de pie + de 2 hs</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options16"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options16"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options16"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options16"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options16"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options16"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options16"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options16"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options16"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder estar sentado + de 2 hs</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options17"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options17"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options17"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options17"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options17"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options17"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options17"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options17"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options17"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder utilizar escaleras</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options18"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options18"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options18"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options18"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options18"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options18"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options18"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options18"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options18"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">No enfadarse a menudo</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options19"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options19"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options19"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options19"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options19"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options19"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options19"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options19"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options19"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder recordar instrucciones</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options20"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options20"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options20"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options20"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options20"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options20"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options20"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options20"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options20"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber utilizar el tel??fono</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options21"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options21"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options21"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options21"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options21"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options21"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options21"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options21"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options21"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber conducir</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options22"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options22"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options22"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options22"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options22"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options22"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options22"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options22"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options22"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber utilizar el ordenador</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options23"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options23"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options23"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options23"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options23"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options23"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options23"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options23"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options23"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber deletrear</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options24"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options24"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options24"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options24"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options24"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options24"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options24"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options24"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options24"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tener buena letra</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options25"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options25"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options25"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options25"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options25"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options25"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options25"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options25"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options25"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tener opinion,criterio,juicio</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options26"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options26"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options26"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options26"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options26"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options26"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options26"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options26"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options26"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Poder trabajar sin apoyo</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options27"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options27"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options27"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options27"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options27"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options27"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options27"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options27"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options27"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">Se requiere apoyo directo</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tener iniciativa</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options28"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options28"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options28"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options28"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options28"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options28"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options28"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options28"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options28"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Saber cuidar su apariencia</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options29"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options29"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options29"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options29"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options29"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options29"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options29"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options29"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options29"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tener buena higiene personal</th>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options30"
                                                            id="inlineRadio1" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options30"
                                                            id="inlineRadio1" value="2">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options30"
                                                            id="inlineRadio1" value="3">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options30"
                                                            id="inlineRadio1" value="4">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options30"
                                                            id="inlineRadio1" value="5">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options30"
                                                            id="inlineRadio1" value="6">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options30"
                                                            id="inlineRadio1" value="7">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options30"
                                                            id="inlineRadio1" value="8">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline"><input
                                                            class="form-check-input" type="radio" name="options30"
                                                            id="inlineRadio1" value="9">
                                                    </div>
                                                </td>
                                                <th scope="row">No requerida</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="prueba3" role="tabpanel" aria-labelledby="prueba-tab3">
                                <div style="width: 900px; height: 600px"
                                    class="formulario-2 formulario centro my-custom-scrollbar">
                                    <div>
                                        <h1>Listado de comprobacion de necesidades de apoyo</h1>
                                    </div>
                                    <label>Cumplir el Horario</label>
                                    <select class="form-control" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Asistencia</label>
                                    <select class="form-control" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Comunicacion</label>
                                    <select class="form-control" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Conducta</label>
                                    <select class="form-control" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Vestido/apariencia</label>
                                    <select class="form-control" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Interaccion social</label>
                                    <select class="form-control" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="prueba4" role="tabpanel" aria-labelledby="prueba-tab4">
                                <div style="width: 900px; height: 600px"
                                    class="formulario-2 formulario centro my-custom-scrollbar">
                                    <div>
                                        <h1>Listado de comprobacion de necesidades de apoyo</h1>
                                    </div>
                                    <label>Motivacion</label>
                                    <select class="form-control" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Flexibilidad</label>
                                    <select class="form-control" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Iniciativa</label>
                                    <select class="form-control" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Trabajo en equipo</label>
                                    <select class="form-control" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Salud y seguridad</label>
                                    <select class="form-control" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Consistencia</label>
                                    <select class="form-control" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>
                                    <label>Trabajar con presion</label>
                                    <select class="form-control" aria-label="Evaluacion de riesgo">
                                        <option value="DEFAULT" disabled>Seleccione una opci??n</option>
                                        <option value="1">Necesita apoyo total</option>
                                        <option value="2">Necesita algun apoyo</option>
                                        <option value="3">No necesita apoyo</option>
                                    </select>
                                    <textarea class="form-control" type="text" placeholder="Detalles Evaluacion Realizada" maxLength="500"></textarea>

                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn nav-link" href="/word/1"> <i class="fas fa-file-word"></i>
                            Descargar</a>
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
                <form method="POST" action="/matriz">
                    @csrf
                    <input id="id_proyecto" name="id_proyecto" type="text" hidden>
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel"><b>Matriz de evaluaci??n de AccesibilidadUniversal</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 20px;">
                            <li class="nav-item" role="presentation">

                                <a class="nav-link active" id="home-tab" data-toggle="pill" href="#home"
                                    role="tab" aria-controls="home" aria-selected="true">??TEM N??1
                                    ESTACIONAMIENTOS</a>
                            </li>
                            <li class="nav-item" role="presentation">

                                <a class="nav-link" id="profile-tab" data-toggle="pill" href="#profile"
                                    role="tab" aria-controls="profile" aria-selected="false">??TEM N??2 INGRESO</a>

                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-toggle="pill" href="#contact"
                                    type="button" role="tab" aria-controls="contact" aria-selected="false">??TEM
                                    N??3 PUERTA DE
                                    INGRESO</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact3-tab" data-toggle="pill" href="#contact3"
                                    type="button" role="tab" aria-controls="contact3"
                                    aria-selected="false">??TEM N??4 EVACUACI??N</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact4-tab" data-toggle="pill" href="#contact4"
                                    type="button" role="tab" aria-controls="contact4"
                                    aria-selected="false">??TEM N??5 ESPACIOS DE ATENCI??N DE
                                    P??BLICO</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact5-tab" data-toggle="pill" href="#contact5"
                                    type="button" role="tab" aria-controls="contact5"
                                    aria-selected="false">??TEM N??6 RUTA ACCESIBLE
                                    INTERIOR</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact6-tab" data-toggle="pill" href="#contact6"
                                    type="button" role="tab" aria-controls="contact6"
                                    aria-selected="false">??TEM N??7 CONEXI??N VERTICAL:
                                    ESCALERA</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact7-tab" data-toggle="pill" href="#contact7"
                                    type="button" role="tab" aria-controls="contact7"
                                    aria-selected="false">??TEM N??8 CONEXI??N VERTICAL:
                                    ASCENSOR</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact8-tab" data-toggle="pill" href="#contact8"
                                    type="button" role="tab" aria-controls="contact8"
                                    aria-selected="false">RESUMEN</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisi??n</th>
                                            <th scope="col">Criterio </th>
                                            <th scope="col">% Logro </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ubicaci??n: a) Es propio de la instituci??n y se encuentra en el mismo
                                                predio</td>
                                            <td>
                                                <textarea class="form-control" id="estacionamiento_revision_1" name="estacionamiento_revision_1"></textarea>
                                            </td>
                                            <td><select id="estacionamiento_1" class="form-control"
                                                    name="estacionamiento_1">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_estacionamiento_1" name="logro_estacionamiento_1">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>
                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor

                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dimensiones: Sus dimensiones m??nimas son 2,5 mt de ancho x 5,00 mt
                                                <br>de largo,mas una franja de circulacion segura de 1,1 metro de ancho.
                                            </td>
                                            <td>
                                                <textarea class="form-control" id="estacionamiento_revision_2" name="estacionamiento_revision_2"></textarea>
                                            </td>
                                            <td><select id="estacionamiento_2" class="form-control"
                                                    name="estacionamiento_2">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_estacionamiento_2" name="logro_estacionamiento_2">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor

                                                </select>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Conexi??n: El estacionamiento est?? conectado a un ruta accesible
                                                <br>conectada a su vez al acceso al edificio, considera demarcaci??n<br>
                                                de tr??nsito peatonal
                                            </td>
                                            <td>
                                                <textarea class="form-control" id="estacionamiento_revision_3" name="estacionamiento_revision_3"></textarea>
                                            </td>
                                            <td><select id="estacionamiento_3" class="form-control"
                                                    name="estacionamiento_3">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_estacionamiento_3" name="logro_estacionamiento_3">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor

                                                </select>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Se??alizaci??n Vertical: Se encuentra se??alizado sobre poste o sujeto a
                                                un<br> muro y tiene el S??mbolo Internacional de Accesibilidad</td>
                                            <td>
                                                <textarea class="form-control" id="estacionamiento_revision_4" name="estacionamiento_revision_4"></textarea>
                                            </td>
                                            <td><select id="estacionamiento_4" class="form-control"
                                                    name="estacionamiento_4">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_estacionamiento_4" name="logro_estacionamiento_4">

                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>
                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor

                                                </select>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Se??alizaci??n Horizontal: Se encuentra se??alizado sobre el piso del<br>
                                                estacionamiento con el S??mbolo Internacional de Accesibilidad (SIA)
                                                en<br> blanco sobre un fondo azul</td>
                                            <td>
                                                <textarea class="form-control" id="estacionamiento_revision_5" name="estacionamiento_revision_5"></textarea>
                                            </td>
                                            <td><select id="estacionamiento_5" class="form-control"
                                                    name="estacionamiento_5">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_estacionamiento_5" name="logro_estacionamiento_5">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor

                                                </select>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Demarcaci??n ??rea peatonal: Incorpora dentro de sus dimensiones, a
                                                uno<br> de sus costados longitudinales, la demarcaci??n de tr??nsito
                                                peatonal de<br> ancho 1,10 mt (puede ser compartida con otro
                                                estacionamiento)</td>
                                            <td>
                                                <textarea class="form-control" id="estacionamiento_revision_6" name="estacionamiento_revision_6"></textarea>
                                            </td>
                                            <td><select id="estacionamiento_6" class="form-control"
                                                    name="estacionamiento_6">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_estacionamiento_6" name="logro_estacionamiento_6">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>

                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th><button type="button" class="btn btn-info"
                                                    style="width: -webkit-fill-available;"
                                                    onclick="TotalEstacionamiento()">Ver Total</button></th>
                                            <th colspan="2">Total:<span id="total_estacionamiento"></span>%</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered mt-2">
                                        <thead style="background-color: #2257a3;color: white;">
                                            <tr>
                                                <th scope="col">Indicadores</th>
                                                <th scope="col">Revisi??n</th>
                                                <th scope="col">Criterio </th>
                                                <th scope="col">% Logro </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Acceso plano: El acceso al edificio no presenta desniveles, o bien
                                                    tiene<br> un plano inclinado, es decir hasta un 5% de pendiente</td>
                                                <td>
                                                    <textarea class="form-control" id="ingreso_revision_1" name="ingreso_revision_1"></textarea>
                                                </td>
                                                <td><select id="ingreso_1" class="form-control" name="ingreso_1">
                                                        <option selected disabled value="">Seleccionar Criterio</option>
                                                        <option value="cumple">Cumple</option>
                                                        <option value="no_cumple">No Cumple</option>
                                                        <option value="no_aplica">No Aplica</option>
                                                    </select></td>
                                                <td>
                                                    <select class="form-control"
                                                        style="width:150px;text-align: center;visibility: hidden"
                                                        id="logro_ingreso_1" name="logro_ingreso_1">
                                                        <option value="" selected disabled>Seleccionar logro
                                                        </option>

                                                        @for ($i = 0; $i <= 100; $i++)
                                                            <option value="{{ $i }}">{{ $i }}%
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Existe una rampa de acceso con una pendiente preferentemente de 8%<br>
                                                    (si tiene 8 cm de alto, la rampa mide m??nimo un metro). La pendiente<br>
                                                    puede variar hasta un m??ximo de 12% cuando tiene 2 mt de largo)</td>
                                                <td>
                                                    <textarea class="form-control" id="ingreso_revision_2" name="ingreso_revision_2"></textarea>
                                                </td>
                                                <td><select id="ingreso_2" class="form-control" name="ingreso_2">
                                                        <option selected disabled value="">Seleccionar Criterio</option>
                                                        <option value="cumple">Cumple</option>
                                                        <option value="no_cumple">No Cumple</option>
                                                        <option value="no_aplica">No Aplica</option>
                                                    </select></td>
                                                <td>
                                                    <select class="form-control"
                                                        style="width:150px;text-align: center;visibility: hidden"
                                                        id="logro_ingreso_2" name="logro_ingreso_2">
                                                        <option value="" selected disabled>Seleccionar logro
                                                        </option>

                                                        @for ($i = 0; $i <= 100; $i++)
                                                            <option value="{{ $i }}">{{ $i }}%
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Acceso plano: El pavimento es homog??neo, estable, antideslizante en<br>
                                                    seco y en mojado</td>
                                                <td>
                                                    <textarea class="form-control" id="ingreso_revision_3" name="ingreso_revision_3"></textarea>
                                                </td>
                                                <td><select id="ingreso_3" class="form-control" name="ingreso_3">
                                                        <option selected disabled value="">Seleccionar Criterio</option>
                                                        <option value="cumple">Cumple</option>
                                                        <option value="no_cumple">No Cumple</option>
                                                        <option value="no_aplica">No Aplica</option>
                                                    </select></td>
                                                <td>
                                                    <select class="form-control"
                                                        style="width:150px;text-align: center;visibility: hidden"
                                                        id="logro_ingreso_3" name="logro_ingreso_3">
                                                        <option value="" selected disabled>Seleccionar logro
                                                        </option>

                                                        @for ($i = 0; $i <= 100; $i++)
                                                            <option value="{{ $i }}">{{ $i }}%
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Acceso por rampa: El pavimento de la rampa es homog??neo, estable,<br>
                                                    antideslizante en seco y en mojado (cumple atributos de ruta accesible)
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="ingreso_revision_4" name="ingreso_revision_4"></textarea>
                                                </td>
                                                <td><select id="ingreso_4" class="form-control" name="ingreso_4">
                                                        <option selected disabled value="">Seleccionar Criterio</option>
                                                        <option value="cumple">Cumple</option>
                                                        <option value="no_cumple">No Cumple</option>
                                                        <option value="no_aplica">No Aplica</option>
                                                    </select></td>
                                                <td>
                                                    <select class="form-control"
                                                        style="width:150px;text-align: center;visibility: hidden"
                                                        id="logro_ingreso_4" name="logro_ingreso_4">
                                                        <option value="" selected disabled>Seleccionar logro
                                                        </option>

                                                        @for ($i = 0; $i <= 100; $i++)
                                                            <option value="{{ $i }}">{{ $i }}%
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Acceso por rampa: Ancho: El ancho m??nimo de la rampa es igual o
                                                    <br>mayor al ancho de las v??as de evacuaci??n,<br> con un ancho m??nimo de
                                                    1,10 mt
                                                </td>
                                                <td>
                                                    <textarea class="form-control" id="ingreso_revision_5" name="ingreso_revision_5"></textarea>
                                                </td>
                                                <td><select id="ingreso_5" class="form-control" name="ingreso_5">
                                                        <option selected disabled value="">Seleccionar Criterio</option>
                                                        <option value="cumple">Cumple</option>
                                                        <option value="no_cumple">No Cumple</option>
                                                        <option value="no_aplica">No Aplica</option>
                                                    </select></td>
                                                <td>
                                                    <select class="form-control"
                                                        style="width:150px;text-align: center;visibility: hidden"
                                                        id="logro_ingreso_5" name="logro_ingreso_5">
                                                        <option value="" selected disabled>Seleccionar logro
                                                        </option>

                                                        @for ($i = 0; $i <= 100; $i++)
                                                            <option value="{{ $i }}">{{ $i }}%
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Acceso por rampa: Longitud: La rampa tiene un largo m??ximo de 9,00<br>
                                                    mt sin descanso (puede tener mayor longitud considerando descanso)</td>
                                                <td>
                                                    <textarea class="form-control" id="ingreso_revision_6" name="ingreso_revision_6"></textarea>
                                                </td>
                                                <td><select id="ingreso_6" class="form-control" name="ingreso_6">
                                                        <option selected disabled value="">Seleccionar Criterio</option>
                                                        <option value="cumple">Cumple</option>
                                                        <option value="no_cumple">No Cumple</option>
                                                        <option value="no_aplica">No Aplica</option>
                                                    </select></td>
                                                <td>
                                                    <select class="form-control"
                                                        style="width:150px;text-align: center;visibility: hidden"
                                                        id="logro_ingreso_6" name="logro_ingreso_6">
                                                        <option value="" selected disabled>Seleccionar logro
                                                        </option>

                                                        @for ($i = 0; $i <= 100; $i++)
                                                            <option value="{{ $i }}">{{ $i }}%
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>"Acceso por rampa: Pasamanos: Si el largo de la rampa es mayor a 1,5
                                                    mt<br> debe tener pasamanos doble a ambos costados de la rampa (0.70
                                                    mt<br> y 0,95 mt cada altura)"</td>
                                                <td>
                                                    <textarea class="form-control" id="ingreso_revision_7" name="ingreso_revision_7"></textarea>
                                                </td>
                                                <td><select id="ingreso_7" class="form-control" name="ingreso_7">
                                                        <option selected disabled value="">Seleccionar Criterio</option>
                                                        <option value="cumple">Cumple</option>
                                                        <option value="no_cumple">No Cumple</option>
                                                        <option value="no_aplica">No Aplica</option>
                                                    </select></td>
                                                <td>
                                                    <select class="form-control"
                                                        style="width:150px;text-align: center;visibility: hidden"
                                                        id="logro_ingreso_7" name="logro_ingreso_7">
                                                        <option value="" selected disabled>Seleccionar logro
                                                        </option>

                                                        @for ($i = 0; $i <= 100; $i++)
                                                            <option value="{{ $i }}">{{ $i }}%
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>"Acceso por rampa: Descanso: Plano horizontal que permite
                                                    circunscribir<br> un c??rculo de di??metro 1,50 mt que permita<br> un giro
                                                    en 360??"</td>
                                                <td>
                                                    <textarea class="form-control" id="ingreso_revision_8" name="ingreso_revision_8"></textarea>
                                                </td>
                                                <td><select id="ingreso_8" class="form-control" name="ingreso_8">
                                                        <option selected disabled value="">Seleccionar Criterio</option>
                                                        <option value="cumple">Cumple</option>
                                                        <option value="no_cumple">No Cumple</option>
                                                        <option value="no_aplica">No Aplica</option>
                                                    </select></td>
                                                <td>
                                                    <select class="form-control"
                                                        style="width:150px;text-align: center;visibility: hidden"
                                                        id="logro_ingreso_8" name="logro_ingreso_8">
                                                        <option value="" selected disabled>Seleccionar logro
                                                        </option>

                                                        @for ($i = 0; $i <= 100; $i++)
                                                            <option value="{{ $i }}">{{ $i }}%
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th><button type="button" class="btn btn-info"
                                                        style="width: -webkit-fill-available;"
                                                        onclick="TotalIngreso()">Ver Total</button></th>
                                                <th colspan="2">Total:<span id="total_ingreso"></span>%</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisi??n</th>
                                            <th scope="col">Criterio </th>
                                            <th scope="col">% Logro </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ancho puerta: El ancho libre de paso en puerta de ingreso, que no<br>
                                                corresponda a puerta de evacuaci??n, es de 0,90 mt m??nimos</td>
                                            <td>
                                                <textarea class="form-control" id="puerta_revision_1" name="puerta_revision_1"></textarea>
                                            </td>
                                            <td><select id="puerta_1" class="form-control" name="puerta_1">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_puerta_1" name="logro_puerta_1">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Espacio libre: La puerta principal de ingreso cuenta con espacio libre
                                                en<br> interior y exterior a ella, de m??nimo 1,20 mt fuera del barrido
                                                de la(s)<br> puerta(s)</td>
                                            <td>
                                                <textarea class="form-control" id="puerta_revision_2" name="puerta_revision_2"></textarea>
                                            </td>
                                            <td><select id="puerta_2" class="form-control" name="puerta_2">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_puerta_2" name="logro_puerta_2">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Apertura y manillas: La puerta es de f??cil accionamiento, por simple<br>
                                                empuje o con sensor, las manillas, o tiradores se encuentran a una<br>
                                                altura entre 0,95 mt y 1,20 mt y son tipo barra o palanca (no pomo)</td>
                                            <td>
                                                <textarea class="form-control" id="puerta_revision_3" name="puerta_revision_3"></textarea>
                                            </td>
                                            <td><select id="puerta_3" class="form-control" name="puerta_3">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_puerta_3" name="logro_puerta_3">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Contraste: La puerta es claramente perceptible respecto a los
                                                elementos<br> verticales adyacentes (Muros, paneles vidriados u otros)
                                            </td>
                                            <td>
                                                <textarea class="form-control" id="puerta_revision_4" name="puerta_revision_4"></textarea>
                                            </td>
                                            <td><select id="puerta_4" class="form-control" name="puerta_4">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_puerta_4" name="logro_puerta_4">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Percepci??n: La puerta de ingreso es f??cilmente localizable, en caso
                                                de<br> puertas transparentes, cuenta con tratamiento adhesivo para su
                                                clara<br> percepci??n</td>
                                            <td>
                                                <textarea class="form-control" id="puerta_revision_5" name="puerta_revision_5"></textarea>
                                            </td>
                                            <td><select id="puerta_5" class="form-control" name="puerta_5">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_puerta_5" name="logro_puerta_5">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th><button type="button" class="btn btn-info"
                                                    style="width: -webkit-fill-available;" onclick="TotalPuerta()">Ver
                                                    Total</button></th>
                                            <th colspan="2">Total:<span id="total_puerta"></span>%</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact3" role="tabpanel"
                                aria-labelledby="contact3-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisi??n</th>
                                            <th scope="col">Criterio </th>
                                            <th scope="col">% Logro </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ancho puertas de evacuaci??n: El ancho libre de paso en puertas de<br>
                                                evacuaci??n es de 1,10 mt m??nimos</td>
                                            <td>
                                                <textarea class="form-control" id="evacuacion_revision_1" name="evacuacion_revision_1"></textarea>
                                            </td>
                                            <td><select id="evacuacion_1" class="form-control" name="evacuacion_1">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_evacuacion_1" name="logro_evacuacion_1">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Puertas de Evacuaci??n: La puerta es de f??cil accionamiento es por
                                                empuje<br> y su uso requiere un m??nimo esfuerzo</td>
                                            <td>
                                                <textarea class="form-control" name="evacuacion_revision_2" id="evacuacion_revision_2"></textarea>
                                            </td>
                                            <td><select id="evacuacion_2" class="form-control" name="evacuacion_2">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_evacuacion_2" name="logro_evacuacion_2">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Puertas de Evacuaci??n: Percepci??n: La puerta de evacuaci??n es<br>
                                                f??cilmente localizable, conectada a la ruta accesible, se encuentra<br>
                                                se??alizada para su clara identificaci??n</td>
                                            <td>
                                                <textarea class="form-control" id="evacuacion_revision_3" name="evacuacion_revision_3"></textarea>
                                            </td>
                                            <td><select id="evacuacion_3" class="form-control" name="evacuacion_3">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_evacuacion_3" name="logro_evacuacion_3">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>V??as de evacuaci??n: La v??a de evacuaci??n est?? conectada a la ruta<br>
                                                accesible, y a su vez se encuentra conectada a zona de seguridad</td>
                                            <td>
                                                <textarea class="form-control" id="evacuacion_revision_4" name="evacuacion_revision_4"></textarea>
                                            </td>
                                            <td><select id="evacuacion_4" class="form-control" name="evacuacion_4">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_evacuacion_4" name="logro_evacuacion_4">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>V??as de evacuaci??n: Percepci??n: Las v??as de evacuaci??n son
                                                f??cilmente<br> identificables, se encuentran se??alizadas para su optimo
                                                recorrido</td>
                                            <td>
                                                <textarea class="form-control" id="evacuacion_revision_5" name="evacuacion_revision_5"></textarea>
                                            </td>
                                            <td><select id="evacuacion_5" class="form-control" name="evacuacion_5">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_evacuacion_5" name="logro_evacuacion_5">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>"Iluminaci??n: El recorrido interior de las v??as de evacuaci??n, se
                                                encuentra bien<br> iluminado. La iluminaci??n es uniforme y<br>
                                                homog??nea."</td>
                                            <td>
                                                <textarea class="form-control" id="evacuacion_revision_6" name="evacuacion_revision_6"></textarea>
                                            </td>
                                            <td><select id="evacuacion_6" class="form-control" name="evacuacion_6">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_evacuacion_6" name="logro_evacuacion_6">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>El recinto cuenta con sistema sonoro y lum??nico de alarma para
                                                orientar<br> a p??blico con discapacidad auditiva, visual o cognitiva en
                                                caso de<br> emergencia</td>
                                            <td>
                                                <textarea class="form-control" id="evacuacion_revision_7" name="evacuacion_revision_7"></textarea>
                                            </td>
                                            <td><select id="evacuacion_7" class="form-control" name="evacuacion_7">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_evacuacion_7" name="logro_evacuacion_7">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th><button type="button" class="btn btn-info"
                                                    style="width: -webkit-fill-available;"
                                                    onclick="TotalEvacuacion()">Ver Total</button></th>
                                            <th colspan="2">Total:<span id="total_evacuacion"></span>%</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact4" role="tabpanel"
                                aria-labelledby="contact4-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisi??n</th>
                                            <th scope="col">Criterio </th>
                                            <th scope="col">% Logro </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Mes??n de atenci??n o recepci??n: Tiene al menos una cubierta baja a 0,80
                                                mt<br> con espacio libre para la atenci??n de una persona en silla de
                                                ruedas. </td>
                                            <td>
                                                <textarea class="form-control" id="espacios_revision_1" name="espacios_revision_1"></textarea>
                                            </td>
                                            <td><select id="espacios_1" class="form-control" name="espacios_1">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_espacios_1" name="logro_espacios_1">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>"Espacio de aproximaci??n y uso: El mes??n de atenci??n y/o recepci??n<br>
                                                tiene un espacio que permite el giro en 360??, considerando un
                                                di??metro<br> de 1,50 mt y tiene espacio libre bajo cubierta de altura
                                                0,70 mt y m??nimo<br> 0,60 mt profundidad"</td>
                                            <td>
                                                <textarea class="form-control" id="espacios_revision_2" name="espacios_revision_2"></textarea>
                                            </td>
                                            <td><select id="espacios_2" class="form-control" name="espacios_2">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_espacios_2" name="logro_espacios_2">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>"Atenci??n preferencial: Cuenta con al menos una unidad de atenci??n<br>
                                                preferencial a personas con discapacidad y personas con<br> movilidad
                                                reducida"</td>
                                            <td>
                                                <textarea class="form-control" id="espacios_revision_3" name="espacios_revision_3"></textarea>
                                            </td>
                                            <td><select id="espacios_3" class="form-control" name="espacios_3">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_espacios_3" name="logro_espacios_3">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>"Dimensiones de cajas de pago o mes??n de atenci??n preferencial:
                                                Tiene<br> una altura de atenci??n de 0,80 mt y tiene un ancho m??nimo de
                                                0,90 mt<br> y tiene un espacio libre bajo cubierta de altura m??nima 0,70
                                                mt<br> y profundidad m??nima 0,60 mt"</td>
                                            <td>
                                                <textarea class="form-control" id="espacios_revision_4" name="espacios_revision_4"></textarea>
                                            </td>
                                            <td><select id="espacios_4" class="form-control" name="espacios_4">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_espacios_4" name="logro_espacios_4">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Zona de espera: Considera espacio libre se??alizado para la silla de<br>
                                                ruedas de m??nimo 0,80 mt x 1,20 mt conectado a ruta accesible</td>
                                            <td>
                                                <textarea class="form-control" id="espacios_revision_5" name="espacios_revision_5"></textarea>
                                            </td>
                                            <td><select id="espacios_5" class="form-control" name="espacios_5" >
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_espacios_5" name="logro_espacios_5">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>



                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th><button type="button" class="btn btn-info"
                                                    style="width: -webkit-fill-available;" onclick="TotalEspacios()">Ver
                                                    Total</button></th>
                                            <th colspan="2">Total:<span id="total_espacios"></span>%</th>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact5" role="tabpanel"
                                aria-labelledby="contact5-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisi??n</th>
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
                                                <textarea class="form-control" id="interior_revision_1" name="interior_revision_1"></textarea>
                                            </td>
                                            <td><select id="interior_1" class="form-control" name="interior_1">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_interior_1" name="logro_interior_1">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pasillo: Pasillo m??s angosto de ancho mayor o igual a 1,50 mt. No<br>
                                                incluye bodegas</td>
                                            <td>
                                                <textarea class="form-control" name="interior_revision_2" id="interior_revision_2"></textarea>
                                            </td>
                                            <td><select id="interior_2" class="form-control" name="interior_2">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_interior_2" name="logro_interior_2">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>En todo su recorrido, la ruta accesible se encuentra libre de
                                                elementos<br> que interfieran su ancho m??nimo de 1,50 mt como
                                                extintores, basureros<br>, muebles o elementos ornamentales</td>
                                            <td>
                                                <textarea class="form-control" id="interior_revision_3" name="interior_revision_3"></textarea>
                                            </td>
                                            <td><select id="interior_3" class="form-control" name="interior_3">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_interior_3" name="logro_interior_3">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Elementos fuera de altura: Elementos como letreros, l??mparas u
                                                otros<br>, ubicados en la ruta accesible est??n a una altura m??nima de
                                                2,10 mt</td>
                                            <td>
                                                <textarea class="form-control" id="interior_revision_4" name="interior_revision_4"></textarea>
                                            </td>
                                            <td><select id="interior_4" class="form-control" name="interior_4">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_interior_4" name="logro_interior_4">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Iluminaci??n: La iluminaci??n es uniforme y homog??nea en todo su<br>
                                                desarrollo no se generan zonas oscuras o de encandilamiento</td>
                                            <td>
                                                <textarea class="form-control" id="interior_revision_5" name="interior_revision_5"></textarea>
                                            </td>
                                            <td><select id="interior_5" class="form-control" name="interior_5">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_interior_5" name="logro_interior_5">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th><button type="button" class="btn btn-info"
                                                    style="width: -webkit-fill-available;" onclick="TotalInterior()">Ver
                                                    Total</button></th>
                                            <th colspan="2">Total:<span id="total_interior"></span>%</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact6" role="tabpanel"
                                aria-labelledby="contact6-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisi??n</th>
                                            <th scope="col">Criterio </th>
                                            <th scope="col">% Logro </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Conexi??n: La escalera se encuentra conectada a la Ruta Accesible</td>
                                            <td>
                                                <textarea class="form-control" id="escaleras_revision_1" name="escaleras_revision_1"></textarea>
                                            </td>
                                            <td><select id="escaleras_1" class="form-control" name="escaleras_1">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_escaleras_1" name="logro_escaleras_1">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Huella escalera (parte horizontal del pelda??o): Existe
                                                diferenciaci??n<br> entre la nariz de grada (punta del pelda??o) y el
                                                resto de la huella</td>
                                            <td>
                                                <textarea class="form-control" id="escaleras_revision_2" name="escaleras_revision_2"></textarea>
                                            </td>
                                            <td><select id="escaleras_2" class="form-control" name="escaleras_2">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_escaleras_2" name="logro_escaleras_2">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>"Pasamanos: Cuenta con pasamanos doble a ambos costados, al menos<br>
                                                uno es continuo (si el ancho de la escalera es superior a 3,00 mt<br>,
                                                considera doble pasamanos central dividiendo la<br> escalera en dos
                                                secciones paralelas)"</td>
                                            <td>
                                                <textarea class="form-control" id="escaleras_revision_3" name="escaleras_revision_3"></textarea>
                                            </td>
                                            <td><select id="escaleras_3" class="form-control" name="escaleras_3">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_escaleras_3" name="logro_escaleras_3">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>"Pavimento podot??ctil de alerta/contraste crom??tico: La escalera cuenta
                                                <br>con pavimento de alerta (botones en sobrerrelieve) o pavimento
                                                con<br> contraste crom??tico y una textura distinta, en su<br> inicio,
                                                descanso y t??rmino"
                                            </td>
                                            <td>
                                                <textarea class="form-control" id="escaleras_revision_4" name="escaleras_revision_4"></textarea>
                                            </td>
                                            <td><select id="escaleras_4" class="form-control" name="escaleras_4">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_escaleras_4" name="logro_escaleras_4">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Altura pelda??os: La altura de los pelda??os es regular y se encuentra
                                                en<br> un rango entre 0,15 mt y 0,18 mt</td>
                                            <td>
                                                <textarea class="form-control" id="escaleras_revision_5" name="escaleras_revision_5"></textarea>
                                            </td>
                                            <td><select id="escaleras_5" class="form-control" name="escaleras_5">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_escaleras_5" name="logro_escaleras_5">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Zona sombra escaleras: La zona bajo la escalera se encuentra<br>
                                                protegida para impedir el tr??nsito, hasta cubrir la altura de 2,10 mt
                                            </td>
                                            <td>
                                                <textarea class="form-control" id="escaleras_revision_6" name="escaleras_revision_6"></textarea>
                                            </td>
                                            <td><select id="escaleras_6" class="form-control" name="escaleras_6">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_escaleras_6" name="logro_escaleras_6">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>



                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th><button type="button" class="btn btn-info"
                                                    style="width: -webkit-fill-available;"
                                                    onclick="TotalEscaleras()">Ver Total</button></th>
                                            <th colspan="2">Total:<span id="total_escaleras"></span>%</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact7" role="tabpanel"
                                aria-labelledby="contact7-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">Indicadores</th>
                                            <th scope="col">Revisi??n</th>
                                            <th scope="col">Criterio </th>
                                            <th scope="col">% Logro </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Conexi??n: El ascensor o salva escaleras/plataforma elevadora se<br>
                                                encuentra conectado a la Ruta Accesible</td>
                                            <td>
                                                <textarea class="form-control" id="ascensor_revision_1" name="ascensor_revision_1"></textarea>
                                            </td>
                                            <td><select id="ascensor_1" class="form-control" name="ascensor_1">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_ascensor_1" name="logro_ascensor_1">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>"Puerta: El ancho libre de paso en la <br>puerta es de m??nimo 0,90 mt"
                                            </td>
                                            <td>
                                                <textarea class="form-control" id="ascensor_revision_2" name="ascensor_revision_2"></textarea>
                                            </td>
                                            <td><select id="ascensor_2" class="form-control" name="ascensor_2">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_ascensor_2" name="logro_ascensor_2">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>"Dimensiones de Cabina: La dimensi??n m??nima de la cabina ser?? de 1,40 mt
                                                <br>de ancho por 1,40 mt de profundidad"
                                            </td>
                                            <td>
                                                <textarea class="form-control" id="ascensor_revision_3" name="ascensor_revision_3"></textarea>
                                            </td>
                                            <td><select id="ascensor_3" class="form-control" name="ascensor_3">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_ascensor_3" name="logro_ascensor_3">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>"Zona exterior: El espacio exterior al acceso al ascensor permite giro
                                                en 360??<br> considerando un di??metro de 1,50 mt"</td>
                                            <td>
                                                <textarea class="form-control" id="ascensor_revision_4" name="ascensor_revision_4"></textarea>
                                            </td>
                                            <td><select id="ascensor_4" class="form-control" name="ascensor_4">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_ascensor_4" name="logro_ascensor_4">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>"Pasamanos interior: Cuenta con pasamanos <br> a ambos costados de la
                                                cabina"</td>
                                            <td>
                                                <textarea class="form-control" id="ascensor_revision_5" name="ascensor_revision_5"></textarea>
                                            </td>
                                            <td><select id="ascensor_5" class="form-control" name="ascensor_5">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_ascensor_5" name="logro_ascensor_5">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Informaci??n t??ctil: Cuenta con botonera interior y exterior, con braille
                                                y/o<br> sobre relieve</td>
                                            <td>
                                                <textarea class="form-control" id="ascensor_revision_6" name="ascensor_revision_6"></textarea>
                                            </td>
                                            <td><select id="ascensor_6" class="form-control" name="ascensor_6">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_ascensor_6" name="logro_ascensor_6">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Botonera interior: Se encuentra a una altura entre 1 mt y 1,4 mt</td>
                                            <td>
                                                <textarea class="form-control" id="ascensor_revision_7" name="ascensor_revision_7"></textarea>
                                            </td>
                                            <td><select id="ascensor_7" class="form-control" name="ascensor_7">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_ascensor_7" name="logro_ascensor_7">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Botonera exterior: Se encuentra a una altura entre 1 mt y 1,4 mt</td>
                                            <td>
                                                <textarea class="form-control" id="ascensor_revision_8" name="ascensor_revision_8"></textarea>
                                            </td>
                                            <td><select id="ascensor_8" class="form-control" name="ascensor_8">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_ascensor_8" name="logro_ascensor_8">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Informaci??n sensorial: Cuenta con dispositivos audiovisuales que
                                                indican<br> llegada al piso</td>
                                            <td>
                                                <textarea class="form-control" id="ascensor_revision_9" name="ascensor_revision_9"></textarea>
                                            </td>
                                            <td><select id="ascensor_9" class="form-control" name="ascensor_9">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_ascensor_9" name="logro_ascensor_9">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sensor: Cuenta con sensor de movimiento o protecci??n, que detenga el<br>
                                                movimiento de cierre de las puertas en caso de que una persona entre
                                                o<br> salga durante el cierre. El sensor cubre un rango entre 0,70 mt y
                                                1,50 mt</td>
                                            <td>
                                                <textarea class="form-control" id="ascensor_revision_10" name="ascensor_revision_10"></textarea>
                                            </td>
                                            <td><select id="ascensor_10" class="form-control" name="ascensor_10">
                                                    <option selected disabled value="">Seleccionar Criterio</option>
                                                    <option value="cumple">Cumple</option>
                                                    <option value="no_cumple">No Cumple</option>
                                                    <option value="no_aplica">No Aplica</option>
                                                </select></td>
                                            <td>
                                                <select class="form-control"
                                                    style="width:150px;text-align: center;visibility: hidden"
                                                    id="logro_ascensor_10" name="logro_ascensor_10">
                                                    <option value="" selected disabled>Seleccionar logro
                                                    </option>

                                                    @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}%
                                                        </option>
                                                    @endfor
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th><button type="button" class="btn btn-info"
                                                    style="width: -webkit-fill-available;" onclick="TotalAscensor()">Ver
                                                    Total</button></th>
                                            <th colspan="2">Total:<span id="total_ascensor"></span>%</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact8" role="tabpanel"
                                aria-labelledby="contact8-tab">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead style="background-color: #2257a3;color: white;">
                                        <tr>
                                            <th scope="col">ITEM</th>
                                            <th scope="col">Logro Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ESTACIONAMIENTO</td>
                                            <td><span id="estacionamiento_resumen"></span>%</td>
                                        </tr>
                                        <tr>
                                            <td>INGRESO</td>
                                            <td><span id="ingreso_resumen"></span>%</td>
                                        </tr>
                                        <tr>
                                            <td>PUERTA DE INGRESO</td>
                                            <td><span id="puerta_resumen"></span>%</td>
                                        </tr>
                                        <tr>
                                            <td>EVACUACI??N</td>
                                            <td><span id="evacuacion_resumen"></span>%</td>
                                        </tr>
                                        <tr>
                                            <td>ESPACIOS DE ATENCI??N DE P??BLICO</td>
                                            <td><span id="espacios_resumen"></span>%</td>
                                        </tr>
                                        <tr>
                                            <td>RUTA ACCESIBLE INTERIOR</td>
                                            <td><span id="interior_resumen"></span>%</td>
                                        </tr>
                                        <tr>
                                            <td>CONEXI??N VERTICAL: ESCALERA</td>
                                            <td><span id="escalera_resumen"></span>%</td>
                                        </tr>
                                        <tr>
                                            <td>CONEXI??N VERTICAL: ASCENSOR</td>
                                            <td><span id="ascensor_resumen"></span>%</td>
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
    
@stop

@section('css')
<style>
    /* Media Query for Mobile Devices */
    @media only screen and (max-width: 767px) {
        .col-10{
            flex: none;
            max-width: 100%;
        }
        .col-auto{
            width: 100%;
            max-width: 100%;
            flex: 0 0 auto;
        }
    }
</style>
@stop

@section('js')

    <script>
        $(document).ready(function() {



            $("#matriz").on("hidden.bs.modal", function () {
                // Aqu?? va el c??digo a disparar en el evento
                for (let index = 1; index <= 6; index++) {
                    $(`#estacionamiento_${index}`).val("");
                    $(`#estacionamiento_revision_${index}`).val("");
                    $(`#logro_estacionamiento_${index}`).css("visibility", "hidden");
                    $(`#logro_estacionamiento_${index}`).val("");
                }


                for (let index = 1; index <= 8; index++) {
                    $(`#ingreso_${index}`).val("");
                    $(`#ingreso_revision_${index}`).val("");
                    $(`#logro_ingreso_${index}`).css("visibility", "hidden");
                    $(`#logro_ingreso_${index}`).val("");

                }
                for (let index = 1; index <= 5; index++) {
                    $(`#puerta_${index}`).val("");
                    $(`#puerta_revision_${index}`).val("");
                    $(`#logro_puerta_${index}`).css("visibility", "hidden");
                    $(`#logro_puerta_${index}`).val("");

                }

                for (let index = 1; index <= 7; index++) {
                    $(`#evacuacion_revision_${index}`).val("");
                    $(`#evacuacion_${index}`).val("");
                    $(`#logro_evacuacion_${index}`).css("visibility", "hidden");
                    $(`#logro_evacuacion_${index}`).val("");

                }
                for (let index = 1; index <= 5; index++) {
                    $(`#espacios_${index}`).val("");
                    $(`#espacios_revision_${index}`).val("");
                    $(`#logro_espacios_${index}`).css("visibility", "hidden");
                    $(`#logro_espacios_${index}`).val("")
                }
                for (let index = 1; index <= 5; index++) {
                    $(`#interior_${index}`).val("");
                    $(`#interior_revision_${index}`).val("");
                    $(`#logro_interior_${index}`).css("visibility", "hidden");
                    $(`#logro_interior_${index}`).val("")
                }
                for (let index = 1; index <= 6; index++) {
                    $(`#escaleras_${index}`).val("");
                    $(`#escaleras_revision_${index}`).val("");
                    $(`#logro_escaleras_${index}`).css("visibility", "hidden");
                    $(`#logro_escaleras_${index}`).val("")
                }
                for (let index = 1; index <= 10; index++) {
                    $(`#ascensor_${index}`).val("");
                    $(`#ascensor_revision_${index}`).val("");
                    $(`#logro_ascensor_${index}`).css("visibility", "hidden");
                    $(`#logro_ascensor_${index}`).val("")
                }
            });


            //Estacionamiento
            if(true){
                $("#estacionamiento_1").change(function() {
                    if ($("#estacionamiento_1").val() == "cumple") {
                        $("#logro_estacionamiento_1").css("visibility", "visible");
                        $("#logro_estacionamiento_1").attr("disabled", false);
                    }
                    if ($("#estacionamiento_1").val() == "no_cumple") {
                        $("#logro_estacionamiento_1").css("visibility", "visible");
                        $("#logro_estacionamiento_1").val("0");
                        $("#logro_estacionamiento_1").attr("disabled", true);

                    }
                    if ($("#estacionamiento_1").val() == "no_aplica") {
                        $("#logro_estacionamiento_1").css("visibility", "hidden");
                        $("#logro_estacionamiento_1").val("");
                    }
                })
                $("#estacionamiento_2").change(function() {
                    if ($("#estacionamiento_2").val() == "cumple") {
                        $("#logro_estacionamiento_2").css("visibility", "visible");
                        $("#logro_estacionamiento_2").attr("disabled", false);

                    }
                    if ($("#estacionamiento_2").val() == "no_cumple") {
                        $("#logro_estacionamiento_2").css("visibility", "visible");
                        $("#logro_estacionamiento_2").val("0");
                        $("#logro_estacionamiento_2").attr("disabled", true);
                    }
                    if ($("#estacionamiento_2").val() == "no_aplica") {
                        $("#logro_estacionamiento_2").css("visibility", "hidden");
                        $("#logro_estacionamiento_2").val("");

                    }
                })
                $("#estacionamiento_3").change(function() {
                    if ($("#estacionamiento_3").val() == "cumple") {
                        $("#logro_estacionamiento_3").css("visibility", "visible");
                        $("#logro_estacionamiento_3").attr("disabled", false);

                    }
                    if ($("#estacionamiento_3").val() == "no_cumple") {
                        $("#logro_estacionamiento_3").css("visibility", "visible");
                        $("#logro_estacionamiento_3").val("0");
                        $("#logro_estacionamiento_3").attr("disabled", true);
                    }
                    if ($("#estacionamiento_3").val() == "no_aplica") {
                        $("#logro_estacionamiento_3").css("visibility", "hidden");
                        $("#logro_estacionamiento_3").val("");

                    }
                })
                $("#estacionamiento_4").change(function() {
                    if ($("#estacionamiento_4").val() == "cumple") {
                        $("#logro_estacionamiento_4").css("visibility", "visible");
                        $("#logro_estacionamiento_4").attr("disabled", false);

                    }
                    if ($("#estacionamiento_4").val() == "no_cumple") {
                        $("#logro_estacionamiento_4").css("visibility", "visible");
                        $("#logro_estacionamiento_4").val("0");
                        $("#logro_estacionamiento_4").attr("disabled", true);
                    }
                    if ($("#estacionamiento_4").val() == "no_aplica") {
                        $("#logro_estacionamiento_4").css("visibility", "hidden");
                        $("#logro_estacionamiento_4").val("");

                    }
                })
                $("#estacionamiento_5").change(function() {
                    if ($("#estacionamiento_5").val() == "cumple") {
                        $("#logro_estacionamiento_5").css("visibility", "visible");
                        $("#logro_estacionamiento_5").attr("disabled", false);

                    }
                    if ($("#estacionamiento_5").val() == "no_cumple") {
                        $("#logro_estacionamiento_5").css("visibility", "visible");
                        $("#logro_estacionamiento_5").val("0");
                        $("#logro_estacionamiento_5").attr("disabled", true);
                    }
                    if ($("#estacionamiento_5").val() == "no_aplica") {
                        $("#logro_estacionamiento_5").css("visibility", "hidden");
                        $("#logro_estacionamiento_5").val("");

                    }
                })
                $("#estacionamiento_6").change(function() {
                    if ($("#estacionamiento_6").val() == "cumple") {
                        $("#logro_estacionamiento_6").css("visibility", "visible");
                        $("#logro_estacionamiento_6").attr("disabled", false);
                    }
                    if ($("#estacionamiento_6").val() == "no_cumple") {
                        $("#logro_estacionamiento_6").css("visibility", "visible");
                        $("#logro_estacionamiento_6").val("0");
                        $("#logro_estacionamiento_6").attr("disabled", true);
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
                        $("#logro_ingreso_1").attr("disabled", false);
                    }
                    if ($("#ingreso_1").val() == "no_cumple") {
                        $("#logro_ingreso_1").css("visibility", "visible");
                        $("#logro_ingreso_1").val("0");
                        $("#logro_ingreso_1").attr("disabled", true);
                    }
                    if ($("#ingreso_1").val() == "no_aplica") {
                        $("#logro_ingreso_1").css("visibility", "hidden");
                        $("#logro_ingreso_1").val("");

                    }
                })
                $("#ingreso_2").change(function() {
                    if ($("#ingreso_2").val() == "cumple") {
                        $("#logro_ingreso_2").css("visibility", "visible");
                        $("#logro_ingreso_2").attr("disabled", false);
                    }
                    if ($("#ingreso_2").val() == "no_cumple") {
                        $("#logro_ingreso_2").css("visibility", "visible");
                        $("#logro_ingreso_2").val("0");
                        $("#logro_ingreso_2").attr("disabled", true);
                    }
                    if ($("#ingreso_2").val() == "no_aplica") {
                        $("#logro_ingreso_2").css("visibility", "hidden");
                        $("#logro_ingreso_2").val("");

                    }
                })
                $("#ingreso_3").change(function() {
                    if ($("#ingreso_3").val() == "cumple") {
                        $("#logro_ingreso_3").css("visibility", "visible");
                        $("#logro_ingreso_3").attr("disabled", false);
                    }
                    if ($("#ingreso_3").val() == "no_cumple") {
                        $("#logro_ingreso_3").css("visibility", "visible");
                        $("#logro_ingreso_3").val("0");
                        $("#logro_ingreso_3").attr("disabled", true);
                    }
                    if ($("#ingreso_3").val() == "no_aplica") {
                        $("#logro_ingreso_3").css("visibility", "hidden");
                        $("#logro_ingreso_3").val("");

                    }
                })
                $("#ingreso_4").change(function() {
                    if ($("#ingreso_4").val() == "cumple") {
                        $("#logro_ingreso_4").css("visibility", "visible");
                        $("#logro_ingreso_4").attr("disabled", false);
                    }
                    if ($("#ingreso_4").val() == "no_cumple") {
                        $("#logro_ingreso_4").css("visibility", "visible");
                        $("#logro_ingreso_4").val("0");
                        $("#logro_ingreso_4").attr("disabled", true);
                    }
                    if ($("#ingreso_4").val() == "no_aplica") {
                        $("#logro_ingreso_4").css("visibility", "hidden");
                        $("#logro_ingreso_4").val("");

                    }
                })
                $("#ingreso_5").change(function() {
                    if ($("#ingreso_5").val() == "cumple") {
                        $("#logro_ingreso_5").css("visibility", "visible");
                        $("#logro_ingreso_5").attr("disabled", false);
                    }
                    if ($("#ingreso_5").val() == "no_cumple") {
                        $("#logro_ingreso_5").css("visibility", "visible");
                        $("#logro_ingreso_5").val("0");
                        $("#logro_ingreso_5").attr("disabled", true);
                    }
                    if ($("#ingreso_5").val() == "no_aplica") {
                        $("#logro_ingreso_5").css("visibility", "hidden");
                        $("#logro_ingreso_5").val("");

                    }
                })
                $("#ingreso_6").change(function() {
                    if ($("#ingreso_6").val() == "cumple") {
                        $("#logro_ingreso_6").css("visibility", "visible");
                        $("#logro_ingreso_6").attr("disabled", false);
                    }
                    if ($("#ingreso_6").val() == "no_cumple") {
                        $("#logro_ingreso_6").css("visibility", "visible");
                        $("#logro_ingreso_6").val("0");
                        $("#logro_ingreso_6").attr("disabled", true);
                    }
                    if ($("#ingreso_6").val() == "no_aplica") {
                        $("#logro_ingreso_6").css("visibility", "hidden");
                        $("#logro_ingreso_6").val("");

                    }
                })
                $("#ingreso_7").change(function() {
                    if ($("#ingreso_7").val() == "cumple") {
                        $("#logro_ingreso_7").css("visibility", "visible");
                        $("#logro_ingreso_7").attr("disabled", false);
                    }
                    if ($("#ingreso_7").val() == "no_cumple") {
                        $("#logro_ingreso_7").css("visibility", "visible");
                        $("#logro_ingreso_7").val("0");
                        $("#logro_ingreso_7").attr("disabled", true);
                    }
                    if ($("#ingreso_7").val() == "no_aplica") {
                        $("#logro_ingreso_7").css("visibility", "hidden");
                        $("#logro_ingreso_7").val("");

                    }
                })
                $("#ingreso_8").change(function() {
                    if ($("#ingreso_8").val() == "cumple") {
                        $("#logro_ingreso_8").css("visibility", "visible");
                        $("#logro_ingreso_8").attr("disabled", false);
                    }
                    if ($("#ingreso_8").val() == "no_cumple") {
                        $("#logro_ingreso_8").css("visibility", "visible");
                        $("#logro_ingreso_8").val("0");
                        $("#logro_ingreso_8").attr("disabled", true);
                    }
                    if ($("#ingreso_8").val() == "no_aplica") {
                        $("#logro_ingreso_8").css("visibility", "hidden");
                        $("#logro_ingreso_8").val("");

                    }
                })

                //PUERTA

                $("#puerta_1").change(function() {
                    if ($("#puerta_1").val() == "cumple") {
                        $("#logro_puerta_1").css("visibility", "visible");
                        $("#logro_puerta_1").attr("disabled", false);
                    }
                    if ($("#puerta_1").val() == "no_cumple") {
                        $("#logro_puerta_1").css("visibility", "visible");
                        $("#logro_puerta_1").val("0");
                        $("#logro_puerta_1").attr("disabled", true);
                    }
                    if ($("#puerta_1").val() == "no_aplica") {
                        $("#logro_puerta_1").css("visibility", "hidden");
                        $("#logro_puerta_1").val("");

                    }
                })
                $("#puerta_2").change(function() {
                    if ($("#puerta_2").val() == "cumple") {
                        $("#logro_puerta_2").css("visibility", "visible");
                        $("#logro_puerta_2").attr("disabled", false);
                    }
                    if ($("#puerta_2").val() == "no_cumple") {
                        $("#logro_puerta_2").css("visibility", "visible");
                        $("#logro_puerta_2").val("0");
                        $("#logro_puerta_2").attr("disabled", true);
                    }
                    if ($("#puerta_2").val() == "no_aplica") {
                        $("#logro_puerta_2").css("visibility", "hidden");
                        $("#logro_puerta_2").val("");

                    }
                })
                $("#puerta_3").change(function() {
                    if ($("#puerta_3").val() == "cumple") {
                        $("#logro_puerta_3").css("visibility", "visible");
                        $("#logro_puerta_3").attr("disabled", false);
                    }
                    if ($("#puerta_3").val() == "no_cumple") {
                        $("#logro_puerta_3").css("visibility", "visible");
                        $("#logro_puerta_3").val("0");
                        $("#logro_puerta_3").attr("disabled", true);
                    }
                    if ($("#puerta_3").val() == "no_aplica") {
                        $("#logro_puerta_3").css("visibility", "hidden");
                        $("#logro_puerta_3").val("");

                    }
                })
                $("#puerta_4").change(function() {
                    if ($("#puerta_4").val() == "cumple") {
                        $("#logro_puerta_4").css("visibility", "visible");
                        $("#logro_puerta_4").attr("disabled", false);
                    }
                    if ($("#puerta_4").val() == "no_cumple") {
                        $("#logro_puerta_4").css("visibility", "visible");
                        $("#logro_puerta_4").val("0");
                        $("#logro_puerta_4").attr("disabled", true);
                    }
                    if ($("#puerta_4").val() == "no_aplica") {
                        $("#logro_puerta_4").css("visibility", "hidden");
                        $("#logro_puerta_4").val("");

                    }
                })
                $("#puerta_5").change(function() {
                    if ($("#puerta_5").val() == "cumple") {
                        $("#logro_puerta_5").css("visibility", "visible");
                        $("#logro_puerta_5").attr("disabled", false);
                    }
                    if ($("#puerta_5").val() == "no_cumple") {
                        $("#logro_puerta_5").css("visibility", "visible");
                        $("#logro_puerta_5").val("0");
                        $("#logro_puerta_5").attr("disabled", true);
                    }
                    if ($("#puerta_5").val() == "no_aplica") {
                        $("#logro_puerta_5").css("visibility", "hidden");
                        $("#logro_puerta_5").val("");

                    }
                })

                //EVACUACION

                $("#evacuacion_1").change(function() {
                    if ($("#evacuacion_1").val() == "cumple") {
                        $("#logro_evacuacion_1").css("visibility", "visible");
                        $("#logro_evacuacion_1").attr("disabled", false);
                    }
                    if ($("#evacuacion_1").val() == "no_cumple") {
                        $("#logro_evacuacion_1").css("visibility", "visible");
                        $("#logro_evacuacion_1").val("0");
                        $("#logro_evacuacion_1").attr("disabled", true);
                    }
                    if ($("#evacuacion_1").val() == "no_aplica") {
                        $("#logro_evacuacion_1").css("visibility", "hidden");
                        $("#logro_evacuacion_1").val("");

                    }
                })
                $("#evacuacion_2").change(function() {
                    if ($("#evacuacion_2").val() == "cumple") {
                        $("#logro_evacuacion_2").css("visibility", "visible");
                        $("#logro_evacuacion_2").attr("disabled", false);
                    }
                    if ($("#evacuacion_2").val() == "no_cumple") {
                        $("#logro_evacuacion_2").css("visibility", "visible");
                        $("#logro_evacuacion_2").val("0");
                        $("#logro_evacuacion_2").attr("disabled", true);
                    }
                    if ($("#evacuacion_2").val() == "no_aplica") {
                        $("#logro_evacuacion_2").css("visibility", "hidden");
                        $("#logro_evacuacion_2").val("");

                    }
                })
                $("#evacuacion_3").change(function() {
                    if ($("#evacuacion_3").val() == "cumple") {
                        $("#logro_evacuacion_3").css("visibility", "visible");
                        $("#logro_evacuacion_3").attr("disabled", false);
                    }
                    if ($("#evacuacion_3").val() == "no_cumple") {
                        $("#logro_evacuacion_3").css("visibility", "visible");
                        $("#logro_evacuacion_3").val("0");
                        $("#logro_evacuacion_3").attr("disabled", true);
                    }
                    if ($("#evacuacion_3").val() == "no_aplica") {
                        $("#logro_evacuacion_3").css("visibility", "hidden");
                        $("#logro_evacuacion_3").val("");

                    }
                })
                $("#evacuacion_4").change(function() {
                    if ($("#evacuacion_4").val() == "cumple") {
                        $("#logro_evacuacion_4").css("visibility", "visible");
                        $("#logro_evacuacion_4").attr("disabled", false);
                    }
                    if ($("#evacuacion_4").val() == "no_cumple") {
                        $("#logro_evacuacion_4").css("visibility", "visible");
                        $("#logro_evacuacion_4").val("0");
                        $("#logro_evacuacion_4").attr("disabled", true);
                    }
                    if ($("#evacuacion_4").val() == "no_aplica") {
                        $("#logro_evacuacion_4").css("visibility", "hidden");
                        $("#logro_evacuacion_4").val("");

                    }
                })
                $("#evacuacion_5").change(function() {
                    if ($("#evacuacion_5").val() == "cumple") {
                        $("#logro_evacuacion_5").css("visibility", "visible");
                        $("#logro_evacuacion_5").attr("disabled", false);
                    }
                    if ($("#evacuacion_5").val() == "no_cumple") {
                        $("#logro_evacuacion_5").css("visibility", "visible");
                        $("#logro_evacuacion_5").val("0");
                        $("#logro_evacuacion_5").attr("disabled", true);
                    }
                    if ($("#evacuacion_5").val() == "no_aplica") {
                        $("#logro_evacuacion_5").css("visibility", "hidden");
                        $("#logro_evacuacion_5").val("");

                    }
                })
                $("#evacuacion_6").change(function() {
                    if ($("#evacuacion_6").val() == "cumple") {
                        $("#logro_evacuacion_6").css("visibility", "visible");
                        $("#logro_evacuacion_6").attr("disabled", false);
                    }
                    if ($("#evacuacion_6").val() == "no_cumple") {
                        $("#logro_evacuacion_6").css("visibility", "visible");
                        $("#logro_evacuacion_6").val("0");
                        $("#logro_evacuacion_6").attr("disabled", true);
                    }
                    if ($("#evacuacion_6").val() == "no_aplica") {
                        $("#logro_evacuacion_6").css("visibility", "hidden");
                        $("#logro_evacuacion_6").val("");

                    }
                })
                $("#evacuacion_7").change(function() {
                    if ($("#evacuacion_7").val() == "cumple") {
                        $("#logro_evacuacion_7").css("visibility", "visible");
                        $("#logro_evacuacion_7").attr("disabled", false);
                    }
                    if ($("#evacuacion_7").val() == "no_cumple") {
                        $("#logro_evacuacion_7").css("visibility", "visible");
                        $("#logro_evacuacion_7").val("0");
                        $("#logro_evacuacion_7").attr("disabled", true);
                    }
                    if ($("#evacuacion_7").val() == "no_aplica") {
                        $("#logro_evacuacion_7").css("visibility", "hidden");
                        $("#logro_evacuacion_7").val("");

                    }
                })


                //ESPACIOS

                $("#espacios_1").change(function() {
                    if ($("#espacios_1").val() == "cumple") {
                        $("#logro_espacios_1").css("visibility", "visible");
                        $("#logro_espacios_1").attr("disabled", false);
                    }
                    if ($("#espacios_1").val() == "no_cumple") {
                        $("#logro_espacios_1").css("visibility", "visible");
                        $("#logro_espacios_1").val("0");
                        $("#logro_espacios_1").attr("disabled", true);
                    }
                    if ($("#espacios_1").val() == "no_aplica") {
                        $("#logro_espacios_1").css("visibility", "hidden");
                        $("#logro_espacios_1").val("");

                    }
                })
                $("#espacios_2").change(function() {
                    if ($("#espacios_2").val() == "cumple") {
                        $("#logro_espacios_2").css("visibility", "visible");
                        $("#logro_espacios_2").attr("disabled", false);
                    }
                    if ($("#espacios_2").val() == "no_cumple") {
                        $("#logro_espacios_2").css("visibility", "visible");
                        $("#logro_espacios_2").val("0");
                        $("#logro_espacios_2").attr("disabled", true);
                    }
                    if ($("#espacios_2").val() == "no_aplica") {
                        $("#logro_espacios_2").css("visibility", "hidden");
                        $("#logro_espacios_2").val("");

                    }
                })
                $("#espacios_3").change(function() {
                    if ($("#espacios_3").val() == "cumple") {
                        $("#logro_espacios_3").css("visibility", "visible");
                        $("#logro_espacios_3").attr("disabled", false);
                    }
                    if ($("#espacios_3").val() == "no_cumple") {
                        $("#logro_espacios_3").css("visibility", "visible");
                        $("#logro_espacios_3").val("0");
                        $("#logro_espacios_3").attr("disabled", true);
                    }
                    if ($("#espacios_3").val() == "no_aplica") {
                        $("#logro_espacios_3").css("visibility", "hidden");
                        $("#logro_espacios_3").val("");

                    }
                })
                $("#espacios_4").change(function() {
                    if ($("#espacios_4").val() == "cumple") {
                        $("#logro_espacios_4").css("visibility", "visible");
                        $("#logro_espacios_4").attr("disabled", false);
                    }
                    if ($("#espacios_4").val() == "no_cumple") {
                        $("#logro_espacios_4").css("visibility", "visible");
                        $("#logro_espacios_4").val("0");
                        $("#logro_espacios_4").attr("disabled", true);
                    }
                    if ($("#espacios_4").val() == "no_aplica") {
                        $("#logro_espacios_4").css("visibility", "hidden");
                        $("#logro_espacios_4").val("");

                    }
                })
                $("#espacios_5").change(function() {
                    if ($("#espacios_5").val() == "cumple") {
                        $("#logro_espacios_5").css("visibility", "visible");
                        $("#logro_espacios_5").attr("disabled", false);
                    }
                    if ($("#espacios_5").val() == "no_cumple") {
                        $("#logro_espacios_5").css("visibility", "visible");
                        $("#logro_espacios_5").val("0");
                        $("#logro_espacios_5").attr("disabled", true);
                    }
                    if ($("#espacios_5").val() == "no_aplica") {
                        $("#logro_espacios_5").css("visibility", "hidden");
                        $("#logro_espacios_5").val("");

                    }
                })


                //INTERIOR

                $("#interior_1").change(function() {
                    if ($("#interior_1").val() == "cumple") {
                        $("#logro_interior_1").css("visibility", "visible");
                        $("#logro_interior_1").attr("disabled", false);
                    }
                    if ($("#interior_1").val() == "no_cumple") {
                        $("#logro_interior_1").css("visibility", "visible");
                        $("#logro_interior_1").val("0");
                        $("#logro_interior_1").attr("disabled", true);
                    }
                    if ($("#interior_1").val() == "no_aplica") {
                        $("#logro_interior_1").css("visibility", "hidden");
                        $("#logro_interior_1").val("");

                    }
                })
                $("#interior_2").change(function() {
                    if ($("#interior_2").val() == "cumple") {
                        $("#logro_interior_2").css("visibility", "visible");
                        $("#logro_interior_2").attr("disabled", false);
                    }
                    if ($("#interior_2").val() == "no_cumple") {
                        $("#logro_interior_2").css("visibility", "visible");
                        $("#logro_interior_2").val("0");
                        $("#logro_interior_2").attr("disabled", true);
                    }
                    if ($("#interior_2").val() == "no_aplica") {
                        $("#logro_interior_2").css("visibility", "hidden");
                        $("#logro_interior_2").val("");

                    }
                })
                $("#interior_3").change(function() {
                    if ($("#interior_3").val() == "cumple") {
                        $("#logro_interior_3").css("visibility", "visible");
                        $("#logro_interior_3").attr("disabled", false);
                    }
                    if ($("#interior_3").val() == "no_cumple") {
                        $("#logro_interior_3").css("visibility", "visible");
                        $("#logro_interior_3").val("0");
                        $("#logro_interior_3").attr("disabled", true);
                    }
                    if ($("#interior_3").val() == "no_aplica") {
                        $("#logro_interior_3").css("visibility", "hidden");
                        $("#logro_interior_3").val("");

                    }
                })
                $("#interior_4").change(function() {
                    if ($("#interior_4").val() == "cumple") {
                        $("#logro_interior_4").css("visibility", "visible");
                        $("#logro_interior_4").attr("disabled", false);
                    }
                    if ($("#interior_4").val() == "no_cumple") {
                        $("#logro_interior_4").css("visibility", "visible");
                        $("#logro_interior_4").val("0");
                        $("#logro_interior_4").attr("disabled", true);
                    }
                    if ($("#interior_4").val() == "no_aplica") {
                        $("#logro_interior_4").css("visibility", "hidden");
                        $("#logro_interior_4").val("");

                    }
                })
                $("#interior_5").change(function() {
                    if ($("#interior_5").val() == "cumple") {
                        $("#logro_interior_5").css("visibility", "visible");
                        $("#logro_interior_5").attr("disabled", false);
                    }
                    if ($("#interior_5").val() == "no_cumple") {
                        $("#logro_interior_5").css("visibility", "visible");
                        $("#logro_interior_5").val("0");
                        $("#logro_interior_5").attr("disabled", true);
                    }
                    if ($("#interior_5").val() == "no_aplica") {
                        $("#logro_interior_5").css("visibility", "hidden");
                        $("#logro_interior_5").val("");

                    }
                })

                //ESCALERA

                $("#escaleras_1").change(function() {
                    if ($("#escaleras_1").val() == "cumple") {
                        $("#logro_escaleras_1").css("visibility", "visible");
                        $("#logro_escaleras_1").attr("disabled", false);
                    }
                    if ($("#escaleras_1").val() == "no_cumple") {
                        $("#logro_escaleras_1").css("visibility", "visible");
                        $("#logro_escaleras_1").val("0");
                        $("#logro_escaleras_1").attr("disabled", true);
                    }
                    if ($("#escaleras_1").val() == "no_aplica") {
                        $("#logro_escaleras_1").css("visibility", "hidden");
                        $("#logro_escaleras_1").val("");

                    }
                })
                $("#escaleras_2").change(function() {
                    if ($("#escaleras_2").val() == "cumple") {
                        $("#logro_escaleras_2").css("visibility", "visible");
                        $("#logro_escaleras_2").attr("disabled", false);
                    }
                    if ($("#escaleras_2").val() == "no_cumple") {
                        $("#logro_escaleras_2").css("visibility", "visible");
                        $("#logro_escaleras_2").val("0");
                        $("#logro_escaleras_2").attr("disabled", true);
                    }
                    if ($("#escaleras_2").val() == "no_aplica") {
                        $("#logro_escaleras_2").css("visibility", "hidden");
                        $("#logro_escaleras_2").val("");

                    }
                })
                $("#escaleras_3").change(function() {
                    if ($("#escaleras_3").val() == "cumple") {
                        $("#logro_escaleras_3").css("visibility", "visible");
                        $("#logro_escaleras_3").attr("disabled", false);
                    }
                    if ($("#escaleras_3").val() == "no_cumple") {
                        $("#logro_escaleras_3").css("visibility", "visible");
                        $("#logro_escaleras_3").val("0");
                        $("#logro_escaleras_3").attr("disabled", true);
                    }
                    if ($("#escaleras_3").val() == "no_aplica") {
                        $("#logro_escaleras_3").css("visibility", "hidden");
                        $("#logro_escaleras_3").val("");

                    }
                })
                $("#escaleras_4").change(function() {
                    if ($("#escaleras_4").val() == "cumple") {
                        $("#logro_escaleras_4").css("visibility", "visible");
                        $("#logro_escaleras_4").attr("disabled", false);
                    }
                    if ($("#escaleras_4").val() == "no_cumple") {
                        $("#logro_escaleras_4").css("visibility", "visible");
                        $("#logro_escaleras_4").val("0");
                        $("#logro_escaleras_4").attr("disabled", true);
                    }
                    if ($("#escaleras_4").val() == "no_aplica") {
                        $("#logro_escaleras_4").css("visibility", "hidden");
                        $("#logro_escaleras_4").val("");

                    }
                })
                $("#escaleras_5").change(function() {
                    if ($("#escaleras_5").val() == "cumple") {
                        $("#logro_escaleras_5").css("visibility", "visible");
                        $("#logro_escaleras_5").attr("disabled", false);
                    }
                    if ($("#escaleras_5").val() == "no_cumple") {
                        $("#logro_escaleras_5").css("visibility", "visible");
                        $("#logro_escaleras_5").val("0");
                        $("#logro_escaleras_5").attr("disabled", true);
                    }
                    if ($("#escaleras_5").val() == "no_aplica") {
                        $("#logro_escaleras_5").css("visibility", "hidden");
                        $("#logro_escaleras_5").val("");

                    }
                })
                $("#escaleras_6").change(function() {
                    if ($("#escaleras_6").val() == "cumple") {
                        $("#logro_escaleras_6").css("visibility", "visible");
                        $("#logro_escaleras_6").attr("disabled", false);
                    }
                    if ($("#escaleras_6").val() == "no_cumple") {
                        $("#logro_escaleras_6").css("visibility", "visible");
                        $("#logro_escaleras_6").val("0");
                        $("#logro_escaleras_6").attr("disabled", true);
                    }
                    if ($("#escaleras_6").val() == "no_aplica") {
                        $("#logro_escaleras_6").css("visibility", "hidden");
                        $("#logro_escaleras_6").val("");

                    }
                })

                //ASCENSOR

                $("#ascensor_1").change(function() {
                    if ($("#ascensor_1").val() == "cumple") {
                        $("#logro_ascensor_1").css("visibility", "visible");
                        $("#logro_ascensor_1").attr("disabled", false);
                    }
                    if ($("#ascensor_1").val() == "no_cumple") {
                        $("#logro_ascensor_1").css("visibility", "visible");
                        $("#logro_ascensor_1").val("0");
                        $("#logro_ascensor_1").attr("disabled", true);
                    }
                    if ($("#ascensor_1").val() == "no_aplica") {
                        $("#logro_ascensor_1").css("visibility", "hidden");
                        $("#logro_ascensor_1").val("");

                    }
                })
                $("#ascensor_2").change(function() {
                    if ($("#ascensor_2").val() == "cumple") {
                        $("#logro_ascensor_2").css("visibility", "visible");
                        $("#logro_ascensor_2").attr("disabled", false);
                    }
                    if ($("#ascensor_2").val() == "no_cumple") {
                        $("#logro_ascensor_2").css("visibility", "visible");
                        $("#logro_ascensor_2").val("0");
                        $("#logro_ascensor_2").attr("disabled", true);
                    }
                    if ($("#ascensor_2").val() == "no_aplica") {
                        $("#logro_ascensor_2").css("visibility", "hidden");
                        $("#logro_ascensor_2").val("");

                    }
                })
                $("#ascensor_3").change(function() {
                    if ($("#ascensor_3").val() == "cumple") {
                        $("#logro_ascensor_3").css("visibility", "visible");
                        $("#logro_ascensor_3").attr("disabled", false);
                    }
                    if ($("#ascensor_3").val() == "no_cumple") {
                        $("#logro_ascensor_3").css("visibility", "visible");
                        $("#logro_ascensor_3").val("0");
                        $("#logro_ascensor_3").attr("disabled", true);
                    }
                    if ($("#ascensor_3").val() == "no_aplica") {
                        $("#logro_ascensor_3").css("visibility", "hidden");
                        $("#logro_ascensor_3").val("");

                    }
                })
                $("#ascensor_4").change(function() {
                    if ($("#ascensor_4").val() == "cumple") {
                        $("#logro_ascensor_4").css("visibility", "visible");
                        $("#logro_ascensor_4").attr("disabled", false);
                    }
                    if ($("#ascensor_4").val() == "no_cumple") {
                        $("#logro_ascensor_4").css("visibility", "visible");
                        $("#logro_ascensor_4").val("0");
                        $("#logro_ascensor_4").attr("disabled", true);
                    }
                    if ($("#ascensor_4").val() == "no_aplica") {
                        $("#logro_ascensor_4").css("visibility", "hidden");
                        $("#logro_ascensor_4").val("");

                    }
                })
                $("#ascensor_5").change(function() {
                    if ($("#ascensor_5").val() == "cumple") {
                        $("#logro_ascensor_5").css("visibility", "visible");
                        $("#logro_ascensor_5").attr("disabled", false);
                    }
                    if ($("#ascensor_5").val() == "no_cumple") {
                        $("#logro_ascensor_5").css("visibility", "visible");
                        $("#logro_ascensor_5").val("0");
                        $("#logro_ascensor_5").attr("disabled", true);
                    }
                    if ($("#ascensor_5").val() == "no_aplica") {
                        $("#logro_ascensor_5").css("visibility", "hidden");
                        $("#logro_ascensor_5").val("");

                    }
                })
                $("#ascensor_6").change(function() {
                    if ($("#ascensor_6").val() == "cumple") {
                        $("#logro_ascensor_6").css("visibility", "visible");
                        $("#logro_ascensor_6").attr("disabled", false);
                    }
                    if ($("#ascensor_6").val() == "no_cumple") {
                        $("#logro_ascensor_6").css("visibility", "visible");
                        $("#logro_ascensor_6").val("0");
                        $("#logro_ascensor_6").attr("disabled", true);
                    }
                    if ($("#ascensor_6").val() == "no_aplica") {
                        $("#logro_ascensor_6").css("visibility", "hidden");
                        $("#logro_ascensor_6").val("");

                    }
                })
                $("#ascensor_7").change(function() {
                    if ($("#ascensor_7").val() == "cumple") {
                        $("#logro_ascensor_7").css("visibility", "visible");
                        $("#logro_ascensor_7").attr("disabled", false);
                    }
                    if ($("#ascensor_7").val() == "no_cumple") {
                        $("#logro_ascensor_7").css("visibility", "visible");
                        $("#logro_ascensor_7").val("0");
                        $("#logro_ascensor_7").attr("disabled", true);
                    }
                    if ($("#ascensor_7").val() == "no_aplica") {
                        $("#logro_ascensor_7").css("visibility", "hidden");
                        $("#logro_ascensor_7").val("");

                    }
                })
                $("#ascensor_8").change(function() {
                    if ($("#ascensor_8").val() == "cumple") {
                        $("#logro_ascensor_8").css("visibility", "visible");
                        $("#logro_ascensor_8").attr("disabled", false);
                    }
                    if ($("#ascensor_8").val() == "no_cumple") {
                        $("#logro_ascensor_8").css("visibility", "visible");
                        $("#logro_ascensor_8").val("0");
                        $("#logro_ascensor_8").attr("disabled", true);
                    }
                    if ($("#ascensor_8").val() == "no_aplica") {
                        $("#logro_ascensor_8").css("visibility", "hidden");
                        $("#logro_ascensor_8").val("");

                    }
                })
                $("#ascensor_9").change(function() {
                    if ($("#ascensor_9").val() == "cumple") {
                        $("#logro_ascensor_9").css("visibility", "visible");
                        $("#logro_ascensor_9").attr("disabled", false);
                    }
                    if ($("#ascensor_9").val() == "no_cumple") {
                        $("#logro_ascensor_9").css("visibility", "visible");
                        $("#logro_ascensor_9").val("0");
                        $("#logro_ascensor_9").attr("disabled", true);
                    }
                    if ($("#ascensor_9").val() == "no_aplica") {
                        $("#logro_ascensor_9").css("visibility", "hidden");
                        $("#logro_ascensor_9").val("");

                    }
                })
                $("#ascensor_10").change(function() {
                    if ($("#ascensor_10").val() == "cumple") {
                        $("#logro_ascensor_10").css("visibility", "visible");
                        $("#logro_ascensor_10").attr("disabled", false);
                    }
                    if ($("#ascensor_10").val() == "no_cumple") {
                        $("#logro_ascensor_10").css("visibility", "visible");
                        $("#logro_ascensor_10").val("0");
                        $("#logro_ascensor_10").attr("disabled", true);
                    }
                    if ($("#ascensor_10").val() == "no_aplica") {
                        $("#logro_ascensor_10").css("visibility", "hidden");
                        $("#logro_ascensor_10").val("");

                    }
                })

            }
            $("#contact8-tab").click(function() {
                $("#estacionamiento_resumen").text(TotalEstacionamiento());
                $("#ingreso_resumen").text(TotalIngreso());
                $("#puerta_resumen").text(TotalPuerta());
                $("#evacuacion_resumen").text(TotalEvacuacion());
                $("#espacios_resumen").text(TotalEspacios());
                $("#interior_resumen").text(TotalInterior());
                $("#escalera_resumen").text(TotalEscalera());
                $("#ascensor_resumen").text(TotalAscensor());
            })



            table = $('#proyectos').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json",
                },
                responsive: true,

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

        function TotalEstacionamiento() {


            Aux = []
            Aux2 = 0;
            for (let index = 1; index <= 6; index++) {
                if ($(`#logro_estacionamiento_${index}`).val() != null) {
                    Aux.push($(`#logro_estacionamiento_${index}`).val())
                    Aux2 += parseInt($(`#logro_estacionamiento_${index}`).val())
                }
            }
            total = Aux2 / Aux.length;
            $("#total_estacionamiento").text(total.toFixed());
            return total.toFixed();
        }

        function TotalIngreso() {


            Aux = []
            Aux2 = 0;
            for (let index = 1; index <= 8; index++) {
                if ($(`#logro_ingreso_${index}`).val() != null) {
                    Aux.push($(`#logro_ingreso_${index}`).val())
                    Aux2 += parseInt($(`#logro_ingreso_${index}`).val())
                }
            }
            total = Aux2 / Aux.length;
            $("#total_ingreso").text(total.toFixed());
            return total.toFixed();
        }

        function TotalPuerta() {


            Aux = []
            Aux2 = 0;
            for (let index = 1; index <= 5; index++) {
                if ($(`#logro_puerta_${index}`).val() != null) {
                    Aux.push($(`#logro_puerta_${index}`).val())
                    Aux2 += parseInt($(`#logro_puerta_${index}`).val())
                }
            }
            total = Aux2 / Aux.length;
            $("#total_puerta").text(total.toFixed());
            return total.toFixed();
        }

        function TotalEvacuacion() {


            Aux = []
            Aux2 = 0;
            for (let index = 1; index <= 7; index++) {
                if ($(`#logro_evacuacion_${index}`).val() != null) {
                    Aux.push($(`#logro_evacuacion_${index}`).val())
                    Aux2 += parseInt($(`#logro_evacuacion_${index}`).val())
                }
            }
            total = Aux2 / Aux.length;
            $("#total_evacuacion").text(total.toFixed());
            return total.toFixed();
        }

        function TotalEspacios() {


            Aux = []
            Aux2 = 0;
            for (let index = 1; index <= 5; index++) {
                if ($(`#logro_espacios_${index}`).val() != null) {
                    Aux.push($(`#logro_espacios_${index}`).val())
                    Aux2 += parseInt($(`#logro_espacios_${index}`).val())
                }
            }
            total = Aux2 / Aux.length;
            $("#total_espacios").text(total.toFixed());
            return total.toFixed();
        }

        function TotalInterior() {


            Aux = []
            Aux2 = 0;
            for (let index = 1; index <= 5; index++) {
                if ($(`#logro_interior_${index}`).val() != null) {
                    Aux.push($(`#logro_interior_${index}`).val())
                    Aux2 += parseInt($(`#logro_interior_${index}`).val())
                }
            }
            total = Aux2 / Aux.length;
            $("#total_interior").text(total.toFixed());
            return total.toFixed();
        }

        function TotalEscalera() {


            Aux = []
            Aux2 = 0;
            for (let index = 1; index <= 6; index++) {
                if ($(`#logro_escalera_${index}`).val() != null) {
                    Aux.push($(`#logro_escalera_${index}`).val())
                    Aux2 += parseInt($(`#logro_escalera_${index}`).val())
                }
            }
            total = Aux2 / Aux.length;
            $("#total_escalera").text(total.toFixed());
            return total.toFixed();
        }

        function TotalAscensor() {


            Aux = []
            Aux2 = 0;
            for (let index = 1; index <= 10; index++) {
                if ($(`#logro_ascensor_${index}`).val() != null) {
                    Aux.push($(`#logro_ascensor_${index}`).val())
                    Aux2 += parseInt($(`#logro_ascensor_${index}`).val())
                }
            }
            total = Aux2 / Aux.length;
            $("#total_ascensor").text(total.toFixed());
            return total.toFixed();
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
            $("#id_proyecto").val(id);

            $.get(`/matrizevaluacion/${id}`, function(data) {
                
                //ESTACIONAMIENTO
                
                if(data.length != 0){
                    for (let index = 1; index <= 6; index++) {
                    $(`#estacionamiento_revision_${index}`).val(data[0][`estacionamiento_revision_${index}`]);
                    $(`#estacionamiento_${index}`).val(data[0][`estacionamiento_criterio_${index}`]);
                    setMatriz(index, data[0][`estacionamiento_criterio_${index}`], data[0][
                        `estacionamiento_logro_${index}`
                    ], "estacionamiento");
                }
                for (let index = 1; index <= 8; index++) {
                    $(`#ingreso_revision_${index}`).val(data[0][`ingreso_revision_${index}`]);
                    $(`#ingreso_${index}`).val(data[0][`ingreso_criterio_${index}`]);
                    setMatriz(index, data[0][`ingreso_criterio_${index}`], data[0][`ingreso_logro_${index}`],
                        "ingreso");
                }
                for (let index = 1; index <= 5; index++) {
                    $(`#puerta_revision_${index}`).val(data[0][`puerta_revision_${index}`]);
                    $(`#puerta_${index}`).val(data[0][`puerta_criterio_${index}`]);
                    setMatriz(index, data[0][`puerta_criterio_${index}`], data[0][`puerta_logro_${index}`],
                        "puerta");
                }

                for (let index = 1; index <= 7; index++) {
                    $(`#evacuacion_revision_${index}`).val(data[0][`evacuacion_revision_${index}`]);
                    $(`#evacuacion_${index}`).val(data[0][`evacuacion_criterio_${index}`]);
                    setMatriz(index, data[0][`evacuacion_criterio_${index}`], data[0][`evacuacion_logro_${index}`],
                        "evacuacion");
                }
                for (let index = 1; index <= 5; index++) {
                    $(`#espacios_revision_${index}`).val(data[0][`espacios_revision_${index}`]);
                    $(`#espacios_${index}`).val(data[0][`espacios_criterio_${index}`]);
                    setMatriz(index, data[0][`espacios_criterio_${index}`], data[0][`espacios_logro_${index}`],
                        "espacios");
                }
                for (let index = 1; index <= 5; index++) {
                    $(`#interior_revision_${index}`).val(data[0][`interior_revision_${index}`]);
                    $(`#interior_${index}`).val(data[0][`interior_criterio_${index}`]);
                    setMatriz(index, data[0][`interior_criterio_${index}`], data[0][`interior_logro_${index}`],
                        "interior");
                }
                for (let index = 1; index <= 6; index++) {
                    $(`#escaleras_revision_${index}`).val(data[0][`escaleras_revision_${index}`]);
                    $(`#escaleras_${index}`).val(data[0][`escaleras_criterio_${index}`]);
                    setMatriz(index, data[0][`escaleras_criterio_${index}`], data[0][`escaleras_logro_${index}`],
                        "escaleras");
                }
                for (let index = 1; index <= 10; index++) {
                    $(`#ascensor_revision_${index}`).val(data[0][`ascensor_revision_${index}`]);
                    $(`#ascensor_${index}`).val(data[0][`ascensor_criterio_${index}`]);
                    setMatriz(index, data[0][`ascensor_criterio_${index}`], data[0][`ascensor_logro_${index}`],
                        "ascensor");
                }

                }
                

            })
            $("#matriz").modal('show');
        }

        function setMatriz(numero, estado, valor, item) {
            if (estado == "cumple") {
                $(`#logro_${item}_${numero}`).css("visibility", "visible");
                $(`#logro_${item}_${numero}`).attr("disabled", false);
                $(`#logro_${item}_${numero}`).val(valor);

            }
            if (estado == "no_cumple") {
                $(`#logro_${item}_${numero}`).css("visibility", "visible");
                $(`#logro_${item}_${numero}`).val("0");
                $(`#logro_${item}_${numero}`).attr("disabled", true);

            }
            if (estado == "no_aplica") {
                $(`#logro_${item}_${numero}`).css("visibility", "hidden");
                $(`#logro_${item}_${numero}`).val("");
            }

        }
    </script>

@stop
