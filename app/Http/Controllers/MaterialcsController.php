<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\materialcRequest;
use App\materialcs;
use DB;
use Illuminate\Support\Facades\Auth;

class MaterialcsController extends Controller
{
    public function index($id)
    {   
    	$id_usuario = Auth::id();
        //$asignatura = materialcs::find($id);
        $asignatura = DB::table('asignatura')->where('id', '=', $id)->get();
        $materialcs = DB::select('select a.id as idmateria,p.id as id, p.titulo as titulo, p.descripcion as descripcion, p.Observacion, p.archivo, p.url  from asignatura a, publicacion p, profesor_asignatura pa where '.$id.'=pa.id_asignatura and a.id = '.$id.' and p.id_profesor='.$id_usuario.' and p.id_tipo_publicacion = 2 group by p.id');
        return view('admin.materialcs.index')->with('materialcs', $materialcs)->with('asignatura', $asignatura);    		
    }

    /*
    * @return Response
    */
    public function create($id)
    {
       return view('admin.materialcs.create')->with('id', $id);
    }   
     /*
     * @return Response
     */
    public function store(materialcRequest $request)
    {
         
         $ruta = "public";

        $name = $request->file('url')->getClientOriginalName();

        $ext = $request->file('url')->getClientOriginalExtension();

        $request->file('url')->storePubliclyAs($ruta,$name);                

        $materialcs = new materialcs($request->all());
        $materialcs->url = $name;
        //dd($name);
        $materialcs->archivo = $ext;
        $materialcs->save();
        Flash::success('La guía ' . $materialcs->titulo . ' ha sido guardado con éxito!');
        return redirect("admin/materialcs/" . $request->id_asignatura); 
    }
    /**
     * Muestra la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        
    }
    public function edit($id)
    {
    	//dd($user);
    	$materialcs = materialcs::find($id);
    	return view('admin.materialcs.edit')->with('materialc', $materialcs);        
    }

    /**
     * Actualiza la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
     public function update(request $request,$id)
    {

        $id_asignatura = DB::select('select id_asignatura from publicacion where id='.$id);
        $materialcs= materialcs::find($id);
        $materialcs->titulo = $request->titulo;
        $materialcs->descripcion = $request->descripcion;
        $materialcs->Observacion = $request->Observacion;
        $materialcs->save();

        Flash::warning('El proyecto ' . $materialcs->titulo . ' ha  sido editado con exito!');
        return redirect("admin/materialcs/" . $id_asignatura[0]->id_asignatura);
    }

    /**
     * Elimina una empresa del sistema.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $id_asignatura = DB::select('select id_asignatura from publicacion where id ='.$id);
        $materialc= materialcs::find($id);
        //dd($user);   lo muestra si lo consigue
        $materialc->delete();
        Flash::error('El material '  . $materialc->titulo .  ' ha sido borrado de forma exitosa!' );
        return redirect("admin/materialcs/" . $id_asignatura[0]->id_asignatura);
    }
    public function descargar($url){
        return response()->download(storage_path('app\\public\\'.$url));
    }

}