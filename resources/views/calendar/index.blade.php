@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div></div>
@stop

@section('content')


<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
    <h2 id="heading" class="text-center">Proceso del puesto de trabajo</h2>
    <h4 id="heading2" class="text-center"></h4>

    <form id="msform" style="padding: 3rem;">
        <!-- progressbar -->
        <ul id="progressbar">
            <li <?php echo $estado >= 1 ? 'class="active"' : "" ?>  id="account"><strong>Selección de candidatos</strong></li>
            <li <?php echo $estado >= 2 ? 'class="active"' : "" ?> id="personal"><strong>Estados de candidatos</strong></li>
            <li <?php echo $estado >= 3 ? 'class="active"' : "" ?> id="payment"><strong>Subida de documentos</strong></li>
            <li <?php echo $estado >= 4 ? 'class="active"' : "" ?> id="confirm2"><strong>Seguimiento</strong></li>
            <!-- <li id="confirm3"><strong>Archivos mensuales</strong></li> -->
            <li <?php echo $estado >= 5 ? 'class="active"' : "" ?> id="confirm"><strong>Terminar</strong></li>
        </ul>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
        </div> <br> <!-- fieldsets -->
        <fieldset <?php echo $estado != 1 ? 'style="display: none;position: relative;"' : "" ?>>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Selección de Candidatos:</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Step 1 - 5</h2>
                    </div>
                </div>

                    <label class="fieldlabels">Candidatos disponibles: <span style="color: red;">*</span></label>
                    <select id="candidatos" name="candidatos[]" multiple="multiple" style="width: 60%">
                        @foreach($candidatos as $candidato)
                        <option value="{{$candidato->id}}">{{$candidato->nombrecompleto}}</option>
                        @endforeach
                    </select>

            </div>
            <input type="button" name="next" class="next action-button" value="Siguiente" onclick="GuardarCandidatos()"/>
        </fieldset>
        <fieldset id="candidatos-estado" <?php echo $estado != 2 ? 'style="display: none;position: relative;"' : "" ?>>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Estados de Candidatos:</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Step 2 - 5</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="estado_candidatos">

                        </div>
                    </div>
                    <div class="col">

                    </div>

                </div>
            </div> <input type="button" name="next" class="next action-button" value="Siguiente" onclick="GuardaEstadoCandidatos()"/> <input type="button" name="previous" class="previous action-button-previous" value="Anterior" />
        </fieldset>
        <fieldset id="documentos-estado" <?php echo $estado != 3 ? 'style="display: none;position: relative;"' : "" ?>>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Subida de documentos:</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Step 3 - 5</h2>
                    </div>
                </div> 
                <label class="fieldlabels">Lista de asistencia de concientización:</label> 
                <input type="file" name="asistencia" id="asistencia">
                <small id="help_asistencia" class="form-text text-muted" style="margin-bottom: 1.2rem;visibility:hidden"><a href="#" id="asistencia_href">Para descargar dar click.</a></small>
                <label class="fieldlabels"> PPL:</label> 
                <input type="file" name="ppl" id="ppl" >
                <small id="help_ppl" class="form-text text-muted" style="margin-bottom: 1.2rem;visibility:hidden"><a href="#" id="ppl_href">Para descargar dar click.</a></small>
            </div> <input type="button" name="next" class="next action-button" value="Siguiente" onclick="GuardarDocumentos()" /> <input type="button" name="previous" class="previous action-button-previous" value="Anterior" />
        </fieldset>
        <fieldset id="seguimiento-estado" <?php echo $estado != 4 ? 'style="display: none;position: relative;"' : "" ?>>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Seguimiento:</h2>

                    </div>
                    <div class="col-5">
                        <h2 class="steps">Step 4 - 5</h2>
                    </div>
                </div>


            </div>

            <input type="button" name="next" class="next action-button" value="Siguiente" onclick="Cerrar()" /> <input type="button" name="previous" class="previous action-button-previous" value="Anterior" onclick="Cerrar()" />
        </fieldset>
        <fieldset id="terminar-estado" <?php echo $estado != 5 ? 'style="display: none;position: relative;"' : "" ?>>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Terminado:</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Step 5 - 5</h2>
                    </div>
                </div> 
                <h2 class="purple-text text-center"><strong>Resumen Completo</strong></h2> <br>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Eventos
                            </div>
                            <div class="card-body" >
                                <ol class="list-group" id="eventos-listas">
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Informacion General
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="from-label">Candidato Seleccionado</label>
                                    <input type="text" class="form-control" disabled id="seleccionado_terminar">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="fieldlabels">Lista de asistencia de concientización:</label> 
                                        <small  class="form-text text-muted" style="margin-bottom: 1.2rem"><a href="#" id="help_asistencia_terminar">Para descargar dar click.</a></small>
                                    </div>
                                    <div class="col">
                                        <label class="fieldlabels"> PPL:</label> 
                                        <small  class="form-text text-muted" style="margin-bottom: 1.2rem;"><a href="#" id="help_ppl_terminar">Para descargar dar click.</a></small>
                                    </div>
                                </div>
                                <div>
                                    <label for="" class="form-label">Estado</label>
                                    <input type="text" class="form-control" value="Seleccionado" disabled style="background-color: green;color:white;">
                                </div>
                               
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>

        <div id="calendar"></div>


    </form>
    <!-- style="display: none;position: relative;" -->

