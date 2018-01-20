@extends('template_n.main')

@section('title', 'Materiales complementarios')

@section('content')

<!--  Buscador  -->

<!--  fin buscador  -->
<div class="title"><h3 class="title" class="">Materiales complementarios de {{ ucfirst($asignatura[0]->descripcion) }}</h3></div>
<table class="table table table-hover">
   	<thead class="table">
   		<th>Título</th>
   		<th>Descripción</th>
   		<th>Tipo de archivo</th>
   		<th>Observación</th>   	

      <tbody class="table">
       @foreach($materialcs as $materialc)
       <tr>
           <td>{{ $materialc->titulo }}</td>
          <td>{{ $materialc->descripcion }}</td>
          <td><a href="{{URL::to('/') }}/admin/materialcs/descargar/{{$materialc->url }}" class="fa fa-file-text fa 4x"></a></td>
          <td>{{ $materialc->Observacion }}</td>
          <td><a href="{{ URL::to('/') }}/admin/materialcs/{{ $materialc->id }}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
          <a href="{{ URL::to('/') }}/admin/materialcs/destroy/{{ $materialc->id }}" onclick="return confirm('¿Seguro qué desea eliminar este material?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> </a>      </td>
           
        </tr>
        @endforeach
        </tbody>  	  
   	</thead>
</table>

   	<a href="{{ URL::to('/') }}/admin/materialcs/create/{{ ucfirst($asignatura[0]->id) }}" class="btn btn-success" >Agregar material</a>
   	
@endsection