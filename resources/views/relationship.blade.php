<!DOCTYPE html>
<html>
<head>
    <title>Relaciones</title>
</head>
<body>
        @foreach($categories as $category)
            <p>

                @if(count($category->books) != 0)
                    {{ $category->name }}
                    {{ (count($category->books)) }}
                @endif

            </p>
            <ul>
                @foreach($category->books as $book)
                    <li>
                       <strong>{{  $book->title }}</strong>
                        {{ $book->description }}
                    </li>
                @endforeach
            </ul>
        @endforeach
</body>
</html>