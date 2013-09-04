<?php

/**
 * @author fede1
 * @copyright 2013
 */
//tipo 1 pk
//tipo 2 pvp

date_default_timezone_set("America/Argentina/Buenos_Aires");
require_once 'libs/mysql.inc.php';
require_once 'libs/config.inc.php';
$MySQL = new SQL("freya.linekkit.com:3306", $usernombre, $pass, "linekkittest");
$MySQL2 = new SQL("localhost:3306", $usernombre, $pass, "noticias");
$pjs=$MySQL->execute('SELECT account_name,charId,char_name,pvpkills,pkkills FROM characters WHERE 1');
//$statspj=$MySQL2->execute('SELECT * FROM dailystats WHERE charID=');
$date=date('ymd');

foreach($pjs as $pj)
{
    echo $pj['char_name'];
    $pk=$pvp=0;
    $statspj=$MySQL2->execute('SELECT * FROM dailystats WHERE charID='.$pj['charId']);
    foreach($statspj as $stat){
        switch($stat['tipo']){
            case 1:
            $pk+=$stat['cant'];
            break;
            case 2:
            $pvp+=$stat['cant'];
            break;
        }
    }
    $newpk=$pj['pkkills']-$pk;
    $newpvp=$pj['pvpkills']-$pvp;
    
    $stattoday=$MySQL2->execute('SELECT * FROM dailystats WHERE charId='.$pj['charId'].' AND fecha='.$date);
    echo ('SELECT * FROM dailystats WHERE charId='.$pj['charId'].' AND fecha='.$date);
    if(isset($stattoday[0])){
        echo 'updateado';
        $MySQL2->execute('UPDATE dailystats SET cant=cant + '.$newpk.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=1');
        echo ('UPDATE dailystats SET cant=cant + '.$newpk.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=1');
        $MySQL2->execute('UPDATE dailystats SET cant=cant + '.$newpvp.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=2');
        echo ('UPDATE dailystats SET cant=cant + '.$newpvp.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=2');  
    }else{
        echo 'insertado';
        $MySQL2->execute('INSERT INTO `dailystats`(`charId`, `tipo`, `fecha`, `cant`) VALUES ('.$pj['charId'].',1,'.$date.','.$newpk.')');
        $MySQL2->execute('INSERT INTO `dailystats`(`charId`, `tipo`, `fecha`, `cant`) VALUES ('.$pj['charId'].',2,'.$date.','.$newpvp.')');
    }
    
}


?>