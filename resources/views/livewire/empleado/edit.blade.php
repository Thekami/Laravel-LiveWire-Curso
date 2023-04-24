<div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4>{{ $title }}</h4>
            </div>
  
            <div class="card-body">
              <div class="row" style="margin-bottom: 20px">
  
                <form wire:submit.prevent="edit">
                  <div class="form-group">
                    <label for="">Nombre </label>
                    <span class="text-danger">*</span>
                    @error('empleado.nombre') <span class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" wire:model.lazy="empleado.nombre" class="form-control mb-2">
                  </div>
  
                  <div class="form-group">
                    <label for="">Codigo</label>
                    <span class="text-danger">*</span>
                    @error('empleado.codigo') <span class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" wire:model.lazy="empleado.codigo" class="form-control mb-2">
                  </div>
  
                  <div class="form-group">
                    <label for="">Salario</label>
                    <span class="text-danger">*</span>
                    @error('empleado.salario') <span class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" wire:model.lazy="empleado.salario" class="form-control mb-2">
                  </div>
  
                  <div class="form-group">
                    <label for="">Dirección</label>
                    <span class="text-danger">*</span>
                    @error('empleado.direccion') <span class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" wire:model.lazy="empleado.direccion" class="form-control mb-2">
                  </div>
  
                  <div class="form-group">
                    <label for="">Telefono</label>
                    <span class="text-danger">*</span>
                    @error('empleado.telefono') <span class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" wire:model.lazy="empleado.telefono" class="form-control mb-2">
                  </div>
  
                  <div class="form-group">
                    <label for="">Foto</label>
                    <span class="text-danger">*</span>
                    @error('foto') <span class="text-danger">{{ $message }}</span> @enderror
                    <input class="form-control" wire:model="foto" type="file" id="formFile" >
                    @if($foto)
                      <img src="{{ asset($foto->temporaryUrl()) }}" width="50px" height="50px" alt="">
                    @else
                      <img src="{{ asset($empleado->foto) }}" width="50px" height="50px" alt="">
                    @endif
                  </div>
  
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  @section('scripts')
  
  @endsection
  