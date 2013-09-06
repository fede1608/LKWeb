<?php

/**
 * @author fede1
 * @copyright 2013
 */
//tipo 1 pk
//tipo 2 pvp
//tipo 3 xp

date_default_timezone_set("America/Argentina/Buenos_Aires");
require_once 'libs/mysql.inc.php';
require_once 'libs/config.inc.php';
$MySQL = new SQL($hostL, $usernombre, $pass, $dbgame);
$MySQL2 = new SQL($host, $usernombre, $pass,$dbnoticias);
$pjs=$MySQL->execute('SELECT account_name,charId,char_name,pvpkills,pkkills,exp FROM characters WHERE 1');
//$statspj=$MySQL2->execute('SELECT * FROM dailystats WHERE charID=');
$date=date('ymd');

foreach($pjs as $pj)
{
    echo $pj['char_name'];
    $pk=$pvp=$xp=0;
    $statspj=$MySQL2->execute('SELECT * FROM dailystats WHERE charID='.$pj['charId']);
    foreach($statspj as $stat){
        switch($stat['tipo']){
            case 1:
            $pk+=$stat['cant'];
            break;
            case 2:
            $pvp+=$stat['cant'];
            break;
            case 3:
            $xp+=$stat['cant'];
            break;
        }
    }
    $newpk=$pj['pkkills']-$pk;
    $newpvp=$pj['pvpkills']-$pvp;
    $newxp=$pj['exp']-$xp;
    
    $stattoday=$MySQL2->execute('SELECT * FROM dailystats WHERE charId='.$pj['charId'].' AND fecha='.$date);
    echo ('SELECT * FROM dailystats WHERE charId='.$pj['charId'].' AND fecha='.$date);
    echo '<br>';
    
    $tipo[1]=false;
    $tipo[2]=false;
    $tipo[3]=false;
    
    foreach($stattoday as $s){
        echo 'updateado';
        switch($s['tipo']){
            case 1:
            $MySQL2->execute('UPDATE dailystats SET cant=cant + '.$newpk.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=1');
            echo ('UPDATE dailystats SET cant=cant + '.$newpk.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=1');
            echo '<br>';
            break;
            case 2:
            $MySQL2->execute('UPDATE dailystats SET cant=cant + '.$newpvp.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=2');
            echo ('UPDATE dailystats SET cant=cant + '.$newpvp.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=2');
            echo '<br>';
            break;  
            case 3:
            $MySQL2->execute('UPDATE dailystats SET cant=cant + '.$newxp.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=3');
            echo ('UPDATE dailystats SET cant=cant + '.$newxp.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=3');
            echo '<br>';
            break;
        } 
        $tipo[$s['tipo']]=true;
    }
    
        if(!$tipo[1])$MySQL2->execute('INSERT INTO `dailystats`(`charId`, `tipo`, `fecha`, `cant`) VALUES ('.$pj['charId'].',1,'.$date.','.$newpk.')');
        if(!$tipo[2])$MySQL2->execute('INSERT INTO `dailystats`(`charId`, `tipo`, `fecha`, `cant`) VALUES ('.$pj['charId'].',2,'.$date.','.$newpvp.')');
        if(!$tipo[3])$MySQL2->execute('INSERT INTO `dailystats`(`charId`, `tipo`, `fecha`, `cant`) VALUES ('.$pj['charId'].',3,'.$date.','.$newxp.')');
    
}


?>