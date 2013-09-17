<?php

/**
 * @author fede1
 * @copyright 2013
 *
 *Nota: Requiere los CSS lkcss.css cargados en la pagina
 */
define('IN_MYBB', NULL);
require_once '/var/www/l2/forum/global.php';
require_once '/var/www/l2/forum/MyBBIntegrator.php';
$MyBBI2 = new MyBBIntegrator($mybb, $db, $cache, $plugins, $lang, $config); 
//print_r($MyBBI2);
function getBar($tipo,$active){
    global $mybb, $MyBBI2,$userdata;
    $flogged=$MyBBI2->isLoggedIn();
    $msgFnotlogged='';
    if($flogged){
        $userFData=$MyBBI2->getUser();
        $avatar='forum/'.($userFData['avatar']==''?'images/night/on.gif':$userFData['avatar']);
        $msgs=$MyBBI2->getPrivateMessagesOfUser($mybb->user['uid']);
        //print_r($msgs);
        $unread=0;
        foreach($msgs['Bandeja de entrada'] as $msg){
            if ($msg['status']==0){
                $unread++;
                if($unread<=2){
                    $unreadmsgtitle[$unread]='<a href="foro.php?page=/private.php?action=read%26pmid='.$msg['pmid'].'" class="media list-group-item"> <span class="media-body block m-b-none"> '.$msg['subject'].'<br> <small class="text-muted">'.date('d M y',$msg['dateline']).'</small> </span> </a>';
                    }
                }
        }
        $mensajes= '<header class="panel-heading">
			<strong>
				Tenes
				<span class="count-n">
					'.$unread.'
				</span>
				Mensajes sin leer
			</strong>
		</header>
		<div class="list-group">
			'.$unreadmsgtitle[1].' '.$unreadmsgtitle[2].'		</div>
		<footer class="panel-footer text-sm">
			<a href="foro.php?page=/private.php" class="pull-right"><i class="icon-cog"></i></a>
			<a href="foro.php?page=/private.php">Leer todos los mensajes</a>
		</footer>';
    }else{
        $avatar='images/avatar_default.jpg';
        $msgFnotlogged='<div class="bg-danger wrapper hidden-vertical animated rollIn text-sm">
							<a href="#" data-dismiss="alert" class="pull-right m-r-n-sm m-t-n-sm"><i class="icon-close icon-remove "></i></a>
							Heya, no has iniciado sesi&oacuten en el foro, por favor loggea <b><a href="foro.php?page=/member.php?action=login">aqu&iacute;</a></b>.
						</div>';
  		$mensajes= '<header class="panel-heading">
			<strong>
				No has loggeado al 
				<span class="count-n">
					foro
				</span>
				
			</strong>
		</header>
		<div class="list-group">
				</div>
		<footer class="panel-footer text-sm">
			<a href="foro.php?page=/member.php?action=login" class="pull-right"><i class="icon-cog"></i></a>
			<a href="foro.php?page=/member.php?action=login">Loggea aqu&iacute;</a>
		</footer>';
    }
    //echo $avatar;
    //print_r($userFData);
    $adminli='';
    if(($MyBBI2->isLoggedIn())&&($MyBBI2->isSuperAdmin())){
        $adminli='<li '.($active==9?'class="active"':'').'>
									<a href="dashboard.php"> <i class="icon-dollar"></i> <span>Admin Section</span> </a>
								</li>
                 <li class="dropdown-submenu" >
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-beaker"></i> <span>M&aacute;s</span> </a>
					<ul class="dropdown-menu">
						<li>
							<a href="buttons.html">Buttons</a>
						</li>
						<li>
							<a href="icons.html"> <b class="badge pull-right">302</b>Icons </a>
						</li>
						<li>
							<a href="grid.html">Grid</a>
						</li>
						<li>
							<a href="widgets.html"> <b class="badge bg-primary pull-right">8</b>Widgets </a>
						</li>
						<li>
							<a href="components.html"> <b class="badge pull-right">18</b>Components </a>
						</li>
						<li>
							<a href="list.html">List groups</a>
						</li>
						<li>
							<a href="tasks.html">Tasks</a>
						</li>
						<li>
							<a href="form.html">Form</a>
						</li>
						<li>
							<a href="chart.html">Chart</a>
						</li>
						<li>
							<a href="calendar.html">Fullcalendar</a>
						</li>
						<li>
							<a href="profile.html">Profile</a>
						</li>
						<li>
							<a href="signin.php">Signin page</a>
						</li>
						<li>
							<a href="signup.php">Signup page</a>
						</li>
                        <li>
							<a href="mail.html">Mail</a>
						</li>
                        <li>
							<a href="notes.html">Notes</a>
						</li>
						<li>
							<a href="404.html">404 page</a>
						</li>
					</ul>
				</li>';
    }
    
    echo '<!-- .Barra Lateral -->
			<aside class="fondo-transparente-negro-075 aside-sm'; //Nota: Requiere los CSS lkcss.css cargados en la pagina
   switch ($tipo) {
    case 1: default:
    break;
    case 2:
    echo ' nav-vertical';
    break;
    case 3:
    echo ' only-icon nav-vertical';
    break;
   }
    echo '" id="nav">
				<section class="vbox">
					<header class="dker nav-bar">
						<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="body"> <i class="icon-reorder"></i> </a>
						<a href="#" class="nav-brand" data-toggle="fullscreen"><img src="images/logo.png" style="width: 100%;"></a>
						<a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user"> <i class="icon-comment-alt"></i> </a>
					</header>
					<footer class="footer bg-gradient hidden-xs">
						<a href="/acm/?action=loggout"  class="btn btn-sm btn-link m-r-n-xs pull-right"> <i class="icon-off"></i> </a>
						<a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm"> <i class="icon-reorder"></i> </a>
					</footer>
					<section>
						<!-- user -->
						<div class="fondo-solido-azul-1 nav-user hidden-xs pos-rlt">
							<div class="nav-avatar pos-rlt">
								<a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown"> <img src="'.$avatar.'" alt="" class="" style="width:28px !important; height:28px !important;"> <span class="caret caret-white"></span> </a>
								<ul class="dropdown-menu m-t-sm animated fadeInLeft">
									<span class="arrow top">
									</span>
									<li>
										<a href="acm/index.php?action=acc_serv">Panel de Usuario</a>
									</li>
									<!--<li>
										<a href="profile.php">Perfil de Cuenta</a>
									</li>-->
									<!--<li>
										<a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a>
									</li>-->
									<li class="divider">
									</li>
									<!--<li>
										<a href="docs.html">Help</a>
									</li>-->
									<li>
										<a href="/acm/?action=loggout">Logout</a>
									</li>
								</ul>
								<div class="visible-xs m-t m-b">
									<a href="#" class="h3">'.$userdata['login'].'</a>
									<p>
										<i class="icon-map-marker">
										</i>
										Linekkit
									</p>
								</div>
							</div>
							<div class="nav-msg">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <b class="badge badge-white count-n">'.($tipo==1?substr($userdata['login'],0,9):'').'</b> </a>
								<section class="dropdown-menu m-l-sm pull-left animated fadeInRight">
									<div class="arrow left">
									</div>
									<section class="panel bg-white">
										'.$mensajes.'
									</section>
								</section>
							</div>
						</div>
						<!-- / user -->
						<!-- nav -->
						<nav class="nav-primary hidden-xs dropup">
							<ul class="nav">
								<li '.($active==1?'class="active"':'').'>
									<a href="index.php"> <i class="icon-eye-open"></i> <span>Inicio</span> </a>
								</li>
								
							
								<li '.($active==4?'class="active"':'').'>
									<a href="stats.php"> <i class="icon-tasks"></i> <span>Estadísticas</span> </a>
								</li>
								<!--<li '.($active==5?'class="active"':'').'>
									<a href="donacion.php"> <i class="icon-thumbs-up"></i> <span>Donar</span> </a>
								</li>-->
								<li '.($active==6?'class="active"':'').'>
									<a href="noticias.php"> <i class="icon-time"></i> <span>Noticias</span> </a>
								</li>
                                <li '.($active==7?'class="active"':'').'>
									<a href="foro.php"> <i class="icon-group"></i> <span>Foro</span> </a>
								</li>
                                <li '.($active==8?'class="active"':'').'>
									<a href="descargas.php"> <i class="icon-cloud-download"></i> <span>Descargas</span> </a>
								</li>
       	                        <li '.($active==3?'class="active"':'').'>
									<a href="ayuda.php"> <i class="icon-plus-sign"></i> <span>FAQ</span> </a>
								</li>
                                '.$adminli.'
                                
							</ul>
						</nav>
						<!-- / nav -->
						<!-- note -->
						'.$msgFnotlogged.'
						<!-- / note -->
					</section>
				</section>
			</aside>
			<!-- /Barra Lateral -->';
}

