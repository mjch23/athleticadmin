@extends('layouts.master')
@section('content')

<div class="container-fluid">

        @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @if(Session::has('success'))
      <div class="alert alert-info">
        {{Session::get('success')}}
      </div>
      @endif

<div class="card">
  <div class="card-body">

<form method="POST" action="{{ route('cliente.update', $clientes->id) }}"  role="form">
              {{ csrf_field() }}

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Razón Social<sup> *</sup></label>
      <input type="text" class="form-control" id="razon_social" name="razon_social" value="{{$clientes->razon_social}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Club<sup> *</sup></label>
      <input type="text" class="form-control" id="club" name="club" value="{{$clientes->club}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">CUIT<sup> *</sup></label>
      <input type="text" class="form-control" id="cuit" name="cuit" value="{{$clientes->cuit}}" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Dirección<sup> *</sup></label>
      <input type="text" class="form-control" id="direccion" name="direccion" value="{{$clientes->direccion}}" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Localidad<sup> *</sup></label>
      <input type="text" class="form-control" id="localidad" name="localidad" value="{{$clientes->localidad}}" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault05">Provincia<sup> *</sup></label>
      <input type="text" class="form-control" id="provincia" name="provincia" value="{{$clientes->provincia}}" required>
    </div>
  </div>

    <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">País<sup> *</sup></label>
      <input type="text" class="form-control" id="pais" name="pais" value="{{$clientes->pais}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Actividad<sup> *</sup></label>
      <input type="text" class="form-control" id="actividad" name="actividad" value="{{$clientes->actividad}}" required>
    </div>

  </div>

    <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Apellido<sup> *</sup></label>
      <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{$clientes->apellidos}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Nombres<sup> *</sup></label>
      <input type="text" class="form-control" id="nombres" name="nombres" value="{{$clientes->nombres}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">DNI<sup> *</sup></label>
      <input type="text" class="form-control" id="dni"  name="dni" value="{{$clientes->dni}}" required>
    </div>
  </div>

      <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Teléfono</label>
      <input type="text" class="form-control" id="telefono" name="telefono" value="{{$clientes->telefono}}">
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Celular<sup> *</sup></label>
      <input type="text" class="form-control" id="celular1" name="celular1" value="{{$clientes->celular1}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Celular Alternativo</label>
      <input type="text" class="form-control" id="celular2" name="celular2" value="{{$clientes->celular2}}">
    </div>
  </div>

      <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Email<sup> *</sup></label>
      <input type="text" class="form-control" id="email" name="email" value="{{$clientes->email}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Observaciones</label>
      <input type="text" class="form-control" id="observaciones" name="observaciones" value="{{$clientes->observaciones}}">
    </div>
  </div>

  <button class="btn btn-primary" type="submit">Grabar</button>
  <a href="{{ route('cliente.index') }}" class="btn btn-info" >Atrás</a>
</form>

</div>
</div>



</div>

@endsection