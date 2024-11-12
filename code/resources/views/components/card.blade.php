<div class="col-md-6 col-lg-4 mb-3 d-flex">
  <a href="{{route('subjects.show', [$subject])}}">
    <div class="card h-100">
      <img class="card-img-top" src="../template_files/assets/img/reyo/programacion-2-e1551291144973.jpg" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">{{$nombre_materia}}</h5>
        <p class="card-text">{{$nombre_profesor}}</p>
      </div>
    </div>
  </a>
</div>