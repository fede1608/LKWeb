<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Bienvenido! | Linekkit</title>
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
	<body style=" background-image:url(images/wallpaper_freya_d1920x1200.jpg) !important; background-size:cover !important;">
		
        <!-- Conexión con facebook -->
        <div id="fb-root"></div>
		<script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=438576089566191";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
         <!-- / Conexión con facebook -->
        
        <section id="content" class="wrapper-md animated fadeInUp">
        <div class="row m-n">
                <!-- Columna izquierda -->
                <div class="col-lg-4 col-lg-offset-2">
                	<img src="images/logo.png" width="455" height="132">
                    <br>
                    <!-- .scrollable -->
								<section class="panel fondo-transparente-negro borde-transparente-negro">
                
                                    <header class="panel-heading text-center fondo-transparente-negro borde-transparente-negro">    
                                                                Bienvenido a Linekkit
                                    </header>
                                    
									<section class="panel-body letras-blancas">
                                    <h1 style=" text-align:center; font-family:Alegreya SC; margin-top:0; margin-bottom:14px; font-size: 27px;">Inicia sesión con tu cuenta de <b>Linekkit</b> para acceder a tu perfil de jugador, ver tus estadísticas y ser parte de la comunidad</h1><h3 style="text-align:center; font-family:Alegreya SC">Exp x10|SP x10|Drop x7|Adena x10</h3><h4 style="text-align:center; font-family:Alegreya SC">Spoil x7 | Party x1.5 | Raid drop x3 | Quest drop x3 | Quest Exp/SP reward x2 | DualBox por PC  </h4>
                                    </section>
                                    
                                    <div class="row m-n">
                                        <section class="panel-body" style="padding-bottom:0; padding-top:0">
                                        
                                        <div class="col-lg-9" style="padding-left:0">
                                        <?php require_once('status.php');
                                            $vars=getStatusVar(2106,7778,"freya.linekkit.com","linekkittest",400);//
                                         ?>
                                            <div class=" progress m-t-sm progress-striped active" style="margin-bottom:0;margin-top:0">
                                                <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-original-title="<?php echo $vars['playersonline']; ?> Players Online" style="width: <?php echo $vars['porcentaje']; ?>%">
                                                </div>
                                            </div>
                                        </div>        
                                        <span class="col-lg-3 badge bg-success m-t-sm pull-right" style="margin-top:0">
									    <?php echo $vars['playersonline']; ?> ONLINE 
										</span>
                                        
                                        </section>
                                    </div>
                                    
                                    <section class="panel-body" style="padding-bottom:0">
                                        <div class="line line-dashed" style="margin-top:0">
										</div>
                                        
                                        <div class="panel-body" style="padding-top:0; padding-bottom:5; text-align:center">
                                    	<div class="fb-like" data-href="https://www.facebook.com/Linekkit" data-width="360" data-colorscheme="dark" data-show-faces="false" data-send="true"></div>
                                    </div>
                                        
                                        <div class="btn-group btn-group-justified m-b" style="margin-bottom:15px">
                                                    <a class="btn btn-success btn-rounded" href="/forum"><i class="icon-comments"></i> Foros</a>
                                                    <a class="btn btn-gplus btn-rounded" href="descargas_offline.php"> <i class="icon-cloud-download"></i> Descargas </a>
                                                    <a class="btn btn-facebook btn-rounded" href="https://www.facebook.com/Linekkit"> <i class="icon-facebook"></i> Facebook </a>
                                        </div>
                                    </section>
                                                               
								</section>
								<!-- / scrollable -->
 				</div>                
                <!-- /Columna izquierda -->
                
	  			<!-- Columna derecha -->
				<div class="col-lg-4" style="margin-top:131px;">
					<section class="panel fondo-transparente-negro borde-transparente-negro">
						<header class="panel-heading text-center bg-primary borde-transparente-negro">
							Iniciar sesión
					  </header>
						<form name="login" method="POST" action="./acm/index.php" class="panel-body" data-validate="parsley">
							<div class="form-group">
								<label class="control-label">
									Cuenta
								</label>
                                <input type="hidden" name="action" value="login">
								<input type="text" name="Luser" id="Luser" placeholder="Usuario del Juego" class="form-control" data-required="true" >
							</div>
							<div class="form-group">
								<label class="control-label">
									Contraseña
							  </label>
								<input type="password" id="Lpwd" name="Lpwd" placeholder="Contraseña" class="form-control"  data-required="true">
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox">
									Mantenme conectado
							  </label>
							</div>
							<a href="#" class="pull-right m-t-xs"><small>¿Olvidaste tu contraseña?</small></a>
							<button type="submit" class="btn btn-warning">
								Conectarse
						  </button>
							<div class="line line-dashed" style="margin-bottom: 4px">
							</div>
							
							<p class="text-muted text-center">
								<small>
									¿No tienes una cuenta?
							  </small>
							</p>
							<a href="signup.php" class="btn btn-gplus btn-block">Crear una cuenta nueva</a>
							<div class="line line-dashed">
							</div>
							<div class="row">
								<div clas="row">
									<h2 class="text-center letras-blancas" style="font-family:Alegreya SC; margin-top:0; margin-bottom: 5px">Apoya a Linekkit</h2>
								</div>
								<div class="col-xs-6">
									<a href="http://vgw.hopzone.net/site/vote/95232/1" target="_blank" class="pull-right">
        								<img src="http://linekkit.com/images/hopzone.png" style="width: 100%;" alt="Votar por Linekkit">
        							</a>
								</div>
								<div class="col-xs-6">
									<a rel="nofollow" target="_blank" href="http://l2topzone.com/vote.php?id=9744" title="Lineage 2 Servers" class="pull-left">
        								<img src="http://linekkit.com/images/topzone.png" style="width: 100%;" alt="Votar por Linekkit">
        							</a>
								</div>
							</div>
							
						</form>
					</section>
				</div>
                <!-- / Columna derecha -->
			</div>
		</section>
    </div>
		<!-- footer -->
		<footer id="footer" style="margin-top: 10px;">
			<div class="text-center padder clearfix">
				<p>
					<small>
						Linekkit Freya
					<br>
						linekkit.com &copy; 2013
					</small>
				</p>
			</div>
		</footer>
		<!-- / footer -->
	<script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- app -->
  <script src="js/app.js"></script>
  <script src="js/app.plugin.js"></script>
  <script src="js/app.data.js"></script>
	</body>

</html>