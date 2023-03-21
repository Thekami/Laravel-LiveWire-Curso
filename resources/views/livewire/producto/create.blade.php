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

                <div class="form-group mb-2" >
                  <label for="">Categoria</label>
                  <span class="text-danger">*</span>
                  @error('categoria') <span class="text-danger">{{ $message }}</span> @enderror
                  <select id="select_categoria" wire:model="categoria" class="form-control select2">
                    <option>Selecciona una categoria</option>
                    @foreach ($categorias as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                    @endforeach
                  </select>
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
<script>
  $(document).ready(function() {
    $('.select2').select2();
  })

  $(document).on('change', '.select2', function(e){
    @this.set('categoria',$(this).val())

  });

</script>
@endsection
