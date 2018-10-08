@extends('layouts.master')
  
@section('content')

<div class="container-fluid">

<div class="card">
  <div class="card-body">

 <form method="POST" action="{{ route('presupuesto.store') }}"  role="form"> 
              {{ csrf_field() }}


<div class="form-group row">


    <div class="col-md-6 mb-3">

  <label for="validationDefault05">Cliente</label> 
     <select class="custom-select" id="razon_social" name="razon_social" required>
      @foreach($clientes as $cliente)
       <option value="{{$cliente->razon_social}}">{{$cliente->razon_social}}</option>
    @endforeach
  </select>



    </div>

<!-- de acá salió el Autocomplete que anduvo: https://www.webslesson.info/2018/06/ajax-autocomplete-textbox-in-laravel-using-jquery.html-->

    <div class="col-md-3 mb-3">

        	<label for="validationDefaultUsername">Generar Presupuesto</label>
          <div>
           <button class="btn btn-info" type="submit" id="generar">
              <span class="fas fa-plus-square"></span>
            </button>
          </div>
    </div>

<!--    <div class="col-md-3 mb-3">

    	   <label for="validationDefaultUsername">Actividad</label>
                <input class="form-control" type="text" placeholder="Dirección" readonly value="{address}" />

            </div>

</div>

</form>

 <div class="form-group row add">

    <div class="col-md-4 mb-3">


  <label for="validationDefault05">Actividad</label> 
     <select class="custom-select" id="nombre_actividad" name="nombre_actividad" required>
      @foreach($actividades as $actividad)
       <option value="{{$actividad->nombre_actividad}}">{{$actividad->nombre_actividad}}</option>
    @endforeach
  </select>

    </div>

    <div class="col-md-5 mb-3">
         <label for="validationDefaultUsername">Producto</label>
 <select class="custom-select" id="nombre_producto" name="nombre_producto" required>
           <option value=""></option>
        </select> 
     <input type="text" class="form-control" id="valor_nombre_producto" name="nombre_producto" placeholder="Enter some name" required hidden>  

      <input type="number" class="form-control" id="precio_unitario_pp" name="precio_unitario_pp" value="0" hidden> 

      </div> 

          <div class="col-md-2 mb-3">
         <label for="validationDefaultUsername">Cantidad</label>
            <input id="cantidad_pp" name="cantidad_pp" class="form-control" type="number" placeholder="Cantidad" value="0" required>
        </div>



          <div class="col-md-1 mb-3">
         <label for="validationDefaultUsername">Agregar</label>            
            <button class="btn btn-primary" type="submit" id="add">
              <span class="fas fa-plus-square"></span>
            </button>
          </div>


        </div>


    </div>

    <hr />
           {{ csrf_field() }}
      <div class="table-responsive text-center">
        <table class="table table-striped" id="table">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Producto</th>
              <th class="text-center">Cantidad</th>
              <th class="text-center">Precio Unitario</th>
              <th class="text-center">Precio Total</th>               
              <th class="text-center">Acciones</th>
            </tr>
          </thead>
          @foreach($data as $item)
          <tr class="item{{$item->id_pp}}">
            <td>{{$item->id_pp}}</td>
            <td>{{$item->nombre_producto}}</td>
            <td>{{$item->cantidad_pp}}</td>
            <td>{{$item->precio_unitario_pp}}</td>
            <td>{{$item->precio_total_pp}}</td>                        
            <td><button class="edit-modal btn btn-info" data-id="{{$item->id_pp}}"
                data-name="{{$item->nombre_producto}}">
                <span class="fas fa-edit"></span>
              </button>
              <button class="delete-modal btn btn-danger"
                data-id="{{$item->id_pp}}" data-name="{{$item->nombre_producto}}">
                <span class="far fa-trash-alt"></span>
              </button></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label class="control-label col-sm-2" for="id">ID:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="fid" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                  <input type="name" class="form-control" id="n">
                </div>
              </div>
            </form>
            <div class="deleteContent">
              Are you Sure you want to delete <span class="dname"></span> ? <span
                class="hidden did"></span>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn actionBtn" data-dismiss="modal">
                <span id="footer_action_button" class='glyphicon'> </span>
              </button>
              <button type="button" class="btn btn-warning" data-dismiss="modal">
                <span class='glyphicon glyphicon-remove'></span> Close
              </button>
            </div>
          </div>
        </div>
      </div> -->
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/script.js') }}"></script>

</div>
</div>

<script>
$(document).ready(function(){

 $('#razon_social').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('presupuesto.create.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#ListaRazonSocial').fadeIn();  
                    $('#ListaRazonSocial').html(data);

          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#razon_social').val($(this).text());  
     /*   var mitexto = $('#razon_social').val($(this).text()); 
        var textofinal = mitexto.split(" -")[0]; 
        $('#id_cliente').val(textofinal); */
        $('#ListaRazonSocial').fadeOut();  

    });  

});
</script>

<script>

$('#nombre_actividad').on('change',function(e){
var nombre_actividad = e.target.value;

//ajax
$.get('/ajax-subcat?nombre_actividad='+nombre_actividad, function(data){


console.log(data);

$('#nombre_producto').empty();
$.each(data, function(index,subcatObj){



  $('#nombre_producto').append('<option value="'+subcatObj.id_producto+'">'+subcatObj.nombre_producto+' $'+subcatObj.precio_producto+'</option>');



});


});

});


</script>

<script>

$('#nombre_actividad').on('change',function(e){
var nombre_actividad = e.target.value;


$.get('/ajax-subcat?nombre_actividad='+nombre_actividad, function(data){


  $("#nombre_producto").change(function(){
  //alert($("#nombre_producto option:selected").text());
  var mitexto = $("#nombre_producto option:selected").text()
  var miprecio = mitexto.split(" $")[1]; // parte el texto después del signo $ https://es.stackoverflow.com/questions/45489/separar-cadena-en-jquery/45493
  var textofinal = mitexto.split(" $")[0]; // parte el texto y toma la primera parte
  $('#valor_nombre_producto').val(textofinal);
  $('#precio_unitario_pp').val(miprecio);


  });

});

});

</script>






@endsection
