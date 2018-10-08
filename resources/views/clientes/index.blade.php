@extends('layouts.master')
@section('content')

<div class="container-fluid">

<div class="card">
  <div class="card-body">

<form class="form-inline">
	  <div class="form-group mb-2">
      <h3 class="card-title">Clientes</h3>
	</div>

	  <div class="form-group mx-sm-3 mb-2">
            <div class="btn-group">
              <a href="{{ route('cliente.create') }}" class="btn btn-info" >Nuevo Cliente</a>
            </div>
      </div>

</form>

          <div class="table-responsive">
            <table id="mytable" class="table table-striped">
             <thead>
               <th>Ficha</th>    
               <th>Club</th>
               <th>Actividad</th>
               <th>Localidad</th>
               <th>Provincia</th>
               <th>Apellido</th>
               <th>Nombre</th>
               <th>Teléfono</th>
               <th>Celular</th>               
               <th>Obs.</th>         
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($clientes->count())  
              @foreach($clientes as $cliente)  
              <tr>
                <td><a class="btn btn-success btn-xs" href="{{action('ClienteController@show', $cliente->id)}}" ><span class="fas fa-id-card"></span></a></td>
                <td>{{$cliente->club}}</td>
                <td>{{$cliente->actividad}}</td>
                <td>{{$cliente->localidad}}</td>
                <td>{{$cliente->provincia}}</td>
                <td>{{$cliente->apellidos}}</td>
                <td>{{$cliente->nombres}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->celular1}}</td>
                <td>{{$cliente->observaciones}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('ClienteController@edit', $cliente->id)}}" ><span class="fas fa-user-edit"></span></a></td>
                <td>


                   <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter-{{$cliente->id}}"><span class="far fa-trash-alt"></span></button>

					<!-- Modal -->
						<div class="modal fade" id="exampleModalCenter-{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 							 <div class="modal-dialog modal-dialog-centered" role="document">
   								 <div class="modal-content">
     								 <div class="modal-header">
       									 <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-exclamation-triangle text-danger"></i>		Atención!</h5>
     									   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        								  <span aria-hidden="true">&times;</span>
   									     </button>
   									   </div>
   								   <div class="modal-body"> Se va a Eliminar el Registro {{$cliente->club}}. Esta acción no se puede deshacer
    								  </div>
      									<div class="modal-footer">
       								 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

       				<form action="{{action('ClienteController@destroy', $cliente->id)}}" method="post">
                			   {{csrf_field()}}
                			   <input name="_method" type="hidden" value="DELETE">

       				 <button type="submit" class="btn btn-danger">Eliminar registro</button>


     			 </div>

       			 </form>
       			      			 
  			  </div>
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