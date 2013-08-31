<!DOCTYPE html>
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
		<!--[if lt IE 9]>
			<script src="js/ie/respond.min.js" cache="false">
			</script>
			<script src="js/ie/html5.js" cache="false">
			</script>
			<script src="js/ie/fix.js" cache="false">
			</script>
		<![endif]-->
	</head>
	<body>
		<section class="hbox stretch">
			<?php include_once('barralateral.php');
            getBar(1,1);//getbat(tipoDeBarra,<li>activo)
            ?>
			<!-- .vbox -->
			<section id="content">
				<section class="vbox">
					<header class="header bg-white b-b">
						<p>
                        <div class="text-center wrapper">
							<img src="http://linekkit.com/enConstruccion/images/lk.png" height="200" alt="" style="height:35%;width:80%;margin-top: -3%;"/>

						</p>
					</header>
					<section class="scrollable wrapper" style="top: 35%;">
						<div class="row">
							<div class="col-lg-8">
                            
                            
                            <div class="panel-group m-b" id="accordion2">
									<div class="panel">
										<div class="panel-heading">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"> <strong>Bienvenido a L2 Linekkit. Aqu&iacute; comienza tu aventura!</strong> </a>
										</div>
										<div id="collapseOne" class="panel-collapse in">
											<div class="panel-body text-sm">
											<p>L2 Linekkit es un servidor de Lineage 2 Freya.</p>
