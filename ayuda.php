<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");
include_once 'statsfeed.php'; 
$todayStats=getTodayTops();
define('IN_MYBB', NULL);
require_once 'forum/global.php';
require_once 'forum/MyBBIntegrator.php';
$MyBBI = new MyBBIntegrator($mybb, $db, $cache, $plugins, $lang, $config); 
$forumpath = 'forum/';

chdir($forumpath);
require_once MYBB_ROOT."inc/class_parser.php";
$parser = new postParser;
chdir('../');

include_once("session.php");
if(!isacmlogged()){
    $else='';
    if (isset($_GET['error'])) 
        $else.="?error=".$_GET['error'];
    if (isset($_GET['valid'])) 
        $else.="?valid=".$_GET['valid'];		
    echo '<script language="javascript">
			window.top.location="signin.php'.$else.'"
			</script>';
    exit();
}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>
			Linekkit
		</title>
		<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
          <link rel="stylesheet" href="css/animate.css" type="text/css" />
          <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
          <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
          <link rel="stylesheet" href="css/plugin.css" type="text/css" />
          <link rel="stylesheet" href="css/app.css" type="text/css" />
        <link rel="stylesheet" href="css/lkcss.css">
        <link href='http://fonts.googleapis.com/css?family=Alegreya+SC' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
			<script src="js/ie/respond.min.js" cache="false">
			</script>
			<script src="js/ie/html5.js" cache="false">
			</script>
			<script src="js/ie/fix.js" cache="false">
			</script>
		<![endif]-->
	</head>
	<body style="background-image:url(images/bg-raid-boss.jpg) !important; background-size:cover !important;">
		
        <!-- API de Facebook -->
        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=438576089566191";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
		<!-- / API de Facebook -->

        <section class="hbox stretch">
			<?php
            include_once('barralateral.php');
            getBar(1,1);//getbar(tipoDeBarra,<li>activo)
            ?>
			<!-- .vbox -->
			<section id="content">
				<section class="vbox">
					<section class="scrollable wrapper">
                    
                    	<div class="col-lg-12 row m-b-lg">
                        <img src="images/logo.png" width="450" height="127"> 
                        </div>
                        
 				       <?php if (isset($_GET['error'])) {
					require_once './acm/language/spanish.php'; ?>
					<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                    <i class="icon-ban-circle"></i> <?php echo $vm[$_GET['error']];?> </div>
					 <?php };?>
					 <?php if (isset($_GET['valid'])) {
					 require_once './acm/language/spanish.php';?>
					 <div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                     <i class="icon-ok-sign"></i> <?php echo $vm[$_GET['valid']];?> </div>
					 <?php };?>  
                        
                        <div class="col-lg-12 panel fondo-transparente-negro-075 borde-transparente-negro">
                        <!-- .accordion -->
			              <div class="panel-group m-b m-t-lg" id="accordion2">
			                
			              	<div class="row wrapper" style="padding-bottom:0; padding-top:0">
                                <h1 class="text-center letras-blancas" style="font-family:Alegreya SC; margin-top:0;"><b>Preguntas frecuentes y asistencia</b></h1>        
                            </div>
    
	                         <div class="row panel-body">
                             	<p class="letras-blancas text-center">
                             	En esta sección vas a poder encontrar las respuestas a muchas de las preguntas que los usuarios más se plantean.
                             	Desde respuestas sobre aspectos jugables hasta detalles técnicos sobre el funcionamiento del juego, las respuestas
                             	que se presentan a continuación han sido de ayuda para muchos. Sin embargo, si tu duda no se ajusta ninguno de los siguientes casos
                             	podes ponerte en contacto con el equipo de Linekkit y la comunidad a través del foro, donde siempre vas a encontrar un respuesta.
                             	</p>
                             </div>
                             
			                <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq1">
			                      Collapsible Group Item #1
			                    </a>
			                  </div>
			                  <div id="faq1" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			                    </div>
			                  </div>
			                </div>
			                <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq2">
			                      Collapsible Group Item #2
			                    </a>
			                  </div>
			                  <div id="faq2" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			                    </div>
			                  </div>
			                </div>
			                <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq3">
			                      Collapsible Group Item #3
			                    </a>
			                  </div>
			                  <div id="faq3" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			                    </div>
			                  </div>
			                </div>
			                <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq4">
			                      Collapsible Group Item #3
			                    </a>
			                  </div>
			                  <div id="faq4" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			                    </div>
			                  </div>
			                </div>
			                <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq5">
			                      Collapsible Group Item #3
			                    </a>
			                  </div>
			                  <div id="faq5" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			                    </div>
			                  </div>
			                </div>
			                <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq6">
			                      Collapsible Group Item #3
			                    </a>
			                  </div>
			                  <div id="faq6" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			                    </div>
			                  </div>
			                </div>

                             <div class="row m-t-lg m-l-sm m-r-sm">
                             
	                             <div class="col-xs-8">
	                             	<h4 class="text-center letras-blancas" style="font-family:Alegreya SC; margin-top:8px;"><b>
	                             	¿Todavía tenes dudas?, realizá tu consulta en el foro y te damos una mano!</b></h4>
	                             </div>
	                             
	                             <div class="col-xs-4">
	                             	<a href="/forum/newthread.php?fid=4" class="btn btn-warning letras-negras btn-block m-b-sm"><i class="icon-group pull-left"></i><b>
	                             	Realizar consulta</b></a>
	                             </div>
                             </div>

			              </div>
			              <!-- / .accordion -->
			              </div>
                                                
					</section>
				</section>
				<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body"></a>
			</section>
			<!-- /.vbox -->
		</section>
        
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.js"></script>
        <!-- Sparkline Chart -->
        <script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
        <!-- App -->
        <script src="js/app.js"></script>
        <script src="js/app.plugin.js"></script>
        <script src="js/app.data.js"></script>  
		
        <!--  fix carousel canvas -->
        <script type="text/javascript">
        $('#c-slide').on('slid.bs.carousel', function () {
            $.sparkline_display_visible();
        });
        </script>
        <!--  /fix carousel canvas -->

	</body>

</html>