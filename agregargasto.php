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
						<?php if(isset($_POST['contenido'])){
						  $MySQLEco = new SQL($host, $usernombre, $pass, $dbeconomia);
						$MySQLEco->execute("SET NAMES 'utf8'");
						$consulta = "INSERT INTO `gastos`(`descripcion`, `costo`, `metododepago`, `fecha`, `currency`) VALUES ('".$_POST['contenido']."',".$_POST['costo'].",".$_POST['forma'].",".time().",".$_POST['currency'].")";
						$MySQLEco->execute($consulta);
						 
						echo "Gasto Agregada con &eacute;xito, espero...</p>";
						}else{
						
						?>
				
				</p>
                <div class="col-lg-4 col-lg-offset-4">
				<h3>Agregar un Gasto :(</h3>
			
			
				
				<form name="agregar" method="POST" action="./agregargasto.php" class="panel-body">
				
				
				<label>Descripcion:</label><br><span><textarea class="form-control" name="contenido" id="contenido" cols="30" rows="7">Ac&aacute; va la Descripcion del gasto</textarea></span>
				<input type="hidden" name="user" value="<?php echo $userdata['login']; ?>">
				<label>Costo:</label><br><span><input class="form-control" type="text" id="costo" name="costo" value="0"></span>
				<label>Metodo de Pago(0:MercadoPago,1:PayPal,2:TransfBank,3:Western,4:Efectivo):</label><br><span><input class="form-control" type="text" id="forma" name="forma" value="0"></span>
				<label>Currency(0:Pesos,1:Dolar,2:Euros):</label><br><span><input class="form-control" type="text" id="currency" name="currency" value="0"></span>
				
				
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
			



