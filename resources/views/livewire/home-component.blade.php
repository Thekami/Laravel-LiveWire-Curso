<div>
    <div class="row">
        <div class="col-md-12">
            {{ $mensaje }}
        </div>
    </div>

    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-3">
            <input type="text" class="form-control" wire:model="mensaje"> {{-- Enlaza la propiedad al elemento html en evento keyup --}}
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" wire:model.lazy="mensaje"> {{-- Lo mismo pero en evento change --}}
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" wire:model.debounce.1s="mensaje"> {{-- Lo mismo pero con restraso programado --}}
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" wire:model.defer="mensaje"> {{-- Lo mismo pero con accionado por un botón --}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3>{{ $contador }}</h3>
        </div>
        <div class="col-md-12">
            <button class="btn btn-sm btn-success" wire:click="add(1)">Sumar</button>
        </div>
        
        
    </div>

    
</div>