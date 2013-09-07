
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
<h1>Agregar Recoplas</h1>
<form name="agregar" method="POST" action="./agregarLC.php" style="margin-top: 0px;margin-left: 220px;">
				<br>
				<br>
				<label>Nombre:</label><br><span class="field"><input type="text" id="user" name="user" value="Username"style="width:300px"></span>
				<br><label>AdminPass:</label><br><span class="field"><input type="password" id="pass" name="pass" value="password"style="width:300px"></span>
				<br><label>Linekkit Coins:</label><br><span class="field"><input type="text" id="reco" name="reco" value="Recoplas"style="width:300px"></span>
				<br>
				
				
				<br>
				<hr class="clear">
				<br>
				<input type="button" onclick="document.location='./index.php'" class="button" value="Atras">
				<br>
				<input class="button" type="submit" value="Crear">
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
