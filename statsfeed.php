<?php

/**
 * @author fede1
 * @copyright 2013
 */
require_once 'libs/mysql.inc.php';
require_once 'libs/config.inc.php';
include_once 'datachars.php'; 
$MySQLLK = new SQL($hostL, $usernombre, $pass, $dbgame);
$MySQLMK = new SQL($host, $usernombre, $pass, $dbnoticias);  

function getStats($account){
  global $race,$class,$level,$MySQLLK,$MySQLMK;

    
    $charsid=$MySQLLK->execute('SELECT char_name,charId,race,classId,level,exp,karma,createTime,onlinetime,profile_pic FROM characters WHERE account_name="'.$account.'"');
    $premiumacc=$MySQLLK->execute('SELECT * FROM account_premium WHERE account_name="'.$account.'"');

    //$obj['premium']=$premiumacc[0]['premium_service'];
    $cantpj=0;
    foreach($charsid as $charid){
            
        $suma=$MySQLMK->execute('SELECT tipo,SUM(cant),COUNT(*) FROM dailystats WHERE charId='.$charid['charId'].' GROUP BY tipo');
        $diaspk=$MySQLMK->execute('SELECT * FROM dailystats WHERE charId='.$charid['charId'].' AND tipo=1 ORDER BY fecha DESC LIMIT 7');
        $diaspvp=$MySQLMK->execute('SELECT * FROM dailystats WHERE charId='.$charid['charId'].' AND tipo=2 ORDER BY fecha DESC LIMIT 7');
        $diasxp=$MySQLMK->execute('SELECT * FROM dailystats WHERE charId='.$charid['charId'].' AND tipo=3 ORDER BY fecha DESC LIMIT 7');
        $max=$MySQLMK->execute('SELECT tipo,MAX(cant) FROM dailystats WHERE charId='.$charid['charId'].' GROUP BY tipo');
        $stars=$MySQLMK->execute('SELECT * FROM stars WHERE charId='.$charid['charId']);
//        $nextexp=$charid['exp'];
//        for($e=1;$e<=85;$e++){
//            if (($charid['exp']<$level[$e])&& ($nextexp!=$charid['exp'])) $nextexp=$level[$e];
//        }
        $obj[$cantpj]['events']=$suma[3]['SUM(cant)'];
        $obj[$cantpj]['half']=isset($stars[0]['halfStars'])?$stars[0]['halfStars']:0;
        $obj[$cantpj]['full']=isset($stars[0]['fullStars'])?$stars[0]['fullStars']:0;
        $obj[$cantpj]['stars']=$obj[$cantpj]['full']+$obj[$cantpj]['half']*0.5;
        
        $obj[$cantpj]['name']=$charid['char_name'];
        $obj[$cantpj]['profile_pic']=$charid['profile_pic'];
        $obj[$cantpj]['level']=$charid['level'];
        $obj[$cantpj]['exp']=$charid['exp'];
        $obj[$cantpj]['karma']=$charid['karma'];
        $obj[$cantpj]['creado']=floor($charid['createTime']/1000);
        
        $horas=floor($charid['onlinetime']/3600);
        $minutos=ceil((($charid['onlinetime']/3600)-$horas)*60);
        
        $obj[$cantpj]['onlinetime']=($charid['onlinetime']);
        $obj[$cantpj]['tiempoonline']=($horas<10?('0'.$horas):$horas).':'.($minutos<10?('0'.$minutos):$minutos);
        $obj[$cantpj]['premium']=$premiumacc[0]['premium_service'];
        $obj[$cantpj]['nextexp']=$level[$charid['level']+1];
        $obj[$cantpj]['prevexp']=$level[$charid['level']];
        $obj[$cantpj]['race']=$race[$charid['race']];
        $obj[$cantpj]['class']=$class[$charid['classId']];
        $obj[$cantpj]['diastotales']=$suma[0]['COUNT(*)'];
        
        //PK
        $str=']';
        $cont=0;
        $acum=0;
        foreach($diaspk as $aux){
            $cont++;
            if($cont!=1) $str=','.$str;
            $str=$aux['cant'].' '.$str;
            $acum+=$aux['cant'];
        }
        if ($cont==0){
            $cont++;
            $str='0]';
        }
        if ($cont<7){
            for($a=$cont;$a<7;$a++){
                $str='0,'.$str;
            }
        }
        $str='['.$str;
        
        $obj[$cantpj][1]['total']=$suma[0]['SUM(cant)'];
        $obj[$cantpj][1]['stringdias']=$str;
        $obj[$cantpj][1]['promedio']=ceil($suma[0]['SUM(cant)']/$suma[0]['COUNT(*)']);
        $obj[$cantpj][1]['max']=$max[0]['MAX(cant)'];
        $obj[$cantpj][1]['semana']=$acum;
        
        //PVP
        $str=']';
        $cont=0;
        $acum=0;
        foreach($diaspvp as $aux){
            $cont++;
            if($cont!=1) $str=','.$str;
            $str=$aux['cant'].' '.$str;
            $acum+=$aux['cant'];
        }
        if ($cont==0){
            $cont++;
            $str='0]';
        }
        if ($cont<7){
            for($a=$cont;$a<7;$a++){
                $str='0,'.$str;
            }
        }
        $str='['.$str;        
        
        $obj[$cantpj][2]['total']=$suma[1]['SUM(cant)'];
        $obj[$cantpj][2]['stringdias']=$str;
        $obj[$cantpj][2]['promedio']=ceil($suma[1]['SUM(cant)']/$suma[1]['COUNT(*)']);;
        $obj[$cantpj][2]['max']=$max[1]['MAX(cant)'];
        $obj[$cantpj][2]['semana']=$acum;
        
        //XP
        $str=']';
        $cont=0;
        $acum=0;
        foreach($diasxp as $aux){
            $cont++;
            if($cont!=1) $str=','.$str;
            $str=$aux['cant'].''.$str;
            $acum+=$aux['cant'];
        }
        if ($cont==0){
            $cont++;
            $str='0]';
        }
        if ($cont<7){
            for($a=$cont;$a<7;$a++){
                $str='0,'.$str;
            }
        }
        $str='['.$str;        
        
        $obj[$cantpj][3]['total']=$charid['exp'];
        $obj[$cantpj][3]['stringdias']=$str;
        $obj[$cantpj][3]['promedio']=ceil($suma[2]['SUM(cant)']/$suma[2]['COUNT(*)']);;
        $obj[$cantpj][3]['max']=$max[2]['MAX(cant)'];
        $obj[$cantpj][3]['semana']=$acum;
        
    
    $cantpj++;}
return $obj;
}

