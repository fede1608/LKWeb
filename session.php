<?php

/**
 * @author fede1
 * @copyright 2013
 */

include_once("analytics.php");

session_start();
define ('_ACM_VALID', 1);

function islogged(){
if(isset($_SESSION['acm'])) return true;
return false;
}
require './acm/classes/config.class.php';
// require './acm/config.php';
require './acm/libs/Smarty.class.php';
// require './acm/classes/system.class.php';
require './acm/classes/smtp.class.php';
require './acm/classes/email.class.php';
chdir('./acm');
//require './classes/core.class.php';
chdir('../');
require './acm/classes/account.class.php';
require './acm/classes/world.class.php';
require './acm/classes/character.class.php';
require './acm/classes/mysql.class.php';

if(islogged()){
$data=unserialize($_SESSION['acm']);
$userdata= get_object_vars($data);
};


?>