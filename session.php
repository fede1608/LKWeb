<?php

/**
 * @author fede1
 * @copyright 2013
 */


include_once("analytics.php");



define('IN_MYBB', NULL);
require_once 'forum/global.php';
require_once 'forum/MyBBIntegrator.php';
$MyBBI = new MyBBIntegrator($mybb, $db, $cache, $plugins, $lang, $config); 

session_start();
define ('_ACM_VALID', 1);
require_once './acm/classes/config.class.php';
// require './acm/config.php';
require_once './acm/libs/Smarty.class.php';
// require './acm/classes/system.class.php';
require_once './acm/classes/smtp.class.php';
require_once './acm/classes/email.class.php';
//chdir('./acm');
//require './classes/core.class.php';
//chdir('../');
require_once './acm/classes/account.class.php';
require_once './acm/classes/world.class.php';
require_once './acm/classes/character.class.php';
require_once './acm/classes/mysql.class.php';

if(isacmlogged()){
$data=unserialize($_SESSION['acm']);
$userdata= get_object_vars($data);
};

function isacmlogged(){
    if(isset($_SESSION['acm'])) return true;
    return false;
}

?>