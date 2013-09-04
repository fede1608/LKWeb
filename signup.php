<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>
			Bienvenido! | Linekkit
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
	<body style="background-image:url(images/wallpaper_freya_d1920x1200.jpg) !important; background-size:cover !important;">

		<section id="content" class="wrapper-md animated fadeInDown">
			
			<div class="row m-n">
                <!-- Columna izquierda -->
                <div class="col-lg-4 col-lg-offset-2">
                <img src="images/logo.png" width="455" height="132">
                <br>
                
                <!-- Panel de la izquierda-->
                
                <section class="panel fondo-transparente-negro borde-transparente-negro">
                
                <header class="panel-heading text-center fondo-transparente-negro borde-transparente-negro">    
											Bienvenido a Linekkit
				</header>
                
                <!-- Info del server -->
                <div class="panel-body letras-blancas">
                    <h1 style=" text-align:center; font-family:Alegreya SC; margin-top:0">Crea tu cuenta <b>ahora</b> y forma parte del servidor Freya <b>lider</b> de América Latina</h1>
                    
                    <h3 style="text-align:center; font-family:Alegreya SC">Exp x10|SP x10|Drop x7|Adena x10</h3><h4 style="text-align:center; font-family:Alegreya SC">Spoil x7 | Party x1.5 | Raid drop x3 | Quest drop x3 | Quest Exp/SP reward x2 | DualBox por PC <br> <br>Comunidad web | Geodata Premium | Protección Lameguard | Servidor Intel Xeon con SSDs | 100Mb de conexión | Rewards por votación | Sistema de tickets</h4>
                <!-- / Info del server -->
                
                <div class="line line-dashed">
							</div>
							<p class="text-muted text-center">
								<small>
									¿Ya tienes una cuenta?
								</small>
							</p>
							<a href="signin.php" class="btn btn-warning btn-block">Iniciar sesión</a>
                
                </div>
                </section>
               </div>                
                <!-- /Columna izquierda -->
            	<!-- Columna derecha -->
				<div class="col-lg-4">
					<section class="panel fondo-transparente-negro borde-transparente-negro" style="margin-top:66px;">
						<header class="panel-heading bg bg-primary text-center borde-transparente-negro">
							Completa los datos de tu cuenta
						</header>
						<form name="create" method="POST" action="./acm/index.php" class="panel-body" data-validate="parsley">
							<div class="form-group">
								<label class="control-label">
									Elige un nombre para tu cuenta en el juego
								</label>
								<input type="text" placeholder="ej. Tu nombre o cuenta de otro juego" name="Luser" id="Luser" data-required="true" class="form-control">
							</div>
                            <div class="form-group">
								<label class="control-label">
									Ingresa tu nombre de la comunidad (foros)
								</label>
								<input type="text" placeholder="ej. El mismo que el campo anterior o uno nuevo" name="Fuser" id="Fuser" data-required="true" class="form-control">
							</div>
							<div class="form-group">
								<label class="control-label">
									Tu dirección de email
								</label>
								<input type="email" id="Lemail" name="Lemail" data-required="true" placeholder="test@example.com" class="form-control" >
							</div>
							<div class="form-group">
								<label class="control-label">
									Escribe una contraseña (y no se la digas a nadie)
								</label>
								<input type="password" id="Lpwd" name="Lpwd" data-required="true" placeholder="Contraseña" class="form-control" >
							</div>
                            <div class="form-group">
								<label class="control-label">
									Reescribe la contraseña
								</label>
								<input type="password" id="Lpwd2" name="Lpwd2" data-required="true" placeholder="Contraseña" class="form-control">
                                <input type="hidden" name="action" value="registration">
							</div>
                            <div class="form-group">
								<label class="control-label">
									Completa el CAPTCHA, los robots no pueden jugar :(
								</label>
                                
                                <div class="row m-n">
                                
                                    <div class="col-lg-9" style="padding-left:0">
                                    <input type="text" placeholder="ej. A1B2C3" data-required="true" class="form-control pull-left" name="Limage" id="Limage"> 
                                    </div>
                                    
                                    <div class="col-lg-3">                                <img src="./acm/img.php" id="L_image" width="90" class="pull-right" >
                                    </div>
                               
                               </div>
							
                            </div>
							<div class="checkbox">
								<label>
									<input data-required="true" id="ToS" name="ToS" type="checkbox">
									Acepto los
									<a href="#">términos y condiciones</a>
								</label>
							</div>
							<button type="submit" class="btn btn-info">
								Unirse a Linekkit
							</button>
						</form>
					</section>
				</div>
                <!-- Columna derecha -->
			</div>
		</section>
		<!-- footer -->
		<footer id="footer">
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
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- app -->
  <script src="js/app.js"></script>
  <script src="js/app.plugin.js"></script>
  <script src="js/app.data.js"></script>
	</body>

</html>