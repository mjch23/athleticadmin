@extends('layouts.master')
@section('content')

<div class="card">
  <div class="card-header">Mensaje</div>
  <div class="card-body">
    <h5 class="card-title"><i class="fas fa-check-circle text-success"></i>   Orden cargada correctamente</h5>
    <p class="card-text"><h5>La Orden <b>{{$id_orden->id_orden}}</b> se generó exitosamente</h5></p>
    <a href="/orden/{{$id_orden->id_orden}}" class="btn btn-info">Ir a la Orden</a>
  </div>
</div>



@endsection