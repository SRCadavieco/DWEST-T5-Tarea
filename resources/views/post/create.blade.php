<x-app-layout>
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
</x-app-layout>