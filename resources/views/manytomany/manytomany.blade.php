<!DOCTYPE html>
<html>
<head>
    <title>Many to Many</title>
</head>
<body>
    <h1>Many to Many "Muchos a Muchos"</h1>
    <ul>
        @foreach($users as $user)
            <li><strong>Autor</strong> {{$user->name}}</li>
            <a href="{{ route('getEdit', $user->id) }}">Editar</a>
            <ul>
                @foreach($user->manyBooks as $book)
                    <li>{{$book->title}}</li>
                @endforeach
            </ul>
        @endforeach
    </ul>
</body>
</html>