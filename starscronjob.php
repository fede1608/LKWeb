<?php

/**
 * @author fede1
 * @copyright 2013
 */

date_default_timezone_set("America/Argentina/Buenos_Aires");
require_once 'libs/mysql.inc.php';
require_once 'libs/config.inc.php';
$MySQL = new SQL($hostL, $usernombre, $pass, $dbgame);
$MySQL2 = new SQL($host, $usernombre, $pass,$dbnoticias);

$date=date('ymd');
//for($j=2;$j<=14;$j++){
//    $date='1309'.($j<=9?('0'.$j):$j);
$gral=$MySQL2->execute('SELECT * FROM dailystats WHERE tipo=5 AND fecha='.$date.' ORDER BY cant DESC LIMIT 3');
$pvp=$MySQL2->execute('SELECT * FROM dailystats WHERE tipo=2 AND fecha='.$date.' ORDER BY cant DESC LIMIT 2');
$pk=$MySQL2->execute('SELECT * FROM dailystats WHERE tipo=1 AND fecha='.$date.' ORDER BY cant DESC LIMIT 2');


if(isset($gral[2])){
$obj[1]=$gral[0]['charId'];
$obj[2]=$gral[1]['charId'];
$obj[3]=$gral[2]['charId'];
}
$obj[4]=$pvp[0]['charId'];
$obj[5]=$pvp[1]['charId'];
$obj[6]=$pk[0]['charId'];
$obj[7]=$pk[1]['charId'];
$list1='('.implode(', ', $obj).')';

echo $date.': '.$list1.'<br>';
for($i=1;$i<=7;$i++){
    $starspj=$MySQL2->execute('SELECT * FROM stars WHERE charId='.$obj[$i].' ORDER BY charId');
    switch($i){
        case 1: case 4: case 6:
        if(isset($starspj[0]))
            $MySQL2->execute('UPDATE stars SET fullStars=fullStars+1 WHERE charId='.$obj[$i]);
        else
            $MySQL2->execute('INSERT INTO `stars`( `charId`, `fullStars`, `halfStars`) VALUES ('.$obj[$i].',1,0)');
        break;
        case 2: case 3: case 5: case 7:
        if(isset($starspj[0]))
            $MySQL2->execute('UPDATE stars SET halfStars=halfStars+1 WHERE charId='.$obj[$i]);
        else
            $MySQL2->execute('INSERT INTO `stars`( `charId`, `fullStars`, `halfStars`) VALUES ('.$obj[$i].',0,1)');
        break;
    }
}
//}


?>