

<div class="card">
  <div class="card-body">

    <h3>{{$razon_social}}</h3>

      <div class="table-responsive text-center">
        <table class="table table-striped" id="table">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Actividad</th>              
              <th class="text-center">Producto</th>
              <th class="text-center">Cantidad</th>
              <th class="text-center">Precio Unitario</th>
              <th class="text-center">Precio Total</th>               
            </tr>
          </thead>

          @if($data->count())  
          @foreach($data as $item)

          <tr>
            <td>{{$item->id_pp}}</td>
            <td>{{$item->nombre_actividad}}</td>            
            <td>{{$item->nombre_producto}}</td>
            <td>{{$item->cantidad_pp}}</td>
            <td>$ {{$item->precio_unitario_pp}}</td>
            <td>$ {{$item->precio_total_pp}}</td>                        
          </tr>

          @endforeach
          @endif
        </table>
      </div>
     <h3>Precio Total: $ {{$precio_total}}</h3>

    </div>

</div>



