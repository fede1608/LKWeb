<?php
echo "Procesando...";
//------------Funciones------------
function anti_injection($sql) {
        if (!is_array($sql)) {
            $sql = mysql_real_escape_string(stripslashes(trim($sql))); //get all data into shape for db insert without sql injection attacks
        }
        return $sql;
}
function descontarRecoPlas($nombredeusuario,$cantidad,$recoactuales,$conexion)
{
if ($cantidad<=0) { error("errcoins"); }else{
	// $recoplasfinales=($recoactuales-$cantidad);
	mysql_query("UPDATE linekkitlogin.accounts SET coins= coins - ".$cantidad." WHERE login='".$nombredeusuario."'",$conexion); }
}

function noExisteNombreNuevo($nuevonombre,$conexion) {
	$reg=mysql_query("SELECT * FROM characters WHERE (char_name='$nuevonombre')",$conexion);
	if(mysql_fetch_array($reg))
		return 0;
	else
		return 1;
}
function error($msg){
GLOBAL $opcion;
			echo "<script language=\"JavaScript\">";
			echo "self.location=\"./actionsLC.php?id=".intval($opcion)."&error=".$msg."\";";
			echo "</script>";
	}
function exito($msg){
			echo "<script language=\"JavaScript\">";
			echo "self.location=\"./index2.php?valid=".$msg."\";";
			echo "</script>";
	}
function obtenerOID(){
//recordar hacer la tabla en la sql!!!
$registro=mysql_query("SELECT * FROM custom_object_id");
$reg=mysql_fetch_array($registro);
mysql_query("UPDATE custom_object_id SET object_id = object_id+1");
return $reg['object_id'];

}

function agregarDonatorCoins($ownerid,$cantidadcoins,$conexion) {
$registro=mysql_query("SELECT * FROM items WHERE (owner_id=".$ownerid." AND item_id=9143)");
$reg=mysql_fetch_array($registro);

if ($reg) {
	$cantidadquetiene=$reg['count']+$cantidadcoins;
	mysql_query("UPDATE items SET count=$cantidadquetiene WHERE (owner_id=".$ownerid." AND item_id=9143)",$conexion);
}
else{$oid=obtenerOID();
	mysql_query("INSERT INTO items(owner_id,object_id,item_id,count,enchant_level,loc,loc_data,custom_type1,custom_type2,mana_left,time) VALUE(".$ownerid.",".$oid.",9143,".$cantidadcoins.",0,'INVENTORY',0,0,0,-1,-1)",$conexion);
	}
}

//-----------Fin de funciones---------------
session_start();
if(isacmlogged()){
$data=unserialize($_SESSION['acm']);
$userdata= get_object_vars($data);
};

function isacmlogged(){
    if(isset($_SESSION['acm'])) return true;
    return false;
}

if(!isacmlogged()){
    echo '<script language="javascript">
			window.top.location="signin.php"
			</script>';
    exit();
}
include_once 'libs/config.inc.php';
include_once 'libs/mysql.inc.php';
$MySQLLK = new SQL($hostL, $usernombre, $pass, $dbgame);
//Conexión a DBs
$conexion=mysql_connect($hostL,$usernombre,$pass) or
	die("Ups, hubo problemas técnicos tipo 1, probá más tarde");
		
