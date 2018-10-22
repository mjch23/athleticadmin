@extends('layouts.master')
@section('content')

     <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Panel de Métricas</a>
            </li>
            <li class="breadcrumb-item active">Resumen</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="mr-5">{{$clientes}} Clientes</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('cliente.index')}}">
                  <span class="float-left">Acceder</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">{{$productos}} Productos</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('producto.index')}}">
                  <span class="float-left">Acceder</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">Órdenes</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">Acceder</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-file-alt"></i>
                  </div>
                  <div class="mr-5">{{$presupuestos}} Presupuestos</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('presupuesto.index')}}">
                  <span class="float-left">Acceder</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

</div>
</div>

@endsection