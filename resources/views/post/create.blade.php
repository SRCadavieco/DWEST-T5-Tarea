<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Titulo:</label>
        <input type="text" id="title" name="title" required>
        <br><br>

        <label for="content">Contenido:</label>
        <input type="text" id="content" name="content" required>
        <br><br>

        <label for="image">Foto:</label>
        <input type="file" id="image" name="image">
        <br><br>

        <button type="submit">Guardar Post</button>

    </form>
</body>
</html>