//Selección de DB
if(mysql_select_db($dbgame,$conexion)) {

	//Seteo fecha

	date_default_timezone_set("America/Argentina/Buenos_Aires");

	//Asignar el REQUEST a variables

	$pjseleccionado= (empty($_POST['pjseleccionado'])) ? die("Error empty pj seleccionado") : $_POST['pjseleccionado']; 
	$cantidadcoins=(empty($_POST['cantidadcoins']) )? 0 : $_POST['cantidadcoins'];
	$nombredeusuario=(empty($_POST['nombredeusuario'])) ? die("Error empty nom de usuario") : $userdata['login'];
	$nuevonombre=(empty($_POST['nuevonombre'])) ? "" : $_POST['nuevonombre'];
	$opcion=(empty($_POST['opcion'])) ? "" : $_POST['opcion'];
	$ps=(empty($_POST['packpremium']) )? 0 : $_POST['packpremium'];
	
	$pjseleccionado=anti_injection($pjseleccionado);
	$cantidadcoins=anti_injection($cantidadcoins);
	$nombredeusuario=anti_injection($nombredeusuario);
	$nuevonombre=anti_injection($nuevonombre);
	$opcion=anti_injection($opcion);
	
	//Asignar la consulta a variables

	$registro=mysql_query("SELECT * FROM characters WHERE (char_name = '$pjseleccionado')",$conexion);
	$reg=mysql_fetch_array($registro);

	$raza=$reg['race'];
	$sexo=$reg['sex'];
	$ownerid=$reg['charId'];
	$online=$reg['online'];
	if(strtolower($reg['account_name'])!=strtolower($nombredeusuario)&&$opcion!=4) die("Error Acountname distinto de nombre de usuario");
	//Busco cantidad de Recoplas actuales

	$registro=mysql_query("SELECT coins FROM linekkitlogin.accounts WHERE login='$nombredeusuario'",$conexion);
	$reg=mysql_fetch_array($registro);
	$recoplasactuales=$reg['coins'];

	//Abro archivo logs

	$archivo=fopen("Logs/LogsCambioDePuntos.txt","a");

	//Compruebo si el PJ esta Online

	if($online==0)

	{

	//Ejecuto acción
	switch ($opcion) {
		//Asignar Donator Coins cambiando Linekkit coins
		case 1:
			if($cantidadcoins>0) {
				if ($recoplasactuales >= $cantidadcoins) {
					//Falta hacer que chequee si ya tiene Donator coins, si tiene, que le agregue sino que le dé de 0
					agregarDonatorCoins($ownerid,$cantidadcoins,$conexion);
					descontarRecoPlas($nombredeusuario,$cantidadcoins,$recoplasactuales,$conexion);
					fputs($archivo,date(DATE_RFC822)." El usuario ".$nombredeusuario." ha asignado ".$cantidadcoins." Donator coins al pj ".$pjseleccionado." LCoins: ".$recoplasactuales."  IP: ".$_SERVER['REMOTE_ADDR']." RealIp: ".getip(). " Host: ".gethostbyaddr(getip()));
					fputs($archivo,"\n");
					exito("coins_yes");
				} else{
					echo 'No tenés suficientes Linekkit Coins';
					error("nocoins");
				}
			}
		
		break;
		//Cambiar nombre de PJ
		case 2:
			if ($recoplasactuales >= 15) {
				if (noExisteNombreNuevo($nuevonombre,$conexion)) {
					if (strlen($nuevonombre) <= 16) {
						if (preg_match("/^[a-zA-Z0-9]+$/",$nuevonombre)){
						mysql_query("UPDATE characters SET char_name='$nuevonombre' WHERE char_name='$pjseleccionado'",$conexion);
						descontarRecoPlas($nombredeusuario,15,$recoplasactuales,$conexion);
						fputs($archivo,date(DATE_RFC822)." El usuario ".$nombredeusuario." ha cambiado el nick del pj ".$pjseleccionado." a ".$nuevonombre." LCoins: ".$recoplasactuales." IP: ".$_SERVER['REMOTE_ADDR']." RealIp: ".getip(). " Host: ".gethostbyaddr(getip()));
						fputs($archivo,"\n");
						exito("_character_name_yes");//echo 'El cambio de nombre se concretó correctamente';			
						} else error("REGWARN_UNAME2");
					}
					else
						error("REGWARN_UNAME4");
				}
				else
					error("duplicado");//echo 'Ya existe un pj con ese nick';
			}
			else
				{
			//echo 'No tenés suficientes Linekkit Coins';
			error("nocoins");}
				
		break;
		//Cambiar sexo del PJ (excepto kamaels)
		case 3:
			if ($recoplasactuales >= 15) {

				if ($raza == 5)
					error("_acc_serv_gender_kamael");
				else {
					if ($sexo == 0) {
						mysql_query("UPDATE characters SET sex=1 WHERE (char_name = '$pjseleccionado')",$conexion);
						fputs($archivo,date(DATE_RFC822)." El usuario ".$nombredeusuario." ha cambiado el sexo del pj ".$pjseleccionado." a mujer. LCoins: ".$recoplasactuales."  IP: ".$_SERVER['REMOTE_ADDR']." RealIp: ".getip(). " Host: ".gethostbyaddr(getip()));
						fputs($archivo,"\n");
						exito("_character_sex_yes");
					}
					else
					{
						mysql_query("UPDATE characters SET sex=0 WHERE (char_name = '$pjseleccionado')",$conexion);
						fputs($archivo,date(DATE_RFC822)." El usuario ".$nombredeusuario." ha cambiado el sexo del pj ".$pjseleccionado." a hombre. LCoins: ".$recoplasactuales." IP: ".$_SERVER['REMOTE_ADDR']." RealIp: ".getip());
						fputs($archivo,"\n");
						exito("_character_sex_yes");
					}
				descontarRecoPlas($nombredeusuario,15,$recoplasactuales,$conexion);
				}
			}
		else
			{
			//echo 'No tenés suficientes Linekkit Coins';
			error("nocoins");}
		break;
		case 4:
			$service='';
			switch($ps){
				case 1:	
				$cost=120;
				if ($recoplasactuales >= $cost) {
					$time=30*24*60*60*1000;
					$service=' 1 mes ';
				}else error("nocoins");
				break;
				case 2:	
				$cost=70;
				if ($recoplasactuales >= $cost) {
					$time=15*24*60*60*1000;
					$service=' 15 dias ';
				}else error("nocoins");
				break;
				case 3:	
				$cost=40;
				if ($recoplasactuales >= $cost) {
					$time=7*24*60*60*1000;
					$service=' 7 dias ';
				}else error("nocoins");
				break;
				default:
				error("_premium_no");
				die('error ps switch');
				break;
			}
			$now=time()*1000;
			$premiumservice=$MySQLLK->execute('SELECT * FROM  `account_premium` WHERE  `account_name` =  "'.$nombredeusuario.'"');
			if(!isset($premiumservice[0])){
				error("_premium_no");
				exit();
			}
			if($premiumservice[0]['premium_service']){
				$MySQLLK->execute('UPDATE `account_premium` SET `enddate`=enddate+'.$time.' WHERE `account_name`="'.$nombredeusuario.'"');
			}else{
				$MySQLLK->execute('UPDATE `account_premium` SET premium_service=1,`enddate`='.($time+$now).' WHERE `account_name`="'.$nombredeusuario.'"');
			}
			descontarRecoPlas($nombredeusuario,$cost,$recoplasactuales,$conexion);
			fputs($archivo,date(DATE_RFC822)." El usuario ".$nombredeusuario." ha asignado ".$service." de Premium Service . LCoins: ".$recoplasactuales."  IP: ".$_SERVER['REMOTE_ADDR']." RealIp: ".getip(). " Host: ".gethostbyaddr(getip()));
			fputs($archivo,"\n");
			exito("_premium_yes");
			break;
		default:
			echo 'No elegiste opción';
			
		break;
	}

	}
	//Sino, le pide que desloguee
	else{
	echo 'Desloguea la cuenta'; error("deslog"); }
	
	//Cierro conexión y archivo
	mysql_close($conexion);
	fclose($archivo);
}
else
	echo 'Problemas técnicos, pruebe más tarde';
function getip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
?>
