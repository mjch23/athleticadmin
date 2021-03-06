<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AthleticAdmin</title>

    <!-- Bootstrap core CSS-->
    <link href="{{asset ('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Fonts -->
    <link href="{{ asset ('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">


    <link href="{{asset ('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">


        <!-- Styles -->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet">

    <!-- Datatables 

    <link rel="stylesheet" type="text/css" href="{{asset ('css/jquery.dataTables.css')}}"> -->


    <!-- Scripts -->
    <script src="{{ asset('js/sb-admin.js') }}" defer></script>
    <script src="{{ asset('js/sb-admin.min.js') }}" defer></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/jquery/jquery.js')}}"></script>
   <!--  <script src="{{ asset('js/app.js') }}"></script> -->

    <!-- Datatables 

    <script src="{{asset('js/jquery.dataTables.js')}}" type="text/javascript"></script> -->

    <!-- DatePicker para Ordenes -->

    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" /> 




  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="{{route('panel.index')}}"><span class="logo-lg"><b>Athletic</b>Admin</span></a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <!--      <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div> -->
      </form> 

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Crear Alertas</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Ver Alertas</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Crear mensaje</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Ver mensajes</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Salir del Sistema</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('panel.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Panel de Métricas</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="{{route('cliente.index')}}">
            <i class="fas fa-users"></i>
            <span>Clientes</span></a>
        </li> 


        <li class="nav-item">
          <a class="nav-link" href="{{route('producto.index')}}">
            <i class="fas fa-fw fa-atlas"></i>
            <span>Productos</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('presupuesto.index')}}">
            <i class="fas fa-file-alt"></i>
            <span>Presupuestos</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('orden.index')}}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Órdenes</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('proveedor.index')}}">
            <i class="fas fa-file-powerpoint"></i> 
            <span>Proveedores</span></a>
        </li>          

       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Configuración</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{route('actividad.index')}}">Actividades</a>
            <a class="dropdown-item" href="{{route('prenda.index')}}">Prendas</a>
            <a class="dropdown-item" href="{{route('talle.index')}}">Talles</a>
            <a class="dropdown-item" href="{{route('linea.index')}}">Líneas</a>
        </li>

      </ul>

      <div id="content-wrapper">



        <div class="container-fluid">

@yield('content')


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © AthleticAdmin 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Terminar Sesión actual?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccionar Salir para terminar la sesión.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Salir</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
            </form>


          </div>
        </div>
      </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/jquery/jquery.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin.min.js')}}"></script>
   <!-- <script src="{{ asset('js/app.js') }}"></script> -->

  </body>

</html>

