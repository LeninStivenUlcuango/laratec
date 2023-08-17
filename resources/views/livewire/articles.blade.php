<div>
    <h1>Mostrando contenido</h1>

        <h1>Esto es {{ $title }}</h1>
            
            <label >Ingrese el titulo</label><input type="text" wire:model="title">
            <label >Ingrese el contenido</label><input type="text" wire:model="content" >
            <button type="input" wire:click="nuevoArticulo">Ingresar</button>
    <ul>
        @foreach ($articles as $article)
            <li>{{ $article->title }}</li>
        @endforeach
    </ul>
</div>
