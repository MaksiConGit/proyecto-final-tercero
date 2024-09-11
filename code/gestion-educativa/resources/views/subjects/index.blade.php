<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subjects</title>
</head>
<body>
    <h1>Subjects</h1>
    <ul>
        @foreach ($subjects as $subject)
            <li>{{$subject->name}}</li> 
        @endforeach
    </ul>
</body>
</html>