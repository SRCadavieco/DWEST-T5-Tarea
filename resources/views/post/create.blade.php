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

        <!--Aqui va el <option></option>-->
        <label for="categoria_id">Categoría:</label>
        <select id="categoria_id" name="categoria_id" required>
     
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre}}</option>
            @endforeach
        </select>
        <button type="submit">Crear Post</button>

    </form>
</x-app-layout>
