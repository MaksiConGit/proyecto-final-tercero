<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Formulario de Creación de Estudiantes</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <label>
            name:
            <input type="text" name="name" value="{{ old('name') }}" required />
        </label>
        <br>
        <label>
            lastname:
            <input type="text" name="lastname" value="{{ old('lastname') }}" required />
        </label>
        <br>
        <label>
            dni:
            <input type="text" name="dni" value="{{ old('dni') }}" required />
        </label>
        <br>
        <label>
            phone:
            <input type="text" name="phone" value="{{ old('phone') }}" required />
        </label>
        <br>
        <label>
            birthdate:
            <input type="date" name="birthdate" value="{{ old('birthdate') }}" required />
        </label>
        <br>
        <label>
            country_id:
            <select id="country_id" name="country_id" required>
                <option value="">Selecciona un País</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
        </label>
        <br>
        <label>
            province_id:
            <select id="province_id" name="province_id" required>
                <option value="">Selecciona una Provincia</option>
            </select>
        </label>
        <br>
        <label>
            city_id:
            <select id="city_id" name="city_id" required>
                <option value="">Selecciona una Ciudad</option>
            </select>
        </label>
        <br>
        <label>
            (opcional) user_id:
            <select id="user_id" name="user_id">
                <option value="">Selecciona una cuenta de usuario libre</option>
                @foreach ($studentsWithNoUser as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </label>
        <br>
        </div>
        <button type="submit"> create </button>
    </form>

    <script>
        document.getElementById('country_id').addEventListener('change', function() {
    const countryId = this.value;
    const provinceSelect = document.getElementById('province_id');
    provinceSelect.innerHTML = '<option value="">Selecciona una Provincia</option>'; // Limpia provincias

    if (countryId) {
        fetch(`/provinces/${countryId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(province => {
                    const option = new Option(province.name, province.id);
                    provinceSelect.add(option);
                });
            });
    }
});

document.getElementById('province_id').addEventListener('change', function() {
    const provinceId = this.value;
    const citySelect = document.getElementById('city_id');
    citySelect.innerHTML = '<option value="${city.id}">Selecciona una Ciudad</option>'; // Limpia ciudades

    if (provinceId) {
        fetch(`/cities/${provinceId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(city => {
                    const option = new Option(city.name, city.id);
                    citySelect.add(option);
                });
            });
    }
});
    </script>
</body>

</html>

