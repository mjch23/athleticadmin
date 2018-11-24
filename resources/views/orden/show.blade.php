@extends('layouts.master')
@section('content')


<div class="container-fluid">


<div class="card">
  <div class="card-body">


    <div class="form-group row">


      <div class="col-md-6 mb-3">

  <label for="validationDefault05">Cliente</label> 
        @foreach($cliente as $clientes)
          <input class="form-control" type="text" id="razon_social" name="razon_social" readonly value="{{$clientes->razon_social}}" />
         @endforeach
     </div>


        <div class="col-md-3 mb-3">

                <label for="validationDefaultUsername">Orden de Trabajo Nro:</label>
                <input class="form-control" type="text" id="id_orden" name="id_orden" readonly value="{{$presupuestos->id_orden}}" />

        </div>

            <div class="col-md-3 mb-3">

                 <label for="validationDefaultUsername">Número de Presupuesto</label>
                <input class="form-control" type="text" id="id_presupuesto" name="id_presupuesto" readonly value="{{$presupuestos->id_presupuesto}}" />

            </div>

      </div>

                 <div class="form-group row add">

                     <div class="col-md-3 mb-3">


                 <label for="validationDefaultUsername">Fecha Orden</label>
                <input class="form-control" type="text" id="fecha_orden" name="fecha_orden" readonly value="{{$orden->fecha_inicio_orden}}" />

                     </div>

                        <div class="col-md-3 mb-3">

                 <label for="validationDefaultUsername">Fecha Prometida</label>
                <input class="form-control" type="text" id="fecha_prometida" name="fecha_prometida" readonly value="{{$orden->fecha_prom_orden}}" />

                        </div> 

                            <div class="col-md-3 mb-3">
                 <label for="validationDefaultUsername">Fecha de Cierre</label>
                <input class="form-control" type="text" id="fecha_cierre" name="fecha_cierre" readonly value="{{$orden->fecha_cierre_orden}}" />
                            </div>

    

                                  <div class="col-md-3 mb-3">
                 <label for="validationDefaultUsername">Estado de Orden</label>
                <input class="form-control" type="text" id="estado_orden" name="estado_orden" readonly value="{{$estado->descripcion_estado}}" />
                                  </div>


                  </div>


        </div>
 
</div>

    <hr />
           {{ csrf_field() }}

 <div class="card">
  <div class="card-body">

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

          @foreach($data as $item)

          @if($presupuestos->id_presupuesto==$item->id_presupuesto)

          <tr class="item{{$item->id_pp}}">
            <td>{{$item->id_pp}}</td>
            <td>{{$item->nombre_actividad}}</td>            
            <td>{{$item->nombre_producto}}</td>
            <td>{{$item->cantidad_pp}}</td>
            <td>$ {{$item->precio_unitario_pp}}</td>
            <td>$ {{$item->precio_total_pp}}</td>                        
          </tr>
            @endif
          @endforeach
        </table>
      </div>
    </div>

</div>

    <hr />

 <div class="card">
  <div class="card-body">



<div class="row">



    <div class="col-6 col-md-4">

  <form method="POST" action="{{ route('orden.update', $orden->id_orden) }}"  role="form">
             {{ csrf_field() }}

            <label for="validationDefaultUsername">Fecha Prometida</label>
         <!--   <button class="btn btn-danger" id="btn-archive" type="submit">
            <span class="far fa-trash-alt"></span> Archivar -->
                <input id="datepicker" name="datepicker" width="145" required/>

  </div>


    <div class="col-6 col-md-2">


            <label for="validationDefaultUsername">A Producción</label>

            @if($orden->fecha_prom_orden!=NULL)

            <button class="btn btn-secondary"  type="submit" disabled>
            <span class="fas fa-arrow-circle-up"></span> Enviar

            @else

            <button class="btn btn-success"  id="btn-enviar" type="submit">
            <span class="fas fa-arrow-circle-up"></span> Enviar


            @endif



    </div>

</form>

    <div class="col-6 col-md-4">
      
               <label for="validationDefaultUsername">Total sin IVA</label>
                <input class="form-control" type="text" id="precio_presupuesto" name="precio_presupuesto" readonly value="{{$precio_presupuesto}}" />

    </div>


        <div class="col-6 col-md-2">



<form method="GET" action="{{ route('report.generar', $presupuestos->id_presupuesto) }}" target="_blank" role="form">
           {{ csrf_field() }}

       <label for="validationDefaultUsername">Exportar a PDF</label>
                <input class="form-control" type="text" id="valor_p" name="valor_p" readonly value="{{$presupuestos->id_presupuesto}}" hidden/>   
                <input class="form-control" type="text" id="valor_rs" name="valor_rs" readonly value="{{$clientes->razon_social}}" hidden/>    
                <input class="form-control" type="text" id="valor_psp" name="valor_psp" readonly value="{{$precio_presupuesto}}" hidden/>
                <input class="form-control" type="text" id="origen" name="origen" readonly value="orden" hidden/>
        
            <button class="btn btn-info"  type="submit" > Exportar
       
            <span class="fas fa-file-pdf"></span>
    </div>

</form>
 
</div>



</div>

</div>

 <hr />

</div>


   <!-- Modal Orden-->


            <div class="modal fade" id="exampleModalCenter-{{$presupuestos->id_presupuesto}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalCenterTitle">¡Atención!</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                     <div class="modal-body"> Se va a convertir el Presupuesto a Orden de Trabajo. El Presupuesto ya no se podrá modificar, aunque si se podrá seguir imprimiendo.
                      </div>
                        <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

  <form method="GET" action="{{ route('orden.create', $presupuestos->id_presupuesto) }}"  role="form">
             {{ csrf_field() }}

            <input class="form-control" type="text" id="id_presupuesto" name="id_presupuesto" readonly value="{{$presupuestos->id_presupuesto}}" hidden/>  

               <button type="submit" class="btn btn-info">Convertir a Orden</button>


           </div>

             </form>
                         
          </div>
       </div> 


    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'

        });
    </script>



@endsection