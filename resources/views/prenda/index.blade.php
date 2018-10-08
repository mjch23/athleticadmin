@extends('layouts.master')
@section('content')



<div class="container-fluid">

<div class="card">
  <div class="card-body">

<form class="form-inline">
	  <div class="form-group mb-2">
      <h3 class="card-title">Prendas</h3>
	</div>

	  <div class="form-group mx-sm-3 mb-2">
            <div class="btn-group">
              <a href="{{ route('prenda.create') }}" class="btn btn-info" >Nueva Prenda</a>
            </div>
      </div>

</form>

          <div class="table-responsive">
            <table id="mytable" class="table table-striped">
             <thead>
               <th>Id</th>    
               <th>Prenda</th>     
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($prendas->count())  
              @foreach($prendas as $prenda)  
              <tr>
                <td>{{$prenda->id_prenda}}</td>
                <td>{{$prenda->nombre_prenda}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('PrendaController@edit', $prenda->id_prenda)}}" ><span class="fas fa-user-edit"></span></a></td>
                <td>


                   <button type= "button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter-{{$prenda->id_prenda}}"><span class="far fa-trash-alt"></span></button>

					<!-- Modal -->


						<div class="modal fade" id="exampleModalCenter-{{$prenda->id_prenda}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

                <form action="{{action('PrendaController@destroy', $prenda->id_prenda)}}" method="post">
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