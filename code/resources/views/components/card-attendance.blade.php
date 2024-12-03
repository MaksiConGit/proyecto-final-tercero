<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
    <div class="card h-100" style="max-width: 100%; margin: auto;">
        <a href="{{$url}}">
        <h5 class="card-header text-center">{{$titulo}}</h5>
        <div class="card-body d-flex flex-column align-items-center">
            <canvas id="doughnutChart{{$id}}" class="chartjs mb-3" data-height="350" style="max-width: 100%;"></canvas>
            <ul class="doughnut-legend d-flex justify-content-around flex-wrap ps-0 mb-2 mt-3">
                <li class="ct-series-0 d-flex flex-column align-items-center mx-2">
                    <span class="badge-dot mb-2"
                        style="background-color: #666ee8; width: 15px; height: 15px; border-radius: 50%;"></span>
                    <h6 class="mb-0">Asistencia</h6>
                    <div class="text-muted">{{$porcentaje_asistencia}} %</div>
                </li>
                <li class="ct-series-1 d-flex flex-column align-items-center mx-2">
                    <span class="badge-dot mb-2"
                        style="background-color: #D3D3D3; width: 15px; height: 15px; border-radius: 50%;"></span>
                    <h6 class="mb-0">Inasistencia</h6>
                    <div class="text-muted">{{$porcentaje_inasistencia}} %</div>
                </li>
            </ul>
        </div>
        </a>
    </div>
</div>
