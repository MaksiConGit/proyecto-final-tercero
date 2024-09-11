<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Materia {{$subject->id}}</h1>
    <ul>
        <li>Nombre: {{$subject->name}}</li>
        <li>Profesor: {{$subject->teacher}}</li>
        <li>Horario: {{$subject->time1}} - {{$subject->time2}}</li>
    </ul>
</body>
</html>