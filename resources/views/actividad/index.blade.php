@extends('layouts.master')
@section('content')



<div class="container-fluid">

<div class="card">
  <div class="card-body">

<form class="form-inline">
	  <div class="form-group mb-2">
      <h3 class="card-title">Actividades</h3>
	</div>

	  <div class="form-group mx-sm-3 mb-2">
            <div class="btn-group">
              <a href="{{ route('actividad.create') }}" class="btn btn-info" >Nueva Actividad</a>
            </div>
      </div>

</form>

          <div class="table-responsive">
            <table id="mytable" class="table table-striped">
             <thead>
               <th>Id</th>    
               <th>Actividad</th>     
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($actividades->count())  
              @foreach($actividades as $actividad)  
              <tr>
                <td>{{$actividad->id_actividad}}</td>
                <td>{{$actividad->nombre_actividad}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('ActividadController@edit', $actividad->id_actividad)}}" ><span class="fas fa-user-edit"></span></a></td>
                <td>


                   <button type= "button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter-{{$actividad->id_actividad}}"><span class="far fa-trash-alt"></span></button>

                   <!-- finalmente funcionó el paso de parámetros al modal usando data-target="#exampleModalCenter-{{$actividad->id_actividad}} en el botón y en el modal -->

					<!-- Modal -->


						<div class="modal fade" id="exampleModalCenter-{{$actividad->id_actividad}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

                <form action="{{action('ActividadController@destroy', $actividad->id_actividad)}}" method="post">
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