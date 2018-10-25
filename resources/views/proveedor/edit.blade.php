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

<form method="POST" action="{{ route('proveedor.update', $proveedores->id_proveedor) }}"  role="form">
              {{ csrf_field() }}

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Razón Social</label>
      <input type="text" class="form-control" id="razon_social" name="razon_social" value="{{$proveedores->razon_social}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">CUIT</label>
      <input type="text" class="form-control" id="cuit" name="cuit" value="{{$proveedores->cuit}}" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Dirección</label>
      <input type="text" class="form-control" id="direccion" name="direccion" value="{{$proveedores->direccion}}" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Localidad</label>
      <input type="text" class="form-control" id="localidad" name="localidad" value="{{$proveedores->localidad}}" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault05">Provincia</label>
      <input type="text" class="form-control" id="provincia" name="provincia" value="{{$proveedores->provincia}}" required>
    </div>
  </div>

    <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">País</label>
      <input type="text" class="form-control" id="pais" name="pais" value="{{$proveedores->pais}}" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Actividad</label>
      <input type="text" class="form-control" id="actividad" name="actividad" value="{{$proveedores->actividad}}" required>
    </div>

  </div>

    <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Apellido</label>
      <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{$proveedores->apellidos}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Nombres</label>
      <input type="text" class="form-control" id="nombres" name="nombres" value="{{$proveedores->nombres}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">DNI</label>
      <input type="text" class="form-control" id="dni"  name="dni" value="{{$proveedores->dni}}" required>
    </div>
  </div>

      <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Teléfono</label>
      <input type="text" class="form-control" id="telefono" name="telefono" value="{{$proveedores->telefono}}">
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Celular</label>
      <input type="text" class="form-control" id="celular1" name="celular1" value="{{$proveedores->celular1}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Celular Alternativo</label>
      <input type="text" class="form-control" id="celular2" name="celular2" value="{{$proveedores->celular2}}">
    </div>
  </div>

      <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Email</label>
      <input type="text" class="form-control" id="email" name="email" value="{{$proveedores->email}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Observaciones</label>
      <input type="text" class="form-control" id="observaciones" name="observaciones" value="{{$proveedores->observaciones}}">
    </div>
  </div>

  <button class="btn btn-primary" type="submit">Grabar</button>
  <a href="{{ route('proveedor.index') }}" class="btn btn-info" >Atrás</a>
</form>

</div>
</div>



</div>

@endsection