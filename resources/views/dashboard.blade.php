@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div></div>
@stop

@section('content')

<div class="container">
    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
        <div class="card-body">
            <h5 class="card-title mb-3">Bienvenido al dashboard, aquí puede estar el resumen de todos los
                proyectos.Ademas de poder filtrar por empresa y ver
                el porcentaje de cumplimiento de ellos.</h5>


            <div class="card" style="width:25rem;">

                <div class="card-header">
                    Numero de Tareas Completadas 
                </div>
                <div class="card-body">
                    <canvas id="myChart" width="800" height="800"></canvas>

                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // const Toast = Swal.mixin({
    //     toast: true,
    //     position: 'top-end',
    //     showConfirmButton: false,
    //     timer: 3000,
    //     timerProgressBar: true,
    //     didOpen: (toast) => {
    //         toast.addEventListener('mouseenter', Swal.stopTimer)
    //         toast.addEventListener('mouseleave', Swal.resumeTimer)
    //     }
    // })

    // Toast.fire({
    //     icon: 'success',
    //     title: 'Se inicio sesión correctamente.'
    // })
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['No terminadas', 'Terminadas', ],
            datasets: [{
                label: '# de tareas terminadas',
                data: [12, 19, ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },

    });
</script>

@stop