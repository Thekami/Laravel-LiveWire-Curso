<div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-edit" wire:submit.prevent="edit">
              <div class="modal-body">
                
                  <div class="form-group">
                    <label for="">Nombre </label>
                    <span class="text-danger">*</span>
                    @if($errors->has('empleado.nombre'))<span class="text-danger">{{ $errors->first('empleado.nombre') }}</span> @endif
                    <input type="text" wire:model.lazy="empleado.nombre" class="form-control mb-2">
                  </div>
    
                  <div class="form-group">
                    <label for="">Codigo</label>
                    <span class="text-danger">*</span>
                    {{-- @error('empleado.codigo') <span class="text-danger">{{ $message }}</span> @enderror --}}
                    @if($errors->has('empleado.codigo'))<span class="text-danger">{{ $errors->first('empleado.codigo') }}</span> @endif
                    <input type="text" wire:model.lazy="empleado.codigo" class="form-control mb-2">
                  </div>
    
                  <div class="form-group">
                    <label for="">Salario</label>
                    <span class="text-danger">*</span>
                    {{-- @error('empleado.salario') <span class="text-danger">{{ $message }}</span> @enderror --}}
                    @if($errors->has('empleado.salario'))<span class="text-danger">{{ $errors->first('empleado.salario') }}</span> @endif
                    <input type="text" wire:model.lazy="empleado.salario" class="form-control mb-2">
                  </div>
    
                  <div class="form-group">
                    <label for="">Dirección</label>
                    <span class="text-danger">*</span>
                    {{-- @error('empleado.direccion') <span class="text-danger">{{ $message }}</span> @enderror --}}
                    @if($errors->has('empleado.direccion'))<span class="text-danger">{{ $errors->first('empleado.direccion') }}</span> @endif
                    <input type="text" wire:model.lazy="empleado.direccion" class="form-control mb-2">
                  </div>
    
                  <div class="form-group">
                    <label for="">Telefono</label>
                    <span class="text-danger">*</span>
                    {{-- @error('empleado.telefono') <span class="text-danger">{{ $message }}</span> @enderror --}}
                    @if($errors->has('empleado.telefono'))<span class="text-danger">{{ $errors->first('empleado.telefono') }}</span> @endif
                    <input type="text" wire:model.lazy="empleado.telefono" class="form-control mb-2">
                  </div>
    
                  <div class="form-group">
                    <label for="">Foto</label>
                    <span class="text-danger">*</span>
                    {{-- @error('foto') <span class="text-danger">{{ $message }}</span> @enderror --}}
                    @if($errors->has('foto'))<span class="text-danger">{{ $errors->first('foto') }}</span> @endif
                  <input class="form-control" wire:model="foto" type="file" id="formFile" >
                  </div>
    
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    
</div>
