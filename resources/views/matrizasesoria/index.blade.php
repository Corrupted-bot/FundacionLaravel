<style>
    .form-control {
        border-radius: 0.25rem !important;
    }

    #boton-enviar:hover {
        background-color: black !important;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Herramientas') }}
        </h2>
    </x-slot>

    <div style="padding-top: 1rem;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <form method="POST" action="/empresas">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="text-align: center;background-color: #2257a3;color:white;">
                            <b style="font-size: xx-large;">Plan Anual Asesoría e Inclusión</b>
                        </div>
                        <div class="card-body">
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
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 20px;">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">DIAGNÓSTICO INSTITUCIONAL </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">ASESORÍA EN INTERMEDIACIÓN LABORAL</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">ASESORÍA EN POSTULACIÓN AL SELLO CHILE INCLUSIVO</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact3-tab" data-bs-toggle="tab" data-bs-target="#contact3" type="button" role="tab" aria-controls="contact3" aria-selected="false">SERVICIO DE CAPACITACIÓN Y ASESORÍA EN COMUNICACIÓN
                                    </button>
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
                                <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact3-tab">
                                    <table id="empresas" class="table table-striped table-hover table-bordered my-custom-scrollbar table-wrapper-scroll-y" style="width:100%">
                                        <thead style="background-color: #2257a3;color: white;">
                                            <tr>
                                                <th colspan="9" class="text-center">SERVICIO DE CAPACITACIÓN Y ASESORÍA EN COMUNICACIÓN</th>
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
                                                <td rowspan='5'>1. Capacitaciones Técnicas para las distintas áreas para Sello Chile Inclusivo
                                                </td>
                                                <td rowspan='1'>Ajuste Razonable en Reclutamiento y Selección 
                                                </td>
                                                <td rowspan='5'>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Cargo</label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1">
                                                    </div>

                                                </td>
                                                <td rowspan='5'>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Asignar Fecha
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Prevención de Riesgo (Evacuación Inclusiva)</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Ajueste Razonable en Evaluación de desempeño</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Ajustes Razonables en Promociones o Ascenso</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Ajustes Razonables en Capacitación </td>
                                            </tr>
                                            <tr class='FilaPrincipal'>
                                                <td rowspan='3'>2. Cultura Inclusiva
                                                </td>
                                                <td rowspan='1'>Charlas de sensibilización (4 Mensuales)</td>

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
                                                <td rowspan='1'>Talleres de Liderazgo Inclusivo (2 Mensuales)</td>
                                            </tr>
                                            <tr>
                                                <td rowspan='1'>Asesoría Comunicacional</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row" style="display: flex;justify-content: center;">
                                <button id="boton-enviar" class="btn btn-success btn-lg" style="width: 20%;background-color: #2157a3;">Guardar</button>
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
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar Fecha</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Desde</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Hasta</label>
                        <input class="form-control" id="exampleFormControlTextarea1" type="date" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>