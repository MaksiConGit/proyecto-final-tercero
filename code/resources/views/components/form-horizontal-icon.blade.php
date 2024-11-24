<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">{{$titulo}}</h5>
        {{-- <small class="text-muted float-end">Merged input group</small> --}}
      </div>
      <div class="card-body">
          <form method="POST" action="{{$action}}">
          @csrf
          {{$method}}
          {{$inputs}}
          {{$modal}}
          {{-- <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Tipo de materia</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-company2" class="input-group-text"
                  ><i class="bx bx-buildings"></i
                ></span>
                <input
                  type="text"
                  id="basic-icon-default-company"
                  class="form-control"
                  placeholder="Taller"
                  aria-label="Taller"
                  aria-describedby="basic-icon-default-company2"
                />
              </div>
            </div>
          </div>  --}}
          {{-- <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Tipo de materia</label>
            <div class="col-sm-10">
              <select id="defaultSelect" class="form-select">
                {{$opciones_select}}
              </select>
            </div>
          </div> --}}
          {{-- <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Profesores</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                <input
                  type="text"
                  id="basic-icon-default-email"
                  class="form-control"
                  placeholder="john.doe"
                  aria-label="john.doe"
                  aria-describedby="basic-icon-default-email2"
                />
                <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
              </div>
              <div class="form-text">You can use letters, numbers & periods</div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-phone">Phone No</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-phone2" class="input-group-text"
                  ><i class="bx bx-phone"></i
                ></span>
                <input
                  type="text"
                  id="basic-icon-default-phone"
                  class="form-control phone-mask"
                  placeholder="658 799 8941"
                  aria-label="658 799 8941"
                  aria-describedby="basic-icon-default-phone2"
                />
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">Message</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-message2" class="input-group-text"
                  ><i class="bx bx-comment"></i
                ></span>
                <textarea
                  id="basic-icon-default-message"
                  class="form-control"
                  placeholder="Hi, Do you have a moment to talk Joe?"
                  aria-label="Hi, Do you have a moment to talk Joe?"
                  aria-describedby="basic-icon-default-message2"
                ></textarea>
              </div>
            </div>
          </div> --}}
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalToggle">Enviar</a>
              <a href="{{$volver_url}}" class="btn btn-secondary">Volver</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>