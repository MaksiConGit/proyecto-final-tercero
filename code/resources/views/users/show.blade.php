<x-template-layout>
    <div class="container-xxl flex-grow-1 container">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Usuarios /</span> Detalle del Usuario
        </h4>

        <div class="row">
            <div class="col-md-12">
                <!-- Información del Usuario -->
                <div class="card mb-4">
                    <h5 class="card-header">Información del Usuario</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img
                                src="../../template_files/assets/img/avatars/1.png"
                                alt="Avatar del usuario"
                                class="d-block rounded-circle"
                                height="100"
                                width="100"
                            />
                            <div>
                                <h4>{{$user->name}}</h4>
                                <p class="text-muted mb-0">{{$user->email}}</p>
                                <span class="badge bg-primary mt-2">Usuario Activo</span>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold text-primary">Rol</label>
                                <br>
                                <p class="badge me-1 
                                    @if($user->role->id == 1) bg-label-danger 
                                    @elseif($user->role->id == 2) bg-label-primary 
                                    @elseif($user->role->id == 3) bg-label-warning 
                                    @elseif($user->role->id == 4) bg-label-info 
                                    @else bg-label-secondary
                                    @endif">
                                    {{$user->role->name}}
                                </p>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold text-primary">Estado</label>
                                <p class="form-control-plaintext text-dark">Activo</p>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold text-primary">Nombre Completo</label>
                                <p class="form-control-plaintext text-dark">
                                    @if ($user->teacher)
                                        <a href="{{ route('teachers.show', [$user->teacher]) }}">{{$user->teacher->name}}, {{$user->teacher->lastname}}</a>
                                    @elseif ($user->student)
                                        <a href="{{ route('students.show', [$user->student]) }}">{{$user->student->name}}, {{$user->student->lastname}}</a>
                                    @elseif ($user->principal)
                                        <a href="{{ route('principals.show', [$user->principal]) }}">{{$user->principal->name}}, {{$user->principal->lastname}}</a>
                                    @endif
                                </p>
                            </div>
                            {{-- <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold text-primary">Correo Electrónico</label>
                                <p class="form-control-plaintext text-dark">{{$user->email}}</p>
                            </div> --}}
                            {{-- <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold text-primary">Teléfono</label>
                                <p class="form-control-plaintext text-dark">       
                                    @if ($user->teacher)
                                        {{$user->teacher->phone}}
                                    @elseif ($user->student)
                                        {{$user->student->phone}}
                                    @elseif ($user->principal)
                                        {{$user->principal->phone}}
                                    @endif
                                </p>
                            </div> --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-bold text-primary">Fecha de Registro</label>
                                <p class="form-control-plaintext text-dark">{{$user->created_at}}</p>
                            </div>
                        </div>
                        <div class="mt-2 d-flex gap-3">
                            <form method="POST" action="{{ route('users.destroy', [$user]) }}" class="m-0">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('users.edit', [$user]) }}" class="btn btn-primary">Editar</a>
                                <a href="" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalToggle">Eliminar</a>
                                <x-modal_template_delete>
                                    <x-slot name="titulo">¿Estás seguro que quiere ELIMINAR este profesor?</x-slot>
                                    <x-slot name="contenido">Los datos NO pordrán modificar más adelante.</x-slot>
                                </x-modal_template_delete>
                            </form>
                            {{-- <a href="{{ route('users.index', [$user]) }}" class="btn btn-secondary">Volver</a> --}}
                        </div>
                    </div>
                </div>

                <!-- Actividades Recientes -->
                <div class="card">
                    <h5 class="card-header">Actividades Recientes</h5>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Inicio de sesión exitoso</strong>
                                <span class="text-muted">01/12/2023 10:00 AM</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Actualización de contraseña</strong>
                                <span class="text-muted">30/11/2023 04:30 PM</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Cambio de correo electrónico</strong>
                                <span class="text-muted">28/11/2023 01:15 PM</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template-layout>
