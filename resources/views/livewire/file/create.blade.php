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

                <div class="form-group mb-3">
                  @error('files.*') <span class="text-danger">{{ $message }}</span> @enderror
                  <input class="form-control" wire:model="files" type="file" id="formFile" multiple>

                  @if($files)
                    <h3 class="mt-2">Previsualización de imagen</h3>
                    @foreach ($files as $file)
                      
                        @if($file->extension() != 'pdf')
                          <img src="{{ asset($file->temporaryUrl()) }}" alt="" width="200" height="200" class="img-fluid">
                          {{-- <span>Imagen {{ $file->hashName() }}</span> --}}
                        @endif
                      
                    @endforeach
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
