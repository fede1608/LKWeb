<?php

/**
 * @author fede1
 * @copyright 2013
 */
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    require_once 'libs/mysql.inc.php';
	require_once 'libs/config.inc.php';
    $MySQL = new SQL($host, $usernombre, $pass, "noticias");
    function getNews($cant,$pagina){
        global $MySQL;
        $limitI=$cant*($pagina -1);
        $limitS=$cant;
        $news = $MySQL->execute("SELECT * FROM `news` ORDER BY `id` DESC LIMIT ".$limitI.",".$limitS);
       
        return $news;
}
    function countNews(){
        global $MySQL;
        $count= $MySQL->execute("SELECT COUNT(*) FROM `news` ");
        return $count[0]['COUNT(*)'];
    }

?>