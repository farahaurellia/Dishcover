<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $recipe->judul }}</title>
</head>
<body>
    <h1>{{ $recipe->judul }}</h1>
    <h4>Recipe by <span style="color: pink"> {{ $recipe->user->username }} </span></h4>
    <p><strong>Bahan-bahan: </strong></p>
    <ul>
        @foreach ($bahan as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
    <p><strong>Langkah-langkah: </strong></p>
    <ol>
        @foreach ($langkah as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ol>
</body>
</html>
