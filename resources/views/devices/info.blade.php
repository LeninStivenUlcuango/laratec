@component('components.main')
@slot('title')
   Informacion del dispositivo
@endslot
<div class="d-flex align-items-start">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <button class="nav-link active" id="v-pills-device-tab" data-bs-toggle="pill" data-bs-target="#v-pills-device" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
      <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-customer" type="button" role="tab" aria-controls="v-pills-customer" aria-selected="false">Cliente</button>
      <button class="nav-link" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-technician" type="button" role="tab" aria-controls="v-pills-technician" aria-selected="false">Tecnico</button>
      <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-maintenance" type="button" role="tab" aria-controls="v-pills-maintenance" aria-selected="false">Mantenimiento</button>
    </div>
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-device" role="tabpanel" aria-labelledby="v-pills-device-tab" tabindex="0">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <th>Descripcion</th>
                    <td>{{$device->description}}</td>
                </tr>
                <tr>
                    <th>Estado</th>
                    <td><span class="badge rounded-pill bg-{{config('status.'.$device->status)}}">{{$device->status}}</span></td>
                </tr>
                <tr>
                    <th>Fecha de entrada</th>
                    <td>{{$device->entry_date}}</td>
                </tr>
                <tr>
                    <th>Fecha de salida</th>
                    <td>{{!empty($device->departure_date)?$device->departure_date:'--'}}</td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="v-pills-customer" role="tabpanel" aria-labelledby="v-pills-customer-tab" tabindex="0">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <th>Nombre cliente</th>
                    <td>{{$device->customer->name}}</td>
                </tr>
                <tr>
                    <th>Apellido cliente</th>
                    <td>{{$device->customer->last_name}}</td>
                </tr>
                <tr>
                    <th>Numero de identificacion</th>
                    <td>{{$device->customer->id_number}}</td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="v-pills-technician" role="tabpanel" aria-labelledby="v-pills-technician-tab" tabindex="0">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <th>Nombre tecnico</th>
                    <td>{{$device->user->name}}</td>
                </tr>
                <tr>
                    <th>Apellido tecnico</th>
                    <td>{{$device->user->last_name}}</td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="v-pills-maintenance" role="tabpanel" aria-labelledby="v-pills-maintenance-tab" tabindex="0">
        <table class="table table-bordered table-hover">
            <thead>
                <th>Codigo</th>
                <th>Mantenimiento</th>
                <th>Precio</th>
            </thead>
            <tbody>
                @foreach($device->maintenances as $maintenance)
                <tr>
                    <th>{{$maintenance->id}}</th>
                    <td>{{$maintenance->name}}</td>
                    <td>{{$maintenance->price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
  <a href="{{route('dispositivos.index')}}" class="btn btn-dark">Regresar</a>

@endcomponent