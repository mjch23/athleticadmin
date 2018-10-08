@extends('layouts.master')
@section('content')

<div class="container-fluid">

<div class="card">
  <div class="card-body">
  	    <h5 class="card-title">Nuevo Producto</h5>

<form method="POST" action="{{ route('producto.store') }}"  role="form">
              {{ csrf_field() }}

 <!-- form row -->

    <div class="form-row">

    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Producto</label>
      <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
    </div>

     <div class="col-md-4 mb-3">
      <label for="validationDefault03">¿Confecciona Athletic?</label>

     <select class="custom-select" id="confecciona_producto" name="confecciona_producto" required>
 			 <option value="1">Sí</option>
 			 <option value="0">No</option>
	</select>
    </div>

	</div>

	<div class="form-row">

     <div class="col-md-4 mb-3">
      <label for="validationDefault05">Actividad</label> 


     <select class="custom-select" id="nombre_actividad" name="nombre_actividad" required>
     	@foreach($actividades as $actividad)
 			 <option value="{{$actividad->nombre_actividad}}">{{$actividad->nombre_actividad}}</option>
 		@endforeach

	</select>
    </div>

     <div class="col-md-4 mb-3">
      <label for="validationDefault04">Precio</label>
      <input type="text" class="form-control" id="precio_producto" name="precio_producto" required>
    </div>

  </div>

  <!-- fin form row -->



  <button class="btn btn-primary" type="submit">Grabar</button>


</form>

</div>


</div>


</div>

      <script src="{{ asset('js/app.js') }}"></script>

@endsection