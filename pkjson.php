<?php

/**
 * @author fede1
 * @copyright 2013
 */
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    require_once 'libs/mysql.inc.php';
	require_once 'libs/config.inc.php';
    $MySQL = new SQL("freya.linekkit.com:3306", $usernombre, $pass, "linekkittest");
    
class StatPK {
    public $puesto;
    public $name;
    public $cant;
    public $clan; 
    public $sth;    
}
$limit=50;
$pjs=$MySQL->execute("select c.char_name as name,c.pkkills as pk,cd.clan_name as clan from characters as c,clan_data as cd WHERE accesslevel=0 AND pkkills >= 0 AND (c.clanid=cd.clan_id OR c.clanid=0) order by pkkills desc limit ".$limit);

$cont=0;
foreach($pjs as $pj){
    $aux[$cont]= new StatPK;
    $aux[$cont]->puesto=$cont+1;
    $aux[$cont]->name=$pj['name'];
    $aux[$cont]->clan=$pj['clan'];
    $aux[$cont]->cant=$pj['pk'];
    $aux[$cont]->sth='A';
    $cont++;
}
$aux2['aaData']=$aux;
echo json_encode($aux2);
?>