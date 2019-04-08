<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngresoRequest;
use App\Http\Requests;
use App\Ingreso;
use App\DetalleIngreso;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Alert;
use Barryvdh\DomPDF\Facade as PDF;

class IngresoController extends Controller
{
    public function __construct(){

    } 

    public function index(Request $request){

    	if ($request) {
				$ingresos=DB::table('ingresos as i')
				->where('estado','=','A')
    		->join('detalleingresos as di','i.idIngreso','=','di.idIngreso')
    		->select('i.idIngreso','i.fechaHora','i.estado')
    		->orderBy('i.idIngreso','desc')
    		->groupBy('i.idIngreso','i.fechaHora','i.estado')
				->paginate(8);
		
    		return view('vendor.admin.ingresos.index',['ingresos'=>$ingresos]);

    	}}

    	public function create(){

				 $productos=DB::table('productos as p')
				 ->select(DB::raw('CONCAT("idProducto", "nombreProducto") as producto'),'p.idProducto')
				 ->where('p.estado','=','1')
    		 ->get();

    		return view ('vendor.admin.ingresos.create',['productos'=>$productos]);
    	}

    	public function store(IngresoRequest $request){

  				try {          
						
						DB::beginTransaction();
					  $ingreso=new Ingreso();
					  $mytime=Carbon::now('America/Bogota');
						$ingreso->fechaHora=$mytime->toDateTimeString();
					  $ingreso->estado='A';
					  $ingreso->save(); 

  					$idProducto = $request->get('idProducto');
  					$cantidad = $request->get('cantidad');
  					$cont = 0;

  					while ($cont < count($idProducto)) {
 						$detalleIngreso = new DetalleIngreso();
 						$detalleIngreso->idIngreso=$ingreso->idIngreso;
 						$detalleIngreso->idProducto=$idProducto[$cont];
 						$detalleIngreso->cantidad=$cantidad[$cont];

						$detalleIngreso->save();
						
						$cont=$cont+1;
						
						}
	
						DB::commit();
	
					} catch (\Exception $e) {
						
						DB::rollback();
 
				}
				
				Alert::success('¡Correcto!', 'El ingreso ha sido registrado satisfactoriamente')->autoclose(4000);

         return redirect()->route('ingresos.index');

    	} 

    	public function show($id){ 
 
    		$ingreso = DB::table('ingresos as i')
    		->join('detalleingresos as di','i.idIngreso','=','di.idIngreso')
    		->select('i.idIngreso','i.fechaHora','i.estado','di.cantidad')
    		->where('i.idIngreso','=',$id)
    		->first();
    		$detalleIngreso = DB::table('detalleingresos as di')
    		->join('productos as p','p.idProducto','di.idProducto')
    		->select('p.codigoProducto','p.nombreProducto','di.cantidad')
    		->where('di.idIngreso','=',$id)->get();

        return view("vendor.admin.ingresos.show", ['ingresos'=>$ingreso,'detalleIngresos'=>$detalleIngreso]);

    	}

    	public function destroy($idIngreso){

    		$ingreso = Ingreso::findOrFail($idIngreso);
    		$ingreso->estado='C';
    		$ingreso->update();
				Alert::info('¡Correcto!', 'El ingreso ha sido cancelado satisfactoriamente')->autoclose(4000);

        return Redirect::to('ingresos');

		}
		
		public function exportarPdf()
    {
        $ingresos = Ingreso::all();
 
        $pdf = PDF::loadView( "vendor.admin.ingresos.ingresos-pdf",compact('ingresos'));
        return $pdf->download('Listado Ingresos.pdf');

    }
		

    } 

