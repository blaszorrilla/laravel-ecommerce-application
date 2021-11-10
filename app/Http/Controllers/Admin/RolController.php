<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Support\Facades\Redirect;
use DB;
class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            //sql=trim($request->get('buscarTexto'));
            $roles=DB::table('roles')
            ->orderBy('id','asc')
            ->paginate(5);
            return view('admin.roles.index',["roles"=>$roles]);
            //return $categorias;
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request,[
            'description' => 'required|unique:roles|max:191',
        ]);  
        $rol = new Rol();
        $rol->description = $request->description;
        $rol->save();
        return Redirect::to("admin/roles")->with('success','Rol guardado correctamente!');
        //return back()->with('success','Rol guardado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Rol::find($id);
        return view ('admin.roles.edit',compact('roles')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $roles = Rol::findOrFail($request->id);
        //$roles = Rol::find($id);
        $roles->description = $request->description;
        $roles->save();
        return Redirect::to("admin/roles")->with('success','Rol actualizado correctamente !');
        //return back()->with('success','Rol actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $rol = Rol::findOrFail($request->id);
        if($rol->status=="ACTIVO"){
            $rol->status="INACTIVO";
            $rol->save();
            return Redirect::to("admin/roles")->with('success','Rol desactivado correctamente !');
        }else{
            $rol->status="ACTIVO";
            $rol->save();
            return Redirect::to("admin/roles")->with('success','Rol desactivado correctamente !');

        }
    }
}
