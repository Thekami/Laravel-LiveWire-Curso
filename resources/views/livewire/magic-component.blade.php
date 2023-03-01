<div>
    <div class="card">
        <div class="card-header"><h4>{{ $title }}</h4></div>
    
        <div class="card-body">
            <div class="row" style="margin-bottom: 20px">
                
                <div class="row">
                    <div class="col-auto">
                        <input type="text" class="form-control" value="{{ $mensaje }}">
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
                        <button class="btn btn-primary mb-3" value="{{ $mensaje }}" wire:click="$set('mensaje', 'Mensaje seteado')">Establecer en 20</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
    
