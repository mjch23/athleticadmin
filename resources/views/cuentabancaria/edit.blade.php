@extends('layouts.master')
@section('content')

<div class="container-fluid">

<div class="card">
  <div class="card-body">

<form method="POST" action="{{ route('cuentabancaria.update', $cuentabancaria->id_cuenta) }}"  role="form" onSubmit="return validaCBU()">
              {{ csrf_field() }}

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Banco</label>
      <input type="text" class="form-control" id="banco" name="banco" value="{{$cuentabancaria->banco}}" required>   
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">CBU</label>
      <input type="text" class="form-control" id="cbu" name="cbu"  maxlength="22" value="{{$cuentabancaria->cbu}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Alias</label>
      <input type="text" class="form-control" id="alias" name="alias" value="{{$cuentabancaria->alias}}" required>
    </div>
  </div>
  
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Observaciones</label>
      <textarea type="text" class="form-control" id="observaciones" name="observaciones" value="{{$cuentabancaria->observaciones}}"></textarea>
    </div>
  </div>

  <button class="btn btn-primary" type="submit">Grabar</button>
  <a href="#" class="btn btn-info" onclick="goBack()" >Atrás</a>  
</form>

</div>
</div>



</div>

<script>
function goBack() {
    window.history.back();
}
</script>

<script>


function validaCBU(){

var cbu = document.getElementById("cbu").value;
var ponderador;
ponderador = '97139713971397139713971397139713';

var i;
var nDigito;
var nPond;
var bloque1;
var bloque2;

var nTotal;
nTotal = 0;


if (cbu.length < 22){
alert("El CBU ingresado tiene menos de 22 dígitos");
return false;
} else {

        bloque1 = '0' + cbu.substring(0,7);


for(i=0;i<=7;i++)
{
nDigito = bloque1.charAt(i);
nPond = ponderador.charAt(i);
nTotal = nTotal + (nPond * nDigito) - ((Math.floor(nPond * nDigito / 10)) * 10);
}

       // alert(bloque1);

        i=0;

while( ((Math.floor((nTotal+i)/10))*10) != (nTotal + i) )
{
i = i + 1;
}

// i = digito verificador

        if (cbu.substring(7,8) != i){
        alert("El CBU ingresado no es válido, por favor verificar");
        return false;
        } else {

                  nTotal = 0;

                  bloque2 = '000' + cbu.substring(8,21);

for(i=0;i<=15;i++)
{
nDigito = bloque2.charAt(i);
nPond = ponderador.charAt(i);
nTotal = nTotal + (nPond * nDigito) - ((Math.floor(nPond * nDigito / 10)) * 10);
}
// i = digito verificador

                  i=0;

while( ((Math.floor((nTotal+i)/10))*10) != (nTotal + i) )
{
i = i + 1;
}

                  

                  if (cbu.substring(21,22) != i){
                  alert("El CBU ingresado no es válido, por favor verificador");
                  return false;
                  } 




              }   
 



        }

}

</script>

@endsection