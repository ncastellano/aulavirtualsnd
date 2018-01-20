<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Http\Requests\capsulaRequest;
use App\capsulas;
use DB;
use Illuminate\Support\Facades\Auth;

class CapsulasController extends Controller
{
    public function index($id)
    {   
    	$id_usuario = Auth::id();
    	//$asignatura = capsulas::find($id);
        $asignatura = DB::table('asignatura')->where('id', '=', $id)->get();
    	$capsulas = DB::select('select a.id as idmateria,p.id as id, p.titulo as titulo, p.descripcion as descripcion, p.Observacion, p.archivo, p.url  from asignatura a, publicacion p, profesor_asignatura pa where '.$id.'=pa.id_asignatura and a.id = '.$id.' and p.id_profesor='.$id_usuario.' and p.id_tipo_publicacion = 4 group by p.id');
        //dd($capsulas);
        return view('admin.capsulas.index')->with('capsulas', $capsulas)->with('asignatura', $asignatura);    		
    }

    /*
    * @return Response
    */
    public function create($id)
    {
       return view('admin.capsulas.create')->with('id', $id);
    }   
     /*
     * @return Response
     */
    public function store(capsulaRequest $request)
    {
        $ruta = "public";

        $name = $request->file('url')->getClientOriginalName();

        $ext = $request->file('url')->getClientOriginalExtension();

        $request->file('url')->storePubliclyAs($ruta,$name);                

        $capsulas = new capsulas($request->all());
        $capsulas->url = $name;
        $capsulas->archivo = $ext;
        $capsulas->save();
        Flash::success('La guía ' . $capsulas->titulo . ' ha sido guardado con éxito!');
        return redirect("admin/capsulas/" . $request->id_asignatura);   
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
    	$capsulas = capsulas::find($id);
    	return view('admin.capsulas.edit')->with('capsula', $capsulas);        
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
        $capsulas= capsulas::find($id);
        $capsulas->titulo = $request->titulo;
        $capsulas->descripcion = $request->descripcion;
        $capsulas->Observacion = $request->Observacion;
        $capsulas->save();

        Flash::warning('La cápsula ' . $capsulas->titulo . ' ha  sido editado con exito!');
        return redirect("admin/capsulas/" . $id_asignatura[0]->id_asignatura);
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
        $capsula= capsulas::find($id);
        //dd($user);   lo muestra si lo consigue
        $capsula->delete();
        Flash::error('El capsula '  . $capsula->titulo .  ' ha sido borrado de forma exitosa!' );
        return redirect("admin/capsulas/" . $id_asignatura[0]->id_asignatura);
    }
    public function descargar($url){
        return response()->download(storage_path('app\\public\\'.$url));
    }
}