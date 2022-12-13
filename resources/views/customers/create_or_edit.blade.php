@component('components.main')
@slot('title')
    {{!empty($customer) ? 'Editar': 'Crear'}} Cliente
@endslot
@if(empty($customer))
 <form method="POST" action="{{ route('clientes.store') }}">
    @csrf
    @else
    <form method="POST" action="{{ route('clientes.update',$customer) }}">
        @csrf
        @method('PUT')
        @endif
            <div class="row mb-3">
                <label name="name" class="col-md-4 col-form-label text-md-end">Nombre</label>
                <div class="col-md-6">
                    <input name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Ingresa el nombre del cliente">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label name="last_name" class="col-md-4 col-form-label text-md-end">Apellido</label>
                <div class="col-md-6"> 
                    <input name="last_name" class="form-control @error('last_name') is-invalid @enderror" type="text" placeholder="Ingresa el apellido del cliente" value="{{old('last_name')}}">
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label name="id_number" class="col-md-4 col-form-label text-md-end">Cedula</label>
                <div class="col-md-6"> 
                    <input name="id_number" value="{{old('id_number')}}" class="form-control @error('id_number') is-invalid @enderror" type="text" placeholder="Ingresa el numero de cedula del cliente">
                    @error('id_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label name="email" class="col-md-4 col-form-label text-md-end">Direccion de correo electronico</label>
                <div class="col-md-6"> 
                    <input name="email" class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Ingresa el email del cliente" value="{{old('email')}}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="text-area" class="col-md-4 col-form-label text-md-end">Direccion</label>
                <div class="col-md-6">
                    <textarea name='addres' rows="5" class="form-control @error('addres') is-invalid @enderror" placeholder="Ingrese la direccion del cliente" value="{{old('addres')}}"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label name="phone" class="col-md-4 col-form-label text-md-end">Telefono</label>
                <div class="col-md-6"> 
                    <input name="phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="Ingresa el numero cedular del cliente"> 
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="btn-group" style="margin: auto; display: flex;">
                <input class="btn btn-primary col" type="submit" value="Guardar" style="margin-right: 5%">
                <a href="{{route('clientes.index')}}" class="btn btn-dark col">Cancelar</a>
            </div>
        </form>
@endcomponent