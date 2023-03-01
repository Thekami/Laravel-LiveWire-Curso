<div>
    <div class="card">
        <div class="card-header"><h4>{{ $title }}</h4></div>
    
        <div class="card-body">
            <div class="row" style="margin-bottom: 20px">
                
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
    </div>
</div>
    
