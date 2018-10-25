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


    <div class="col-md-3 mb-3">

        	<label for="validationDefaultUsername">Generar Presupuesto</label>
          <div>
           <button class="btn btn-info" type="submit" id="generar">
              <span class="fas fa-plus-square"></span>
            </button>
          </div>
    </div>

</div>
</div>
</form>


</div>
</div>
</div>


</div>
</div>
</div>






@endsection
