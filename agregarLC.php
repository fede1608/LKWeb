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
<?php
include_once 'libs/config.inc.php';
if(isset($_POST['user'])){
if(isset($_POST['reco'])){
if(isset($_POST['pass'])&$_POST['pass']=="linekkitrlz"){
$archivo=fopen("Logs/LogsAgregarLC.txt","a");
fputs($archivo,"User: ".$_POST['user']." LC: ".$_POST['reco']);
fputs($archivo,"\n");
$L2JBS_config["mysql_host"]=$hostL;	// MySQL Host 	["localhost"]
$L2JBS_config["mysql_port"]="3306";		// MySQL Port			["3306"]
$L2JBS_config["mysql_db"]=$dblogin;		// MySQL Database	["l2jdb"]
$L2JBS_config["mysql_login"]=$usernombre;		// MySQL User			["root"]	
$L2JBS_config["mysql_password"]=$pass;	// MySQL Password			
$cant=$_POST['reco'];

 $link = mysql_connect($L2JBS_config['mysql_host'].":".$L2JBS_config['mysql_port'], $L2JBS_config['mysql_login'], $L2JBS_config['mysql_password']);
  if (!$link) die("Couldn't connect to MySQL");
 mysql_select_db($L2JBS_config['mysql_db'], $link);


 
$query = "SELECT *  FROM `accounts` WHERE `login` = \"".$_POST['user']."\"";
    
	$res= mysql_query($query);
	$result=__compile($res);
	if(isset($result[0]['coins'])){
	$money= $result[0]['coins'];
	$money=$money+$cant;
	$query = "UPDATE `accounts` SET `coins`=".$money." WHERE `login` = \"".$_POST['user']."\"";
	$a=mysql_query($query);
	echo "<br><h1> Se han asignado los ".$cant." Linekkit Coins.</h1><br>";
	}else echo "Mal user ingresado";
	



}else echo "Has ingresado mal algo, fijate.";
}elseif(!$_POST['pass']=="linekkitrlz") echo "No eres Admin capo. Tu IP ha sido Registrada, serás inmediatamente Banneado del Servidor por intento de Hack.";
}else{ ?>
<div class="col-lg-4 col-lg-offset-4">
<h1>Agregar Linekkit Coins</h1>
<form name="agregar" method="POST" action="./agregarLC.php" style="margin-top: 0px;margin-left: 220px;" class="panel-body">
				
				<label>Nombre:</label><br><span class="field"><input class="form-control" type="text" id="user" name="user" value="Username"style="width:300px"></span>
				<label>AdminPass:</label><br><span class="field"><input class="form-control" type="password" id="pass" name="pass" value="password"style="width:300px"></span>
				<label>Linekkit Coins:</label><br><span class="field"><input class="form-control" type="text" id="reco" name="reco" value="Linekkit Coins"style="width:300px"></span>
				
				
				
				
				<hr class="clear">
				
				<input type="button" onclick="document.location='./index.php'" class=" btn btn-info" value="Atras">
				
				<input class=" btn btn-success" type="submit" value="Crear">
</form>
<?php
};
?>
<?php
function __compile($query) {
		if ($query === false || $query === true) return $query;
		$out = array();
		$id = 0;
		while($row = mysql_fetch_assoc($query)) {
			$out[$id] = $row;
			$id += 1;
		}
		return $out;
		}
		
?>
