<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Todos los posts</h2>
    </x-slot>
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 space-y-5">
        @foreach ($post as $entrada)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex items-start p-5 space-x-5">
            @if ($entrada->image)
            <img src="{{ asset('storage/' . $entrada->image) }}" alt="Imagen del post" style="max-height: 200px; margin-right: 8px;">
            @endif
            <div class="flex-grow ">
                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $entrada->title }}</h3>
                <p class="text-gray-700 mb-4">{{ $entrada->content }}</p>
                <div class="text-sm text-gray-500 space-y-1">
                    <p>Autor: {{ $entrada->user->name }}</p>
                    <p>Categoría: {{ $entrada->categoria->nombre }}</p>
                    <p>Fecha de creación: {{ $entrada->created_at}}</p>
                </div>
                @if(Auth::id() === $entrada->user_id)
                <div class="mt-4 flex space-x-3">
                    <form action="{{ route('post.destroy', $entrada->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">Eliminar</button>
                    </form>
                    <a href="{{ route('post.edit', $entrada->id) }}" class="bg-blue-600 text-black px-4 py-2 rounded-md hover:bg-blue-700 transition">Editar</a>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
