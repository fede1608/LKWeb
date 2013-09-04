<?php

/**
 * @author fede1
 * @copyright 2013
 */
require_once 'libs/mysql.inc.php';
require_once 'libs/config.inc.php';
include_once 'datachars.php';
function getStats($account){
  global $usernombre,$pass,$race,$class;
    $MySQLLK = new SQL("freya.linekkit.com:3306", $usernombre, $pass, "linekkittest");
    $MySQLMK = new SQL("localhost:3306", $usernombre, $pass, "noticias");  
    
    $charsid=$MySQLLK->execute('SELECT char_name,charId,race,classId FROM characters WHERE account_name="'.$account.'"');
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
        $max=$MySQLMK->execute('SELECT tipo,MAX(cant) FROM dailystats WHERE charId='.$charid['charId'].' GROUP BY tipo');
        
        $obj[$cantpj]['name']=$charid['char_name'];
        $obj[$cantpj]['race']=$race[$charid['race']];
        $obj[$cantpj]['class']=$class[$charid['classId']];
        $obj[$cantpj]['diastotales']=$suma[0]['COUNT(*)'];
        
        $str=']';
        $cont=0;
        $acum=0;
        foreach($diaspk as $aux){
            $cont++;
            if($str!=']') $str=','.$str;
            $str=$aux['cant'].''.$str;
            $acum+=$aux['cant'];
        }
        if ($cont<7){
            for($a=$cont;$a<8;$a++){
                $str='0,'.$str;
            }
        }
        $str='['.$str;
        
        $obj[$cantpj][1]['total']=$suma[0]['SUM(cant)'];
        $obj[$cantpj][1]['stringdias']=$str;
        $obj[$cantpj][1]['promedio']=ceil($suma[0]['SUM(cant)']/$suma[0]['COUNT(*)']);
        $obj[$cantpj][1]['max']=$max[0]['MAX(cant)'];
        $obj[$cantpj][1]['semana']=$acum;
        
        
        $str=']';
        $cont=0;
        $acum=0;
        foreach($diaspvp as $aux){
            $cont++;
            if($str!=']') $str=','.$str;
            $str=$aux['cant'].''.$str;
            $acum+=$aux['cant'];
        }
        if ($cont<7){
            for($a=$cont;$a<8;$a++){
                $str='0,'.$str;
            }
        }
        $str='['.$str;        
        
        $obj[$cantpj][2]['total']=$suma[1]['SUM(cant)'];
        $obj[$cantpj][2]['stringdias']=$str;
        $obj[$cantpj][2]['promedio']=ceil($suma[1]['SUM(cant)']/$suma[1]['COUNT(*)']);;
        $obj[$cantpj][2]['max']=$max[1]['MAX(cant)'];
        $obj[$cantpj][2]['semana']=$acum;
        
    
    $cantpj++;}
return $obj;
}

?>