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
		<!--[if lt IE 9]>
			<script src="js/ie/respond.min.js" cache="false">
			</script>
			<script src="js/ie/html5.js" cache="false">
			</script>
			<script src="js/ie/fix.js" cache="false">
			</script>
		<![endif]-->
	</head>
	<body style=" background-image:url(images/dragon-wallpaper-lineage-2-1920x1080.jpg) !important; background-size:cover !important;">
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
							<div class="col-lg-8">
                            
                            
                            <div class="panel-group m-b" id="accordion2">
									<div class="panel fondo-transparente-negro-075 borde-transparente-negro">
										<div class="panel-heading fondo-transparente-negro-075">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"> <strong>Bienvenido <?php  echo $mybb->user['username']; ?> <?php echo $userdata['login']; ?> a L2 Linekkit</strong> </a>
										</div>
										<div id="collapseOne" class="panel-collapse in">
											
                                            <div class="panel-body">
                                            
                                            <!-- Estadísticas principales-->
                                            
                                            <!-- Fila de arriba-->
                                            <div class="row m-b-lg">
                                            
                                            	<div class="col-lg-7">
                                           	    <img src="images/wizard.jpg" width="460" height="185"> 
                                                </div>
                                                
                                                <div class="col-lg-5">
                                                </div>
                                            
                                            </div>
                                            <!-- /Fila de arriba-->
                                            
                                            <!-- Fila de abajo-->
                                            <div class="row">
                                            
                                                
                                                
                                                
                                                <!-- Gráfico de barras: KILLS -->
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
                                                                </div>
                                                            <div class="m-t-lg"></div>
                                                            
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
                                                <!-- / Gráfico de barras: KILLS -->
                                                
                                                <!-- Gráfico de barras: PKs -->
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
                                                                </div>
                                                            <div class="m-t-lg"></div>
                                                            
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
                                                <!-- / Gráfico de barras: PKs -->
                                                
                                                <!-- Gráfico de barras: Heroes -->
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
                                                                </div>
                                                            <div class="m-t-lg"></div>
                                                            
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
                                                <!-- / Gráfico de barras: Heroes -->
                                            </div>
                                            
											</div>
                                            
										</div>
										<!-- / Fila de abajo-->
                                        
                                        <!-- / Estadísticas principales-->
                                        
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
                            
								<section class="panel">
									<form>
										<textarea class="form-control input-lg no-border" rows="2" placeholder="Publica algo en la comunidad...">
										</textarea>
									</form>
									<footer class="panel-footer bg-light lter">
										<button class="btn btn-info pull-right">
											PUBLICAR
									  </button>
										<ul class="nav nav-pills">
											<li>
												<a href="#"><i class="icon-location-arrow"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon-camera"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon-facetime-video"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon-microphone"></i></a>
											</li>
										</ul>
									</footer>
								</section>

							</div>
                            
                            <!-- Panel de la derecha-->
                            
							<?php include_once('status.php');
                            getStatus();//
                            ?>
                                <!-- Votos -->
                                <section class="panel clearfix">
									<div class="panel-body">
										
										<div class="clear">
											<a href="#" class="text-info">Ayudanos con tu Voto!</a><a class="pull-right" href="#"><i class="icon-thumbs-up"></i></a>
											<small class="block text-muted">
												
											</small>
                                            <div class="pull-in bg-light clearfix m-b-n">
											     <p class="m-t-sm m-b text-center animated bounceInDown">
                                                    <a href="http://vgw.hopzone.net/site/vote/95232/1" target="_blank"><img src="http://linekkit.com/images/hopzone.png" alt="Votar por Linekkit" >
                                                    </a>
                                                </p>
											</div>
										</div>
									</div>
								</section>
                                <section class="panel clearfix">
									<div class="panel-body">
                                <div class="clear">
											<a href="#" class="text-info">Ayudanos con tu Voto!</a><a class="pull-right" href="#"><i class="icon-thumbs-up"></i></a>
											
                                            <div class="pull-in bg-light clearfix m-b-n">
											     <p class="m-t-sm m-b text-center animated bounceInDown">
                                                    <a rel="nofollow" target="_blank" href="http://l2topzone.com/vote.php?id=9744" title="Lineage 2 Servers"><img src="http://linekkit.com/images/topzone.png" alt="Votar por Linekkit" >
                                                    </a>
                                                </p>
											</div>

											
									  </div>
									</div>
								</section>
                                <!-- /Votos -->
								
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