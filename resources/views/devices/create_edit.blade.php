@inject('customers','App\Http\Services\Customers')
@inject('users', 'App\Http\Services\Users')
@inject('maintenances', 'App\Http\Services\Maintenances')
@inject('state', 'App\Http\Services\State')
@component('components.main')
@slot('title')
 @if(!empty($device))Editar dispositivo @else Crear Dispositivo @endif
@endslot 
@if(empty($device))
 <form method="POST" action="{{ route('dispositivos.store') }}">
    @csrf
    @else
    <form method="POST" action="{{ route('dispositivos.update',$device) }}">
        @csrf
        @method('PUT')
        @endif
            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end">{{ __('general.Customer') }}</label>
                <div class="col-md-6">
                    <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror" aria-label="Default select example">
                        @foreach ($customers->get() as $customer_id=>$customer)
                        <option value="{{$customer_id}}" @if(!empty($device)) @if($device->customer_id==$customer_id) selected @endif @endif
                        >{{$customer}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end">{{ __('general.tecnico') }}</label>
                <div class="col-md-6">
                    <select name="user_id" class="form-select @error('user_id') is-invalid @enderror" aria-label="Default select example">
                        @foreach ($users->get() as $user_id=>$user)
                        <option value="{{$user_id}}" @if(!empty($device)) @if($device->user_id==$user_id) selected @endif @endif>{{$user}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end">Seleccione los tipos de mantenimiento</label>
                <div class="col-md-6">
                    <select name="maintenances[]" multiple="true" size="10" class="form-select @error('maintenances') is-invalid @enderror" aria-label="Default select example">
                        @foreach ($maintenances->get() as $maintenance_id=>$maintenance)
                        <option value="{{$maintenance_id}}" @if(!empty($device)) @if(array_key_exists($maintenance_id,$maintenances->get_id($device->id))) selected @endif @endif>{{$maintenance}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="text-area" class="col-md-4 col-form-label text-md-end">{{ __('general.description') }}</label>
                <div class="col-md-6">
                    <textarea name='description' rows="5" class="form-control @error('description') is-invalid @enderror">@if(!empty($device)){{$device->description}}@endif</textarea>
                </div>
            </div>
            @if(!empty($device))
            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end">{{ __('general.state') }}</label>
                <div class="col-md-6">
                    <select name="status" class="form-select @error('status') is-invalid @enderror" aria-label="Default select example">
                        @foreach ($state->get() as $status)
                        <option value="{{$status}}"@if($device->status==$status ) selected @endif>{{$status}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            <div class="btn-group" style="margin: auto; display: flex;">
                <input class="btn btn-primary col" type="submit" value="Guardar" style="margin-right: 5%">
                <a href="{{route('dispositivos.index')}}" class="btn btn-dark col">Cancelar</a>
            </div>
        </form>
@endcomponent