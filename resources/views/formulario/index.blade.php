<link href="{{ asset('/css/formulario.scss') }}" rel="stylesheet">
<style>
    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .container2:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container2 input:checked~.checkmark {
        background-color: #6658d3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container2 input:checked~.checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .container2 .checkmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }
</style>
<div class="container">
    <!-- code here -->
    <div class="card">
        <div class="card-image">
            <h2 class="card-heading">
                Pauta para seguimiento laboral
            </h2>
        </div>
        <div style="text-align: center">
            <h3>Antecedentes Generales</h3>
        </div>
        <form class="card-form">
            <div class="input" style="margin-bottom: 1rem">
                <input type="text" class="input-field" placeholder="Tu respuesta" required />
                <label class="input-label">Nombre del trabajador</label>
            </div>
            <div class="input" style="margin-bottom: 1rem">
                <input type="text" class="input-field" placeholder="Tu respuesta" required />
                <label class="input-label">Rut</label>
            </div>
            <div class="input" style="margin-bottom: 1rem">
                <input type="text" class="input-field" placeholder="Tu respuesta" required />
                <label class="input-label">Cargo</label>
            </div>
            <div class="input" style="margin-bottom: 1rem">
                <input type="date" class="input-field" required />
                <label class="input-label">Fecha de Ingreso</label>
            </div>
            <div class="input" style="margin-bottom: 1rem">
                <input type="tel" class="input-field" placeholder="Tu respuesta" required />
                <label class="input-label">Teléfono</label>
            </div>
            <div class="input" style="margin-bottom: 1rem">
                <input type="email" class="input-field" placeholder="Tu respuesta" required />
                <label class="input-label">Email</label>
            </div>

            <div style="display: flex;flex-direction: column;">
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Profesional que realiza seguimiento</label>
                <label class="container2">Maria Jesus Rodriguez
                    <input type="radio" name="radio1">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">Ana Huento
                    <input type="radio" name="radio1">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="input" style="margin-bottom: 1rem">
                <input type="text" class="input-field" placeholder="Tu respuesta" required />
                <label class="input-label">Institución intermediaria:</label>
            </div>
            <div style="text-align: center">
                <h3>Áreas Laborales</h3>
                <h4>Explicación desempeño del Trabajador</h4>
            </div>
            <hr>
            <div style="display: flex;flex-direction: column;margin-bottom: 2rem">
                <h4>Tabla de Calificación Desempeño del Trabajador</h4>
                <img src="/img/tabla.png" alt="tabla">
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Hábitos básicos</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio2">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio2">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio2">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio2">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Puntualidad</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio3">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio3">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio3">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio3">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Asistencia</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio4">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio4">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio4">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio4">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Presentación personal</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio5">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio5">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio5">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio5">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Permanencia en el puesto</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio6">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio6">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio6">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio6">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Productividad</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio7">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio7">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio7">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio7">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Iniciativa</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio8">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio8">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio8">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio8">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Independencia</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio9">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio9">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio9">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio9">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Ritmo de trabajo constante</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio10">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio10">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio10">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio10">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Calidad del trabajo</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio11">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio11">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio11">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio11">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Velocidad de la ejecución</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio12">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio12">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio12">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio12">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Tolerancia al cambio</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio13">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio13">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio13">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio13">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Disposición a la tarea  </label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio14">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio14">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio14">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio14">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Cuidado de materiales y herramientas</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio15">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio15">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio15">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio15">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Relaciones interpersonales</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio16">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio16">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio16">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio16">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Tolerancia a la frustración</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio17">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio17">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio17">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio17">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Tolerancia a las críticas</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio18">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio18">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio18">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio18">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Relación con pares</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio19">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio19">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio19">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio19">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Trabajo en equipo</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio20">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio20">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio20">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio20">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Relación con jefatura</label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio21">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio21">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio21">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio21">
                    <span class="checkmark"></span>
                </label>
            </div>
                <label style="	color: #8597a3;
                transition: .25s ease;margin-bottom: 1rem">Integración del trabajador a las actividades extra programáticas de la empresa  </label>
            <div style="display: flex;flex-direction: row;gap: 2rem;justify-content: center;margin-top: 2rem;margin-bottom: 1rem">
                <label class="container2">1
                    <input type="radio"  name="radio22">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">2
                    <input type="radio" name="radio22">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">3
                    <input type="radio"  name="radio22">
                    <span class="checkmark"></span>
                </label>
                <label class="container2">4
                    <input type="radio" name="radio22">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="input" style="margin-bottom: 1rem">
                <textarea type="text" class="input-field" placeholder="Tu respuesta" required style="    height: 139px;"></textarea>
                <label class="input-label">Observaciones</label>
            </div>
            <div class="action">
                <button class="btn btn-custom" type="submit">Enviar</button>
            </div>
        </form>


    </div>
</div>
