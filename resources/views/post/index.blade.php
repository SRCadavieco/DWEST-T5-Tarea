<x-app-layout>
    <x-slot name="header">
        Todos los post
    </x-slot>
    @foreach ($post as $entrada)
        <div class="entrada">
            @if ($entrada->image)
                <img src="{{asset('storage/'. $entrada->image)}}" alt="Imagen del post" width="50px">
            @endif
        <h3>{{$entrada->title}}</h3>
        <p>{{$entrada->content}}</p>


        </div>
    @endforeach
</x-app-layout>