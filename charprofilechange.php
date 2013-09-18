<?php

/**
 * @author fede1
 * @copyright 2013
 */
include_once("session.php");
require_once 'libs/mysql.inc.php';
require_once 'libs/config.inc.php';
include_once 'datachars.php'; 
$MySQLLK = new SQL($hostL, $usernombre, $pass, $dbgame);
$MySQLMK = new SQL($host, $usernombre, $pass, $dbnoticias);  
if(!isacmlogged()){
    echo '<script language="javascript">
			window.top.location="signin.php"
			</script>';
    exit();
    die();
}
if(!isset($_POST['imgurl'])){
    echo '<script language="javascript">
			window.top.location="actionsLC.php"
			</script>';
    exit();
    die();
}
    if (preg_match('#(http://[^\s]+(?=\.(jpe?g|png|gif)))#i', $_POST['imgurl']))
    {
        $chars=$MySQLLK->execute('SELECT * FROM characters WHERE account_name="'.$userdata['login'].'"');
        
        foreach($chars as $char){
           
            if($char['char_name']==$_POST['char']){
                $MySQLLK->execute('UPDATE characters SET profile_pic="'.$_POST['imgurl'].'" WHERE charId='.$char['charId']);
                
                    echo '<script language="javascript">
			         window.top.location="index.php?valid=profile_success"
			         </script>';
            }
        }
    }else{//error regex
        echo '<script language="javascript">
			window.top.location="actionsLC.php?error=profile_error"
			</script>';
    }

?>