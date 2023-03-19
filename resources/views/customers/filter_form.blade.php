<form class="" >
  <div class="row align-items-center mb-3">
      <div class="col-sm-1 order-1 text-end">
        <label name="client_data" for="form-check-input mb-2" class="">Cliente</label>
      </div>
      <div class="col-sm-6 order-2">
        <input name="client_data" type="text" class="col order-2 form-control " placeholder="Ingrese el id, nombre o apellido">
      </div>
      <div class="col-sm-4 order-4 pt-2">
        <button type="submit" class="btn btn-primary mb-2 me-3"><i class="fas fa-search"></i>Filtrar</button>
        <a href="{{route('clientes.index')}}" class="col-12">
          <button type="button" class="btn btn-primary mb-2"><i class="fas fa-search"></i>Reiniciar</button>
        </a>
      </div>
    </div> 