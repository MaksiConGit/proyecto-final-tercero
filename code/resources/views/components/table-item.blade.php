<tr onclick="if(!event.target.closest('.dropdown') && !event.target.closest('.avatar a')) { window.location.href='{{$fila_url}}'; }" style="cursor: pointer;">
    <td><strong>{{$nombre}}</strong></td>
    <td>{{$apellido}}</td>
    {{$usuario}}
    <td><span class="badge bg-label-primary me-1">{{$rol}}</span></td>
    <td>
        <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{$editar_url}}"><i class="bx bx-edit-alt me-1"></i> Editar</a>
                {{-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Quitar profesor</a> --}}
            </div>
        </div>
    </td>
</tr>
