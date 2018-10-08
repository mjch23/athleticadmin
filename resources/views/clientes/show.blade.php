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
   <h5 class="card-title">Órdenes de Trabajo</h5>

</div>
</div>

<!-- Fin Contenedor General -->

</div>

@endsection