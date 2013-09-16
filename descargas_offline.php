<!DOCTYPE html>
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
		

        <section class="hbox stretch">
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
                        <!-- Panel -->
                        <div class="col-lg-10 col-lg-offset-1">
                            <!-- .scrollable -->
                                        <section class="panel-body fondo-transparente-negro-075 borde-transparente-negro">
                        
                                            <!-- Primera fila-->
                                            <div class="row">
                                                
                                              <div class="col-lg-6">  
                                                <h1 class="letras-blancas" style="text-align:center; font-family:Alegreya SC; margin-top:0; font-size:58px; padding-top:10px;">Descargas</h1>
                                              </div>
                                                	
                                               <div class="col-lg-6 text-center">
                                                  <i class=" icon-cloud-download letras-blancas" style="font-size:102px; text-align:center"></i>
                                                        
                                               </div>
													
                                                    
                                                             
                                            </div>
                                            <!-- / Primera fila-->
                                            
                                            <!-- Segunda fila-->
                                            <div class="row panel-body ">
                                            
                                            <div class="row panel-body">
                                            
                                                <span class=" col-xs-2 label fondo-solido-rojo-1" style="font-size:36px">
                                                    <i class="icon-chevron-sign-right"></i>1
                                              </span>
                                                
                                              <div class="col-xs-10">
                                                    <div class="row">
                                                        <span class="h2 m-l-xs letras-blancas">Cliente L2 Freya</span>
                                                    </div>
                                                    <div class="row">
                                                        <span class="h4 m-l-xs letras-blancas">El juego base, sin modificaciones ni agregados</span>
                                                    </div>
                                                 
                                              </div>
                                          </div>
                                          
                                          <div class="row panel-body">
                                             <p class="letras-blancas text-center">Lo primero que se necesita para jugar al Lineage 2 es el juego (a esto se lo llama cliente), hay varias versiones disponibles, pero para jugar en Linekkit se necesita la versión Freya. La misma puede ser descargada en esta sección o podes bajarla por tu cuenta con el método que quieras, podes buscar en google y la vas a encontrar seguro. Recomendamos descargar el cliente por torrent desde aquí.</p>
                                           </div>
                                             
                                             <div class="row m-l-sm m-r-sm">
                                             <div class="col-xs-4">
                                             <a href="./downloads/L2Freya.torrent" class="btn btn-success btn-block m-b-sm"><i class="icon-magnet pull-left"></i><b>
                                             Torrent</b></a>
                                             </div>
                                             <div class="col-xs-4">
                                             <a href="http://www.ausgamers.com/files/details/html/59000" target="_blank" class="btn btn-primary btn-block m-b-sm"><i class="icon-download-alt pull-left"></i><b>
                                             Descarga directa 1</b></a>
                                             </div>
                                             <div class="col-xs-4">
                                             <a href="http://www.playerattack.com/file/528/Lineage-II-The-Chaotic-Throne-Freya-Client" target="_blank" class="btn btn-primary btn-block m-b-sm"><i class="icon-download-alt pull-left"></i><b>
                                             Descarga directa 2</b></a>
                                             </div>
                                             </div>
                                            
                                            </div>
                                            <!-- / Segunda fila-->
                                            
                                            <!-- Tercera fila-->
                                            <div class="row panel-body ">
                                            
                                            <div class="row panel-body">
                                            
                                                <span class=" col-xs-2 label bg-warning letras-negras" style="font-size:36px">
                                                    <i class="icon-chevron-sign-right"></i>2
                                              </span>
                                                
                                              <div class="col-xs-10">
                                                    <div class="row">
                                                        <span class="h2 m-l-xs letras-blancas">Launcher de Linekkit</span>
                                                    </div>
                                                    <div class="row">
                                                        <span class="h4 m-l-xs letras-blancas">Aplicación necesaría para jugar en Linekkit</span>
                                                    </div>
                                                 
                                              </div>
                                          </div>
                                             
                                             <div class="row panel-body">
                                             <p class="letras-blancas text-center">Una vez que tengas instalado el cliente, lo siguiente es bajarse un archivo necesario para jugar en Linekkit (denominado launcher) cuya función es la de actualizar automáticamente tu cliente a la última versión de Linekkit. El mismo se encuentra disponible en el siguente enlace y no es posible jugar sin él.</p>
                                             </div>
                                             
                                             <div class="row m-l-sm m-r-sm">
                                             
                                             <div class="col-xs-2"></div>
                                             
                                             <div class="col-xs-4">
                                             <a href="./downloads/SystemLinekkitv3.0.rar" class="btn btn-primary btn-block m-b-sm"><i class="icon-download-alt pull-left"></i><b>
                                             Descarga directa</b></a>
                                             </div>
                                             <div class="col-xs-4">
                                             <a href="http://www.mediafire.com/download.php?8lam9ul0c7ypu37" target="_blank" class="btn btn-primary btn-block m-b-sm"><i class="icon-download-alt pull-left"></i><b>
                                             Descarga alternativa</b></a>
                                             </div>
                                             <div class="col-xs-2"></div>
                                             </div>
                                             
                                             <div class="row panel-body">
                                             <p class="letras-blancas text-center">Ahora hay que entrar en la carpeta donde se instalo el Lineage 2, la ruta a la misma suele ser: C:\Archivos de programa\NCSoft\Lineage II</p>
						<p class="letras-blancas text-center">Dentro de este directorio hay una carpeta denominada System, hay que cambiarle el nombre (con la tecla F2) y ponerle &quot;SystemOriginal&quot;, todavía no cierres este directorio. Luego copiamos  el archivo de Linekkit que acabamos de bajar (con click derecho  copiar. Cortar también sirve) y lo pegamos en el directorio que dejamos abierto arriba. El ultimo paso es hacer click derecho sobre el archivo de Linekkit y poner &quot;Extraer aquí&quot;o &quot;Extract here&quot;.</p>
                        					</div>
                                            
                                            </div>
                                            <!-- / Tercera fila-->
                                            
                                            
                                        </section>
                                        <!-- / scrollable -->
                        </div>                
                        <!-- /Panel -->
                        
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