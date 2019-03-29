
    
<div class="box-body">
  
        <div class="table-responsive">
            <table id="tipoProductos-dt" class="table table-striped table-bordered table-condensed table-hover" WIDTH="900">
                <thead>
                    <th>Id</th>
                    <th>Nombre Tipo Producto</th>
                    <th>Descripcion</th>
                   
                    {{-- <th>Imagen</th> --}}
                </thead> 
                    @foreach ($tiposProductos as $tipoProducto)
                    <tr> 
                        <td style="text-align:center;">{{$tipoProducto->idTipoProducto}}</td>
                        <td style="text-align:center;">{{$tipoProducto->nombreTipoProducto }}</td>
                        <td style="text-align:center;">{{$tipoProducto->descripcionTipoProducto}}</td>
                        
                    </tr> 
                    @endforeach
            </table>
        </div>
</div>