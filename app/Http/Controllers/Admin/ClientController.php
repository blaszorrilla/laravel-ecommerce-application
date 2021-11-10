<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
class ClientController extends Controller
{
    public function index(Request $request)
    {
    if($request){
        //sql=trim($request->get('buscarTexto'));
        $clientes=DB::table('users')
        ->orderBy('id','asc')
        ->paginate(5);
        return view('admin.clients.index',["clientes"=>$clientes]);
        }
    }
    public function listarPdf(){
        $clientes = DB::table('users')
        ->select('users.id','users.nombre','users.apellido','users.ciudad','users.direccion','users.telefono')
        ->orderBy('users.id', 'desc')->get();     
        $cont = DB::table('users')->count();
        $pdf= \PDF::loadView('admin.pdf.clientespdf',['clientes'=>$clientes,'cont'=>$cont]);
        return $pdf->download('clientes.pdf');    
    }
}
