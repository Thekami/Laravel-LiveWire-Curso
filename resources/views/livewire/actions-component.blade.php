<div>
    <div class="card">
        <div class="card-header"><h4>{{ $title }}</h4></div>
    
        <div class="card-body">
            <div class="row" style="margin-bottom: 20px">
                <form class="row" wire:submit.prevent="store">
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
            </div>
        </div>
    </div>
</div>
