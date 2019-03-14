<div class="box-body">
        <div class="table-responsive">
                <table id="productos-dt" class="table table-striped table-bordered table-condensed table-hover" WIDTH="900">
                    <thead>
                          
                        <th>Id</th>
                        <th>Código</th>
                        <th>Nombre Producto</th> 
                        <th>Precio</th>
                        <th>Tipo Producto</th>
                        <th>Stock</th>

                        {{-- <th>Imagen</th> --}}
                    </thead>
 
                        @foreach ($productos as $producto)
                           <tr>  
                                <td style="text-align:center;">{{$producto->idProducto}}</td>
                                <td style="text-align:center;">{{$producto->codigoProducto}}</td>
                                <td style="text-align:center;">{{$producto->nombreProducto }}</td>
                                <td style="text-align:center;">{{$producto->precio }}</td> 
                                <td style="text-align:center;">{{$producto->idTipoProducto}} - {{ $producto->tipoProducto }}</td>
                                <td style="text-align:center;">{{$producto->stock}}</td>
                               
                                
                           </tr>
                        @endforeach
                </table>
            </div>
    </div>