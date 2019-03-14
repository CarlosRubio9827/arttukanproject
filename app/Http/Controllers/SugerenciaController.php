<?php

namespace App\Http\Controllers;

use App\Sugerencia;
use App\Http\Requests;
use App\Http\Requests\SugerenciaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class SugerenciaController extends Controller
{
     
    public function __construct(){

    } 
                 
    public function store(Requests $request)
    { 
         
        $sugerencia = new Sugerencia();
        $sugerencia->nombres = $request->get('nombres');
        $sugerencia->email = $request->get('email');
        $sugerencia->sugerencias=$request->get('sugerencias');
        $sugerencia->save();

        return redirect()->route('bienvenidos');

       // $productos = DB::table('productos')->orderBy('idProducto','desc')->paginate(8);
        //return view('vendor.admin.productos.index', ['productos'=>$productos]);
        
          
            }


}
 