@extends('layouts.master')
@section('content')

<div class="container">

<!-- Contenedor General -->

<div class="card">
  <div class="card-body">

  <div class="row">
  	<div class="col-sm">
    <h6 class="card-title">Datos del Cliente</h6>
  </div>
  </div>

  <div class="row">
    <div class="col-sm">
	Razón Social: {{$clientes->razon_social}}	
    </div>
    <div class="col-sm">
	Club: {{$clientes->club}}	
    </div>
    <div class="col-sm">
     CUIT: {{$clientes->cuit}}
  </div>
</div>

  <div class="row">
    <div class="col-sm">
	Dirección: {{$clientes->direccion}}	
    </div>
    <div class="col-sm">
	Localidad: {{$clientes->localidad}}	
    </div>
    <div class="col-sm">
    Provincia: {{$clientes->provincia}}
  </div>

</div>
  <div class="row">
     <div class="col-sm">
    País: {{$clientes->pais}}
  </div>
  </div>

</div>
</div>


<div class="card">
  <div class="card-body">

  <div class="row">
  	<div class="col-sm">
    <h6 class="card-title">Datos de Contacto</h6>
  </div>
  </div>

  <div class="row">
    <div class="col-sm">
	Apellido: {{$clientes->apellidos}}	
    </div>
    <div class="col-sm">
	Nombres: {{$clientes->nombres}}	
    </div>
    <div class="col-sm">
    DNI: {{$clientes->dni}}
  </div>
</div>

  <div class="row">
    <div class="col-sm">
	Teléfono: {{$clientes->telefono}}	
    </div>
    <div class="col-sm">
	Celular: {{$clientes->celular1}}	
    </div>
    <div class="col-sm">
    Celular Alternativo: {{$clientes->celular2}}
  </div>
</div>

  <div class="row">
    <div class="col-sm">
	Email: {{$clientes->email}}	
    </div>
    <div class="col-sm">
	Observaciones: {{$clientes->observaciones}}	
    </div>
</div>

</div>
</div>

<div class="card">
  <div class="card-body">
   <h5 class="card-title">Presupuestos</h5>

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
               <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-exclamation-triangle text-danger"></i>   Atención!</h5>
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

</div>
</div>

<!-- Fin Contenedor General -->

</div>

@endsection