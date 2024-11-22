<div class="col-md">
    <small class="text-light fw-semibold">{{$titulo}}</small>
    <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
      <div class="accordion-item card">
        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
          <button
            type="button"
            class="accordion-button collapsed"
            data-bs-toggle="collapse"
            data-bs-target="#accordionIcon-1"
            aria-controls="accordionIcon-1"
          >
            {{$nombreMateria}}
          </button>
        </h2>

        <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
          <div class="accordion-body">{{$material}} </div>
        </div>
      </div>

      <div class="accordion-item card">
        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconTwo">
          <button
            type="button"
            class="accordion-button collapsed"
            data-bs-toggle="collapse"
            data-bs-target="#accordionIcon-2"
            aria-controls="accordionIcon-2"
          >
          {{$nombreMateria1}}
          </button>
        </h2>
        <div id="accordionIcon-2" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
          <div class="accordion-body"> {{$material1}}</div>
        </div>
      </div>

      <div class="accordion-item card active">
        <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconThree">
          <button
            type="button"
            class="accordion-button"
            data-bs-toggle="collapse"
            data-bs-target="#accordionIcon-3"
            aria-expanded="true"
            aria-controls="accordionIcon-3"
          >
          {{$nombreMateria2}}
          </button>
        </h2>
        <div
          id="accordionIcon-3"
          class="accordion-collapse collapse show"
          data-bs-parent="#accordionIcon"
        >
          <div class="accordion-body"> {{$material2}} </div>
        </div>
      </div>
    </div>
  </div>