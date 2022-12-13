<form class="row row-cols-lg-auto g-4 align-items-center" >
      <div class="col-12">
        <select name="status" class="form-select @error('status') is-invalid @enderror" aria-label="Default select example">
            <option value="">Selecione un estado</option>
            @foreach ($state->get() as $status)
            <option value="{{$status}}">{{$status}}</option>
            @endforeach
        </select>
      </div>
      <div class="col-12">
        <label name="entry_date_from" for="form-check-input mb-2" class="me-sm-2">F. desde</label>
        <input name="entry_date_from" type="date" class="form-check-label">
      </div>
      <div class="col-12">
        <label name="entry_date_to" for="form-check-input mb-2" class="me-sm-2">F. hasta</label>
        <input name="entry_date_to" type="date" class="form-check-label">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i>Filtrar</button>
      </div>
      <a href="{{route('dispositivos.index')}}" class="col-12">
        <button type="button" class="btn btn-primary mb-2"><i class="fas fa-search"></i>Reiniciar</button>
      </a>