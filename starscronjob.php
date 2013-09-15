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

//$list1=' ('.$gral[0]['charId'].','.$pvp[0]['charId'].','.$pk[0]['charId'].') ';
//$list2=' ('.$gral[1]['charId'].','.$gral[2]['charId'].','.$pvp[1]['charId'].','.$pk[1]['charId'].') ';
if(isset($gral[2])){
$obj[1]=$gral[0]['charId'];
$obj[2]=$gral[1]['charId'];
$obj[3]=$gral[2]['charId'];
}
$obj[4]=$pvp[0]['charId'];
$obj[5]=$pvp[1]['charId'];
$obj[6]=$pk[0]['charId'];
$obj[7]=$pk[1]['charId'];
$list1=$list2='('.implode(', ', $obj).')';

echo $date.': '.$list1.' '.$list2.'<br>';
for($i=1;$i<=7;$i++){
    $starspj=$MySQL2->execute('SELECT * FROM stars WHERE charId in '.$list1.' OR charId in '.$list2. ' ORDER BY charId');
    //echo 'SELECT * FROM stars WHERE charId in '.$list1.' OR charId in '.$list2. ' ORDER BY charId';
    switch($i){
        case 1:
        if(binarySearch($gral[0]['charId'],$starspj,0,6))
            $MySQL2->execute('UPDATE stars SET fullStars=fullStars+1 WHERE charId='.$gral[0]['charId']);
        else
            $MySQL2->execute('INSERT INTO `stars`( `charId`, `fullStars`, `halfStars`) VALUES ('.$gral[0]['charId'].',1,0)');
        break;
        case 2:
        if(binarySearch($gral[1]['charId'],$starspj,0,6))
            $MySQL2->execute('UPDATE stars SET halfStars=halfStars+1 WHERE charId='.$gral[1]['charId']);
        else
            $MySQL2->execute('INSERT INTO `stars`( `charId`, `fullStars`, `halfStars`) VALUES ('.$gral[1]['charId'].',0,1)');
        break;
        case 3:
        if(binarySearch($gral[2]['charId'],$starspj,0,6))
            $MySQL2->execute('UPDATE stars SET halfStars=halfStars+1 WHERE charId='.$gral[2]['charId']);
        else
            $MySQL2->execute('INSERT INTO `stars`( `charId`, `fullStars`, `halfStars`) VALUES ('.$gral[2]['charId'].',0,1)');
        break;
        case 4:
        if(binarySearch($pvp[0]['charId'],$starspj,0,6))
            $MySQL2->execute('UPDATE stars SET fullStars=fullStars+1 WHERE charId='.$pvp[0]['charId']);
        else
            $MySQL2->execute('INSERT INTO `stars`( `charId`, `fullStars`, `halfStars`) VALUES ('.$pvp[0]['charId'].',1,0)');
        break;
        case 5:
        if(binarySearch($pvp[1]['charId'],$starspj,0,6))
            $MySQL2->execute('UPDATE stars SET halfStars=halfStars+1 WHERE charId='.$pvp[1]['charId']);
        else
            $MySQL2->execute('INSERT INTO `stars`( `charId`, `fullStars`, `halfStars`) VALUES ('.$pvp[1]['charId'].',0,1)');
        break;
        case 6:
        if(binarySearch($pk[0]['charId'],$starspj,0,6))
            $MySQL2->execute('UPDATE stars SET fullStars=fullStars+1 WHERE charId='.$pk[0]['charId']);
        else
            $MySQL2->execute('INSERT INTO `stars`( `charId`, `fullStars`, `halfStars`) VALUES ('.$pk[0]['charId'].',1,0)');
        break;
        case 7:
        if(binarySearch($pk[1]['charId'],$starspj,0,6))
            $MySQL2->execute('UPDATE stars SET halfStars=halfStars+1 WHERE charId='.$pk[1]['charId']);
        else
            $MySQL2->execute('INSERT INTO `stars`( `charId`, `fullStars`, `halfStars`) VALUES ('.$pk[1]['charId'].',0,1)');
        break;
    }
}

function binarySearch($key, $collection, $start, $end){
	// Selección de la posición del elemento central.
	$pivot = (int)($start + ($end - $start) / 2);
	// Condición de corte.
	if($start >= $end) return false;
	if($collection[$pivot]['charId'] > $key){
		return binarySearch($key, $collection, $start, $pivot - 1);
	} else if ($collection[$pivot]['charId'] < $key){
		return binarySearch($key, $collection, $pivot + 1, $end);
	} else {
		return true;
	}
}
?>