<?php

/**
 * @author fede1
 * @copyright 2013
 */
require_once 'libs/mysql.inc.php';
require_once 'libs/config.inc.php';
include_once 'datachars.php';
function getStats($account){
  global $usernombre,$pass,$race,$class,$level;
    $MySQLLK = new SQL("freya.linekkit.com:3306", $usernombre, $pass, "linekkittest");
    $MySQLMK = new SQL("localhost:3306", $usernombre, $pass, "noticias");  
    
    $charsid=$MySQLLK->execute('SELECT char_name,charId,race,classId,level,exp FROM characters WHERE account_name="'.$account.'"');
//    echo 'SELECT charId,race,classId FROM characters WHERE account_name="'.$account.'"';
//    print_r( $charsid);
    
    //$condicion='(';
    $cantpj=0;
    foreach($charsid as $charid){
        
//        if($condicion!='(') $condicion.=' OR ';
//        $condicion.='charId='.$charid['charId'];
//    }
//    $condicion.=')';

    
        $suma=$MySQLMK->execute('SELECT tipo,SUM(cant),COUNT(*) FROM dailystats WHERE charId='.$charid['charId'].' GROUP BY tipo');
        $diaspk=$MySQLMK->execute('SELECT * FROM dailystats WHERE charId='.$charid['charId'].' AND tipo=1 ORDER BY fecha DESC LIMIT 7');
        $diaspvp=$MySQLMK->execute('SELECT * FROM dailystats WHERE charId='.$charid['charId'].' AND tipo=2 ORDER BY fecha DESC LIMIT 7');
        $diasxp=$MySQLMK->execute('SELECT * FROM dailystats WHERE charId='.$charid['charId'].' AND tipo=3 ORDER BY fecha DESC LIMIT 7');
        $max=$MySQLMK->execute('SELECT tipo,MAX(cant) FROM dailystats WHERE charId='.$charid['charId'].' GROUP BY tipo');
       
//        $nextexp=$charid['exp'];
//        for($e=1;$e<=85;$e++){
//            if (($charid['exp']<$level[$e])&& ($nextexp!=$charid['exp'])) $nextexp=$level[$e];
//        }
        
        
        $obj[$cantpj]['name']=$charid['char_name'];
        $obj[$cantpj]['level']=$charid['level'];
        $obj[$cantpj]['exp']=$charid['exp'];
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

?>