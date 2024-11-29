<x-template-layout>
    
    {{-- <div class="container">
        <h1>Profesor: {{ $student->name }}</h1>
        <ul>
            <li>DNI: {{ $student->dni }}</li>
            <li>Phone: {{ $student->phone }}</li>
            <li>Birhtdate: {{ $student->birthdate }}</li>
            <li>City: {{ $student->city ? $student->city->name : 'Sin ciudad asignada.' }}</li>
            <li>
                @if ($student->user)
                    User: {{ $student->user->name }}
                @else
                    No tiene usuario asignado.
                @endif
            </li>
        </ul>
        <a href="{{ route('students.edit', $student) }}">Edit</a>

        <form method="POST" action="{{ route('students.destroy', $student) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div> --}}

    <div class="card mb-4">
        <h5 class="card-header">Detalles de Perfil</h5>
        <!-- Account -->
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img
              src="../../template_files/assets/img/Avatars/1.png"
              alt="user-avatar"
              class="d-block rounded"
              height="100"
              width="100"
              id="uploadedAvatar"
            />
          </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
          <form id="formAccountSettings" method="POST" onsubmit="return false">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Nombre: </label>
                <span class="form-control" type="text"
                id="Nombre"
                name="firstName"
                value="John"
                autofocus>
                {{ $student->name }}
                </span>
              </div>
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Usuario: </label>
                <span class="form-control" type="text"
                id="Nombre"
                name="firstName"
                value="John"
                autofocus>
                PussyDestroyer343 <!-- /Aca va el usuario -->
                </span>
              </div>
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">DNI: </label>
                <span class="form-control" type="text"
                id="Nombre"
                name="firstName"
                value="John"
                autofocus>
                {{ $student->dni }}
                </span>
              </div>
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Celular: </label>
                <span class="form-control" type="text"
                id="Nombre"
                name="firstName"
                value="John"
                autofocus>
                {{ $student->phone }}
                </span>
              </div>
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Fecha Nacimiento:</label>
                <span class="form-control" type="text"
                id="Nombre"
                name="firstName"
                value="John"
                autofocus>
                {{ $student->birthdate }}
                </span>
              </div>
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Ciudad:</label>
                <span class="form-control" type="text"
                id="Nombre"
                name="firstName"
                value="John"
                autofocus>
                {{ $student->city ? $student->city->name : 'Sin ciudad asignada.' }}
                </span>
              </div>
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Carrera:</label>
                <span class="form-control" type="text"
                id="Nombre"
                name="firstName"
                value="John"
                autofocus>
                Analista en Sistemas
                </span>
              </div>
              <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Curso:</label>
                <span class="form-control" type="text"
                id="Nombre"
                name="firstName"
                value="John"
                autofocus>
                3° Año
                </span>
              </div>
            <div class="mt-2">
              <a class="btn btn-primary me-2" href="{{ route('students.edit', $student) }}">Edit</a>
              <button class="btn btn-outline-secondary">Volver</button>  <!-- /No funciona xd -->
            </div>
          </form>
        </div>
    </div>
</x-template-layout>