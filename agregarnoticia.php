<?php

/**
 * @author fede1
 * @copyright 2013
 */
 define('IN_MYBB', NULL);
require_once 'forum/global.php';
require_once 'forum/MyBBIntegrator.php';
$MyBBI = new MyBBIntegrator($mybb, $db, $cache, $plugins, $lang, $config); 
$forumpath = 'forum/';

chdir($forumpath);
require_once MYBB_ROOT."inc/class_parser.php";
$parser = new postParser;
chdir('../');
include_once 'statsfeed.php'; 
include_once("session.php");

require_once 'libs/mysql.inc.php';
require_once 'libs/config.inc.php';


if((!isacmlogged())||(!$MyBBI->isLoggedIn())||(!$MyBBI->isSuperAdmin())){
   print_r($MyBBI->isSuperAdmin(0));
    echo '<script language="javascript">
			window.top.location="signin.php"
			</script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Admin | Overflow Development Team</title>
  <meta name="description" content="Admin" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
  <link rel="stylesheet" href="css/plugin.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
  <link rel="stylesheet" href="css/lkcss.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/respond.min.js" cache="false"></script>
    <script src="js/ie/html5.js" cache="false"></script>
    <script src="js/ie/fix.js" cache="false"></script>
  <![endif]-->
</head>
<body>
<section class="vbox">
						<p>
						<?php if(isset($_POST['titulo'])){
						  $MySQLN = new SQL($host, $usernombre, $pass, $dbnoticias);
						$MySQLN->execute("SET NAMES 'utf8'");
						$consulta = "INSERT INTO `news` (titulo, fecha, autor, contenido) VALUES ('".$_POST['titulo']."', UNIX_TIMESTAMP(),'".$_POST['user']."','".$_POST['contenido']."') ";
						$MySQLN->execute($consulta);
						 
						echo "Noticia Agregada con &eacute;xito, espero...</p>";
						}else{
						
						?>
				
				</p>
                <div class="col-lg-4 col-lg-offset-4">
				<h3>Agregar Noticia!</h3>
			
			
				
				<form name="agregar" method="POST" action="./agregarnoticia.php" class="panel-body">
				
				<label>T&iacute;tulo:</label><br><span><input class="form-control" type="text" id="titulo" name="titulo" value="T&iacute;tulo"></span>
				
				<label>Contenido:</label><br><span><textarea class="form-control" name="contenido" id="contenido" cols="30" rows="7">Ac&aacute; va el Contenido de la Noticia...</textarea></span>
				<input type="hidden" name="user" value="<?php echo $userdata['login']; ?>">
				
				
				<hr class="clear">
				
				<input class=" btn btn-info" type="button" onclick="document.location='./index.php'" value="Atras">
				
				<input class=" btn btn-success" type="submit" value="Crear">
			</form>
            </div>
			<?php } ?>	
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
  </body>
</html>
			



