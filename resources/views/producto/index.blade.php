@extends('layouts.master')
@section('content')



<div class="container-fluid">

<div class="card">
  <div class="card-body">

<form class="form-inline">
	  <div class="form-group mb-2">
      <h3 class="card-title">Productos</h3>
	</div>

	  <div class="form-group mx-sm-3 mb-2">
            <div class="btn-group">
              <a href="{{ route('producto.create') }}" class="btn btn-info" >Nuevo Producto</a>
            </div>
      </div>

</form>

          <div class="table-responsive">
            <table id="mytable" class="table table-striped">
             <thead>
               <th>Id</th>    
               <th>Producto</th>   
               <th>Actividad</th>                
               <th>¿Activo?</th>  
               <th>¿Confeccionado?</th>  
               <th>Precio</th>              
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($productos->count())  
              @foreach($productos as $producto)  
              <tr>
                <td>{{$producto->id_producto}}</td>
                <td>{{$producto->nombre_producto}}</td>
                <td>{{$producto->nombre_actividad}}</td>                
                <td>@if($producto->activo_producto == 1)
                    <h2><span class="fas fa-check-square text-success"></span></h2>
                    @else
                    <h2><span class="fas fa-window-close text-danger"></span></h2>
                    @endif
                </td>
                <td>@if($producto->confecciona_producto == 1)
                    <h6>Sí</h6>
                    @else
                    <h6>No</h6>
                    @endif
                </td>

                <td><h6>$ {{$producto->precio_producto}}</h6></td>
                <td><a class="btn btn-primary btn-xs" href="{{action('ProductoController@edit', $producto->id_producto)}}" ><span class="fas fa-user-edit"></span></a></td>
                <td>


                   <button type= "button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter-{{$producto->id_producto}}"><span class="far fa-trash-alt"></span></button>

					<!-- Modal -->


						<div class="modal fade" id="exampleModalCenter-{{$producto->id_producto}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 							 <div class="modal-dialog modal-dialog-centered" role="document">
   								 <div class="modal-content">
     								 <div class="modal-header">
       									 <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-exclamation-triangle text-danger"></i>		Atención!</h5>
     									   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        								  <span aria-hidden="true">&times;</span>
   									     </button>
   									   </div>
   								   <div class="modal-body"> Se va a Eliminar el Registro. Esta acción no se puede deshacer
    								  </div>
      									<div class="modal-footer">
       								 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                <form action="{{action('ProductoController@destroy', $producto->id_producto)}}" method="post">
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

      {{ $productos->links() }}

</section>


<!-- </div> -->
</div>
</div>



@endsection