<?php

/**
 * @author fede1
 * @copyright 2013
 */

function getBar($tipo,$active){
    echo '<!-- .Barra Lateral -->
			<aside class="bg-primary aside-sm';
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
						<a href="#" class="nav-brand" data-toggle="fullscreen">Linekkit</a>
						<a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user"> <i class="icon-comment-alt"></i> </a>
					</header>
					<footer class="footer bg-gradient hidden-xs">
						<!--<a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right"> <i class="icon-off"></i> </a> -->
						<a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm"> <i class="icon-reorder"></i> </a>
					</footer>
					<section>
						<!-- user -->
						<div class="bg-success nav-user hidden-xs pos-rlt">
							<div class="nav-avatar pos-rlt">
								<a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown"> <img src="images/avatar.jpg" alt="" class=""> <span class="caret caret-white"></span> </a>
								<ul class="dropdown-menu m-t-sm animated fadeInLeft">
									<span class="arrow top">
									</span>
									<li>
										<a href="#">Settings</a>
									</li>
									<li>
										<a href="profile.html">Profile</a>
									</li>
									<li>
										<a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a>
									</li>
									<li class="divider">
									</li>
									<li>
										<a href="docs.html">Help</a>
									</li>
									<li>
										<a href="signin.html">Logout</a>
									</li>
								</ul>
								<div class="visible-xs m-t m-b">
									<a href="#" class="h3">John.Smith</a>
									<p>
										<i class="icon-map-marker">
										</i>
										London, UK
									</p>
								</div>
							</div>
							<div class="nav-msg">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <b class="badge badge-white count-n">2</b> </a>
								<section class="dropdown-menu m-l-sm pull-left animated fadeInRight">
									<div class="arrow left">
									</div>
									<section class="panel bg-white">
										<header class="panel-heading">
											<strong>
												You have
												<span class="count-n">
													2
												</span>
												notifications
											</strong>
										</header>
										<div class="list-group">
											<a href="#" class="media list-group-item"> <span class="pull-left thumb-sm"> <img src="images/avatar.jpg" alt="John said" class="img-circle"> </span> <span class="media-body block m-b-none"> Use awesome animate.css<br> <small class="text-muted">28 Aug 13</small> </span> </a>
											<a href="#" class="media list-group-item"> <span class="media-body block m-b-none"> 1.0 initial released<br> <small class="text-muted">27 Aug 13</small> </span> </a>
										</div>
										<footer class="panel-footer text-sm">
											<a href="#" class="pull-right"><i class="icon-cog"></i></a>
											<a href="#">See all the notifications</a>
										</footer>
									</section>
								</section>
							</div>
						</div>
						<!-- / user -->
						<!-- nav -->
						<nav class="nav-primary hidden-xs">
							<ul class="nav">
								<li '.($active==1?'class="active"':'').'>
									<a href="index.php"> <i class="icon-eye-open"></i> <span>Inicio</span> </a>
								</li>
								<li class="dropdown-submenu" '.($active==2?'class="active"':'').'>
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-beaker"></i> <span>UI kit</span> </a>
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
											<a href="table.html">Table</a>
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
											<a href="signin.html">Signin page</a>
										</li>
										<li>
											<a href="signup.html">Signup page</a>
										</li>
										<li>
											<a href="404.html">404 page</a>
										</li>
									</ul>
								</li>
								<li '.($active==3?'class="active"':'').'>
									<a href="mail.html"> <b class="badge bg-primary pull-right">3</b> <i class="icon-envelope-alt"></i> <span>Mail</span> </a>
								</li>
								<li '.($active==4?'class="active"':'').'>
									<a href="tasks.html"> <i class="icon-tasks"></i> <span>Tasks</span> </a>
								</li>
								<li '.($active==5?'class="active"':'').'>
									<a href="notes.html"> <i class="icon-pencil"></i> <span>Notes</span> </a>
								</li>
								<li '.($active==6?'class="active"':'').'>
									<a href="noticias.php"> <i class="icon-time"></i> <span>Noticias</span> </a>
								</li>
                                <li '.($active==7?'class="active"':'').'>
									<a href="foro.php"> <i class="icon-book"></i> <span>Foro</span> </a>
								</li>
							</ul>
						</nav>
						<!-- / nav -->
						<!-- note -->
						<div class="bg-danger wrapper hidden-vertical animated rollIn text-sm">
							<a href="#" data-dismiss="alert" class="pull-right m-r-n-sm m-t-n-sm"><i class="icon-close icon-remove "></i></a>
							Heya, bienvenido a Linekkit, puedes empezar aqu&iacute;.
						</div>
						<!-- / note -->
					</section>
				</section>
			</aside>
			<!-- /Barra Lateral -->';
}

?>