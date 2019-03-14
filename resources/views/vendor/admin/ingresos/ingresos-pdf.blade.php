
    
<table  class="table table-striped table-bordered table-condensed table-hover" WIDTH="900">
                    
                    <thead>    
                        <th>Id</th>
                        <th>Fecha - Hora</th> 
                        <th>Estado</th>
                    </thead>
 
                        @foreach ($ingresos as $ingreso)

                           <tr> 

                                <td>{{$ingreso->idIngreso}}</td>
                                <td>{{$ingreso->fechaHora }}</td>
                                <td>{{$ingreso->estado}}</td>   
                                
                           </tr>

                        @endforeach

                </table>


