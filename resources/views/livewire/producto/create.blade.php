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
                  <label for="">Precio</label>
                  <span class="text-danger">*</span>
                  @error('precio') <span class="text-danger">{{ $message }}</span> @enderror
                  <input type="text" wire:model="precio" class="form-control mb-2">
                </div>

                <div class="form-group">
                  <label for="">Cantidad</label>
                  <span class="text-danger">*</span>
                  @error('cantidad') <span class="text-danger">{{ $message }}</span> @enderror
                  <input type="text" wire:model="cantidad" class="form-control mb-2">
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
