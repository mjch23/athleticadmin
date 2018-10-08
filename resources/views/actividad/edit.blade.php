@extends('layouts.master')
@section('content')

<div class="container-fluid">

<div class="card">
  <div class="card-body">

<form method="POST" action="{{ route('actividad.update', $actividades->id_actividad) }}"  role="form">
              {{ csrf_field() }}

    <div class="form-row">

    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Actividad</label>
      <input type="text" class="form-control" id="nombre_actividad" name="nombre_actividad" value="{{$actividades->nombre_actividad}}" required>
    </div>

  </div>

  <button class="btn btn-primary" type="submit">Actualizar</button>
</form>

</div>
</div>


</div>

@endsection