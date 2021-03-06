@extends('layouts.master')
@section('content')

<div class="container-fluid">

<div class="card">
  <div class="card-body">

<form method="POST" action="{{ route('talle.update', $talles->id_talle) }}"  role="form">
              {{ csrf_field() }}

    <div class="form-row">

    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Talle</label>
      <input type="text" class="form-control" id="nombre_talle" name="nombre_talle" value="{{$talles->nombre_talle}}" required>
    </div>

      <div class="col-md-4 mb-3">
      <label for="validationDefault02">Sexo (masculino / femenino)</label>
      <input type="text" class="form-control" id="sexo_talle" name="sexo_talle" value="{{$talles->sexo_talle}}" required>
    </div>

        <div class="col-md-4 mb-3">
      <label for="validationDefault02">Edad (niño / adulto)</label>
      <input type="text" class="form-control" id="edad_talle" name="edad_talle"  value="{{$talles->edad_talle}}" required>
    </div>

  </div>

  <button class="btn btn-primary" type="submit">Actualizar</button>
</form>

</div>
</div>


</div>

@endsection