@extends('layouts.master')
@section('content')

<div class="container">

<!-- Contenedor General -->

<div class="card">
  <div class="card-body">

  <div class="row">
  	<div class="col-sm">
    <h6 class="card-title">Datos del Proveedor</h6>
  </div>
  </div>

  <div class="row">
    <div class="col-sm">
	Razón Social: {{$proveedores->razon_social}}	
    </div>
    <div class="col-sm">
     CUIT: {{$proveedores->cuit}}
  </div>
</div>

  <div class="row">
    <div class="col-sm">
	Dirección: {{$proveedores->direccion}}	
    </div>
    <div class="col-sm">
	Localidad: {{$proveedores->localidad}}	
    </div>
    <div class="col-sm">
    Provincia: {{$proveedores->provincia}}
  </div>

</div>
  <div class="row">
     <div class="col-sm">
    País: {{$proveedores->pais}}
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
	Apellido: {{$proveedores->apellidos}}	
    </div>
    <div class="col-sm">
	Nombres: {{$proveedores->nombres}}	
    </div>
    <div class="col-sm">
    DNI: {{$proveedores->dni}}
  </div>
</div>

  <div class="row">
    <div class="col-sm">
	Teléfono: {{$proveedores->telefono}}	
    </div>
    <div class="col-sm">
	Celular: {{$proveedores->celular1}}	
    </div>
    <div class="col-sm">
    Celular Alternativo: {{$proveedores->celular2}}
  </div>
</div>

  <div class="row">
    <div class="col-sm">
	Email: {{$proveedores->email}}	
    </div>
    <div class="col-sm">
	Observaciones: {{$proveedores->observaciones}}	
    </div>
</div>

</div>
</div>

<div class="card">
  <div class="card-body">

<form class="form-inline method="POST" action="{{ route('cuentabancaria.create') }}"  role="form">
              {{ csrf_field() }}

    <div class="form-group mb-2">
      <h5 class="card-title">Cuentas Bancarias</h5>
  </div>

    <input class="text" name="id_proveedor" id="id_proveedor" value="{{$proveedores->id_proveedor}}" hidden>

    <div class="form-group mx-sm-3 mb-2">
            <div class="btn-group">
              <button class="btn btn-info" type="submit" >Agregar Cuenta</button>
            </div>
      </div>

</form>

          <div class="table-responsive">
            <table id="mytable" class="table table-striped">
             <thead>
               <th>Banco</th>    
               <th>CBU</th>
               <th>Alias</th>
               <th>Observaciones</th>      
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($cuentabancaria->count())  
              @foreach($cuentabancaria as $item)  
              <tr>
                <td>{{$item->banco}}</td>
                <td>{{$item->cbu}}</td>
                <td>{{$item->alias}}</td>
                <td>{{$item->observaciones}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('CuentaBancariaController@edit', $item->id_cuenta)}}" ><span class="fas fa-user-edit"></span></a></td>
                <td>


                   <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModalCenter-{{$item->id_cuenta}}"><span class="far fa-trash-alt"></span></button>

          <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter-{{$item->id_cuenta}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-exclamation-triangle text-danger"></i>   Atención!</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                     <div class="modal-body"> Se va a Eliminar el Registro {{$item->banco}}. Esta acción no se puede deshacer
                      </div>
                        <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

              <form action="{{action('CuentaBancariaController@destroy', $item->id_cuenta)}}" method="post">
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

<!-- Fin Contenedor General -->

</div>

@endsection


