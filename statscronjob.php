<?php

/**
 * @author fede1
 * @copyright 2013
 */
//tipo 1 pk
//tipo 2 pvp
//tipo 3 xp
//tipo 4 eventos ganados por dia

date_default_timezone_set("America/Argentina/Buenos_Aires");
require_once 'libs/mysql.inc.php';
require_once 'libs/config.inc.php';
$MySQL = new SQL($hostL, $usernombre, $pass, $dbgame);
$MySQL2 = new SQL($host, $usernombre, $pass,$dbnoticias);
$pjs=$MySQL->execute('SELECT account_name,charId,char_name,pvpkills,pkkills,exp FROM characters ORDER BY charId');
//$statspj=$MySQL2->execute('SELECT * FROM dailystats WHERE charID=');
$date=date('ymd');
$events=$MySQL->execute('SELECT n.`player`,sum(n.`wins`) as suma FROM `nexus_stats_global` as n  GROUP BY n.`player` ORDER BY n.`player`');
$contevent=0;
foreach($pjs as $pj)
{
    echo $pj['char_name'];
    $pk=$pvp=$xp=$wins=0;
    $statspj=$MySQL2->execute('SELECT * FROM dailystats WHERE charID='.$pj['charId']);
    //$events=$MySQL->execute('SELECT sum(n.`wins`) as suma FROM `nexus_stats_global` as n  WHERE n.`player`='.$pj['charId'].' GROUP BY n.`player` ORDER BY suma DESC');

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
            case 4:
            $wins+=$stat['cant'];
            break;
        }
    }
    $newpk=$pj['pkkills']-$pk;
    $newpvp=$pj['pvpkills']-$pvp;
    $newxp=$pj['exp']-$xp;
    while(isset($events[$contevent+1])&&$pj['charId']<$events[$contevent]['player']){
        $contevent++;
    }
   if($pj['charId']==$events[$contevent]['player'])
        $newwins=$events[$contevent]['suma']-$wins;
   else
        $newwins=0;

    
    
    $stattoday=$MySQL2->execute('SELECT * FROM dailystats WHERE charId='.$pj['charId'].' AND fecha='.$date);
    echo ('SELECT * FROM dailystats WHERE charId='.$pj['charId'].' AND fecha='.$date);
    echo '<br>';
    
    $tipo[1]=false;
    $tipo[2]=false;
    $tipo[3]=false;
    $tipo[4]=false;
    
    foreach($stattoday as $s){
        echo 'updateado';
        switch($s['tipo']){
            case 1:
            if($newpk!=0){
                $MySQL2->execute('UPDATE dailystats SET cant=cant + '.$newpk.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=1');
                echo ('UPDATE dailystats SET cant=cant + '.$newpk.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=1');
                echo '<br>';
                }
            break;
            case 2:
            if($newpvp!=0){
                $MySQL2->execute('UPDATE dailystats SET cant=cant + '.$newpvp.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=2');
                echo ('UPDATE dailystats SET cant=cant + '.$newpvp.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=2');
                echo '<br>';
                }
            break;  
            case 3:
            if($newxp!=0){
                $MySQL2->execute('UPDATE dailystats SET cant=cant + '.$newxp.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=3');
                echo ('UPDATE dailystats SET cant=cant + '.$newxp.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=3');
                echo '<br>';
                }
            break;
            case 4:
            if($newwins!=0){
                $MySQL2->execute('UPDATE dailystats SET cant=cant + '.$newwins.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=4');
                echo ('UPDATE dailystats SET cant=cant + '.$newwins.' WHERE charId='.$pj['charId'].' AND fecha='.$date.' AND tipo=4');
                echo '<br>';
                }
            break;
        } 
        $tipo[$s['tipo']]=true;
    }
    
        if(!$tipo[1])$MySQL2->execute('INSERT INTO `dailystats`(`charId`, `tipo`, `fecha`, `cant`) VALUES ('.$pj['charId'].',1,'.$date.','.$newpk.')');
        if(!$tipo[2])$MySQL2->execute('INSERT INTO `dailystats`(`charId`, `tipo`, `fecha`, `cant`) VALUES ('.$pj['charId'].',2,'.$date.','.$newpvp.')');
        if(!$tipo[3])$MySQL2->execute('INSERT INTO `dailystats`(`charId`, `tipo`, `fecha`, `cant`) VALUES ('.$pj['charId'].',3,'.$date.','.$newxp.')');
        if(!$tipo[4])$MySQL2->execute('INSERT INTO `dailystats`(`charId`, `tipo`, `fecha`, `cant`) VALUES ('.$pj['charId'].',4,'.$date.','.$newwins.')');
    
}


?>