function getRaceStats(){
    global $MySQLLK,$MySQLMK;
    $races=$MySQLLK->execute('SELECT race,COUNT(race) as cantidad FROM characters  GROUP BY race ORDER BY cantidad DESC');
    $back='';
    for($i=0;$i<=5;$i++){
        $obj[$i]['cant']=isset($races[$i]['cantidad'])?($races[$i]['cantidad']):0;
        $obj[$i]['race']=isset($races[$i]['race'])?($races[$i]['race']):-1;
        $back.=$obj[$i]['cant'];
        if($i!=5)$back.=',';
    }
    $obj['str']=$back;
    return $obj;

}

function getClanStats(){
    global $MySQLLK,$MySQLMK;
    $clans=$MySQLLK->execute('SELECT  `clan_name` ,  `puntosdeclan` as cantidad FROM  `clan_data` ORDER BY puntosdeclan DESC LIMIT 7');
    $back='';
    for($i=0;$i<=5;$i++){
        $obj[$i]['cant']=isset($clans[$i]['cantidad'])?($clans[$i]['cantidad']):0;
        $obj[$i]['clan']=isset($clans[$i]['clan_name'])?($clans[$i]['clan_name']):-1;
        $back.=$obj[$i]['cant'];
        if($i!=5)$back.=',';
    }
    $obj['str']=$back;
    return $obj;

}

function get7SStats(){
    global $MySQLLK,$MySQLMK;
    $SS=$MySQLLK->execute('SELECT `dawn_festival_score`+`dawn_stone_score` as dawn,`dusk_festival_score`+`dusk_stone_score` as dusk FROM `seven_signs_status`');
    if(isset($SS[0])){
        $obj['dawn']=$SS[0]['dawn'];
        $obj['dusk']=$SS[0]['dusk'];
    }else
    {
        $obj['dawn']=1;
        $obj['dusk']=1;
    }
    if(($obj['dawn']==$obj['dawn'])&&($obj['dawn']==0))
        $obj['dawn']=$obj['dusk']=1;
    
    return $obj;
}

