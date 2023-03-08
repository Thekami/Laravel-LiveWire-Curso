<div>
  <div class="card">
    <div class="card-header">
      <h4>{{ $title }}</h4>
    </div>

    <div class="card-body">

      
      <button type="submit" class="btn btn-success" wire:click="$emitTo('modal-eventos-component', 'display-modal')">Mostrar modal</button>
      
      <div class="row" style="margin-bottom: 20px">

        <form wire:submit.prevent="save">
          <h3>Formulario 1</h3>
          <label for="">Nombre</label>
          <input type="text" wire:model="nombre" class="form-control">

          <label for="" class="mt-3">Email</label>
          <input type="text" wire:model="email" class="form-control mb-3">

          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

      </div>

      <hr>

      <div class="row" style="margin-bottom: 20px">

        <form wire:submit.prevent="save2">
          <h3>Formulario 2</h3>
          <label for="">Nombre</label>
          <input type="text" wire:model="nombre" class="form-control">

          <label for="" class="mt-3">Email</label>
          <input type="text" wire:model="email" class="form-control mb-3">

          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

      </div>

      <hr>

      <button type="submit" class="btn btn-success" wire:click="$emit('cargarUserInfo', {{ auth()->user()->id }})">Cargar info usuario</button>
      <button type="submit" class="btn btn-danger" wire:click="$emit('resetData')">Limpiar formularios</button>
    </div>
  </div>

  @livewire('modal-eventos-component')
</div>
