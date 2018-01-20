@extends('template_n.main')

@section('title', 'Asignaturas')

@section('content')
<style>

</style>  
   
<div clas="row"> 

	<div class="col-sm-3">
		<div class="form-group">
		<h4>Asignaturas</h4>
		<select id="asignaturas" class="form-control" onchange="asignatura()">
			<option value="0" selected>Seleccione una asignatura...</option>	
			 @foreach($asignaturas as $asignatura)
	      	<option value="{{ $asignatura->id }}-{{ ucfirst($asignatura->descripcion) }}">{{ $asignatura->descripcion }}</option>
	      
	 	   @endforeach
	    </select> 
	     </div>
	</div>
	<div class="col-sm-3">
	</div>
      
</div>

<div id="materia_id"></div>

<div id="selector" class='selector open'>
  <ul>
    <li>
      <input id='c1' type='checkbox'>
      <label for='c1'class="fa fa-pencil fa" onclick="ir(1)"><p>Cápsulas</p></label>
    </li>
    <li>
      <input id='c2' type='checkbox'>
      <label for='c2'class="fa fa-file-video-o fa" onclick="ir(2)"><p>Vídeos</p></label>
    </li>
    <li>
      <input id='c3' type='checkbox'>
      <label for='c3' class="fa fa-hdd-o fa" onclick="ir(3)"><p>Material Habilitado</p></label>
    </li>
    <li>
      <input id='c4' type='checkbox'>
      <label for='c4' class="fa fa-book fa" onclick="ir(4)"><p>Material Complementario</p></label>
    </li>
    <li>
      <input id='c5' type='checkbox'>
      <label for='c5' class="fa fa-file-text fa" onclick="ir(5)"><p>Guías</p></label>
    </li>
  </ul>
  <button id="btitulo">Asignatura no seleccionada</button>

</div>
<input id='cerrado' type='hidden'>
<script>
	function ir(valor){
    m_id = document.getElementById("m_id").value;
		switch(valor){
			case 1:
				location.href = "{{ URL::to('/') }}/admin/capsulas/"+m_id;
				break;
			case 2:
				location.href = "{{ URL::to('/') }}/admin/videos/"+m_id;
				break;
			case 3:
				location.href = "{{ URL::to('/') }}/admin/materialhs/"+m_id;
				break;
			case 4:
				location.href = "{{ URL::to('/') }}/admin/materialcs/"+m_id;
				break;
			case 5:
				location.href = "{{ URL::to('/') }}/admin/guias/"+m_id;
				break;		
		}
				
	}

	function asignatura(){
  		var asig = document.getElementById('asignaturas').value;
  			  res = asig.split("-");
          selector = document.getElementById('selector');
          materia_id = document.getElementById('materia_id');
          materia_id.innerHTML="<div id='materia_id'></div>";
          btitulo=document.getElementById('btitulo');

  		if(asig=="0"){
  			btitulo.innerHTML = "Seleccione una asignatura";
        if ($(selector).hasClass('selector open')){
          document.getElementById("btitulo").click();        
        }        
      }else{
  			btitulo.innerHTML = res[1];
        selector.style.display='block';
        materia_id.innerHTML="<div id='materia_id'><input id='m_id' type='hidden' value="+res[0]+"></div>";
        if (selector.className!="selector open"){
          document.getElementById("btitulo").click();
        }
      }
	}

</script>

<script>

	var items = document.querySelectorAll('.circle a');

	for(var i = 0, l = items.length; i < l; i++) {
	  items[i].style.left = (50 - 35*Math.cos(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
	  
	  items[i].style.top = (50 + 35*Math.sin(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
	}
	
</script>

<script src="{{ URL::to('/') }}/js/jquery-3.2.1.min.js"></script>

	<script>
var nbOptions = 8;
var angleStart = -360;

// jquery rotate animation
function rotate(li,d) {
    $({d:angleStart}).animate({d:d}, {
        step: function(now) {
            $(li)
               .css({ transform: 'rotate('+now+'deg)' })
               .find('label')
                  .css({ transform: 'rotate('+(-now)+'deg)' });
        }, duration: 0
    });
}

// show / hide the options
function toggleOptions(s) {
    $(s).toggleClass('open');
    var li = $(s).find('li');
    var deg = $(s).hasClass('half') ? 180/(li.length-1) : 360/li.length;
    for(var i=0; i<li.length; i++) {
        var d = $(s).hasClass('half') ? (i*deg)-90 : i*deg;
        $(s).hasClass('open') ? rotate(li[i],d) : rotate(li[i],angleStart);
    }

}

$('.selector button').click(function(e) {
    toggleOptions($(this).parent());
});

setTimeout(function() { toggleOptions('.selector'); }, 100);//@ sourceURL=pen.js
</script>
@endsection