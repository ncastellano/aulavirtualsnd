<!DOCTYPE html>
<html>
<head>	
    <meta charset="utf-8">

<style type="text/css">
*{	margin: 10 px;


}

.cover{
   background-size: cover;
   background-attachment: fixed;
   background-repeat: no-repeat;
   background-color: #fff;
   background-image: url(../assets/img/fontLogin.jpg);
}
.titulo{
   color: white;
}
.tabla{
	background-color: white;
	padding: 20px 20px;

}

.img-responsive_av{

	width: 20%;
	height: auto;

	}

label {
   width: 50%;
  
    padding: 10px 10px  
}

 /*div{
  margin: .4em 0;  
   padding: 20px 50px 
}*/

.selector {
  position: absolute;
  left: 50%;
  top: 300%;
  width: 140px;
  height: 140px;
  margin-top: -70px;
  margin-left: -70px;
}

.selector,
.selector button {
  font-family: 'Oswald', sans-serif;
  font-weight: 300;
}

.selector button {
  position: relative;
  width: 100%;
  height: 100%;
  padding: 10px;
  background: #424a5d;
  border-radius: 50%;
  border: 0;
  color: white;
  font-size: 20px;
  cursor: pointer;
  box-shadow: 0 3px 3px rgba(0, 0, 0, 0.1);
  transition: all .1s;
}

.selector button:hover { background: #3071a9; }

.selector button:focus { outline: none; }

.selector ul {
  position: absolute;
  list-style: none;
  padding: 0;
  margin: 0;
  top: -20px;
  right: -20px;
  bottom: -20px;
  left: -20px;
}

.selector li {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-transform: rotate(-360deg);
  transition: all 0.8s ease-in-out;
}

.selector li input { display: none; }

.selector li input + label {
  color:#fff;
  position: absolute;
  left: 50%;
  bottom: 100%;
  width: 0;
  height: 0;
  line-height: 8px;
  margin-left: 0;
  background: #424a5d;
  border-radius: 50%;
  vertical-align: middle;
  text-align:  center;
  font-size: 1px;
  overflow: hidden;
  cursor: pointer;
  box-shadow: none;
  transition: all 0.8s ease-in-out, color 0.1s, background 0.1s;
}

.selector li input + label:hover { 
  color: #424a5d;
  background: #fff; }

.selector li input:checked + label {
  background: #5cb85c;
  color: white;
}

.selector li input:checked + label:hover { background: #449d44; }

.selector.open li input + label {
  width: 120px;
  height: 120px;
  line-height: 30px;
  margin-left: -40px;
  box-shadow: 0 3px 3px rgba(0, 0, 0, 0.1);
  font-size: 16px;
}
.titulo{
    margin-left: 350px;
    color: grey;
}
</style>

	<title>@yield('title') ~ San Nicolás Diacono</title>

	<link rel="stylesheet" href="{{ asset('plugins/css/main.css') }} ">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"  href="{{ asset('plugins/chosen/chosen.css')}} ">
	<link rel="stylesheet"  href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }} ">

	<!-- <link rel="stylesheet"  href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">  --> 



	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Aula Virtual</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('plantilla/Theme/assets/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('plantilla/Theme/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plantilla/Theme/assets/css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plantilla/Theme/assets/js/gritter/css/jquery.gritter.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plantilla/Theme/assets/lineicons/style.css')}}">    
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('plantilla/Theme/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('plantilla/Theme/assets/css/style-responsive.css')}}" rel="stylesheet">

    <script src="{{ asset('plantilla/Theme/assets/js/chart-master/Chart.js')}}"></script>	



</head>
<body class="cover">

@include('template_n.partials.errors')

	
@include('template_n.partials.side')

<div class="container">

	<div class="cold-md-8">
	@include('flash::message')

	


	


	</div>
</div>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script  src="{{ asset('plugins/jquery/js/jquery-3.2.1.js')}}"></script>
<script  src="{{ asset('plugins/jquery/js/bootstrap.js')}}"></script>
<script  src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
<script  src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>





<!-- js placed at the end of the document so the pages load faster -->
  <!--  <script src="{{ asset('plantilla/Theme/assets/js/jquery.js')}}"></script> -->
  <!--  <script src="{{ asset('plantilla/Theme/assets/js/jquery-1.8.3.min.js')}}"></script> -->
  <!--  <script src="{{ asset('plantilla/Theme/assets/js/bootstrap.min.js')}}"></script> -->
    <script class="include" type="text/javascript" src="{{ asset('plantilla/Theme/assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{ asset('plantilla/Theme/assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{ asset('plantilla/Theme/assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{ asset('plantilla/Theme/assets/js/jquery.sparkline.js')}}"></script>


    <!--common script for all pages-->
    <script src="{{ asset('plantilla/Theme/assets/js/common-scripts.js')}}"></script>
    
    <script type="text/javascript" src="{{ asset('plantilla/Theme/assets/js/gritter/js/jquery.gritter.js')}}"></script>
    <script type="text/javascript" src="{{ asset('plantilla/Theme/assets/js/gritter-conf.js')}}"></script>

    <!--script for this page-->
    <script src="{{ asset('plantilla/Theme/assets/js/sparkline-chart.js')}}"></script>    
  <script src="{{ asset('plantilla/Theme/assets/js/zabuto_calendar.js')}}"></script>  
  
  <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Proyectos',
            // (string | mandatory) the text inside the notification
            text: 'Tiene informes pendientes por revisar',
            // (string | optional) the image to display on the left
            image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '5',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
  </script>
  
  <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>


 
<!--<script  src="{{ asset('plugins/bootstrap/css/bootstrap.css')}}"></script>  -->
@yield('js')
</body>


</html>

