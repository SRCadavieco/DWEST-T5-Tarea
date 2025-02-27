<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;

use function Pest\Laravel\post;

class PostController extends Controller
{
    public function index(){
        
        $post = Post::orderBy('created_at','desc')->paginate(5);;
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
    
        // Redirigir a la lista de posts 
        return redirect()->route('post.index')->with('success', 'Post creado con éxito.');
    }
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categorias = Categoria::all();
        if($post->user_id !== Auth::id()){
            abort(403, 'No tiene permiso para editar esta post');
        }
        return view('post.edit', compact('post','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'categoria_id' => 'required'
        ]);

        // Recuperar post
        $post = Post::findOrFail($id);

     

        // Guardar los datos
        $post->update($validated);

        // Redirigir
        return redirect()->route('post.index')->with('success', 'post modificado con éxito');
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
    //Cree esta funcion para filtrar mis posts
    public function misPosts()
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Recuperar los posts del usuario autenticado
        $posts = Post::where('user_id', $userId)->get();

        // Retornar la vista con los posts del usuario
        return view('post.misPosts', compact('posts'));
    }
}
