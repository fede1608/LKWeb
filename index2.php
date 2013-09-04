<?php
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
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>
			Linekkit
		</title>
		<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="css/app.v1.css">
		<link rel="stylesheet" href="css/font.css" cache="false">
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
	<body style="background-image:url(images/dragon-wallpaper-lineage-2-1920x1080.jpg) !important; background-size:cover !important;">
		
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
            getBar(1,1);//getbat(tipoDeBarra,<li>activo)
            ?>
			<!-- .vbox -->
			<section id="content">
				<section class="vbox">
					<section class="scrollable wrapper">
                    
                    	<div class="row">
                        <img src="images/logo.png" width="450" height="127"> 
                        </div>
                                                
						<div class="row">
							<div class="col-lg-9">
                            
                            
                            <div class="panel-group m-b" id="accordion2">
									<div class="panel fondo-transparente-negro-075 borde-transparente-negro">
										<div class="panel-heading fondo-transparente-negro-075">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"> <strong>Bienvenido <?php  echo $mybb->user['username']; ?> <?php echo $userdata['login']; ?> a L2 Linekkit</strong> </a>
										</div>
										
                                        <div id="collapseOne" class="panel-collapse in fondo-transparente-negro-075">
                                        
                                                <div class="panel-body no-border">
                                                    <div class="carousel slide auto panel-body no-border" id="c-slide">
                                                            <ol class="carousel-indicators out">
                                                                    <li data-target="#c-slide" data-slide-to="0" class="">
                                                                    </li>
                                                                    <li data-target="#c-slide" data-slide-to="1" class="active">
                                                                    </li>
                                                                    <li data-target="#c-slide" data-slide-to="2" class="">
                                                                    </li>
                                                            </ol>
                                                            <div class="carousel-inner">
                                                                    <div class="item active">
                                                                            <div class="panel-body no-border">
                                                                                    <div class="row m-b-lg">
                                                                                            <div class="col-lg-4">
                                                                                                    <img src="images/humanos.png" width="240" height="369">
                                                                                            </div>
                                                                                            <div class="col-lg-8" style="text-align:center;">
                                                                                                    <div class="letras-blancas">
                                                                                                            <h1 style="font-family:Alegreya SC; margin-top:0">
                                                                                                                    <b>
                                                                                                                            Personaje principal
                                                                                                                    </b>
                                                                                                            </h1>
                                                                                                            <h2 style="font-family:Alegreya SC;">
                                                                                                                    Nombre: Adenamon
                                                                                                                    <br>
                                                                                                                    Raza: Humano
                                                                                                                    <br>
                                                                                                                    Clase: Dark Avenger
                                                                                                            </h2>
                                                                                                            <h1 style="font-family:Alegreya SC; margin-top:0">
                                                                                                                    Nivel
                                                                                                            </h1>
                                                                                                            <h1 style="font-family:Alegreya SC; font-size:128px; margin-top:-20px">
                                                                                                                    <b>
                                                                                                                            76
                                                                                                                    </b>
                                                                                                            </h1>
                                                                                                    </div>
                                                                                                    
                                                                                                    <!-- Barra de XP-->
                                                                                                    <div class="row m-n">
                                                                                                            <div class=" progress m-t-sm progress-striped active" style="margin-bottom:0;margin-top:0">
                                                                                                                <div class="progress-bar progress-bar-warning" data-toggle="tooltip" data-original-title="40% restante para nivel 77" style="width: 60%">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                    </div>
                                                                                                    <!-- / Barra de XP-->
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                            <div class="col-lg-4">
                                                                                                    <section class="panel no-borders">
                                                                                                            <header class="panel-heading bg-success lter">
                                                                                                                    <span class="pull-right">
                                                                                                                            Hoy
                                                                                                                    </span>
                                                                                                                    <span class="h4">
                                                                                                                            7 KILLS
                                                                                                                            <br>
                                                                                                                            <small class="text-muted">
                                                                                                                                    Esta semana
                                                                                                                            </small>
                                                                                                                    </span>
                                                                                                                    <div class="text-center padder m-b-n-sm m-t-sm">
                                                                                                                            <div class="sparkline" data-type="line" data-resize="true" data-height="65" data-width="100%" data-line-width="2" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff"
                                                                                                                            data-spot-radius="3" data-data="[220,210,200,325,250,320,345,250,250,250,400,380]">
                                                                                                                                    <canvas style="display: inline-block; width: 148px; height: 65px; vertical-align: top;" width="148" height="65">
                                                                                                                                    </canvas>
                                                                                                                            </div>
                                                                                                                            <div class="m-t-lg">
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            </header>
                                                                                                            <div class="panel-body">
                                                                                                                    <div>
                                                                                                                            <span class="text-muted">
                                                                                                                                    Total de Kills:
                                                                                                                            </span>
                                                                                                                            <span class="h3 block">
                                                                                                                                    25 Kills
                                                                                                                            </span>
                                                                                                                    </div>
                                                                                                                    <div class="row m-t-sm">
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Mínimo
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            0 Kills
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Promedio
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            1.25 Kills
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Máximo
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            12 Kills
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                    </section>
                                                                                            </div>
                                                                                            <div class="col-lg-4">
                                                                                                    <section class="panel no-borders">
                                                                                                            <header class="panel-heading bg-danger lter">
                                                                                                                    <span class="pull-right">
                                                                                                                            Hoy
                                                                                                                    </span>
                                                                                                                    <span class="h4">
                                                                                                                            7 PKs
                                                                                                                            <br>
                                                                                                                            <small class="text-muted">
                                                                                                                                    Esta semana
                                                                                                                            </small>
                                                                                                                    </span>
                                                                                                                    <div class="text-center padder m-b-n-sm m-t-sm">
                                                                                                                            <div class="sparkline" data-type="line" data-resize="true" data-height="65" data-width="100%" data-line-width="2" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff"
                                                                                                                            data-spot-radius="3" data-data="[220,210,200,325,250,320,345,250,250,250,400,380]">
                                                                                                                                    <canvas style="display: inline-block; width: 148px; height: 65px; vertical-align: top;" width="148" height="65">
                                                                                                                                    </canvas>
                                                                                                                            </div>
                                                                                                                            <div class="m-t-lg">
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            </header>
                                                                                                            <div class="panel-body">
                                                                                                                    <div>
                                                                                                                            <span class="text-muted">
                                                                                                                                    Total de PKs:
                                                                                                                            </span>
                                                                                                                            <span class="h3 block">
                                                                                                                                    25 PKs
                                                                                                                            </span>
                                                                                                                    </div>
                                                                                                                    <div class="row m-t-sm">
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Mínimo
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            0 PKs
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Promedio
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            1.25 PKs
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Máximo
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            12 PKs
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                    </section>
                                                                                            </div>
                                                                                            <div class="col-lg-4">
                                                                                                    <section class="panel no-borders">
                                                                                                            <header class="panel-heading bg-dark lter">
                                                                                                                    <span class="pull-right">
                                                                                                                            Hoy
                                                                                                                    </span>
                                                                                                                    <span class="h4">
                                                                                                                            7 Puntos
                                                                                                                            <br>
                                                                                                                            <small class="text-muted">
                                                                                                                                    Esta semana
                                                                                                                            </small>
                                                                                                                    </span>
                                                                                                                    <div class="text-center padder m-b-n-sm m-t-sm">
                                                                                                                            <div class="sparkline" data-type="line" data-resize="true" data-height="65" data-width="100%" data-line-width="2" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff"
                                                                                                                            data-spot-radius="3" data-data="[220,210,200,325,250,320,345,250,250,250,400,380]">
                                                                                                                                    <canvas style="display: inline-block; width: 148px; height: 65px; vertical-align: top;" width="148" height="65">
                                                                                                                                    </canvas>
                                                                                                                            </div>
                                                                                                                            <div class="m-t-lg">
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            </header>
                                                                                                            <div class="panel-body">
                                                                                                                    <div>
                                                                                                                            <span class="text-muted">
                                                                                                                                    Total de puntos en Olys:
                                                                                                                            </span>
                                                                                                                            <span class="h3 block">
                                                                                                                                    25 Puntos
                                                                                                                            </span>
                                                                                                                    </div>
                                                                                                                    <div class="row m-t-sm">
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Mínimo
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            0 Puntos
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Promedio
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            1.25 Puntos
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Máximo
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            12 Puntos
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                    </section>
                                                                                            </div>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="item">
                                                                            <div class="panel-body no-border">
                                                                                    <div class="row m-b-lg">
                                                                                            <div class="col-lg-4">
                                                                                                    <img src="images/elfos.png" width="240" height="369">
                                                                                            </div>
                                                                                            <div class="col-lg-8" style="text-align:center;">
                                                                                                    <div class="letras-blancas">
                                                                                                            <h1 style="font-family:Alegreya SC; margin-top:0">
                                                                                                                    <b>
                                                                                                                            Personaje secundario
                                                                                                                    </b>
                                                                                                            </h1>
                                                                                                            <h2 style="font-family:Alegreya SC;">
                                                                                                                    Nombre: HelloKity
                                                                                                                    <br>
                                                                                                                    Raza: Elfo
                                                                                                                    <br>
                                                                                                                    Clase: Spellsinger
                                                                                                            </h2>
                                                                                                            <h1 style="font-family:Alegreya SC; margin-top:0">
                                                                                                                    Nivel
                                                                                                            </h1>
                                                                                                            <h1 style="font-family:Alegreya SC; font-size:128px; margin-top:-20px">
                                                                                                                    <b>
                                                                                                                            41
                                                                                                                    </b>
                                                                                                            </h1>
                                                                                                    </div>
                                                                                                    
                                                                                                    <!-- Barra de XP-->
                                                                                                    <div class="row m-n">
                                                                                                            <div class=" progress m-t-sm progress-striped active" style="margin-bottom:0;margin-top:0">
                                                                                                                <div class="progress-bar progress-bar-warning" data-toggle="tooltip" data-original-title="65% restante para nivel 42" style="width: 35%">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                    </div>
                                                                                                    <!-- / Barra de XP-->
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                            <div class="col-lg-4">
                                                                                                    <section class="panel no-borders">
                                                                                                            <header class="panel-heading bg-success lter">
                                                                                                                    <span class="pull-right">
                                                                                                                            Hoy
                                                                                                                    </span>
                                                                                                                    <span class="h4">
                                                                                                                            7 KILLS
                                                                                                                            <br>
                                                                                                                            <small class="text-muted">
                                                                                                                                    Esta semana
                                                                                                                            </small>
                                                                                                                    </span>
                                                                                                                    <div class="text-center padder m-b-n-sm m-t-sm">
                                                                                                                            <div class="sparkline" data-type="line" data-resize="true" data-height="65" data-width="100%" data-line-width="2" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff"
                                                                                                                            data-spot-radius="3" data-data="[220,210,200,325,250,320,345,250,250,250,400,380]">
                                                                                                                                    <canvas style="display: inline-block; width: 147px; height: 65px; vertical-align: top;" width="147" height="65">
                                                                                                                                    </canvas>
                                                                                                                            </div>
                                                                                                                            <div class="m-t-lg">
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            </header>
                                                                                                            <div class="panel-body">
                                                                                                                    <div>
                                                                                                                            <span class="text-muted">
                                                                                                                                    Total de Kills:
                                                                                                                            </span>
                                                                                                                            <span class="h3 block">
                                                                                                                                    25 Kills
                                                                                                                            </span>
                                                                                                                    </div>
                                                                                                                    <div class="row m-t-sm">
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Mínimo
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            0 Kills
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Promedio
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            1.25 Kills
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Máximo
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            12 Kills
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                    </section>
                                                                                            </div>
                                                                                            <div class="col-lg-4">
                                                                                                    <section class="panel no-borders">
                                                                                                            <header class="panel-heading bg-danger lter">
                                                                                                                    <span class="pull-right">
                                                                                                                            Hoy
                                                                                                                    </span>
                                                                                                                    <span class="h4">
                                                                                                                            7 PKs
                                                                                                                            <br>
                                                                                                                            <small class="text-muted">
                                                                                                                                    Esta semana
                                                                                                                            </small>
                                                                                                                    </span>
                                                                                                                    <div class="text-center padder m-b-n-sm m-t-sm">
                                                                                                                            <div class="sparkline" data-type="line" data-resize="true" data-height="65" data-width="100%" data-line-width="2" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff"
                                                                                                                            data-spot-radius="3" data-data="[220,210,200,325,250,320,345,250,250,250,400,380]">
                                                                                                                                    <canvas style="display: inline-block; width: 147px; height: 65px; vertical-align: top;" width="147" height="65">
                                                                                                                                    </canvas>
                                                                                                                            </div>
                                                                                                                            <div class="m-t-lg">
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            </header>
                                                                                                            <div class="panel-body">
                                                                                                                    <div>
                                                                                                                            <span class="text-muted">
                                                                                                                                    Total de PKs:
                                                                                                                            </span>
                                                                                                                            <span class="h3 block">
                                                                                                                                    25 PKs
                                                                                                                            </span>
                                                                                                                    </div>
                                                                                                                    <div class="row m-t-sm">
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Mínimo
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            0 PKs
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Promedio
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            1.25 PKs
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Máximo
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            12 PKs
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                    </section>
                                                                                            </div>
                                                                                            <div class="col-lg-4">
                                                                                                    <section class="panel no-borders">
                                                                                                            <header class="panel-heading bg-dark lter">
                                                                                                                    <span class="pull-right">
                                                                                                                            Hoy
                                                                                                                    </span>
                                                                                                                    <span class="h4">
                                                                                                                            7 Puntos
                                                                                                                            <br>
                                                                                                                            <small class="text-muted">
                                                                                                                                    Esta semana
                                                                                                                            </small>
                                                                                                                    </span>
                                                                                                                    <div class="text-center padder m-b-n-sm m-t-sm">
                                                                                                                            <div class="sparkline" data-type="line" data-resize="true" data-height="65" data-width="100%" data-line-width="2" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff"
                                                                                                                            data-spot-radius="3" data-data="[220,210,200,325,250,320,345,250,250,250,400,380]">
                                                                                                                                    <canvas style="display: inline-block; width: 147px; height: 65px; vertical-align: top;" width="147" height="65">
                                                                                                                                    </canvas>
                                                                                                                            </div>
                                                                                                                            <div class="m-t-lg">
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            </header>
                                                                                                            <div class="panel-body">
                                                                                                                    <div>
                                                                                                                            <span class="text-muted">
                                                                                                                                    Total de puntos en Olys:
                                                                                                                            </span>
                                                                                                                            <span class="h3 block">
                                                                                                                                    25 Puntos
                                                                                                                            </span>
                                                                                                                    </div>
                                                                                                                    <div class="row m-t-sm">
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Mínimo
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            0 Puntos
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Promedio
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            1.25 Puntos
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                            <div class="col-xs-4">
                                                                                                                                    <small class="text-muted block">
                                                                                                                                            Máximo
                                                                                                                                    </small>
                                                                                                                                    <span>
                                                                                                                                            12 Puntos
                                                                                                                                    </span>
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                    </section>
                                                                                            </div>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                            <a class="left carousel-control" href="#c-slide" data-slide="prev"> <i class="icon-angle-left"></i> </a>
                                                            <a class="right carousel-control" href="#c-slide" data-slide="next"> <i class="icon-angle-right"></i> </a>
                                                    </div>
                                            </div>
                                        
                                        </div>
                                        
                                    </div>
							  </div>
                            
                            <!-- Noticias -->
                            
								<section class="panel fondo-transparente-negro-075 borde-transparente-negro">
									<header class="panel-heading  fondo-transparente-negro-075 borde-transparente-negro" >
										<span class="badge bg-info pull-right">
											32
										</span>
										News
									</header>
                                    
									<section class="panel-body">
                                    <?php 
                                            include 'newsfeed.php';
											$cantidad=3;
                                            $notis=getNews($cantidad,1); 
                                            foreach($notis as $noti){
                                                $noti['fecha']= $noti['fecha'] - (4*60*60);
                                                echo'<article class="media">
											<div class="pull-left thumb-sm">
												<span class="icon-stack">
													<i class="icon-circle text-success icon-stack-base">
													</i>
													<i class="icon-flag icon-light">
													</i>
												</span>
											</div>
											<div class="media-body">
												<div class="pull-right media-xs text-center text-muted">
													<strong class="h4">
														'.date('d',$noti['fecha']).'
													</strong>
													<br>
													<small class="label bg-light">
														'.date('M',$noti['fecha']).'
													</small>
												</div>
												<a href="#" class="h4">'.$noti['titulo'].'</a>
                                                <small class="block text-muted">
															By '.$noti[autor].'
												</small>
												<small class="block m-t-sm">
													'.$noti['contenido'].'
												</small>
											</div>
										</article><div class="line pull-in">
										</div>';
                                                }
                                            
                                            ?>
										
									</section>
								</section>
								<!-- /Noticias -->

							</div>   
                            
                            <!-- Panel de la derecha-->
                            <div class="col-lg-3">
                                                        
                                <!-- Votos -->
                                <section class="panel clearfix borde-transparente-negro" style="background-color:transparent">
									<div class="panel-body fondo-transparente-negro-075 borde-transparente-negro" >
										
										<div class="clear">
											
                                            <h2 class="text-center letras-blancas" style="font-family:Alegreya SC; margin-top:0">Apoya a Linekkit</h2>
                                            
                                            <div class="pull-in clearfix m-b-n">
											     <div class="m-t-sm m-b text-center animated bounceInDown">
                                                 	
                                                    <div class="row">
                                                    <a href="http://vgw.hopzone.net/site/vote/95232/1" target="_blank"><img src="http://linekkit.com/images/hopzone.png" alt="Votar por Linekkit" ></a>
                                                    </div>
                                                    
                                                    <div class="row m-t-sm m-b-lg">
                                                    <a rel="nofollow" target="_blank" href="http://l2topzone.com/vote.php?id=9744" title="Lineage 2 Servers"><img src="http://linekkit.com/images/topzone.png" alt="Votar por Linekkit" ></a>
                                                    </div>
                                                    
                                                    <!-- Sección de Facebook-->
                                                    <div class="row">
                                                    	<div class="fb-like-box" data-href="https://www.facebook.com/Linekkit" data-width="260" data-height="300" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>                                                   </div>
                                                    
                                                </div>
											</div>
										</div>
									</div>
								</section>
                                <!-- /Votos -->     
                                
                                <section>
									<?php 
                                        include_once('status.php');
                                        getStatus();
                                    ?>
                                </section>                      
								
								<section class="panel">
									<div class="text-center wrapper">
										<div class="sparkline inline" data-type="pie" data-height="150" data-slice-colors="['#acdb83','#f2f2f2','#fb6b5b']">
											25000,23200,15000
										</div>
									</div>
									<ul class="list-group list-group-flush no-radius alt">
										<li class="list-group-item">
											<span class="pull-right">
												25,000
											</span>
											<span class="label bg-success">
												1
											</span>
											.inc company
										</li>
										<li class="list-group-item">
											<span class="pull-right">
												23,200
											</span>
											<span class="label bg-danger">
												2
											</span>
											Gamecorp
										</li>
										<li class="list-group-item">
											<span class="pull-right">
												15,000
											</span>
											<span class="label bg-light">
												3
											</span>
											Neosoft company
										</li>
									</ul>
								</section>
							 </div>
                             <!-- / Panel de la derecha-->
                             
						</div>
					</section>
				</section>
				<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body"></a>
			</section>
			<!-- /.vbox -->
		</section>
		<script src="css/app.v1.js">
		</script>
		<!-- Bootstrap -->
		<!-- Sparkline Chart -->
		<!-- App -->
	</body>

</html>