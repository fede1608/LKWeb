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
			                      &iquest;C&oacute;mo me conecto?
			                    </a>
			                  </div>
			                  <div id="faq1" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
                                <ul>
			                    <li>1- Primero necesit&aacute;s tener una cuenta en el servidor, que si est&aacute;s leyendo esta es la misma con la que tuviste que loguear en la web.</li>
                                <li>2- Tener el cliente Lineage II Freya instalado. Pod&eacute;s ver fuentes para descargarlo en el siguiente link.</li>
                                <li>3- Descargar los ARCHIVOS necesarios para jugar en Linekkit.</li>
                                <li>3- Ir a la carpeta ra&iacute;z de Lineage II (por lo general es C:\Archivos de programa\NCSoft\Lineage II).</li>
                                <li>4- Renombrar (cambiar el nombre) del system que tengas. Ponele systemRenombrado (por ejemplo) y extra&eacute; los archivos que descargaste en el punto 3 dentro de la carpeta ra&iacute;z de Lineage II.</li>
                                <li>5- Abr&iacute; la nueva carpeta system y ejecut&aacute; l2.exe</li>
                                <li>6- Se abrir&aacute; el cliente. Tendr&aacute;s que escribir tu nombre de usuario y contrase&ntilde;a (el mismo que usaste para entrar en la web).</li>
                                </ul>
                                Felicitaciones, ya est&aacute;s jugando en Linekkit.
                                
                                <br>Nota: ten&eacute; el cuidado de agregar a excepciones del antivirus la carpeta del Lineage II. A veces impide que puedas conectarte.
                                </div>
			                  </div>
			                </div>
			                <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq2">
			                      Me tira &ldquo;error cr&iacute;tico&rdquo; el cliente, &iquest;qu&eacute; hago?
			                    </a>
			                  </div>
			                  <div id="faq2" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                      Hay innumerables opciones por las que puede tirarte cr&iacute;tico el cliente. Generalmente es por la falta de una textura o hay algo roto en el mismo. La soluci&oacute;n es f&aacute;cil: reinstalar el cliente.

                                   <br> En otras ocasiones es por haber instalado mal el system. Volv&eacute; a la pregunta 1 y segu&iacute; los pasos cuidadosamente.
                                    
                                   <br> En caso que a&uacute;n tu problema persista, pod&eacute;s utilizar la secci&oacute;n <a href="http://www.ausgamers.com/files/details/html/59000" target="_blank" >AYUDA</a> del foro. 			                    </div>
			                  </div>
			                </div>
			                <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq3">
			                      &iquest;D&oacute;nde tengo que poner el System?
			                    </a>
			                  </div>
			                  <div id="faq3" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                      En primer lugar ten&eacute;s que tener instalado el juego, en segundo lugar ir a la carpeta donde se instal&oacute; (generalmente es C:\Archivos de programa\NCSoft\Lineage II) y una vez all&iacute;, cambiarle el nombre al system que tengas y pegar el system de Linekkit.
			                    </div>
			                  </div>
			                </div>
			                <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq4">
			                      &iquest;Qui&eacute;nes son los Admins de Linekkit?
			                    </a>
			                  </div>
			                  <div id="faq4" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                      Los Admins o Administradores son los due&ntilde;os y fundadores de Linekkit. Nadie est&aacute; por encima de ellos en la jerarqu&iacute;a del servidor y son los &uacute;nicos que tienen poder de decisi&oacute;n sobre todo lo que pasa en el mismo.

                                La Administraci&oacute;n, a la cual se la suele llamar Equipo Linekkit, est&aacute; compuesta por fede1608, Molex y Zephyr los cuales est&aacute;n para ayudarte en lo que necesites.
			                    </div>
			                  </div>
			                </div>
			                <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq5">
			                      &iquest;Es compatible con Windows 8?
			                    </a>
			                  </div>
			                  <div id="faq5" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                      Actualmente el servidor no es compatible con Windows 8 debido a que el system que provee el antibot (Lameguard) no es compatible con dicho Sistema Operativo. Es un problema que depende de un tercero, no de nosotros.
			                    </div>
			                  </div>
			                </div>
			                <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq6">
			                     &iquest;Qu&eacute; caracter&iacute;sticas tiene el servidor f&iacute;sico?
			                    </a>
			                  </div>
			                  <div id="faq6" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                     <ul>
                                 <li> Microprocesador: Intel Xeon E3 1245v2 3.4Ghz / 3.8Ghz con 8 threads
                                <li>Memoria RAM: 32GB DDR3
                                <li>Almacenamiento: 2 x 120GB Intel SSD 320 (RAID 0)
                                <li>Exclusiva conexi&oacute;n sim&eacute;trica internacional de 100Mb sin l&iacute;mite de transferencia
                                <li>Funcionamiento las 24Hs en Datacenter con generadores el&eacute;ctricos propios (99,9% de Uptime asegurado)
			                    </ul>
                                </div>
			                  </div>
			                </div>
                            <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq7">
			                     &iquest;D&oacute;nde est&aacute; hosteado el servidor?
			                    </a>
			                  </div>
			                  <div id="faq7" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                     El servidor est&aacute; hosteado en Canad&aacute;, lo cual nos garantiza calidad de servicio, estabilidad y un punto estrat&eacute;gico para que puedan conectarse todos los usuarios de habla hispana. Si bien esto genera un poco de ping, el servidor est&aacute; configurado para que sientas lo menos posible el mismo. &iexcl;Probalo!
                                </div>
			                  </div>
			                </div>
                            <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq8">
			                     &iquest;Qu&eacute; es el ping?
			                    </a>
			                  </div>
			                  <div id="faq8" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                     Es el tiempo que tarda un paquete que sale de tu computadora en ir al servidor f&iacute;sico y volver.

                                </div>
			                  </div>
			                </div>
                            <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq9">
			                    &iquest;Qu&eacute; es Leatrix Latency?
			                    </a>
			                  </div>
			                  <div id="faq9" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                     Es un programa que tiene por objetivo mejorar el "rendimiento" de tu conexi&oacute;n logrando as&iacute; que se reduzca un poco la sensaci&oacute;n del ping. El mismo fue creado por un jugador de WoW y se encuentra disponible &uacute;nicamente para Windows. Para m&aacute;s informaci&oacute;n, visit&aacute; el siguiente<a href="http://linekkit.com/foro.php?page=/private.php?action=read%26pmid=484" target="_blank">LINK</a>.
                                </div>
			                  </div>
			                </div>
                            <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq10">
			                     &iquest;C&uacute;al es la f&oacute;rmula para determinar los puntajes de los mejores jugadores?
			                    </a>
			                  </div>
			                  <div id="faq10" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
                                La fórmula es:
                                <br />
                                NivelDelPersonaje + PuntajeDelClan + EsNoble + EsHéroe + PuntosPvP + PuntosPK + CuántasSubclasesTiene
                                <br />
                                Los valores actualmente son así:
                                <br /><ul>
                                <li>NivelDelPersonaje = lvl * 3
                                <li>Noble = 30
                                <li>Héroe = 100
                                <li>PuntosPvP = CantidadDePvP * 1
                                <li>PuntosPK = CantidadDePk * 0.5
                                <li>CuántasSubclasesTiene = CantidadDeSubclases * 10
                                </ul><br />
                                PuntajeDelClan:
                                <br />
                                NivelDelClan + TieneClanHall + TieneCastillo + CantidadDeClanSkills
                                <br />
                                Y los valores:
                                <br /><ul>
                                <li>NivelClan: lvlDelClan * 5
                                <li>TieneClanHall = 15
                                <li>TieneCastillo = 50
                                <li>ClanSkills = cantidadDeSkillsClan * 3
                                </ul>
                                </div>
			                  </div>
			                </div>
                            <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq11">
			                     &iquest;C&oacute;mo donar con Rapipago/PagoF&aacute;cil?
			                    </a>
			                  </div>
			                  <div id="faq11" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                     <ul>
                                 <li>1- Deb&eacute;s ir a la secci&oacute;n Donar de la web (obviamente ten&eacute;s que estar logueado antes).
                                <li>2- Elegir "Obtener Linekkit Coins por MercadoPago".
                                <li>3- Se te abrir&aacute; una ventanita en la que podr&aacute;s elegir la cantidad de dinero que quer&eacute;s donar o hacer una donaci&oacute;n libre.
                                <li>4- Una vez elegido, hac&eacute;s click en "Donar".
                                <li>5- Ser&aacute;s redirigido a la p&aacute;gina de MercadoPago, all&iacute; deber&aacute;s elegir Rapipago o PagoF&aacute;cil (lo que te sea m&aacute;s c&oacute;modo).
                                </ul>
                                </div>
			                  </div>
			                </div>
                            <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq12">
			                     &iquest;Qui&eacute;nes aparecen en el Top diario?

			                    </a>
			                  </div>
			                  <div id="faq12" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                     Los PJ's que sacaron m&aacute;s puntos, PvP, PK, etc; en el lapso de 24 hs (es decir, en ese d&iacute;a).

                                </div>
			                  </div>
			                </div>
                            <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq13">
			                     &iquest;C&oacute;mo donar por Paypal desde Argentina?
			                    </a>
			                  </div>
			                  <div id="faq13" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                     Paypal no est&aacute; disponible para cuentas argentinas por temas legales de la misma.
                                </div>
			                  </div>
			                </div>
                            <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq14">
			                    &iquest;C&oacute;mo donar por MercadoPago fuera de Argentina?

			                    </a>
			                  </div>
			                  <div id="faq14" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                     MercadoPago no est&aacute; habilitado como medio de donaci&oacute;n fuera de Argentina.

                                </div>
			                  </div>
			                </div>
                            <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq15">
			                     Si actualmente NO vivo en Argentina, &iquest;por qu&eacute; medios puedo donar?

			                    </a>
			                  </div>
			                  <div id="faq15" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                     Por Western Union o Paypal.
                                </div>
			                  </div>
			                </div>
                            <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq16">
			                     &iquest;C&uacute;ales son los requisitos m&iacute;nimos del juego?
			                    </a>
			                  </div>
			                  <div id="faq16" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                     Requerimientos M&iacute;nimos.
                                   <ul> 
                                   <li>Sistema Operativo: Windows XP / Vista / Windows 7
                                    <li>Procesador: Intel&reg; Pentium&reg; 4 2.0 GHz
                                    <li>RAM: 512 MB
                                    <li>Tarjeta Grafica: NVIDIA&reg; FX 5700 / ATI&trade; Radeon&reg; 9600
                                    <li>Espacio en Disco: 10 GB
                                    </ul>
                                    Requerimientos Recomendados.
                                    <ul>
                                    <li>Sistema Operativo: Windows XP / Vista / Windows 7
                                    <li>Provesador: Intel&reg; Pentium&reg; 4 3.0 GHz (O MEJOR)
                                    <li>RAM: 1 GB (O MAS)
                                    <li>Tarjeta Grafica: NVIDIA&reg; FX 6600 / ATI&trade; x800 (O MEJOR)
                                    <li>Espacio en Disco: 12 GB
                                    </ul>

                                </div>
			                  </div>
			                </div>
                            <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq17">
			                     &iquest;Me va a andar en una netbook?
			                    </a>
			                  </div>
			                  <div id="faq17" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                     S&iacute;, pero muy mal y posiblemente la destruyas.

                                </div>
			                  </div>
			                </div>
                            <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq18">
			                    &iquest;Qu&eacute; es y qu&eacute; no es un moderador?

			                    </a>
			                  </div>
			                  <div id="faq18" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                     Un moderador ES:
                                <ul>
                                <li>Un usuario com&uacute;n que juega en el servidor y que demostr&oacute; su compromiso con el mismo.
                                <li>Puede ordenar el foro, poner los posts en las secciones que vayan, moderar los comentarios que est&eacute;n subidos de tono, cerrar los temas antiguos, etc; b&aacute;sicamente, mantener el foro ordenado, en paz y armon&iacute;a.
                                <li>Una persona que va a intentar ayudarte en lo que pueda.
                                <li>Miembro del Equipo de soporte.
                                <li>Tan sancionable como cualquier usuario.
                                </ul>
                                Un moderador NO ES:
                                <ul>
                                <li>Un miembro de la Administraci&oacute;n.
                                <li>No tiene poder para tomar ninguna decisi&oacute;n.
                                <li>No es GM.
                                <li>No es amigo de un Admin.
                                <li>No tiene favoritismo.
                                <li>No tiene &iacute;tems ni comandos especiales.
                                <li>B&aacute;sicamente, no tiene absolutamente nada en especial dentro del juego que un usuario com&uacute;n (de hecho, es un usuario com&uacute;n).
                                </ul>
                                Un moderador PUEDE SER:
                                <ul>
                                <li>Cualquier usuario de Linekkit que haya demostrado compromiso, ganas de ayudar al resto indiferentemente, conocimiento y quiera que el servidor sea un lugar mejor cada d&iacute;a.
                                <li>Removido de su cargo si no cumple las funciones para las que fue puesto.
                                </ul>
                                </div>
			                  </div>
			                </div>
                            <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq19">
			                     &iquest;Puedo ser GM?
			                    </a>
			                  </div>
			                  <div id="faq19" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                     No.
                                </div>
			                  </div>
			                </div>
                            <div class="panel">
			                  <div class="panel-heading">
			                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#faq20">
			                     &iquest;Puedo ser Admin?
			                    </a>
			                  </div>
			                  <div id="faq20" class="panel-collapse collapse">
			                    <div class="panel-body text-sm">
			                     Menos.
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