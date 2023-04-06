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
  
                <form wire:submit.prevent="save">
                  <div class="form-group">
                    <label for="">Nombre </label>
                    <span class="text-danger">*</span>
                    @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" wire:model="nombre" class="form-control mb-2">
                  </div>
  
                  <div class="form-group">
                    <label for="">Codigo</label>
                    <span class="text-danger">*</span>
                    @error('codigo') <span class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" wire:model="codigo" class="form-control mb-2">
                  </div>
  
                  <div class="form-group">
                    <label for="">Salario</label>
                    <span class="text-danger">*</span>
                    @error('salario') <span class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" wire:model="salario" class="form-control mb-2">
                  </div>

                  <div class="form-group">
                    <label for="">Dirección</label>
                    <span class="text-danger">*</span>
                    @error('direccion') <span class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" wire:model="direccion" class="form-control mb-2">
                  </div>
  
                  <div class="form-group">
                    <label for="">Telefono</label>
                    <span class="text-danger">*</span>
                    @error('telefono') <span class="text-danger">{{ $message }}</span> @enderror
                    <input type="text" wire:model="telefono" class="form-control mb-2">
                  </div>

                  <div class="form-group">
                    <label for="">Foto</label>
                    <span class="text-danger">*</span>
                    @error('foto') <span class="text-danger">{{ $message }}</span> @enderror
                  <input class="form-control" wire:model="foto" type="file" id="formFile" >
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
  <script></script>
  @endsection
  