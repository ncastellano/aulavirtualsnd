<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\guiaRequest;
use App\guias;
use DB;
use Illuminate\Support\Facades\Auth;

class GuiasController extends Controller
{
    public function index($id)
    {   
    	$id_usuario = Auth::id();
    	//$asignatura = guias::find($id);
        $asignatura = DB::table('asignatura')->where('id', '=', $id)->get();
    	$guias = DB::select('select a.id as idmateria,p.id as id, p.titulo as titulo, p.descripcion as descripcion, p.Observacion, p.archivo, p.url  from asignatura a, publicacion p, profesor_asignatura pa where '.$id.'=pa.id_asignatura and a.id = '.$id.' and p.id_profesor='.$id_usuario.' and p.id_tipo_publicacion = 1 group by p.id');
        //dd($guias);
        return view('admin.guias.index')->with('guias', $guias)->with('asignatura', $asignatura);    		
    }

    /*
    * @return Response
    */
    public function create($id)
    {
       return view('admin.guias.create')->with('id', $id);
    }   
     /*
     * @return Response
     */
    public function store(guiaRequest $request)
    {
        $ruta = "public";

        $name = $request->file('url')->getClientOriginalName();

        $ext = $request->file('url')->getClientOriginalExtension();

        $request->file('url')->storePubliclyAs($ruta,$name);                

        $guias = new guias($request->all());
        $guias->url = $name;
        $guias->archivo = $ext;
        $guias->save();
        Flash::success('La guía ' . $guias->titulo . ' ha sido guardado con éxito!');
        return redirect("admin/guias/" . $request->id_asignatura);  
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
    	$guias = guias::find($id);
    	return view('admin.guias.edit')->with('guia', $guias);        
    }

    /**
     * Actualiza la empresa deseada.
     *
     * @param  int $id
     * @return Response
     */
     public function update(request $request,$id)
    {

        $id_asignatura = DB::select('select id_asignatura from publicacion where id ='.$id);
        $guias= guias::find($id);
        $guias->titulo = $request->titulo;
        $guias->descripcion = $request->descripcion;
        $guias->Observacion = $request->Observacion;
        $guias->save();

        Flash::warning('La guía' . $guias->titulo . ' ha  sido editada con éxito!');
        return redirect("admin/guias/" . $id_asignatura[0]->id_asignatura);
    }

    /**
     * 
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $id_asignatura = DB::select('select id_asignatura from publicacion where id ='.$id);
        $guia= guias::find($id);
        //dd($user);   lo muestra si lo consigue
        $guia->delete();
        Flash::error('El guia '  . $guia->titulo .  ' ha sido borrado de forma exitosa!' );
        return redirect("admin/guias/" . $id_asignatura[0]->id_asignatura);
    }
    public function descargar($url){
        return response()->download(storage_path('app\\public\\'.$url));
    }
}