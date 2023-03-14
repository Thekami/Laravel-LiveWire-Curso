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

                <div class="mb-3">
                  @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                  <input class="form-control" wire:model="file" type="file" id="formFile">
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
