<?php
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
    echo '<script language="javascript">
			window.top.location="signin.php"
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
		<meta name="description" content="Linekkit es el servidor de Lineage 2 con mayor crecimiento en la actualidad. Miles de usuarios nos recomiendan.">
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
		

        <section class="hbox stretch">
			<?php
            include_once('barralateral.php');
            getBar(1,5);//getbar(tipoDeBarra,<li>activo)
            ?>
			<!-- .vbox -->
			<section id="content" class="wrapper-md animated fadeInUp">
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
                     
                    <div class="row m-n">
                        <!-- Columna izquierda -->
                        <div class="col-lg-5">
                            <!-- .scrollable -->
                                        <section class="panel fondo-transparente-negro-075 borde-transparente-negro">
                        
                                            <header class="panel-heading text-center fondo-solido-rojo-1 borde-transparente-negro">    
                                                                        <b>Método MercadoPago</b>
                                            </header>
                                            
                                            <section class="panel-body letras-blancas">
<h2 style="text-align:center; font-family:Alegreya SC; margin-top:0">Recomendado</h2><h4 style="text-align:center; font-family:Alegreya SC">Sólo jugadores de Argentina</h4>
                                            
                                          </section>
                                            
                                            <div class="row m-n">
                                                <section class="panel-body" style="padding-bottom:0; padding-top:0">
                                                
                                                <img src="images/mercadopago_info_de_pagos_opt.jpg" style="width:100%">
                                                </section>
                                            </div>
                                            
                                          <section class="panel-body" style="padding-bottom:0; padding-top:0">
                                            <div class="panel-body" style="padding-top:0; padding-bottom:5; text-align:left">
                                                
                                                <h5 class="letras-blancas" style="text-align:left; font-family:Alegreya SC">
                                                <ul>
                                                	<li>
                                                    	Donaciones por tarjeta de crédito acreditadas instantáneamente
                                                    </li>
                                                    <li>
                                                    Donaciones por PagoFácil/Rapipago acreditadas en 24Hs hábiles automáticamente
                                                    </li>
                                                    <li>
                                                    Es posible donar utilizando crédito existente en la cuenta de MercadoPago, la acrecitación es instantánea
                                                    </li>
                                                    <li>
                                                    MercadoPago es un sitio seguro de los mismos dueños que MercadoLibre
                                                    </li>

                                                    
                                                </ul>
                                                </h5>
                                            </div>
                                            
                                                <div class="line line-dashed" style="margin-top:0">
                                                </div>
                                                
                                                <a href="modalMP.php" data-toggle="ajaxModal" class="btn btn-gplus btn-block m-b-sm"><i class="icon-gift pull-left"></i><b>Obtener Linekkit Coins por MercadoPago</b></a>
                                            </section>
                                                                       
                                        </section>
                                        <!-- / scrollable -->
                        </div>                
                        <!-- /Columna izquierda -->
                        
                        <!-- Columna central -->
                        <div class="col-lg-5">
                            <!-- .scrollable -->
                                        <section class="panel fondo-transparente-negro-075 borde-transparente-negro">
                        
                                            <header class="panel-heading text-center fondo-solido-azul-1 borde-transparente-negro">    
                                                                        <b>Método PayPal</b>
                                            </header>
                                            
                                            <section class="panel-body letras-blancas">
                                            
                                            <img src="images/paypal_logo.jpg" style="width:100%; max-height:250px;">
<h4 style="text-align:center; font-family:Alegreya SC">Disponible en todo el mundo, menos Argentina</h4>
                                            
                                          </section>
                                            
                                            
                                            
                                            <section class="panel-body" style="padding-bottom:0; padding-top:0">
                                            <div class="panel-body" style="padding-top:0; padding-bottom:5; text-align:left">
                                                
                                                <h5 class="letras-blancas" style="text-align:left; font-family:Alegreya SC">
                                                <ul>
                                                	<li>
                                                    	Todas las donaciones por este método se acreditan instantáneamente en tu cuenta
                                                    </li>
                                                    <li>
                                                    	PayPal no esta disponible para cuentas Argentinas
                                                    </li>
                                                    <li>
                                                    	PayPal acepta tarjetas de crédito
                                                    </li>
                                                    <li>
                                                    	Es posible donar con crédito de tu cuenta de PayPal
                                                    </li>
                                                </ul>
                                                </h5>
                                            </div>
                                            
                                            <div class="line line-dashed" style="margin-top:0">
                                            </div>
                                                
                                            <a href="modalPP.php" data-toggle="ajaxModal" class="btn btn-facebook btn-block m-b-sm"><i class="icon-gift pull-left"></i><b>Obtener Linekkit Coins por PayPal</b></a>
                                            
                                           </section>
                                                                       
                                        </section>
                                       
                        </div>                
                        <!-- /Columna central -->
                    
                    
                    <!-- Columna derecha -->
                        <div class="col-lg-2">
                            <section class="panel fondo-transparente-negro-075 borde-transparente-negro">
                                <header class="panel-heading text-center bg-warning borde-transparente-negro letras-negras">
                                    <b>Otros métodos</b>
                              </header>
                                
                       		<img src="images/western-union-logo.jpg" style="width:100%; max-height:133px">
                            <img src="images/logo-banco-nacion.jpg" style="width:100%; max-height:130px;">
                            <div class="row"></div>
                            <h5 class="letras-blancas" style="text-align:center; font-family:Alegreya SC">
                            5% Extra de Coins con Transf. Banc.
                            </h5>
                            <h5 class="letras-blancas" style="text-align:center; font-family:Alegreya SC">
                            Comunicate con nosotros para donar por estos métodos
                            </h5>
                            <a href="https://www.facebook.com/Linekkit" class="btn btn-facebook btn-block m-b-sm"><i class="icon-facebook pull-left"></i><b>MP Facebook</b></a>
                            <a href="http://linekkit.com/forum/newthread.php?fid=4" class="btn btn-warning btn-block m-b-sm letras-negras"><i class="icon-group pull-left"></i><b>Post en foro</b></a>
                            </section>
                        </div>
                        <!-- / Columna derecha -->
                        
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