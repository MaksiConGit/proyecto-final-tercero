{{-- <x-template-layout>

    <div class="card mx-4 p-4">
        <h5>Formulario de Edición de Usuarios</h5>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')
            <label>Nombre:<input type="text" name="name" value="{{ old('name', $user->name) }}" required /></label>
            <br>
            <br>
            <label>Apellido:<input type="text" name="email" value="{{ old('email', $user->email) }}" required /></label>
            <br>
            <br>
            <label>Contraseña:<input type="text" name="password" value="{{ old('password', $user->password) }}" required /></label>
            <br>
            <br>
            <label>role_id:<input type="text" name="role_id" value="{{ old('role_id', $user->role_id) }}" required /></label>
            <br>
            <br>
            <label>institution_id:<input type="text" name="institution_id" value="{{ old('institution_id', $user->institution_id) }}"required /></label>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{route('users.index')}}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</x-template-layout> --}}

<x-template-layout>
    <div class="container-xxl flex-grow-1 container">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Usuarios /</span> Editar Usuario
        </h4>

        <div class="row">
            
            <div class="col-md-12">
                <form method="POST" action="{{ route('users.update', [$user]) }}">
                @csrf
                @method('PUT')
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
                                {{-- <h4></h4> --}}
                                <input
                                type="text"
                                class="form-control"
                                name="name"
                                value="{{ old('name', $user->name) }}" 
                                />
                                <input
                                type="text"
                                class="form-control"
                                name="email"
                                value="{{ old('email', $user->email) }}" 
                                />

                                <span class="badge bg-primary mt-2">Usuario Activo</span>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                            <div class="row">
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
                                {{-- <div class="mb-3 col-md-6">
                                    <label class="form-label fw-bold text-primary">Correo Electrónico</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value="{{ old('name', $user->email) }}"
                                    />
                                </div> --}}
                                <div class="mb-3 col-md-6">
                                    <label class="form-label fw-bold text-primary">Rol</label>
                                    <br>
                                    <select name="role_id" class="form-select w-auto">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" 
                                                class="
                                                    @if($role->id == 1) bg-label-danger 
                                                    @elseif($role->id == 2) bg-label-primary 
                                                    @elseif($role->id == 3) bg-label-warning 
                                                    @elseif($role->id == 4) bg-label-info 
                                                    @else bg-label-secondary 
                                                    @endif"
                                                {{ $role->id == $user->role->id ? 'selected' : '' }}>
                                                {{ strtoupper($role->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label fw-bold text-primary">Estado</label>
                                    {{-- <p class="form-control-plaintext text-dark">Activo</p> --}}
                                    <select name="" class="form-select w-auto">
                                        <option {{ $user->deleted_at == null ? 'selected' : '' }}>Activo</option>
                                        <option {{ $user->deleted_at != null ? 'selected' : '' }}>Inactivo</option>
                                    </select>
                                    
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
                                <div class="mb-3 col-md-6">
                                    <label class="form-label fw-bold text-primary">Fecha de Registro</label>
                                    <p class="form-control-plaintext text-dark">{{$user->created_at}}</p>
                                </div>
                            </div>
                            <div class="mt-2 d-flex gap-3">
                                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalToggle">Actualizar</a>
                                <a href="{{ route('users.show', [$user]) }}" class="btn btn-secondary">Volver</a>
                                <x-modal_template>
                                    <x-slot name="titulo">¿Estás seguro que quiere editar esta profesor?</x-slot>
                                    <x-slot name="contenido">Los datos se pordrán modificar más adelante.</x-slot>
                                </x-modal_template>
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
            </form>
            </div>
        </div>
    </div>
</x-template-layout>


{{-- <x-template-layout>
    <div class="container-xxl flex-grow-1 container">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Usuarios /</span> Editar Usuario
        </h4>

        <div class="row">
            <div class="col-md-12">
                <!-- Información del Usuario -->
                <div class="card mb-4">
                    <h5 class="card-header">Editar Información del Usuario</h5>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', [$user]) }}">
                            @csrf
                            @method('PUT')

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

                            <hr class="my-0" />

                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold text-primary">Nombre Completo</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            value="{{ old('name', $user->name) }}"
                                        />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold text-primary">Correo Electrónico</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            value="{{ old('email', $user->email) }}"
                                        />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold text-primary">Teléfono</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="phone"
                                            value="{{ old('phone', $user->phone) }}"
                                        />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold text-primary">Rol</label>
                                        <select name="role_id" class="form-control">
                                            <option value="1" {{ $user->role->id == 1 ? 'selected' : '' }}>Administrador</option>
                                            <option value="2" {{ $user->role->id == 2 ? 'selected' : '' }}>Profesor</option>
                                            <option value="3" {{ $user->role->id == 3 ? 'selected' : '' }}>Estudiante</option>
                                            <option value="4" {{ $user->role->id == 4 ? 'selected' : '' }}>Directivo</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold text-primary">Estado</label>
                                        <select name="status" class="form-control">
                                            <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Activo</option>
                                            <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactivo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-4 d-flex gap-3">
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </form>
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
</x-template-layout> --}}
