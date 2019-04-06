<?php
namespace App\Http\Controllers;

use App\Sugerencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;
use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\EntrustFacade as Entrust;

class SugerenciaController extends Controller
{
     
    public function __construct(){

    } 

     public function index(Request $request)
    {

        if ($request) {
        
            $sugerencias = DB::table('sugerencias as s')
            ->select('s.idSugerencia','s.nombres','s.email','s.sugerencias')
            ->orderBy('s.idSugerencia','desc')
            ->paginate(8);
            if(Entrust::hasRole('admin')){
                return view('vendor.admin.sugerencias.index', ['sugerencias'=>$sugerencias]);   
            }else{
                return view('vendor.adminlte.auth.login');
            }
            
            }
    
    }

    public function mostrar( $id)
    {
        $sugerencia = Sugerencia::findOrFail($id);
         if (Entrust::hasRole('admin')) {
            return view("vendor.admin.sugerencias.show", compact('sugerencia'));
        }else{
            return view('vendor.adminlte.auth.login');
        }
        
    }
                   
    public function store(Request $request)
    { 
        
        $sugerencia = new Sugerencia();
   
        $sugerencia->nombres = $request->get('Name');
        $sugerencia->email = $request->get('Mail');
        $sugerencia->sugerencias=$request->get('sugerencias');
        $sugerencia->save();
        Alert::info('¡Correcto!', 'La sugerencia ha sido enviada correctamente')->autoclose(4000);

        return view('vendor.adminlte.layouts.landing');

       // $productos = DB::table('productos')->orderBy('idProducto','desc')->paginate(8);
        //return view('vendor.admin.productos.index', ['productos'=>$productos]);
          
            }

}
 