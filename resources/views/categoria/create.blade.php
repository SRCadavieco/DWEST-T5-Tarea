<x-app-layout>
    <form action="{{route('categoria.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre de la categoria:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>

        <button type="submit">Crear Categoria</button>

    </form>









</x-app-layout>