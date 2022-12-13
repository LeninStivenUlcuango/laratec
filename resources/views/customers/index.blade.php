@component('components.main')

@slot('title')
    Listado de clientes
    <a href="{{route('clientes.create')}}" class="btn btn-secondary float-end"><i class="fas fa-info-circle"> Crear cliente</i></a>
@endslot

@include('customers.filter_form')

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr class="table-dark">
        <th scope="col"># de identificacion</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @forelse($customers as $customer)
        <tr id="target{{$customer->id}}">
            <th scope="row">{{$customer->id_number}}</th>
            <td>{{$customer->name}}</td>
            <td>{{$customer->last_name}}</td>
            <td>
                <a href="{{route('clientes.show',[$customer->id])}}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Ver mas</a>
                <a href="{{route('clientes.edit',[$customer])}}" class="btn btn-outline-warning"><i class="fas fa-pen-to-square"></i> Editar</a>
                <a href="{{route('clientes.destroy',[$customer])}}" class="btn btn-outline-danger" @click='getElementData'  data-id='{{$customer->id}}' class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteModal" ><i class="fas fa-trash"></i> Eliminar</a>

            </td>
          </tr>
        @empty
        <h3>No existen clientes almacenados en el sistema.</h3>
        @endforelse
    </tbody>
  </table>
</div>

<section class="d-flex justify-content-center">
    {{$customers->appends(request()->only("client_data"))->links()}}
</section>
@endcomponent