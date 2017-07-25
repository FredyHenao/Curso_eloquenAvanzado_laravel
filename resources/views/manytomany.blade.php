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
            <ul>
                @foreach($user->books as $book)
                    <li>{{$book->title}}</li>
                @endforeach
            </ul>
        @endforeach
    </ul>
</body>
</html>