function getBarSinForo($tipo,$active){
    global $userdata;
    
    
        $avatar='../images/avatar_default.jpg';

    echo '<!-- .Barra Lateral -->
			<aside class="fondo-transparente-negro-075 aside-sm'; //Nota: Requiere los CSS lkcss.css cargados en la pagina
   switch ($tipo) {
    case 1: default:
    break;
    case 2:
    echo ' nav-vertical';
    break;
    case 3:
    echo ' only-icon nav-vertical';
    break;
   }
    echo '" id="nav">
				<section class="vbox">
					<header class="dker nav-bar">
						<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="body"> <i class="icon-reorder"></i> </a>
						<a href="#" class="nav-brand" data-toggle="fullscreen"><img src="../images/logo.png" style="width: 100%;"></a>
						<a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user"> <i class="icon-comment-alt"></i> </a>
					</header>
					<footer class="footer bg-gradient hidden-xs">
						<a href="../modal.lockme.html" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right"> <i class="icon-off"></i> </a>
						<a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm"> <i class="icon-reorder"></i> </a>
					</footer>
					<section>
						<!-- user -->
						<div class="fondo-solido-azul-1 nav-user hidden-xs pos-rlt">
							<div class="nav-avatar pos-rlt">
								<a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown"> <img src="'.$avatar.'" alt="" class=""> <span class="caret caret-white"></span> </a>
								<ul class="dropdown-menu m-t-sm animated fadeInLeft">
									<span class="arrow top">
									</span>
                                    <li>
										<a href="index.php?action=acc_serv">Panel de Usuario</a>
									</li>
									<!--<li>
										<a href="profile.php">Perfil de Cuenta</a>
									</li>-->
									<!--<li>
										<a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a>
									</li>-->
									<li class="divider">
									</li>
									<!--<li>
										<a href="docs.html">Help</a>
									</li>-->
									<li>
										<a href="index.php?action=loggout">Logout</a>
									</li>
								</ul>
								<div class="visible-xs m-t m-b">
									<a href="#" class="h3">'.$userdata['login'].'</a>
									<p>
										<i class="icon-map-marker">
										</i>
										Linekkit
									</p>
								</div>
							</div>
							<div class="nav-msg">
								<a href="#" class="dropdown-toggle" > <b class="badge badge-white count-n">2</b> </a>
								
								
							</div>
						</div>
						<!-- / user -->
						<!-- nav -->
						<nav class="nav-primary hidden-xs">
							<ul class="nav">
								<li '.($active==1?'class="active"':'').'>
									<a href="../index.php"> <i class="icon-eye-open"></i> <span>Inicio</span> </a>
								</li>
								
								<li '.($active==3?'class="active"':'').'>
									<a href="../ayuda.php"> <i class="icon-plus-sign"></i> <span>Ayuda</span> </a>
								</li>
								<li '.($active==4?'class="active"':'').'>
									<a href="../stats.php"> <i class="icon-tasks"></i> <span>Estadísticas</span> </a>
								</li>
								<!--<li '.($active==5?'class="active"':'').'>
									<a href="../donacion.php"> <i class="icon-thumbs-up"></i> <span>Donar</span> </a>
								</li>-->
								<li '.($active==6?'class="active"':'').'>
									<a href="../noticias.php"> <i class="icon-time"></i> <span>Noticias</span> </a>
								</li>
                                <li '.($active==7?'class="active"':'').'>
									<a href="../foro.php"> <i class="icon-group"></i> <span>Foro</span> </a>
								</li>
                                <li '.($active==8?'class="active"':'').'>
									<a href="../descargas.php"> <i class="icon-cloud-download"></i> <span>Descargas</span> </a>
								</li>
							</ul>
						</nav>
						<!-- / nav -->
						<!-- note -->
						
						<!-- / note -->
					</section>
				</section>
			</aside>
			<!-- /Barra Lateral -->';
}


?>