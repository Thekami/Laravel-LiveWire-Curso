<div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 style="float: left">{{ $title }}</h4>
            <a href="{{ route('empleado.create') }}" class="btn btn-sm btn-primary" style="float: right">Nuevo Empleado</a>
          </div>

          <div class="card-body row">
            <div class="form-group col-3">
              <div class="row">
                <label for="" class="col-auto col-form-label">Mostrando</label>
                <div class="col-auto">
                  <select class="form-control form-control-sm mb-3" wire:model="pagina">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                  </select>
                </div>
                <label for="" class="col-auto col-form-label">paginas</label>
              </div>

            </div>
            <div class="form-group col-6" style="position: absolute;left: 50%;">
              <input type="text" placeholder="Buscar.." class="form-control form-control-sm mb-3" wire:model="search">
            </div>

            @if(session('success') != null)
            <div class="form-group">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
            @endif

            <div class="table-responsive" style="margin-bottom: 20px">
              <table class="table table-striped">
                <thead style="border-bottom: black;font: initial;">
                  <tr>
                    <th scope="col">Empleado</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Salario</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($empleados as $empleado)
                  {{-- {{ dd($empleado) }} --}}
                  <tr>
                    <td>{{ $empleado->nombre }}</td>
                    <td>
                      @if(is_null($empleado->foto))
                        <img src="{{ asset('img/user.png') }}" width="30px" height="30px" alt="" class="img-fluid rounded">
                      @else
                        <img src="{{ asset($empleado->foto) }}" width="30px" height="30px" alt="" class="img-fluid rounded">
                      @endif
                    </td>
                    <td>{{ $empleado->codigo }}</td>
                    <td>${{ $empleado->salario }}</td>
                    <td>{{ $empleado->direccion }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>{{ $empleado->estatus}}</td>
                    <td>
                      <a class="btn btn-sm btn-primary opciones-tabla" href="{{route('empleado.edit', $empleado)}}" title="Editar">
                        <span class="fa fa-pencil"></span>
                      </a>
                      {{-- <a class="btn btn-sm btn-primary opciones-tabla" href="{{ route('empleado.edit', $empleado->id) }}" title="Editar"> </a> --}}

                      <button wire:click="deleteConfirm({{ $empleado->id }})" class="btn btn-sm btn-danger opciones-tabla" title="Eliminar">
                        <span class="fa fa-trash"></span>
                      </button>
                      <button class="btn btn-sm opciones-tabla" title="Editar con modal" wire:click="$emitTo('empleado.modal-edit', 'showModalEdit', {{ $empleado->id }})">
                        <span class="fa fa-pencil"></span>
                      </button>
                    </td>
                    <td>

                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
              {{ $empleados->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @livewire('empleado.modal-edit')

</div>

@section('scripts')
 @vite('resources/js/empleados.js')
@endsection