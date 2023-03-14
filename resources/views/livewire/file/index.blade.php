<div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">{{ $title }}</h4>
                        <a href="{{ route('file.create') }}" class="btn btn-sm btn-primary"  style="float: right">Nuevo archivo</a>
                    </div>
                
                    <div class="card-body">

                        <input type="text" placeholder="Buscar.." class="form-control form-control-sm col-6 mb-3" wire:model="search">

                        @if(session('success') != null)
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                  </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($productos as $producto)
                                        <tr>
                                            <th>{{ $producto->id }}</th>
                                            <td>{{ $producto->nombre }}</td>
                                            <td>${{ $producto->precio }}</td>
                                            <td>{{ $producto->cantidad }}</td>
                                        </tr>
                                    @endforeach --}}
                                  
                                </tbody>
                              </table>
                              {{-- {{ $productos->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