function getTodayTops(){
    global $race,$class,$MySQLLK,$MySQLMK;
    $fecha=date('ymd');
    for($i=1;$i<=2;$i++){
        $result=$MySQLMK->execute('SELECT `charId`,cant FROM dailystats WHERE fecha='.$fecha.' AND tipo='.$i.' ORDER BY `cant` DESC LIMIT 3');
        for($j=1;$j<=3;$j++){
            $obj[$i][$j]['cant']=$result[$j-1]['cant'];
            $char=$MySQLLK->execute('SELECT c.char_name,c.charId,c.race,c.classId,c.level,c.exp,p.premium_service,c.profile_pic FROM characters as c,account_premium as p WHERE c.account_name=p.account_name AND charId='.$result[$j-1]['charId'].'');
            $obj[$i][$j]['pj']=$char[0]['char_name'];
            $obj[$i][$j]['race']=$race[$char[0]['race']];
            $obj[$i][$j]['lvl']=$char[0]['level'];
            $obj[$i][$j]['class']=$class[$char[0]['classId']];
            $obj[$i][$j]['premium']=$char[0]['premium_service'];
            $obj[$i][$j]['profile_pic']=$char[0]['profile_pic'];
        }
    }
    $i=5;
    $result=$MySQLMK->execute('SELECT `charId`,cant FROM dailystats WHERE fecha='.$fecha.' AND tipo='.$i.' ORDER BY `cant` DESC LIMIT 7');
    for($j=1;$j<=7;$j++){
        $obj[$i][$j]['cant']=$result[$j-1]['cant'];
        $char=$MySQLLK->execute('SELECT c.char_name,c.charId,c.race,c.classId,c.level,c.exp,p.premium_service,c.profile_pic FROM characters as c,account_premium as p WHERE c.account_name=p.account_name AND charId='.$result[$j-1]['charId'].'');
        $obj[$i][$j]['pj']=$char[0]['char_name'];
        $obj[$i][$j]['race']=$race[$char[0]['race']];
        $obj[$i][$j]['lvl']=$char[0]['level'];
        $obj[$i][$j]['class']=$class[$char[0]['classId']];
        $obj[$i][$j]['premium']=$char[0]['premium_service'];
        $obj[$i][$j]['profile_pic']=$char[0]['profile_pic'];
    }
    //$event=$MySQLLK->execute('SELECT c.char_name as player,c.level,c.race,c.classId,sum(n.`wins`) as suma FROM `nexus_stats_global` as n,characters as c  WHERE n.`player`=c.charId GROUP BY n.`player` ORDER BY suma DESC LIMIT 1');
   // $obj[4]['cant']=$event[0]['suma'];
//    $obj[4]['pj']=$event[0]['player'];
//    $obj[4]['race']=$race[$event[0]['race']];
//    $obj[4]['lvl']=$event[0]['level'];
//    $obj[4]['class']=$class[$event[0]['classId']];
    return $obj;
}

