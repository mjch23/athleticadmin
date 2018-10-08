@extends('layouts.master')
@section('content')

<div class="container-fluid">

<div class="card">
  <div class="card-body">

<form method="POST" action="{{ route('cliente.store') }}"  role="form">
              {{ csrf_field() }}

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Razón Social</label>
      <input type="text" class="form-control" id="razon_social" name="razon_social" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Club</label>
      <input type="text" class="form-control" id="club" name="club" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">CUIT</label>
      <input type="text" class="form-control" id="cuit" name="cuit" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Dirección</label>
      <input type="text" class="form-control" id="direccion" name="direccion" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Localidad</label>
      <input type="text" class="form-control" id="localidad" name="localidad" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault05">Provincia</label>
      <input type="text" class="form-control" id="provincia" name="provincia" required>
    </div>
  </div>

    <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">País</label>
      <input type="text" class="form-control" id="pais" name="pais" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Actividad</label>
      <input type="text" class="form-control" id="actividad" name="actividad" required>
    </div>

  </div>

    <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Apellido</label>
      <input type="text" class="form-control" id="apellidos" name="apellidos" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Nombres</label>
      <input type="text" class="form-control" id="nombres" name="nombres" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">DNI</label>
      <input type="text" class="form-control" id="dni"  name="dni" required>
    </div>
  </div>

      <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Teléfono</label>
      <input type="text" class="form-control" id="telefono" name="telefono" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Celular</label>
      <input type="text" class="form-control" id="celular1" name="celular1" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Celular Alternativo</label>
      <input type="text" class="form-control" id="celular2" name="celular2" required>
    </div>
  </div>

      <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Email</label>
      <input type="text" class="form-control" id="email" name="email" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Observaciones</label>
      <textarea type="text" class="form-control" id="observaciones" name="observaciones"></textarea>
    </div>
  </div>

  <button class="btn btn-primary" type="submit">Grabar</button>
</form>

</div>
</div>



</div>

@endsection