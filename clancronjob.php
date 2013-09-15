<?php

/**
 * @author fede1
 * @copyright 2013
 */
//tipo 1 pk
//tipo 2 pvp
//tipo 3 xp
//tipo 4 eventos ganados por dia
//tipo 5 puntaje general

date_default_timezone_set("America/Argentina/Buenos_Aires");
require_once 'libs/mysql.inc.php';
require_once 'libs/config.inc.php';
$MySQL = new SQL($hostL, $usernombre, $pass, $dbgame);
$MySQL2 = new SQL($host, $usernombre, $pass,$dbnoticias);
$clans=$MySQL->execute('SELECT * FROM `clan_data` ');
$clanhall=$MySQL->execute('SELECT `id` as chid, `name`, `ownerId` as id  FROM `clanhall` WHERE NOT ownerid=0 ORDER BY ownerid');
$clanhallcant=$MySQL->execute('SELECT count(*) as cant FROM `clanhall` WHERE NOT ownerid=0 ');
$clanskills=$MySQL->execute('SELECT clan_id as id,count(*) as cant FROM `clan_skills`  GROUP BY clan_id ORDER BY clan_id');
$clanskillscant=$MySQL->execute('Select count(*) as cant FROM (SELECT clan_id as id,count(*) as cant FROM `clan_skills`  GROUP BY clan_id ORDER BY clan_id) as a');

foreach($clans as $clan)
{
    echo $clan['clan_name'];
    $points=getclanpoints($clan);
   echo ' Total: '.$points.'<br>';
   $MySQL->execute('UPDATE `clan_data` SET `puntosdeclan`='.$points.' WHERE `clan_id`='.$clan['clan_id']);

}

function binarySearch($key, $collection, $start, $end){
	// Selección de la posición del elemento central.
	$pivot = (int)($start + ($end - $start) / 2);
	// Condición de corte.
	if($start >= $end) return -1;
	if($collection[$pivot]['id'] > $key){
		return binarySearch($key, $collection, $start, $pivot - 1);
	} else if ($collection[$pivot]['id'] < $key){
		return binarySearch($key, $collection, $pivot + 1, $end);
	} else {
		return $pivot;
	}
}

function getclanpoints($clandata){
    global $clanhall,$clanskills,$clanhallcant,$clanskillscant;
    $puntos=0;
    $puntos+= $clandata['clan_level']*5;
    if($clandata['hasCastle'])
        $puntos+= 50;
    $puntos+= binarySearch($clandata['charId'],$clanhall,0,$clanhallcant[0]['cant'])>=0?15:0;
    $puntos+= $clanskills[binarySearch($pjdata['clanid'],$clanskills,0,$clanskillscant[0]['cant'])]['cant']*3;
    return $puntos;
}

?>