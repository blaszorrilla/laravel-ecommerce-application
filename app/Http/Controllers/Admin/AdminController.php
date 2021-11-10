<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use DB;
class AdminController extends Controller
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
            $admins=DB::table('admins')
            ->join('roles','admins.id_rol','=','roles.id')
            ->select('admins.id','admins.name','admins.last_name','admins.email',
            'admins.password','admins.status','admins.id_rol','roles.description as rol')
            ->orderBy('admins.id','asc')
            ->paginate(5);

            $roles=DB::table('roles')
            ->select('id','description')
            ->where('status','=','ACTIVO')->get(); 
            return view('admin.users.index',["admins"=>$admins, "roles"=>$roles]);
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
        $roles=DB::table('roles')
        ->select('id','description')
        ->where('status','=','ACTIVO')->get();
        return view ('admin.users.create',["roles"=>$roles]);
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
            'email' => 'required|unique:admins',
        ]);  
        $users = new Admin();
        $users->name = $request->name;
        $users->last_name = $request->last_name;
        $users->email = $request->email;
        $users->password = bcrypt( $request->password);
        $users->id_rol = $request->id_rol;  
        $users->save();
        return Redirect::to("admin/users")->with('success','Usuario guardado correctamente!');
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
        $users = Admin::find($id);
        return view ('admin.users.edit',compact('users')); 
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
        $roles=DB::table('roles')
        ->select('id','description')
        ->where('status','=','ACTIVO')->get();
        $users = Admin::findOrFail($request->id);
        $users->name = $request->name;
        $users->last_name = $request->last_name;
       // $users->email = $request->email;
        $users->password = bcrypt( $request->password);
        //$users->description = $request->description;
        $users->save();
        return Redirect::to("admin/users")->with('success','Usuario actualizado correctamente !');
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
        $users = Admin::findOrFail($request->id);
        if($users->status=="ACTIVO"){
            $users->status="INACTIVO";
            $users->save();
            return Redirect::to("admin/users")->with('success','Usuario desactivado correctamente !');
        }else{
            $users->status="ACTIVO";
            $users->save();
            return Redirect::to("admin/users")->with('success','Usuario desactivado correctamente !');

        }
    }
    public function listarPdf(){
        $usuarios = DB::table('admins')
        ->select('admins.id','admins.name','admins.last_name','admins.email')
        ->orderBy('admins.id', 'desc')->get(); 
        
        $cont = DB::table('admins')->count();
        $pdf= \PDF::loadView('admin.pdf.usuariospdf',['usuarios'=>$usuarios,'cont'=>$cont]);
        return $pdf->download('usuarios.pdf');
      
    }
}