</div>
<div class="modal fade" id="modal-event" tabindex="-1" role="dialog" aria-labelledby="modal-eventLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="event-title">Detalles del Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="titulo_mostrar" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo_mostrar" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Fecha Inicio</label>
                    <input class="form-control" id="fecha_inicio_mostrar" type="text" disabled/>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Fecha Termino</label>
                    <input class="form-control" id="fecha_termino_mostrar" type="text" disabled/>
                </div>
                <div class="mb-3">
                    <a class="btn btn-success " href="#" id="boton-descargar"><i class="fa-solid fa-download" style="color:white"></i></a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>

    .list-group{
        max-height: 300px;
        margin-bottom: 10px;
        overflow:scroll;
        -webkit-overflow-scrolling: touch;
    }





    .swal2-html-container {
        z-index: 1;
        justify-content: center;
        margin: 1em 1.6em 0.3em;
        padding: 0;
        overflow: auto;
        color: inherit;
        font-size: 1.125em;
        font-weight: 400;
        line-height: normal;
        text-align: start !important;
        word-wrap: break-word;
        word-break: break-word;
    }


    .calendar-data {
        height: 0rem !important;
    }

    /* .fc-basic-view .fc-body .fc-row { min-height: 1em; } */
    #heading {
        text-transform: uppercase;
        color: #673AB7;
        font-weight: normal
    }
    #heading2 {
        text-transform: uppercase;
        color: #673AB7;
        font-weight: normal
    }

    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    .form-card {
        text-align: left
    }

    #msform fieldset:not(:first-of-type) {
        display: none
    }

    #msform input,
    #msform textarea {
        padding: 8px 15px 8px 15px;
        border: 1px solid #ccc;
        border-radius: 0px;
        /* margin-bottom: 25px; */
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        font-family: montserrat;
        color: #2C3E50;
        background-color: #ECEFF1;
        font-size: 16px;
        letter-spacing: 1px
    }

    #msform input:focus,
    #msform textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #673AB7;
        outline-width: 0
    }

    #msform .action-button {
        width: 100px;
        background: #673AB7;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 0px 10px 5px;
        float: right
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        background-color: #311B92
    }

    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px 10px 0px;
        float: right
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        background-color: #000000
    }

    .card {
        z-index: 0;
        border: none;
        position: relative
    }

    .fs-title {
        font-size: 25px;
        color: #673AB7;
        margin-bottom: 15px;
        font-weight: normal;
        text-align: left
    }

    .purple-text {
        color: #673AB7;
        font-weight: normal
    }

    .steps {
        font-size: 25px;
        color: gray;
        margin-bottom: 10px;
        font-weight: normal;
        text-align: right
    }

    .fieldlabels {
        color: gray;
        text-align: left
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }

    #progressbar .active {
        color: #673AB7
    }

    #progressbar li {
        list-style-type: none;
        font-size: 15px;
        width: 20%;
        float: left;
        position: relative;
        font-weight: 400
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f13e"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007"
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f030"
    }

    #progressbar #confirm2:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar #confirm3:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #673AB7
    }

    .progress {
        height: 20px
    }

    .progress-bar {
        background-color: #673AB7
    }

    .fit-image {
        width: 100%;
        object-fit: cover
    }

    #calendar {
        max-width: 1100px;
        margin: 0 auto;
    }
    .select2-container--default .select2-selection--multiple {
        border: 1px solid #ced4da;
        min-height: calc(2.25rem + 2px);
        padding: 1rem!important;
    }
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type='text/javascript' src='js/main.js'></script>
<!-- <script type='text/javascript' src='js/moment.min.js'></script>
<script type='text/javascript' src='js/fullcalendar.min.js'></script> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0-beta.1/locales-all.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>

