<div>

    <div class="row" style="margin-bottom: 20px">
        <h3>Propiedades y Data Binding</h3>
        <div class="col-md-12">
            {{ $mensaje }}
        </div>
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

    <hr>

    <form class="row" wire:submit.prevent="store">
        <h3>Actions</h3>
        <div class="col-auto">
            <input type="text" class="form-control" value="{{ $contador }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Establecer en 20</button>
        </div>
    </form>

    <div class="col-md-12">
        <button class="btn btn-sm btn-success" wire:click="add(1)">Sumar</button>
    </div>

    <hr>

    <div class="row">
        <h3>Magic actions y Eventos</h3>
        <div class="col-auto">
            <input type="text" class="form-control" value="{{ $mensaje2 }}">
        </div>
        <div class="col-auto">
            <select class="form-control" wire:change="changeSelect($event.target.value)">
                <option value="Mensaje 1">Mensaje 1</option>
                <option value="Mensaje 2">Mensaje 2</option>
                <option value="Mensaje 3">Mensaje 3</option>
                <option value="Mensaje 4">Mensaje 4</option>
                <option value="Mensaje 5">Mensaje 5</option>
            </select>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary mb-3" value="{{ $mensaje2 }}" wire:click="$set('mensaje2', 'Mensaje seteado')">Establecer en 20</button>
        </div>
    </div>

    <hr>

    <div class="row">
        <h3>Compomente anidados</h3>
        <div class="col-auto">
            <p>Listo personas desde base de datos en el HomeComponent (componente padre)</p>
            <ul>
                @foreach ($personas as $persona)
                    <li>{{ $persona['nombres'] }}</li>
                @endforeach
            </ul>
        </div>

        <p style="margin-bottom: 0px;">A continuación se incluirá un segundo componente el cual se generá <i>n</i> cantidad de veces según la cantidad de personas en la tabla </p>

        <div class="row row-cols-1 row-cols-md-2 g-4" style="margin-top: 0px;">
            @foreach ($personas as $item)
                @livewire('child-component', ['persona' => $item], key($item->id))
            @endforeach
        </div>
    </div>
        
    

    
</div>