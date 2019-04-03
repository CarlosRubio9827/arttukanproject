 
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="" name="description">
                    <meta content="width=device-width, initial-scale=1" name="viewport">
                        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
                        <title>
                            INFORME DE INGRESOS
                        </title>
                        <img alt="" class="" data-src="/ic/logo.png" src="{{asset('img/iconos/img72.jpg')}}" style="width:90px;margin-top:21px;">
                        <?php  $fecha=date("j/n/Y");?>
                            <p>
                                <h1 align="center">
                                    ArtTukan - INFORME DE SERVICIOS

                                </h1>
                                <br>
                                    <strong>
                                        Fecha de realizacion del reporte:
                                    </strong>
                                    <?php echo $fecha;?>
                                    <br>
                                        <strong>
                                            Usuario:
                                        </strong>
                                        {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}
                                    </br>
                                </br>
                            </p> 
                            <meta content="" name="description">
                                <style type="text/css">
                                    table{
            width:100%;
            border-collapse: collapse;
            margin: 0 auto;
            align:center;
        }
        td, th{
          
        border:1px solid black;
          
        }
        .page-break {
    page-break-after: always;
}
                                </style>
                            </meta>
                        </img>
                    </meta>
                </meta>
            </meta>
        </meta>
    </head>
    <br>
        <body>
            <br>
                <table class="table table-hover" style="margin-top:8px">
                    <tr>
                        <th class="text-center">
                            Id
                        </th>
                        <th class="text-center">
                            Código
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Descripción
                        </th>
                        <th>
                            Precio
                        </th>
                        <th>
                            Imagen
                        </th>
                    </tr>
                    @foreach($servicios as $servicio)
                    <tr>
                        <td class="text-center">
                            {{ $servicio->idServicio }}
                        </td>
                        <td class="text-center">
                            {{ $servicio->codigo }}
                        </td>
                        <td>
                            {{$servicio->nombre}}
                        </td>
                        <td>
                            {{$servicio->descripcion}}
                        </td>
                        <td>
                            {{$servicio->precio}}
                        </td>
                        <td>
                                <img alt="Imagen del Servicio" src="{{ asset('images/'.$servicio->imagen) }}"  height="75px" width="75px" class="img-thumbnail">
                            </td>
                    </tr>
                    @endforeach
                </table>
            </br>
        </body>
    </br>
</html>


