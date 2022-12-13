<form class="row row-cols-lg-auto g-4 align-items-center" >
      <div class="col-12 col-md-12">
        <label name="client_data" for="form-check-input mb-2" class="me-sm-2 col-md-6">Dato del cliente</label>
        <input name="client_data" type="text" class="form-control col-md-6" placeholder="Ingrese el id, nombre o apellido">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i>Filtrar</button>
      </div>
      <a href="{{route('clientes.index')}}" class="col-12">
        <button type="button" class="btn btn-primary mb-2"><i class="fas fa-search"></i>Reiniciar</button>
      </a>