<p>El mismo cuenta con una gran comunidad de jugadores activos y un equipo de moderadores con amplios conocimientos sobre el juego que se encuentran a disposici&oacute;n de los usuarios tanto dentro del juego como en los foros.</p>
<p>Linekkit se diferencia del resto de los servidores por ser un servidor bien equilibrado, dar lugar a una comunidad interesada por jugar &quot;en serio&quot; y poner al jugador como m&aacute;xima prioridad en su d&iacute;a a d&iacute;a.</p>
<p>Todo esto se respalda, adem&aacute;s, con lo &uacute;ltimo en tecnolog&iacute;a de servidores para maximizar la experiencia de juego a la vez que la misma se expande al contar con un equipo de desarollo con una sola meta: convertir a Linekkit en el mejor servidor de Lineage 2 . Para acceder a la gu&iacute;a y a las descargas necesarias par conectarte a Linekkit, haz click <a href="./guia.php" style="display:inline;"> aqu&iacute;.</a>
											</div>
										</div>
									</div>
								</div>
                            
                            <!-- Noticias -->
                            
								<section class="panel">
									<header class="panel-heading">
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
										<textarea class="form-control input-lg no-border" rows="2" placeholder="What are you doing...">
										</textarea>
									</form>
									<footer class="panel-footer bg-light lter">
										<button class="btn btn-info pull-right">
											POST
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
								<div class="row">
									<div class="col-lg-6 col-sm-6">
										<section class="panel">
											<div class="panel-body">
												<div class="clearfix m-b">
													<small class="text-muted pull-right">
														5m ago
													</small>
													<a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a>
													<div class="clear">
														<a href="#"><strong>Jonathan Omish</strong></a>
														<small class="block text-muted">
															San Francisco, USA
														</small>
													</div>
												</div>
												<p>
													There are a few easy ways to quickly get started with Bootstrap...
												</p>
												<small class="">
													<a href="#"><i class="icon-comment-alt"></i> Comments (25)</a>
												</small>
											</div>
											<footer class="panel-footer pos-rlt">
												<span class="arrow top">
												</span>
												<form class="pull-out">
													<input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment...">
												</form>
											</footer>
										</section>
									</div>
									<div class="col-lg-6 col-sm-6">
										<section class="panel">
											<div class="panel-body">
												<div class="clearfix m-b">
													<small class="text-muted pull-right">
														1hr ago
													</small>
													<a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar_default.jpg" class="img-circle"> </a>
													<div class="clear">
														<a href="#"><strong>Mike Mcalidek</strong></a>
														<small class="block text-muted">
															Newyork, USA
														</small>
													</div>
												</div>
												<div class="pull-in bg-light clearfix m-b-n">
													<p class="m-t-sm m-b text-center animated bounceInDown">
														<i class="icon-map-marker text-danger icon-4x" data-toggle="tooltip" title="checked in at Newyork">
														</i>
													</p>
												</div>
											</div>
											<footer class="panel-footer pos-rlt">
												<span class="arrow top">
												</span>
												<form class="pull-out">
													<input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment...">
												</form>
											</footer>
										</section>
									</div>
								</div>
								<section class="panel no-borders hbox">
									<aside class="bg-info lter r-l text-center v-middle">
										<div class="wrapper">
											<i class="icon-dribbble icon-4x">
											</i>
											<p class="text-muted">
												<em>
													dribbble invitation
												</em>
											</p>
										</div>
									</aside>
									<aside>
										<div class="pos-rlt">
											<span class="arrow left hidden-xs">
											</span>
											<div class="panel-body">
												<div class="clearfix m-b">
													<small class="text-muted pull-right">
														2 days ago
													</small>
													<a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a>
													<div class="clear">
														<a href="#"><strong>Jonathan Omish</strong></a>
														<small class="block text-muted">
															San Francisco, USA
														</small>
													</div>
												</div>
												<p>
													Thank you for invite...
												</p>
												<small class="">
													<a href="#"><i class="icon-comment-alt"></i> Comments (10)</a>
												</small>
											</div>
											<footer class="panel-footer">
												<form class="pull-out b-t">
													<input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment...">
												</form>
											</footer>
										</div>
									</aside>
								</section>
								<section class="panel no-borders hbox">
									<aside>
										<div class="pos-rlt">
											<span class="arrow right hidden-xs">
											</span>
											<div class="panel-body">
												<div class="clearfix m-b">
													<small class="text-muted pull-right">
														2 days ago
													</small>
													<a href="#" class="thumb-sm pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a>
													<div class="clear">
														<a href="#"><strong>Jonathan Omish</strong></a>
														<small class="block text-muted">
															San Francisco, USA
														</small>
													</div>
												</div>
												<p>
													Flat design is more popular today. Google, Microsoft, Apple...
												</p>
												<small class="">
													<a href="#"><i class="icon-share"></i> Share (10)</a>
												</small>
											</div>
											<footer class="panel-footer">
												<form class="pull-out b-t">
													<input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment...">
												</form>
											</footer>
										</div>
									</aside>
									<aside class="bg-primary clearfix lter r-r text-right v-middle">
										<div class="wrapper h3 font-thin">
											7 things you need to know about the flat design
										</div>
									</aside>
								</section>
								<div class="text-center m-b">
									<i class="icon-spinner icon-spin">
									</i>
								</div>
							</div>
                            
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
								<section class="panel no-borders">
									<header class="panel-heading bg-success lter">
										<span class="pull-right">
											Friday
										</span>
										<span class="h4">
											$540
											<br>
											<small class="text-muted">
												+1.05(2.15%)
											</small>
										</span>
										<div class="text-center padder m-b-n-sm m-t-sm">
											<div class="sparkline" data-type="line" data-resize="true" data-height="65" data-width="100%" data-line-width="2" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff"
											data-spot-radius="3" data-data="[220,210,200,325,250,320,345,250,250,250,400,380]">
											</div>
											<div class="sparkline inline" data-type="bar" data-height="45" data-bar-width="6" data-bar-spacing="10" data-bar-color="#92cf5c">
												9,9,11,10,11,10,12,10,9,10,11,9,8
											</div>
										</div>
									</header>
									<div class="panel-body">
										<div>
											<span class="text-muted">
												Sales in June:
											</span>
											<span class="h3 block">
												$2500.00
											</span>
										</div>
										<div class="row m-t-sm">
											<div class="col-xs-4">
												<small class="text-muted block">
													From market
												</small>
												<span>
													$1500.00
												</span>
											</div>
											<div class="col-xs-4">
												<small class="text-muted block">
													Referal
												</small>
												<span>
													$600.00
												</span>
											</div>
											<div class="col-xs-4">
												<small class="text-muted block">
													Affiliate
												</small>
												<span>
													$400.00
												</span>
											</div>
										</div>
									</div>
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
								<section class="panel clearfix">
									<div class="panel-body">
										<a href="#" class="thumb pull-left m-r"> <img src="images/avatar.jpg" class="img-circle"> </a>
										<div class="clear">
											<a href="#" class="text-info">@Mike Mcalidek <i class="icon-twitter"></i></a>
											<small class="block text-muted">
												2,415 followers / 225 tweets
											</small>
											<a href="#" class="btn btn-xs btn-success m-t-xs">Follow</a>
										</div>
									</div>
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