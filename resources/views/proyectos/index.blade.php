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
    <div class="modal fade" id="matriz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form method="POST" action="">
                    @csrf
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel"><b>Matriz de evaluación de Accesibilidad Universal</b></h5>
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
                                            <td>Ubicación: a) Es propio de la institución y se encuentra en el mismo predio</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Dimensiones: Sus dimensiones mínimas son 2,5 mt de ancho x 5,00 mt <br>de largo,mas una franja de circulacion segura de 1,1 metro de ancho.</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Conexión: El estacionamiento está conectado a un ruta accesible <br>conectada a su vez al acceso al edificio, considera demarcación<br> de tránsito peatonal</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Señalización Vertical: Se encuentra señalizado sobre poste o sujeto a un<br> muro y tiene el Símbolo Internacional de Accesibilidad</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Señalización Horizontal: Se encuentra señalizado sobre el piso del<br> estacionamiento con el Símbolo Internacional de Accesibilidad (SIA) en<br> blanco sobre un fondo azul</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Demarcación área peatonal: Incorpora dentro de sus dimensiones, a uno<br> de sus costados longitudinales, la demarcación de tránsito peatonal de<br> ancho 1,10 mt (puede ser compartida con otro estacionamiento)</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
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
                                            <td>Acceso plano: El acceso al edificio no presenta desniveles, o bien tiene<br> un plano inclinado, es decir hasta un 5% de pendiente</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Existe una rampa de acceso con una pendiente preferentemente de 8%<br> (si tiene 8 cm de alto, la rampa mide mínimo un metro). La pendiente<br> puede variar hasta un máximo de 12% cuando tiene 2 mt de largo)</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Acceso plano: El pavimento es homogéneo, estable, antideslizante en<br> seco y en mojado</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Acceso por rampa: El pavimento de la rampa es homogéneo, estable,<br> antideslizante en seco y en mojado (cumple atributos de ruta accesible)</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Acceso por rampa: Ancho: El ancho mínimo de la rampa es igual o <br>mayor al ancho de las vías de evacuación,<br> con un ancho mínimo de 1,10 mt</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Acceso por rampa: Longitud: La rampa tiene un largo máximo de 9,00<br> mt sin descanso (puede tener mayor longitud considerando descanso)</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Acceso por rampa: Pasamanos: Si el largo de la rampa es mayor a 1,5 mt<br> debe tener pasamanos doble a ambos costados de la rampa (0.70 mt<br> y 0,95 mt cada altura)"</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Acceso por rampa: Descanso: Plano horizontal que permite circunscribir<br> un círculo de diámetro 1,50 mt que permita<br> un giro en 360°"</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
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
                                            <td>Ancho puerta: El ancho libre de paso en puerta de ingreso, que no<br> corresponda a puerta de evacuación, es de 0,90 mt mínimos</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Espacio libre: La puerta principal de ingreso cuenta con espacio libre en<br> interior y exterior a ella, de mínimo 1,20 mt fuera del barrido de la(s)<br> puerta(s)</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Apertura y manillas: La puerta es de fácil accionamiento, por simple<br> empuje o con sensor,  las manillas, o tiradores se encuentran a una<br> altura entre 0,95 mt y 1,20 mt y son tipo barra o palanca (no pomo)</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Contraste: La puerta es claramente perceptible respecto a los elementos<br> verticales adyacentes (Muros, paneles vidriados u otros)</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Percepción: La puerta de ingreso es fácilmente localizable,  en caso de<br> puertas transparentes, cuenta con tratamiento adhesivo para su clara<br> percepción</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
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
                                            <td>Ancho puertas de evacuación: El ancho libre de paso en puertas de<br> evacuación es de 1,10 mt mínimos</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Puertas de Evacuación: La puerta es de fácil accionamiento es por empuje<br> y su uso requiere un mínimo esfuerzo</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Puertas de Evacuación: Percepción: La puerta de evacuación es<br> fácilmente localizable, conectada a la ruta accesible, se encuentra<br> señalizada para su clara identificación</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Vías de evacuación: La vía de evacuación está conectada a la ruta<br> accesible, y a su vez se encuentra conectada a zona de seguridad</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Vías de evacuación: Percepción: Las vías de evacuación son fácilmente<br> identificables, se encuentran señalizadas para su optimo recorrido</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Iluminación: El recorrido interior de las vías de evacuación, se encuentra bien<br> iluminado.  La iluminación es uniforme y<br> homogénea."</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>El recinto cuenta con sistema sonoro y lumínico de alarma para orientar<br> a público con discapacidad auditiva, visual o cognitiva en caso de<br> emergencia</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
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
                                            <td>Mesón de atención o recepción: Tiene al menos una cubierta baja a 0,80 mt<br> con espacio libre para la atención de una persona en silla de ruedas. </td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Espacio de aproximación y uso: El mesón de atención y/o recepción<br> tiene un espacio que permite el giro en 360°, considerando un diámetro<br> de 1,50 mt y tiene espacio libre bajo cubierta de altura 0,70 mt y mínimo<br> 0,60 mt profundidad"</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Atención preferencial: Cuenta con al menos una unidad de atención<br> preferencial a personas con discapacidad  y personas con<br> movilidad reducida"</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Dimensiones de cajas de pago o mesón de atención preferencial: Tiene<br> una altura de atención de 0,80 mt y tiene un ancho mínimo de 0,90 mt<br> y tiene un espacio libre bajo cubierta de altura mínima 0,70 mt<br> y profundidad mínima 0,60 mt"</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Zona de espera: Considera espacio libre señalizado para la silla de<br> ruedas de mínimo 0,80 mt x 1,20 mt conectado a ruta accesible</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
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
                                            <td>"Continuidad: No existen desniveles interiores, y en caso de haberlos son<br> salvados con rampas cumpliendo las mismas exigencias establecidas en<br> la norma."</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Pasillo: Pasillo más angosto de ancho mayor o igual a 1,50 mt. No<br> incluye bodegas</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>En todo su recorrido, la ruta accesible se encuentra libre de elementos<br> que interfieran su ancho mínimo de 1,50 mt como extintores, basureros<br>, muebles o elementos ornamentales</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Elementos fuera de altura: Elementos como letreros, lámparas u otros<br>, ubicados en la ruta accesible están a una altura mínima de 2,10 mt</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Iluminación:  La iluminación es uniforme y homogénea en todo su<br> desarrollo no se generan zonas oscuras o de encandilamiento</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
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
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Huella escalera (parte horizontal del peldaño): Existe diferenciación<br> entre la nariz de grada (punta del peldaño) y el resto de la huella</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Pasamanos: Cuenta con pasamanos doble a ambos costados, al menos<br> uno es continuo (si el ancho de la escalera es superior a 3,00 mt<br>, considera doble pasamanos central dividiendo la<br> escalera en dos secciones paralelas)"</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Pavimento podotáctil de alerta/contraste cromático: La escalera cuenta <br>con pavimento de alerta (botones en sobrerrelieve) o pavimento con<br> contraste cromático y una textura distinta, en su<br> inicio, descanso y término"</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Altura peldaños: La altura de los peldaños es regular y se encuentra en<br> un rango entre 0,15 mt y 0,18 mt</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Zona sombra escaleras: La zona bajo la escalera se encuentra<br> protegida para impedir el tránsito, hasta cubrir la altura de 2,10 mt</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
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
                                            <td>Conexión: El ascensor o salva escaleras/plataforma elevadora  se<br> encuentra conectado a la Ruta Accesible</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Puerta: El ancho libre de paso en la <br>puerta es de mínimo 0,90 mt"</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Dimensiones de Cabina: La dimensión mínima de la cabina será de 1,40 mt <br>de ancho por 1,40 mt de profundidad"</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Zona exterior: El espacio exterior al acceso al ascensor permite giro en 360°<br> considerando un diámetro de 1,50 mt"</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>"Pasamanos interior: Cuenta con pasamanos <br> a ambos costados de la cabina"</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Información táctil: Cuenta con botonera interior y exterior, con braille y/o<br> sobre relieve</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Botonera interior: Se encuentra  a una altura entre 1 mt y 1,4 mt</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Botonera exterior: Se encuentra  a una altura entre 1 mt y 1,4 mt</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Información sensorial: Cuenta con dispositivos audiovisuales que indican<br> llegada al piso</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Sensor: Cuenta con sensor de movimiento o protección, que detenga el<br> movimiento de cierre de las puertas en caso de que una persona entre o<br> salga durante el cierre. El sensor cubre un rango entre 0,70 mt y 1,50 mt</td>
                                            <td><textarea></textarea></td>
                                            <td><textarea></textarea></td>
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


    function AbrirInformeAPT(id) {
        // $("#informaApt").val(id);
        $("#informaApt").modal('show');
    }

    function AbrirMatriz(id) {
        // $("#informaApt").val(id);
        $("#matriz").modal('show');
    }
</script>