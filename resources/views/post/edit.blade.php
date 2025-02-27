<x-app-layout>
    <h1>Editar Post</h1>
    <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="title">Titulo:</label>
        <input type="text" id="title" name="title" value="{{$post->title}}" required>
        <br><br>

        <label for="content">Contenido:</label>
        <input type="text" id="content" name="content" value="{{$post->content}}" required >
        <br><br>

        <label for="image">Foto:</label>
        <input type="file" id="image" name="image" value="{{$post->image}}">
        <br><br>

        <label for="categoria_id">Categoría:</label>
        <select id="categoria_id" name="categoria_id" required>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" 
                    @if ($categoria->id == $post->categoria_id)
                        selected
                    @endif>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
        
        <button type="submit">Guardar Post</button>

    
    </form>

    <a href= "{{ route ('post.index') }}">Volver al listado</a>
</x-app-layout>