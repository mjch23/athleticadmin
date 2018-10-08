@extends('layouts.master')
@section('content')

<div class="container-fluid">

<div class="card">
  <div class="card-body">

<form method="POST" action="{{ route('producto.update', $productos->id_producto) }}"  role="form">
              {{ csrf_field() }}

    <div class="form-row">

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Producto</label>
      <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="{{$productos->nombre_producto}}" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault05">Actividad (anterior: {{$productos->nombre_actividad}})</label> 

     <select class="custom-select" id="nombre_actividad" name="nombre_actividad" required>
     	@foreach($actividades as $actividad)
 			 <option value="{{$actividad->nombre_actividad}}">{{$actividad->nombre_actividad}}</option>
 		@endforeach

	</select>
    </div>

	</div>

	 <div class="form-row">

     <div class="col-md-4 mb-3">
      <label for="validationDefault02">¿Activo?</label>

     <select class="custom-select" id="activo_producto" name="activo_producto" value="{{$productos->activo_producto}}">
 			 <option value="1">Activo</option>
 			 <option value="0">Inactivo</option>
	</select>
    </div>

     <div class="col-md-4 mb-3">
      <label for="validationDefault03">¿Confecciona Athletic?</label>

     <select class="custom-select" id="confecciona_producto" name="confecciona_producto" value="{{$productos->confecciona_producto}}">
 			 <option value="1">Sí</option>
 			 <option value="0">No</option>
	</select>
    </div>
	</div>

	<div class="form-row">

     <div class="col-md-4 mb-3">
      <label for="validationDefault04">Precio</label>
      <input type="text" class="form-control" id="precio_producto" name="precio_producto" value="{{$productos->precio_producto}}" required>
    </div>

  </div>

  <button class="btn btn-primary" type="submit">Actualizar</button>
</form>

</div>
</div>


</div>

@endsection