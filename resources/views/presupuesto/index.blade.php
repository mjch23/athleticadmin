@extends('layouts.master')
@section('content')



<div class="container-fluid">

<div class="card">
  <div class="card-body">

<form class="form-inline">
	  <div class="form-group mb-2">
      <h3 class="card-title">Presupuestos</h3>
	</div>

	  <div class="form-group mx-sm-3 mb-2">
            <div class="btn-group">
              <a href="{{ route('presupuesto.create') }}" class="btn btn-info" >Nuevo Presupuesto</a>
            </div>
      </div>


</form>

          <div class="table-responsive">
            <table id="mytable" class="table table-striped">
             <thead>
               <th>Id</th>    
               <th>Razón Social</th>   
               <th>Fecha</th>    
               <th>Vigente</th>    
               <th>Aprobado</th>    
               <th>Monto</th>                     
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($presupuestos->count())  
              @foreach($presupuestos as $presupuesto)  
              <tr>
                <td>{{$presupuesto->id_presupuesto}}</td>         
                <td>{{$presupuesto->razon_social}}</td>
                <td>{{$presupuesto->fecha_presupuesto}}</td>

                <td>@if($presupuesto->anulada_presupuesto == 0)
                    <h2><span class="fas fa-check-square text-success"></span></h2>
                    @else
                    <h2><span class="fas fa-window-close text-danger"></span></h2>
                    @endif
                </td>

                <td>@if($presupuesto->aprobada_presupuesto == 1)
                    <h2><span class="fas fa-check-square text-success"></span></h2>
                    @else
                    <h2><span class="fas fa-window-close text-danger"></span></h2>
                    @endif
                </td>

                <td>$ {{$presupuesto->precio_presupuesto}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('PresupuestoController@edit', $presupuesto->id_presupuesto)}}" ><span class="fas fa-user-edit"></span></a></td>
                <td>


                   <button type= "button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter-{{$presupuesto->id_presupuesto}}"><span class="far fa-trash-alt"></span></button>


          <!-- Modal -->


            <div class="modal fade" id="exampleModalCenter-{{$presupuesto->id_presupuesto}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

                <form action="{{action('PresupuestoController@destroy', $presupuesto->id_presupuesto)}}" method="post">
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