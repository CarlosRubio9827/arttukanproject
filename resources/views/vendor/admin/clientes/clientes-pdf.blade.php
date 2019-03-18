
    
<div class="box-body">
        <div class="table-responsive">
            <table id="ventas-dt" class="table table-striped table-bordered table-condensed table-hover" width="750">
                <thead>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Total</th> 
                    <th>Estado</th> 
                   
                </thead>
                    @foreach ($ventas as $venta)
                <tr> 
                    <td>{{$venta->idVenta}}</td>
                    <td>{{$venta->fechaHora }}</td>
                    <td>{{$venta->totalVenta }}</td>
                    <td>{{$venta->estado}}</td>
                   
                </tr>
                     @endforeach
            </table>
        </div>
    </div>


