<div>

    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $persona->nombres." ".$persona->apellido1." ".$persona->apellido2 }}</h5>
                <ul>
                    <li>Origen: {{ $persona->origen }}</li>
                    <li>Edad: {{ $persona->edad }}</li>
                    <li>Hora actual: {{ now() }}</li>
                </ul>
                {{-- <p class="card-text">Edad: {{ $persona['edad'] }}</p> --}}
                <a class="btn btn-primary" wire:click="$refresh">Refresh hora</a>
            </div>
        </div>
    </div>
    
</div>
