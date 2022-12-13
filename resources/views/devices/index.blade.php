@inject('state', 'App\Http\Services\State')

@component('components.main')

@slot('title')
    {{__('general.devices')}}
    <a href="{{route('dispositivos.create')}}" class="btn btn-secondary float-end"><i class="fas fa-info-circle"> Crear</i></a>
@endslot

@include('devices.filter_form')

@if(session()->has('message'))
<div class=" alert alert-success" role="alert">
    {{session('message')}}
</div>
@endif

<div class="class row">
@forelse($devices as $device)
    <div class="col-md-4 col-device" id="target{{$device->id}}">
        <div class="card device">
            <div class="card-body">
                <h5 class="card-title">Cliente: {{$device->customer->name}}</h5>
                <p class="card-text">{{$device->description}}</p>
            </div>
            <ul class="list-group list-group-flush">
                
                <li class="list-group-item">Estado: <span class="badge rounded-pill bg-{{config('status.'.$device->status)}}">{{$device->status}}</span></li>
            </ul>
            <div class="card-footer">
                <a href="{{route('dispositivos.show',[$device->id])}}" class="btn btn-info"><i class="fas fa-plus"></i> Ver mas</a>
                <a href="{{route('dispositivos.edit',[$device])}}" class="btn btn-info"><i class="fas fa-pen-to-square"></i> Editar</a>
                <a href="{{route('dispositivos.destroy',[$device])}}" @click='getElementData'  data-id='{{$device->id}}' class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteModal" ><i class="fas fa-trash"></i> Eliminar</a>
            </div>
        </div>
    </div>
@empty
<h3>No existen datos</h3>
@endforelse
</div>
@include('partials.modal')
<section class="d-flex justify-content-center">
    {{$devices->appends(request()->only("status","entry_date_to","entry_date_from"))->links()}}
</section>
@endcomponent