<!DOCTYPE html>
<html>
<head>
    <title>Relaciones</title>
</head>
<body>
        @foreach($categories as $category)
            <p>

                    {{ $category->name }}
                    {{ $category->num_books_public }}
                   {{-- {{ $category->num_books }} --}}
            </p>
            <ul>
                @foreach($category->books_public as $book)
                    <li>{{ $book->title }} <em>{{ $book->status }}</em></li>
                @endforeach
            </ul>
            {{--<ul>
                @foreach($category->books as $book)
                    <li>
                       <strong>{{  $book->title }}</strong>
                        {{ $book->description }}
                        {{ $book->status }}
                    </li>
                @endforeach
            </ul>--}}
        @endforeach
</body>
</html>