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
              <input type="text" placeholder="Buscar.." class="form-control form-control-sm  mb-3" wire:model="search">
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

                  <tr>
                    <th>Juan Garcia</th>
                    <td>
                      <img src="" width="20px" height="20px" alt="">
                    </td>
                    <td>123</td>
                    <td>$10,000</td>
                    <td>Dr. Miguel Galindo 45</td>
                    <td>3121506956</td>
                    <td>
                      <span class="btn btn-xs btn-success">Activo</span>
                    </td>
                    <td>
                      <a href="{{ route('empleado.create') }}" class="btn btn-sm btn-primary opciones-tabla" title="Editar">
                        <span class="fa fa-pencil"></span>
                      </a>
                      <a href="{{ route('empleado.create') }}" class="btn btn-sm btn-danger opciones-tabla" title="Eliminar">
                        <span class="fa fa-trash"></span>
                      </a>
                    </td>
                  </tr>

                  {{-- @foreach ($empleados as $empleado)
                    <tr>
                      <td>{{ $empleado->nombre }}</td>
                  <td>
                    <img src="{{ asset($empleado->ruta) }}" width="20px" height="20px" alt="">
                  </td>
                  <td>{{ $empleado->codigo }}</td>
                  <td>${{ $empleado->salario }}</td>
                  <td>{{ $empleado->direccion }}</td>
                  <td>{{ $empleado->telefono }}</td>
                  <td>{{ $empleado->estatus }}</td>
                  <td>
                    <a href="{{ route('empleado.create') }}" class="btn-sm btn-success"><span class="fa fa-pencil"></span></a>
                    <a href="{{ route('empleado.create') }}" class="btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                  </td>
                  <td>

                  </td>
                  </tr>
                  @endforeach --}}

                </tbody>
              </table>
              {{-- {{ $empleados->links() }} --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('.opciones-tabla').tooltip();
    })
</script>