<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Auth;
use App\Models\Categoria;

use function Pest\Laravel\post;

class PostController extends Controller
{
    public function index(){
        $post = Post::all();
        return view('post.index',compact('post'));
    }
    public function create()
    {
        // Obtén todas las categorías disponibles
        $categorias = Categoria::all();
    
        // Pásalas a la vista
        return view('post.create', compact('categorias'));
    }
    public function store(Request $request)
    {
        
        // Validar los datos enviados por el formulario
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'categoria_id' => 'required|exists:categorias,id'
        ]);
    
        // Manejar la carga de archivos si hay una imagen
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }
    
        // Asignar el ID del usuario autenticado
        $validated['user_id'] = $request->user()->id;
        
    
        // Crear el post con los datos validados
        Post::create($validated);
    
        // Redirigir a la lista de posts con un mensaje de éxito
        return redirect()->route('post.index')->with('success', 'Post creado con éxito.');
    }
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'foto' => 'nullable|image|max:2048'
        ]);

        // Recuperar mascota
        $post = Post::findOrFail($id);

        // Guardar los datos
        $post->update($validated);

        // Redirigir
        return redirect()->route('post.index')->with('success', 'post modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'post eliminada con éxito');
    }
}
