@component('components.main')
@slot('title')
    {{!empty($maintenance) ? 'Editar': 'Crear'}} Tipo de mantenimiento
@endslot
@if(empty($maintenance))
 <form method="POST" action="{{route('mantenimientos.store')}}">
    @csrf
    @else
    <form method="POST" action="{{ route('mantenimientos.update',$customer) }}">
        @csrf
        @method('PUT')
        @endif
            <div class="row mb-3">
                <label name="name" class="col-md-4 col-form-label text-md-end">Nombre</label>
                <div class="col-md-6">
                    <input name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Ingresa el nombre tipo de mantenimiento">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label name="price" class="col-md-4 col-form-label text-md-end">Precio</label>
                <div class="col-md-6"> 
                    <input name="price" class="form-control @error('price') is-invalid @enderror" type="text" placeholder="Ingresa el precio de mantenimiento" value="{{old('price')}}">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="btn-group" style="margin: auto; display: flex;">
                <input class="btn btn-primary col" type="submit" value="Guardar" style="margin-right: 5%">
                <a href="{{route('mantenimientos.index')}}" class="btn btn-dark col">Cancelar</a>
            </div>
        </form>
@endcomponent