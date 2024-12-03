<div class="col-lg-3 col-sm-6 col-12">
    <div class="d-flex align-items-center flex-nowrap demo-inline-spacing mb-4">
        <h2 class="m-0" style="white-space: nowrap;">{{$titulo}}</h2>
        @can('careers.edit')
        <div class="btn-group">
            <button
                type="button"
                class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <ul class="dropdown-menu" style="right: 0; left: auto;">
                <li><a class="dropdown-item" href="{{$url_editar}}">Editar</a></li>

                <li>
                    <form method="POST" action="{{$url_eliminar}}" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item text-danger">Eliminar</button>
                    </form>
                </li>

            </ul>
        </div>
        @endcan
    </div>
    {{$subtitulo}}
</div>
