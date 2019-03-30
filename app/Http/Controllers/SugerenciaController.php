<?php
namespace App\Http\Controllers;

use App\Sugerencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SugerenciaController extends Controller
{
     
    public function __construct(){

    } 
                   
    public function store(Request $request)
    { 
        $sugerencia = new Sugerencia();
   
        $sugerencia->nombres = $request->get('Name');
        $sugerencia->email = $request->get('Mail');
        $sugerencia->sugerencias=$request->get('sugerencias');
        $sugerencia->save();

        return view('vendor.adminlte.layouts.landing');

       // $productos = DB::table('productos')->orderBy('idProducto','desc')->paginate(8);
        //return view('vendor.admin.productos.index', ['productos'=>$productos]);
          
            }
}
 