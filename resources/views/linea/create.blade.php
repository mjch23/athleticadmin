@extends('layouts.master')
@section('content')

<div class="container-fluid">

<div class="card">
  <div class="card-body">

<form method="POST" action="{{ route('linea.store') }}"  role="form">
              {{ csrf_field() }}

    <div class="form-row">

    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Nombre de la Línea</label>
      <input type="text" class="form-control" id="nombre_linea" name="nombre_linea" required>
    </div>

  </div>

  <button class="btn btn-primary" type="submit">Grabar</button>
</form>

</div>
</div>


</div>

@endsection