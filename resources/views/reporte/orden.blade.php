<!DOCTYPE html>
<html>
<head>
    <title>ORDEN DE TRABAJO</title>
    <style type="text/css">

    body{
        font-size: 16px;
        font-family: "Helvetica";
    }

    table{
        border-collapse: collapse;
    }
    td{
        padding: 6px 5px;
        font-size: 15px;
    }

            header {
                position: relative;
                top: 0px;
                left: 150px;
                right: 0px;
                height: 50px;
            }

            footer {
                position: fixed; 
                bottom: 10px; 
                left: 0px; 
                right: 0px;
                height: 50px; 

            }

    .h1{
        font-size: 21px;
        font-weight: bold;
    }
    .h2{
        font-size: 18px;
        font-weight: bold;
    }
    .tabla1{
        margin-bottom: 20px;    
    }
    .tabla2 {
        margin-bottom: 20px;
    }
    .tabla3{
        margin-top: 15px;
    }
    .tabla3 td{
        border: 1px solid #000;
    }
    .tabla3 .cancelado{
        border-left: 0;
        border-right: 0;
        border-bottom: 0;
        border-top: 1px dotted #000;
        width: 200px;
    }
    .emisor{
        color: red;
    }
    .linea{
        border-bottom: 1px dotted #000;
    }
    .border{
        border: 1px solid #000;
    }
    .fondo{
        background-color: #dfdfdf;
    }
    .fisico{
        color: #fff;
    }
    .fisico td{
        color: #fff;
    }
    .fisico .border{
        border: 1px solid #fff;
    }
    .fisico .tabla3 td{
        border: 1px solid #fff;
    }
    .fisico .linea{
        border-bottom: 1px dotted #fff;
    }
    .fisico .emisor{
        color: #fff;
    }
    .fisico .tabla3 .cancelado{
        border-top: 1px dotted #fff;
    }
    .fisico .text{
        color: #000;
    }
    .fisico .fondo{
        background-color: #fff;
    }

</style>
</head>
<header>
            <img id="encabezado" align="center" src="{{ asset('images/encabezado.jpg') }}" alt="" width="60%">
</header>
<body>
<section class="contenido">
        <table width="100%" class="tabla1">
            <tr>
                <td width="73%" align="center"></td>
                <td width="27%" rowspan="3" align="center" style="padding-right:0">
                    <table width="100%">
                        <tr>
                            <td align="center" ><span class="h1">ORDEN DE TRABAJO</span></td>
                        </tr>
                        <tr>
                            <td align="center" >001- Nº <span class="text">{{$orden->id_orden}}</span></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center">Doctor Pedro C. Molina 1168, Almafuerte, Córdoba, Argentina</td>
            </tr>
            <tr>
                <td align="center">Telf.: 03571 - 15 60 04 60</td>
            </tr>
        </table>
        <table width="100%" class="tabla2">
            <tr>
                <td width="11%">Señor (es):</td>
                <td width="37%" class="linea"><span class="text">{{$razon_social}}</span></td>
                <td width="5%">&nbsp;</td>
                <td width="13%">&nbsp;</td>
                <td width="4%">&nbsp;</td>
                <td width="22%" align="center" class="border fondo"><strong>FECHA</strong></td>

            </tr>
            <tr>
                @foreach($cliente as $clientes)               
                <td>Dirección:</td>
                <td class="linea"><span class="text">{{$clientes->direccion}}</span></td>
                <td>CUIT:</td>
                <td class="linea"><span class="text">{{$clientes->cuit}}</span></td>
                 @endforeach
                <td>&nbsp;</td>
                <td align="center" class="border"><span class="text">{{$dd}}-{{$mm}}-{{$yy}}</span></td>
 
            </tr>

        </table>
        <table width="100%" class="tabla3">
            <tr>
              <th align="center" class="fondo">#</th>
              <th align="center" class="fondo">Actividad</th>              
              <th align="center" class="fondo">Producto</th>
              <th align="center" class="fondo">Cantidad</th>
              <th align="center" class="fondo">Precio Unitario</th>
              <th align="center" class="fondo">Precio Total</th>    
            </tr>
          @if($data->count())  
          @foreach($data as $item)
            <tr>
                <td width="7%" align="center"><span class="text">{{$item->id_pp}}</span></td>
                <td width="25%"><span class="text">{{$item->nombre_actividad}}</span></td>
                <td width="25%" align="right"><span class="text">{{$item->nombre_producto}}</span></td>
                <td width="7%" align="right"><span class="text">{{$item->cantidad_pp}}</span></td>
                <td width="18%" align="right"><span class="text">$ {{$item->precio_unitario_pp}}</span></td>
                <td width="18%" align="right"><span class="text">$ {{$item->precio_total_pp}}</span></td>

            </tr>

          @endforeach
          @endif
            <tr>
                <td style="border:0;">&nbsp;</td>
                <td style="border:0;">&nbsp;</td>
                <td style="border:0;">&nbsp;</td>
                <td style="border:0;">&nbsp;</td>                             
                <td align="right" class="fondo"><strong>TOTAL</strong></td>
                <td align="right" class="fondo" ><span class="text">$ {{$precio_total}}</span></td>
            </tr>
            <tr>
                <td style="border:0;">&nbsp;</td>
                <td align="center" style="border:0;">
                    <table width="300" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="center" class="leyenda">Orden de Trabajo para ser enviada a Taller</td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
</section>
<footer>
        <img id="pie" src="{{ asset('images/pie.jpg') }}" alt="" width="100%">
</footer>
</body>



</html>