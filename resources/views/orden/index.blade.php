@extends('layouts.master')
@section('content')



<div class="container-fluid">

<div class="card">
  <div class="card-body">

<form class="form-inline">
	  <div class="form-group mb-2">
      <h3 class="card-title">Órdenes</h3>
	</div>


</form>

          <div class="table-responsive">
            <table id="mytable" class="table table-striped">
             <thead>
               <th>Id</th>    
               <th>Id Ppto.</th>   
               <th>Cliente</th>    
               <th>Estado</th>                                
               <th>Fecha Alta</th>    
               <th>Fecha Prometida</th>    
               <th>Fecha Finalizada</th>                      
               <th>Ver</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($ordenes->count())  
              @foreach($ordenes as $orden)  
              <tr>
                <td>{{$orden->id_orden}}</td>                      
                <td>{{$orden->id_presupuesto}}</td>
                <td>{{$orden->razon_social}}</td>        
                <td>{{$orden->descripcion_estado}}</td>                           
                <td>{{$orden->fecha_inicio_orden}}</td>
                <td>{{$orden->fecha_prom_orden}}</td>
                <td>{{$orden->fecha_cierre_orden}}</td>  


                <td><a class="btn btn-info btn-xs" href="{{action('OrdenController@show', $orden->id_orden)}}" ><span class="fas fa-eye"></span></a></td>
                <td>

                   <button type= "button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter-{{$orden->id_orden}}"><span class="far fa-trash-alt"></span></button>


          <!-- Modal -->


            <div class="modal fade" id="exampleModalCenter-{{$orden->id_orden}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalCenterTitle">¡Atención!</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                     <div class="modal-body"> Se va a Eliminar el Registro. Esta acción no se puede deshacer
                      </div>
                        <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                <form action="{{action('OrdenController@destroy', $orden->id_orden)}}" method="post">
                         {{csrf_field()}}
                         <input name="_method" type="hidden" value="DELETE">

               <button type="submit" class="btn btn-danger">Eliminar registro</button>


           </div>

             </form>
                         
          </div>
       </div> 
	

                 </td>

               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
 <!--       </div> -->
      </div>

   <!-- </div> -->
  </div>


</section>


<!-- </div> -->
</div>
</div>


@endsection