@stop

@section('js')
<!-- <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script> -->
<!-- <link rel='stylesheet' type='text/css' href='css/fullcalendar.css' />

<script type='text/javascript' src='js/moment.min.js'></script>
<script type='text/javascript' src='js/fullcalendar.min.js'></script>
<script type='text/javascript' src='js/locale/es.js'></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/i18n/es.js"></script>  
<script>
    const params = new URLSearchParams(window.location.search)
    // console.log(params.get('id'));
    // console.log(params.get('estado'));

    $("#heading2").text(params.get('nombre'))
    function addZero(i) {
        if (i < 10) {
            i = '0' + i;
        }
        return i;
    }

    var hoy = new Date();
    var dd = hoy.getDate();
    if (dd < 10) {
        dd = '0' + dd;
    }

    if (mm < 10) {
        mm = '0' + mm;
    }

    var mm = hoy.getMonth() + 1;
    var yyyy = hoy.getFullYear();

    dd = addZero(dd);
    mm = addZero(mm);
    var events;
    var _calenderEvents = [];

    function toJSONLocal(date) {
        var local = new Date(date);
        local.setMinutes(date.getMinutes() - date.getTimezoneOffset());
        return local.toJSON().slice(0, 10);
    }
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        locale: "es",
        themeSystem: 'bootstrap',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        select: async function(arg) {



            let flatpickrInstance;
            let flatpickrInstance2;
            const {
                value: formValues
            } = await Swal.fire({
                title: 'Agregar evento',
                html: '<label id="tfHours2" class="form-label">Titulo</label><input id="swal-input1"  class="form-control" placeholder="Titulo">' +

                    `<br><label id="tfHours" class="form-label">Fecha Incio</label><input id="swal-input2"  class="form-control" value="${toJSONLocal(new Date(arg.start))}" >` +
                    `<br><label id="tfHours3" class="form-label">Fecha Termino</label><input id="swal-input3"  class="form-control" value="${toJSONLocal(new Date(arg.start))}" >` +
                    `<br><label id="tfHours4" class="form-label">Archivo</label><input id="swal-input4"  class="form-control"  type="checkbox">`,
                focusConfirm: false,
                preConfirm: () => {
                    if (document.getElementById('swal-input1').value == "") {
                        Swal.showValidationMessage(`Es necesario rellenar este campo.`)

                    } else {
                        return [
                            document.getElementById('swal-input1').value,
                            document.getElementById('swal-input2').value,
                            document.getElementById('swal-input3').value,
                            document.getElementById('swal-input4').value,
                        ]
                    }



                },
                stopKeydownPropagation: false,

                willOpen: () => {
                    flatpickrInstance = flatpickr(
                        Swal.getPopup().querySelector('#swal-input2'), {
                            "locale": "es"
                        }
                    )
                    flatpickrInstance2 = flatpickr(
                        Swal.getPopup().querySelector('#swal-input3'), {
                            "locale": "es"
                        }
                    )
                }

            })

            if (formValues) {
                // Swal.fire(JSON.stringify(formValues))
                // console.log(formValues[3])
                if ($('#swal-input4').prop('checked')) {
                    Swal.fire({
                            allowOutsideClick: false,

                            title: 'Seleccionar archivo',
                            input: 'file',
                            inputValidator: (value) => {
                                return !value && 'Es necesario rellenar este campo!'
                            }

                        })
                        .then((myfile) => {
                            if (myfile.value === false) return false;
                            if (myfile.value === "") {
                                // Swal.showInputError("Es necesario rellenar este campo");
                                return false
                            }
                            if (myfile) {
                                // console.log(myfile.value);
                                const formData = new FormData();
                                formData.append('titulo', formValues[0]);
                                formData.append('fecha_inicio', formValues[1]);
                                formData.append('fecha_termino', formValues[2]);
                                formData.append('file', myfile.value);
                                formData.append('id_puesto_trabajo', params.get('id'));
                                $.ajax({
                                    url: "/enviar/evento",
                                    type: "POST",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(data) {
                                        // calendar.fullCalendar('refetchEvents');
                                        calendar.refetchEvents()
                                        // alert("Event Created Successfully");
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Guardado',
                                        })
                                        // console.log(data);
                                    }
                                })
                            }
                        });
                } else {

                    const formData = new FormData();
                    formData.append('titulo', formValues[0]);
                    formData.append('fecha_inicio', formValues[1]);
                    formData.append('fecha_termino', formValues[2]);
                    formData.append('id_puesto_trabajo', params.get('id'));

                    $.ajax({
                        url: "/enviar/evento",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            // calendar.fullCalendar('refetchEvents');
                            calendar.refetchEvents()
                            // alert("Event Created Successfully");
                            Swal.fire({
                                icon: 'success',
                                title: 'Guardado',
                            })
                            // console.log(data);
                        }
                    })

                }




            }
            calendar.unselect()

        },
        eventClick: function(arg) {
            // console.log(arg.event.id)
            // if (confirm('Are you sure you want to delete this event?')) {
            //     arg.event.remove()
            // }
            // console.log(arg.event.path)
            $.get(`/evento/path/${arg.event.id}`,function(data){
                if (data[0].path!=null) {
                    $("#boton-descargar").attr("href", `/descargar/evento/${arg.event.id}`)
                    $("#boton-descargar").removeClass("disabled")
                }else{
                    
                    // $("#boton-descargar").attr("href", `#`)
                    $("#boton-descargar").addClass("disabled")

                }
                // console.log(data[0].path);
                $("#titulo_mostrar").val(arg.event.title)
                $("#fecha_inicio_mostrar").val(toJSONLocal(new Date(arg.event.start)))
                $("#fecha_termino_mostrar").val(arg.event.end == null ? toJSONLocal(new Date(arg.event.start)) : toJSONLocal(new Date(arg.event.end)))
            })



            $("#modal-event").modal("show")

        },
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: `/eventos/${params.get('id')}`,

    });

    $(document).ready(function() {

        // $("#seguimiento").show()
        // AbrirCalendar()


        $('#candidatos').select2({
            maximumSelectionLength: 4,
            language: "es"
        });

        $.get(`/obtener/info/candidatos/${params.get('id')}`,function(data){
            if (data.candidatos != null) {
                $("#estado_candidatos").empty()
                var candidato = data.seleccionado;
                $('#candidatos').val(data.candidatos);
                $('#candidatos').trigger('change');
                $('#candidatos').val().forEach(element => {
                    $.get(`/obtener/nombre/${element}`, function(data) {
                        if (element == candidato) {
                            
                            $("#estado_candidatos").append(`
                            <div class="mb-3">
                                <label class="fieldlabels">${data}</label>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio1" value="${element}" checked>
                                    <label class="form-check-label" for="inlineRadio2">Seleccionado</label>
                                </div>
                            </div>`)
                        }else{
                            $("#estado_candidatos").append(`
                            <div class="mb-3">
                                <label class="fieldlabels">${data}</label>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio1" value="${element}" >
                                    <label class="form-check-label" for="inlineRadio2">Seleccionado</label>
                                </div>
                            </div>`)
                        }
                    });
                    // contador++
                });
                // console.log(data.candidatos);
                
            }
            if (data.ppl != null) {
                $("#help_asistencia").css("visibility","visible")
                $("#help_ppl").css("visibility","visible")
                $("#ppl_href").attr("href",`/descargar/info/${params.get('id')}/ppl`)
                $("#asistencia_href").attr("href",`/descargar/info/${params.get('id')}/asistencia`)
            }
        })



        @if($estado == 4)
            $("#seguimiento-estado").show()
            AbrirCalendar()
        @endif
        @if($estado == 2)

            $("#candidatos-estado").show()
        @endif
        @if($estado == 3)
            $("#documentos-estado").show()
        @endif
        @if($estado == 5)
            $("#terminar-estado").show()
        @endif





        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = {{$estado}}
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function() {

            var bandera= true;
            if (current == 1) {
                console.log("Esto");
                console.log($('#candidatos').val());
                if ($('#candidatos').val().length > 0 ) {
                    
                    $("#estado_candidatos").empty()
    
                    $.get(`/obtener/info/candidatos/${params.get('id')}`,function(data){
                        if (data.candidatos != null) {
                            $("#estado_candidatos").empty()
                            var candidato = data.seleccionado;
                            $('#candidatos').val(data.candidatos);
                            $('#candidatos').trigger('change');
                            $('#candidatos').val().forEach(element => {
                                $.get(`/obtener/nombre/${element}`, function(data) {
                                    if (element == candidato) {
                                        
                                        $("#estado_candidatos").append(`
                                        <div class="mb-3">
                                            <label class="fieldlabels">${data}</label>
                                            <div class="form-check ">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio1" value="${element}" checked>
                                                <label class="form-check-label" for="inlineRadio2">Seleccionado</label>
                                            </div>
                                        </div>`)
                                    }else{
                                        $("#estado_candidatos").append(`
                                        <div class="mb-3">
                                            <label class="fieldlabels">${data}</label>
                                            <div class="form-check ">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio1" value="${element}" >
                                                <label class="form-check-label" for="inlineRadio2">Seleccionado</label>
                                            </div>
                                        </div>`)
                                    }
                                });
                                // contador++
                            });
                            // console.log(data.candidatos);
                            
                        }
                    })
                }else{
                    bandera = false;
                    Swal.fire({
                        icon: 'warning',
                        title: 'Es necesario rellenar el campo para continuar!',
                        })
                }

            }
            if (current == 2) {
                if ($('input[name=inlineRadioOptions1]:checked').val() == null) {
                    bandera = false;
                    Swal.fire({
                        icon: 'warning',
                        title: 'Es necesario rellenar el campo para continuar!',
                        })
                } 
            }
            if (current == 3) {
                if ($("#asistencia").val() == "" || $("#ppl").val() == "") {

                    if($("#asistencia_href").attr("href") != "#"){
                        AbrirCalendar()
                        $("#asistencia").val("")
                        $("#ppl").val("")
                    }else{


                        bandera = false;
    
                        Swal.fire({
                            icon: 'warning',
                            title: 'Es necesario rellenar el campo para continuar!',
                        })
                    }

                }else{
                    
                    $("#asistencia").val("")
                    $("#ppl").val("")
                }
            }


            if (bandera) {
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                // console.log($("fieldset").index(next_fs));


                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(++current);
            }
            

            
        });

        $(".previous").click(function() {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
            // console.log($("fieldset").index(current_fs));

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            if (current == 2) {
                $("#estado_candidatos").empty()
            }
            if (current == 4) {
                $.get(`/obtener/info/candidatos/${params.get('id')}`,function(data){
                    if (data.ppl != null) {
                        $("#help_asistencia").css("visibility","visible")
                        $("#help_ppl").css("visibility","visible")
                        $("#ppl_href").attr("href",`/descargar/info/${params.get('id')}/ppl`)
                        $("#asistencia_href").attr("href",`/descargar/info/${params.get('id')}/asistencia`)
                    }
                })
            }
            setProgressBar(--current);
            // if (current == 1) {
            //     alert("aaa")
            //     // $.get(`/obtener/info/candidatos/${params.get('id')}`,function(data){
            //     // if (data.candidatos != null) {
            //     //     $('#candidatos').val(data.candidatos);
            //     //     // console.log(data)
                    
            //     // }
            //     // })
            // }
        });

        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
        }

        $(".submit").click(function() {
            return false;
        })




    });

    function AbrirCalendar() {



        calendar.render();

    }

    function Cerrar() {
        calendar.destroy();
        //eventos 
        $.get(`/eventos/${params.get('id')}`,function(data){
            console.log(data);
            data.forEach(element => {
                if (element.path) {
                    
                    $("#eventos-listas").append(`
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                    
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><a href="/descargar/evento/${element.id}" >${element.title}</a></div>
                            Inicio: ${element.start} - Final: ${element.end}
                        </div>
                        <span class="badge bg-success rounded-pill"><i class="fa-solid fa-download"></i></span>
                        
                        
                    </li>
                    
                    
                    
                   `)
                }else{
                    $("#eventos-listas").append(`
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">${element.title}</div>
                        Inicio: ${element.start} - Final: ${element.end}
                        </div>
                    </li>`)

                }
            });
        })
        //falta informacion general
        $.get(`/obtener/info/candidatos/${params.get('id')}`,function(data){
            console.log(data);
            $("#help_asistencia_terminar").attr("href",`/descargar/info/${params.get('id')}/ppl`)
            $("#help_ppl_terminar").attr("href",`/descargar/info/${params.get('id')}/asistencia`)
            $.get(`/obtener/nombre/${data.seleccionado}`, function(value) {
                console.log(value);
                $("#seleccionado_terminar").val(value)
            });
        })


    }

    function GuardarCandidatos(){
        console.log($('#candidatos').val());
        if ($('#candidatos').val().length > 0 ) {
            $.ajax({
                type: "POST",
                url: `/crear/info/candidatos/`,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": params.get('id'),
                    "arreglo": $('#candidatos').val(),
                    },
                    success:function(data){
                        console.log(data)
                    }

            });

        }
    }
    function GuardaEstadoCandidatos(){
        console.log($('input[name=inlineRadioOptions1]:checked').val());
        if ($('input[name=inlineRadioOptions1]:checked').val() !=null){

            $.ajax({
                type: "POST",
                url: `/crear/info/candidato/`,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": params.get('id'),
                    "candidato": $('input[name=inlineRadioOptions1]:checked').val(),
                    },
                    success:function(data){
                        console.log(data)
                    }
    
            });
        }
    }


    function GuardarDocumentos() {



        if ($("#asistencia").val() != "" && $("#ppl").val() != "") {

                    const formData = new FormData();
                    formData.append('asistencia', $("#asistencia")[0].files[0]);
                    formData.append('ppl', $("#ppl")[0].files[0]);
                    formData.append('id', params.get('id'));
                    $.ajax({
                        url: "/crear/info/documentos",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            // calendar.fullCalendar('refetchEvents');
                            // alert("Event Created Successfully");
                            // Swal.fire({
                            //     icon: 'success',
                            //     title: 'Guardado',
                            // })
                            console.log(data);
                            AbrirCalendar();
                        }
                    })
    
    
                }else if($("#asistencia_href").attr("href") != "#" && $("#ppl_href").attr("href") != "#"){
                    const formData = new FormData();
                    formData.append('id', params.get('id'));
                    $.ajax({
                        url: "/crear/info/documentos",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            // calendar.fullCalendar('refetchEvents');
                            // alert("Event Created Successfully");
                            // Swal.fire({
                            //     icon: 'success',
                            //     title: 'Guardado',
                            // })
                            console.log(data);
                            AbrirCalendar();
                        }
                    })
                }

    }

</script>

@stop