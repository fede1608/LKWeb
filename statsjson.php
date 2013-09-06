<?php

/**
 * @author fede1
 * @copyright 2013
 */
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    require_once 'libs/mysql.inc.php';
	require_once 'libs/config.inc.php';
    $MySQL = new SQL($hostL, $usernombre, $pass, $dbgame);
    
class Stat {
    public $puesto;
    public $name;
    public $cant;
    public $clan; 
    //public $sth;    
}
switch($_GET['type']){
    case 'pk':
    $limit=100;
    $pjs=$MySQL->execute("select c.char_name as name,c.pkkills as pk,cd.clan_name as clan from characters as c,clan_data as cd WHERE accesslevel=0 AND pkkills >= 0 AND c.clanid=cd.clan_id order by c.pkkills desc limit ".$limit);
    
    $cont=0;
    foreach($pjs as $pj){
        $aux[$cont]= new Stat;
        $aux[$cont]->puesto=$cont+1;
        $aux[$cont]->name=$pj['name'];
        $aux[$cont]->clan=$pj['clan'];
        $aux[$cont]->cant=$pj['pk'];
        //$aux[$cont]->sth='A';
        $cont++;
    }
    $aux2['aaData']=$aux;
    echo json_encode($aux2);
    break;
    case 'pvp':
    $limit=100;
    $pjs=$MySQL->execute("select c.char_name as name,c.pvpkills as pvp,cd.clan_name as clan from characters as c,clan_data as cd WHERE c.accesslevel=0 AND c.pvpkills >= 0 AND c.clanid=cd.clan_id order by c.pvpkills desc limit ".$limit);
    
    $cont=0;
    foreach($pjs as $pj){
        $aux[$cont]= new Stat;
        $aux[$cont]->puesto=$cont+1;
        $aux[$cont]->name=$pj['name'];
        $aux[$cont]->clan=$pj['clan'];
        $aux[$cont]->cant=$pj['pvp'];
        //$aux[$cont]->sth='A';
        $cont++;
    }
    $aux2['aaData']=$aux;
    echo json_encode($aux2);
    break;
    case 'time':
    $limit=100;
    $pjs=$MySQL->execute("SELECT c.char_name as name,c.onlinetime as time,cd.clan_name as clan FROM characters as c,clan_data as cd WHERE c.accesslevel=0 AND c.onlinetime >= 1 AND c.clanid=cd.clan_id order by c.onlinetime desc limit ".$limit);
    
    $cont=0;
    foreach($pjs as $pj){
        $aux[$cont]= new Stat;
        $aux[$cont]->puesto=$cont+1;
        $aux[$cont]->name=$pj['name'];
        $aux[$cont]->clan=$pj['clan'];
        $day = intval(bcdiv($pj['time'],86400));
        $aux[$cont]->cant=gmstrftime("$day dias(s) %H horas(s) %M min(s)", $pj['time']);
        //$aux[$cont]->sth='A';
        $cont++;
    }
    $aux2['aaData']=$aux;
    echo json_encode($aux2);
    break;
}
?>