@extends('layouts.master')
@section('content')

<div class="container-fluid">

<div class="card">
  <div class="card-body">

<form method="POST" action="{{ route('linea.update', $lineas->id_linea) }}"  role="form">
              {{ csrf_field() }}

    <div class="form-row">

    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Nombre de la Línea</label>
      <input type="text" class="form-control" id="nombre_linea" name="nombre_linea" value="{{$lineas->nombre_linea}}" required>
    </div>

     <div class="col-md-4 mb-3">
      <label for="validationDefault02">¿Activo?</label>

     <select class="custom-select" id="activo_linea" name="activo_linea" value="{{$lineas->activo_linea}}">
 			 <option value="1">Activo</option>
 			 <option value="0">Inactivo</option>
	</select>
<!--      <input type="checkbox" class="form-control" id="activo_linea" name="activo_linea" value="{{$lineas->activo_linea}}" required> -->
    </div>

  </div>

  <button class="btn btn-primary" type="submit">Actualizar</button>
</form>

</div>
</div>


</div>

@endsection