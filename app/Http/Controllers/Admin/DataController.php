<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use DB;

class DataController extends BaseController
{
    
    public function index()
    {
        //$cont = DB::table('users')->get();
        $usuarios = DB::table('users')->count();
        $productos = DB::table('products')->count();
        $ordenes = DB::table('orders')->count();
        //dd($cont);
       // $users_count = Users::count();
        return view('admin.dashboard.index', ['usuarios'=>$usuarios,'productos'=>$productos, 'ordenes'=>$ordenes]);
    }

}
