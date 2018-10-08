@extends('layouts.master')
@section('content')

<div class="container-fluid">

<div class="card">
  <div class="card-body">

<form method="POST" action="{{ route('prenda.store') }}"  role="form">
              {{ csrf_field() }}

    <div class="form-row">

    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Prenda</label>
      <input type="text" class="form-control" id="nombre_prenda" name="nombre_prenda" required>
    </div>

  </div>

  <button class="btn btn-primary" type="submit">Grabar</button>
</form>

</div>
</div>


</div>

@endsection