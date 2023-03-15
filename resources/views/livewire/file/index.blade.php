<div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 style="float: left">{{ $title }}</h4>
            <a href="{{ route('file.create') }}" class="btn btn-sm btn-primary" style="float: right">Nuevo archivo</a>
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
                    <th scope="col">#</th>
                    <th scope="col">Archivo</th>
                    <th scope="col">Extención</th>
                    <th scope="col">Ruta</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($files as $file)
                  <tr>
                    <th>{{ $file->id }}</th>
                    <td>{{ $file->nombre }}</td>
                    <td>.{{ $file->extencion }}</td>
                    <td>{{ $file->ruta }}</td>
                    <td>
                      @if($file->extencion == 'pdf')
                        <span class="fa-regular fa-file-pdf" style="font-size: 30px"></span>
                      @else
                        <img src="{{ asset($file->ruta) }}" width="50px" height="50px" alt="">
                      @endif
                      <br>
                      <a href="{{ asset($file->ruta) }}" target="_blank">Ver archivo</a>
                    </td>
                    <td>

                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
              {{ $files->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