function getGeneralTops(){
    global $race,$class,$MySQLLK,$MySQLMK;
    
    for($i=1;$i<=2;$i++){
        $result=$MySQLMK->execute('SELECT d.`charId`,sum(d.cant) as cant FROM dailystats as d WHERE tipo='.$i.' GROUP BY charId  ORDER BY `cant` DESC LIMIT 7');
        for($j=1;$j<=7;$j++){
            $obj[$i][$j]['cant']=$result[$j-1]['cant'];
            $char=$MySQLLK->execute('SELECT c.char_name,c.charId,c.race,c.classId,c.level,c.exp,p.premium_service,c.profile_pic FROM characters as c,account_premium as p WHERE c.account_name=p.account_name AND charId='.$result[$j-1]['charId'].'');
            $obj[$i][$j]['pj']=$char[0]['char_name'];
            $obj[$i][$j]['race']=$race[$char[0]['race']];
            $obj[$i][$j]['lvl']=$char[0]['level'];
            $obj[$i][$j]['class']=$class[$char[0]['classId']];
            $obj[$i][$j]['premium']=$char[0]['premium_service'];
            $obj[$i][$j]['profile_pic']=$char[0]['profile_pic'];
        }
    }
    $i=5;
    $result=$MySQLMK->execute('SELECT d.`charId`,sum(d.cant) as cant FROM dailystats as d WHERE tipo='.$i.' GROUP BY charId  ORDER BY `cant` DESC LIMIT 7');
    for($j=1;$j<=7;$j++){
        $obj[$i][$j]['cant']=$result[$j-1]['cant'];
        $char=$MySQLLK->execute('SELECT c.char_name,c.charId,c.race,c.classId,c.level,c.exp,p.premium_service,c.profile_pic FROM characters as c,account_premium as p WHERE c.account_name=p.account_name AND charId='.$result[$j-1]['charId'].'');
        $obj[$i][$j]['pj']=$char[0]['char_name'];
        $obj[$i][$j]['race']=$race[$char[0]['race']];
        $obj[$i][$j]['lvl']=$char[0]['level'];
        $obj[$i][$j]['class']=$class[$char[0]['classId']];
        $obj[$i][$j]['premium']=$char[0]['premium_service'];
        $obj[$i][$j]['profile_pic']=$char[0]['profile_pic'];
    }
    $onlinetop=$MySQLLK->execute('SELECT c.char_name,c.charId,c.race,c.classId,c.level,c.exp,p.premium_service,c.onlinetime,c.profile_pic FROM characters as c,account_premium as p WHERE c.account_name=p.account_name AND c.accesslevel=0 ORDER BY onlinetime  DESC LIMIT 7');
    $expxmintop=$MySQLLK->execute('SELECT c.char_name,c.charId,c.race,c.classId,c.level,c.exp,p.premium_service,c.exp/(c.onlinetime/60) as expxmin,c.profile_pic FROM characters as c,account_premium as p WHERE c.account_name=p.account_name AND c.accesslevel=0 ORDER BY expxmin  DESC LIMIT 7');
    $i=9;//exp por minuto
    for($j=1;$j<=7;$j++){
        
        $obj[$i][$j]['cant']=$expxmintop[$j-1]['expxmin'];
        $obj[$i][$j]['pj']=$expxmintop[$j-1]['char_name'];
        $obj[$i][$j]['race']=$race[$expxmintop[$j-1]['race']];
        $obj[$i][$j]['lvl']=$expxmintop[$j-1]['level'];
        $obj[$i][$j]['class']=$class[$expxmintop[$j-1]['classId']];
        $obj[$i][$j]['premium']=$expxmintop[$j-1]['premium_service'];
        $obj[$i][$j]['profile_pic']=$expxmintop[$j-1]['profile_pic'];
    }
    $i=8;//online time
    for($j=1;$j<=7;$j++){
        $horas=floor($onlinetop[$j-1]['onlinetime']/3600);
        $minutos=ceil((($onlinetop[$j-1]['onlinetime']/3600)-$horas)*60);

        $obj[$i][$j]['cant']=($horas<10?('0'.$horas):$horas).':'.($minutos<10?('0'.$minutos):$minutos);
        $obj[$i][$j]['pj']=$onlinetop[$j-1]['char_name'];
        $obj[$i][$j]['race']=$race[$onlinetop[$j-1]['race']];
        $obj[$i][$j]['lvl']=$onlinetop[$j-1]['level'];
        $obj[$i][$j]['class']=$class[$onlinetop[$j-1]['classId']];
        $obj[$i][$j]['premium']=$onlinetop[$j-1]['premium_service'];
        $obj[$i][$j]['profile_pic']=$onlinetop[$j-1]['profile_pic'];
    }
    
    
    
    //$event=$MySQLLK->execute('SELECT c.char_name as player,c.level,c.race,c.classId,sum(n.`wins`) as suma FROM `nexus_stats_global` as n,characters as c  WHERE n.`player`=c.charId GROUP BY n.`player` ORDER BY suma DESC LIMIT 1');
   // $obj[4]['cant']=$event[0]['suma'];
//    $obj[4]['pj']=$event[0]['player'];
//    $obj[4]['race']=$race[$event[0]['race']];
//    $obj[4]['lvl']=$event[0]['level'];
//    $obj[4]['class']=$class[$event[0]['classId']];
    return $obj;
}
    
?>