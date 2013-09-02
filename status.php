<?php

/**
 * @author fede1
 * @copyright 2013
 */
date_default_timezone_set("America/Argentina/Buenos_Aires");
require_once 'libs/mysql.inc.php';
require_once 'libs/config.inc.php';
$fakepcs=0;
$MySQL = new SQL($hostL, $usernombre, $pass, "linekkittest");

function getStatusVar($loginport,$gameport,$ip,$db,$maxplayers){
   global $MySQL;
    $fgame = @fsockopen ($ip,$gameport, $errno, $errstr, 1);
    $flogin = @fsockopen ($ip,$loginport, $errno, $errstr, 1);
    $activity = $MySQL->execute("SELECT COUNT(*) FROM ".$db.".characters WHERE online = 1");
    $online=$activity[0]['COUNT(*)'];
    $tmp = $online + ($fakepcs);
    $percent = ceil($tmp / $maxplayers *100);  
    $obj['gamestatus']=$fgame;
    $obj['loginstatus']=$flogin;
    $obj['playersonline']=$tmp;
    $obj['porcentaje']=$percent;
    return $obj;
}
function getStatus(){
    global $MySQL;
    $maxplayers=400;
    $fgame = @fsockopen ("freya.linekkit.com",7778, $errno, $errstr, 1);
    $flogin = @fsockopen ("freya.linekkit.com",2106, $errno, $errstr, 1);
    $activity = $MySQL->execute("SELECT COUNT(*) FROM characters WHERE online = 1");
    $online=$activity[0]['COUNT(*)'];
    $tmp = $online + ($fakepcs);
    $percent = ceil($tmp / $maxplayers *100);
    if($fgame) $gamestatus='<i class="icon-globe" style="color: #119922;font-size: 16px;">
                                            		</i>Online';
    else $gamestatus= '<i class="icon-globe" style="color: #FF0000;font-size: 16px;">
                                            		</i>Offline';
    if($flogin) $loginstatus='<i class="icon-globe" style="color: #119922;font-size: 16px;">
	   </i>Online';
    else $loginstatus= '<i class="icon-globe" style="color: #FF0000;font-size: 16px;">
	   </i>Offline';
   echo '<!-- .Estado del Servidor --><div class="col-lg-4">
								<section class="panel bg-info lter no-borders">
									<div class="panel-body">
										<a class="pull-right" href="#"><i class="icon-laptop"></i></a>
										<span class="h4">
											Estado del Servidor x10
										</span>
										<div class="text-center padder m-t">
											<div class="progress progress-sm progress-striped active">
												<div class="progress-bar progress-bar-success" data-toggle="tooltip" data-original-title="'.$tmp.' Players Online" style="width: '.$percent.'%">
											</div>
										</div>
                                        
									</div>
									<footer class="panel-footer lt">
                                   <div class="text-center"> Status</div>
										<div class="row">
                                            <div class="col-xs-4">
                                            	<small class="text-muted block">
                                            		GameServer
                                            	</small>
                                            	<span>
                                            		'.$gamestatus.'
                                            	</span>
                                            </div>
                                            <div class="col-xs-4">
                                            	<small class="text-muted block">
                                            		Players On
                                            	</small>
                                            	<span>
                                            		'.$tmp.'
                                            	</span>
                                            </div>
                                            <div class="col-xs-4">
                                            	<small class="text-muted block">
                                            		LoginServer
                                            	</small>
                                            	<span>
                                            		'.$loginstatus.'
                                            	</span>
                                            </div>
                                        </div>
                                    </footer>
								</section>
                                <!-- /Estado del Servidor -->';
}

?>