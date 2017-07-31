<!DOCTYPE html>
<html>
<head>
    <title>Problema N + 1</title>
</head>
<body>
    <h1>N + 1</h1>
    @foreach($books as $book)
        <li>
            <strong>{{ $book->title }}</strong> -
            <em>{{ $book->category->name }}</em> Autor ({{ $book->users }})
        </li>
    @endforeach
</body>
</html>