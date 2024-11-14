<tr onclick="if(!event.target.closest('.dropdown') && !event.target.closest('.avatar a')) { window.location.href='{{$profesor_url}}'; }" style="cursor: pointer;">
    <td><strong>{{$nombre}}</strong></td>
    <td>{{$apellido}}</td>
    <td>
        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
            <li
                data-bs-toggle="tooltip"
                data-popup="tooltip-custom"
                data-bs-placement="top"
                class="avatar avatar-xs pull-up"
                title="{{$nombre_usuario}}"
            >
                <a href="{{$usuario_url}}"><img src="../template_files/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" /></a>
            </li>
        </ul>
    </td>
    <td><span class="badge bg-label-primary me-1">{{$rol}}</span></td>
    <td>
        <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{$editar_profesor_url}}"><i class="bx bx-edit-alt me-1"></i> Editar</a>
                {{-- <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Quitar profesor</a> --}}
            </div>
        </div>
    </td>
</tr>
