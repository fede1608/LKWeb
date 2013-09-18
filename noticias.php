<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");
include_once 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>
			Noticias | Linekkit
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
		<?php include_once('barralateral.php');
            getBar(1,6);//getbat(tipoDeBarra,<li>activo)
            ?>
			<!-- .vbox -->
			<section id="content">
				<section class="vbox">
					<footer class="footer bg-light dker bg-gradient">
						<p>
							Promociones y ofertas: 15% de Coins extra con Paypal, 5% Extra con Transferencia Bancaria
						</p>
					</footer>
					<section class="fondo-transparente-negro lter">
						<section class="hbox stretch">
							<!-- .aside -->
							<aside>
								<section class="vbox">
									<section class="scrollable wrapper">
										<div class="timeline">
											<article class="timeline-item active">
												<div class="timeline-caption">
													<div class="panel bg-warning lter no-borders letras-negras">
														<div class="m-t-xs m-b-xs m-l-xs m-r-xs">
															<span class="timeline-date" style="margin-bottom:0px">
																<h1 class="text-center letras-negras" style="font-family:Alegreya SC; margin-top:8px;"><b>
	                             								Últimas noticias</b></h1>
															</span>
															
														</div>
													</div>
												</div>
											</article>
                                            
                                            <?php 
                                            include 'newsfeed.php';
											$cantidad=5;
											$pagina=isset($_GET['pag'])?intval($_GET['pag']):1;
											
                                            $notis=getNews($cantidad,$pagina);
											$alt='';
                                            $dir='left';
                                            foreach($notis as $noti){
                                                $noti['fecha']= $noti['fecha'];
												$alt=$alt==''?'alt':'';
                                                $dir=$dir=='right'?'left':'right';
                                                echo '<article class="timeline-item '.$alt.'">
												<div class="timeline-caption">
													<div class="panel">
														<div class="panel-body">
															<span class="arrow '.$dir.'">
															</span>
															<span class="timeline-icon">
																<i class="icon-file-text time-icon bg-primary">
																</i>
															</span>
															<span class="timeline-date letras-blancas">'.date('d/m/Y g:ia',$noti['fecha']).
                                                    '</span>
															<h5>
															<span>
																	Por '.$noti[autor].'</span>'.$noti['titulo'].'</h5>	
															<p>'.$noti['contenido'].'</p>
														</div>
													</div>
												</div>
											</article>';
                                            }
                                            ?>
											
											<div class="timeline-footer">
												<a href="#"><i class="icon-plus time-icon inline-block bg-dark"></i></a>
											</div>
										</div>
										<div class="text-center">
											<ul class="pagination pagination-lg">
												
												<?php 
												$cantNotis=countNews();
												$paginas=intval($pagina/$cantidad)<=intval($cantNotis/$cantidad) ?intval(($pagina-1)/$cantidad)*5 +1:intval(($cantNotis-1)/$cantidad)*5 +1;
												if($paginas!=1)
												echo '<li>
													<a href="noticias.php?pag='.($paginas-1).'"><i class="icon-chevron-left"></i></a>
												</li>';
												$fin=false;
												for($i=0;$i<5;$i++){
													if($paginas<=ceil($cantNotis/$cantidad))
														echo $paginas!=$pagina?'<li>
															<a href="noticias.php?pag='.$paginas.'">'.$paginas.'</a>
														</li>':'<li class="active">
															<a href="noticias.php?pag='.$paginas.'">'.$paginas.'</a>
														</li>';
													else $fin=true;
													$paginas++;
												}
												if(!$fin)
													echo '<li>
														<a href="noticias.php?pag='.$paginas.'" style="padding: 13.5;"><i class="icon-chevron-right"></i></a>
													</li>';
												?>
												
												
											</ul>
										</div>
									</section>
								</section>
							</aside>
							
							
							<!-- /.aside -->
							<!-- .aside --
							<aside class="aside-lg bg-light">
								<div class="wrapper">
									<h4 class="m-t-none">
										Timeline(36)
									</h4>
									<form>
										<div class="form-group">
											<label>
												Name
											</label>
											<input type="text" placeholder="Event name" class="input-sm form-control">
										</div>
										<div class="form-group">
											<label>
												Date
											</label>
											<input type="text" placeholder="Event name" class="datepicker input-sm form-control">
										</div>
										<div class="form-group">
											<label>
												Time
											</label>
											<input type="text" placeholder="eg. 3:00 pm" class="input-sm form-control">
										</div>
										<div class="form-group">
											<label>
												Type
											</label>
											<div>
												<div class="btn-group">
													<button data-toggle="dropdown" class="btn btn-sm btn-white dropdown-toggle">
														<span class="dropdown-label">
															Choose a type
														</span>
														<span class="caret">
														</span>
													</button>
													<ul class="dropdown-menu dropdown-select">
														<li>
															<a href="#"><input type="radio" name="d-s-r">Travel</a>
														</li>
														<li class="">
															<a href="#"><input type="radio" name="d-s-r">Phone</a>
														</li>
														<li class="">
															<a href="#"><input type="radio" name="d-s-r">Meeting</a>
														</li>
														<li class="">
															<a href="#"><input type="radio" name="d-s-r">Appointment</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="m-t-lg">
											<button class="btn btn-sm btn-default">
												Add an event
											</button>
										</div>
									</form>
								</div>
							</aside>
							<!-- /.aside -->
						</section>
					</section>
				</section>
			</section>
			<!-- /.vbox -->
		</section>
	<script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>
  <script src="js/app.plugin.js"></script>
  <script src="js/app.data.js"></script>
  <!-- fuelux -->
  <script src="js/fuelux/fuelux.js"></script>
  <!-- datepicker -->
  <script src="js/datepicker/bootstrap-datepicker.js"></script>
	</body>

</html>