@component('components.main')

@slot('title')
    Tipos de mantenimientos
    <a href="#" class="btn btn-secondary float-end">
        <i class="fas fa-info-circle"> Crear mantenimento</i>
    </a>
@endslot

@include('maintenances.filter_form')

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr class="table-dark">
        <th scope="col">Tipo</th>
        <th scope="col">Precio</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @forelse($maintenances as $maintenance)
        <tr id="target{{$maintenance->id}}">
            <th>{{$maintenance->name}}</th>
            <td>{{$maintenance->price}}</td>
            <td>
                <a href="#" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Ver mas</a>
                <a href="#" class="btn btn-outline-warning"><i class="fas fa-pen-to-square"></i> Editar</a>
                <a href="#" class="btn btn-outline-danger" @click='getElementData'  data-id='{{$maintenance->id}}' class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteModal" ><i class="fas fa-trash"></i> Eliminar</a>

            </td>
          </tr>
        @empty
        <h3>No existen tipos de mantenimientos almacenados en el sistema.</h3>
        @endforelse
    </tbody>
  </table>
</div>

<section class="d-flex justify-content-center">
    {{$maintenances->appends(request()->only("maintenance_name"))->links()}}
</section>
@endcomponent