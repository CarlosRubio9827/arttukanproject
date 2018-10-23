<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\IngresoRequest;
use DB;
use App\Ingreso;
use App\DetalleIngreso;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class IngresoController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

    	if ($request) {
    		$ingresos=DB::table('ingresos as i')
    		->join('detalleIngresos as di','i.idIngreso','=','di.idIngreso')
    		->select('i.idIngreso','i.fechaHora','i.estado','di.cantidad')
    		->orderBy('i.idIngreso','desc')
    		->groupBy('i.idIngreso','i.fechaHora','i.estado','di.cantidad')
    		->paginate(7);
    		return view('ingresos.index',['ingresos'=>$ingresos]);

    	}}

    	public function create(){

    		 $productos=DB::table('productos as p')
    		 ->select(DB::raw('CONCAT(p.idProducto," ",p.nombreProducto) as producto'),'p.idProducto')
    		 ->get();

    		return view ('ingresos.create',['productos'=>$productos]);
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

  				return redirect('ingresos');
    	}

    	public function show($idIngreso){

    		$ingreso = DB::table('ingresos as i')
    		->join('detalleIngresos as di','i.idIngreso','=','di.idIngreso')
    		->select('i.idIngreso','i.fechaHora','i.estado','di.cantidad')
    		->where('i.idIngreso','=',$idIngreso)
    		->first();
    		$detalleIngreso = DB::table('detalleIngresos as di')
    		->join('productos as p','p.idProducto','di.idProducto')
    		->select('p.nombreProducto','di.cantidad')
    		->where('di.idIngreso','',$idIngreso)->get();

    		return view('ingresos.show',['ingreso'=>$ingreso,'detalleIngreso'=>$detalleIngreso]);

    	}

    	public function destroy($idIngreso){

    		$ingreso = findOrFail($idIngreso);
    		$ingreso->estado='C';
    		$ingreso->update();
    		return view('ingresos.index');

    	}

    }

