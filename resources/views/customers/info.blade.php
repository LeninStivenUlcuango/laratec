@component('components.main')
@slot('title')
   Informacion del cliente
@endslot
<div class="d-flex align-items-start">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <button class="nav-link active" id="v-pills-customer-tab" data-bs-toggle="pill" data-bs-target="#v-pills-customer" type="button" role="tab" aria-controls="v-pills-customer" aria-selected="true">Cliente</button>
      <button class="nav-link" id="v-pills-device-tab" data-bs-toggle="pill" data-bs-target="#v-pills-device" type="button" role="tab" aria-controls="v-pills-device" aria-selected="false">Dispositivos</button>
      <button class="nav-link" id="v-pills-technician-tab" data-bs-toggle="pill" data-bs-target="#v-pills-technician" type="button" role="tab" aria-controls="v-pills-technician" aria-selected="false">Atendido por: </button>
    </div>
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-customer" role="tabpanel" aria-labelledby="v-pills-customer-tab" tabindex="0">
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <th>Nombre</th>
                    <td>{{$customer->name}}</td>
                </tr>
                <tr>
                    <th>Apellido</th>
                    <td>{{$customer->last_name}}</span></td>
                </tr>
                <tr>
                    <th>Cedula</th>
                    <td>{{$customer->id_number}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$customer->email}}</td>
                </tr>
                <tr>
                    <th>Direccion</th>
                    <td>{{$customer->addres}}</td>
                </tr>
                <tr>
                    <th>Telefono</th>
                    <td>{{$customer->phone}}</td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="v-pills-device" role="tabpanel" aria-labelledby="v-pills-device-tab" tabindex="0">
        <table class="table table-bordered table-hover">
            <thead>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Tipos de mantenimiento</th>
            </thead>
            <tbody>
                @foreach($customer->devices as $device)
                <tr>
                    <td>{{$device->description}}</td>
                    <td><span class="badge rounded-pill bg-{{config('status.'.$device->status)}}">{{$device->status}}</td>
                    <td>
                        <ul>
                            @foreach($device->maintenances as $maintenance)
                            <li>{{$maintenance->name}}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="v-pills-technician" role="tabpanel" aria-labelledby="v-pills-technician-tab" tabindex="0">
        <table class="table table-bordered table-hover">
            <thead>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
            </thead>
            <tbody>
                @foreach($customer->devices as $device)
                <tr>
                    <th>{{$device->user->name}} </th>
                    <td>{{$device->user->last_name}} </td>
                    <td>{{$device->user->last_name}}</td>
                </tr>
               @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
  <a href="{{route('clientes.index')}}" class="btn btn-dark">Regresar</a>

@endcomponent