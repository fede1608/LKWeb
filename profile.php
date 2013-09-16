<?php
define('IN_MYBB', NULL);
require_once 'forum/global.php';
require_once 'forum/MyBBIntegrator.php';
$MyBBI = new MyBBIntegrator($mybb, $db, $cache, $plugins, $lang, $config); 
$forumpath = 'forum/';

chdir($forumpath);
require_once MYBB_ROOT."inc/class_parser.php";
$parser = new postParser;
chdir('../');
include_once("session.php");
if(!isacmlogged()){
    echo '<script language="javascript">
			window.top.location="signin.php"
			</script>';
    exit();
}
$flogged=$MyBBI->isLoggedIn();
$msgFnotlogged='';
if($flogged){
    $userFData=$MyBBI->getUser();
    $avatar='forum/'.$userFData['avatar'];
}else{
     $avatar='images/avatar_default.jpg';
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Web Application | todo</title>
  <meta name="description" content="Linekkit es el servidor de Lineage 2 con mayor crecimiento en la actualidad. Miles de usuarios nos recomiendan.">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
  <link rel="stylesheet" href="css/plugin.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
  <link rel="stylesheet" href="css/lkcss.css">
  <!--[if lt IE 9]>
    <script src="js/ie/respond.min.js" cache="false"></script>
    <script src="js/ie/html5.js" cache="false"></script>
    <script src="js/ie/fix.js" cache="false"></script>
  <![endif]-->
</head>
	<body style="background-image:url(images/bg-raid-boss.jpg) !important; background-size:cover !important;">
  <section class="hbox stretch">
   			<?php
            include_once('barralateral.php');
            getBar(1,0);//getbat(tipoDeBarra,<li>activo)
            ?> 
    <!-- .vbox -->
    <section id="content">
      <section class="vbox">
        <header class="header bg-white b-b">
          <p>Perfil de <?php echo $userdata['login']; ?></p>
        </header>
        <section class="scrollable">
          <section class="hbox stretch">
            <aside class="aside-lg bg-light lter b-r">
              <section class="vbox">
                <section class="scrollable">
                  <div class="wrapper">
                    <div class="clearfix m-b">
                      <a href="#" class="pull-left thumb m-r">
                        <img src="<?php echo $avatar; ?>" class="img-circle">
                      </a>
                      <div class="clear">
                        <div class="h3 m-t-xs m-b-xs"><?php echo $userdata['login']; ?></div>
                        <small class="text-muted"><i class="icon-map-marker"></i> London, UK</small>
                      </div>                
                    </div>
                    <div class="panel wrapper">
                      <div class="row">
                        <div class="col-xs-4">
                          <a href="#">
                            <span class="m-b-xs h4 block">245</span>
                            <small class="text-muted">Followers</small>
                          </a>
                        </div>
                        <div class="col-xs-4">
                          <a href="#">
                            <span class="m-b-xs h4 block">55</span>
                            <small class="text-muted">Following</small>
                          </a>
                        </div>
                        <div class="col-xs-4">
                          <a href="#">
                            <span class="m-b-xs h4 block">2,035</span>
                            <small class="text-muted">Tweets</small>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="btn-group btn-group-justified m-b">
                      <a class="btn btn-success btn-rounded" data-toggle="button">
                        <span class="text">
                          <i class="icon-eye-open"></i> Follow
                        </span>
                        <span class="text-active">
                          <i class="icon-eye-open"></i> Following
                        </span>
                      </a>
                      <a class="btn btn-info btn-rounded">
                        <i class="icon-comment-alt"></i> Chat
                      </a>
                    </div>
                    <div>
                      <small class="text-uc text-xs text-muted">about me</small>
                      <p>Artist</p>
                      <small class="text-uc text-xs text-muted">info</small>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat.</p>
                      <div class="line"></div>
                      <small class="text-uc text-xs text-muted">connection</small>
                      <p class="m-t-sm">
                        <a href="#" class="btn btn-rounded btn-twitter btn-icon"><i class="icon-twitter"></i></a>
                        <a href="#" class="btn btn-rounded btn-facebook btn-icon"><i class="icon-facebook"></i></a>
                        <a href="#" class="btn btn-rounded btn-gplus btn-icon"><i class="icon-google-plus"></i></a>
                      </p>
                    </div>
                  </div>
                </section>
              </section>
            </aside>
            <aside class="bg-white">
              <section class="vbox">
                <header class="header bg-light bg-gradient">
                  <ul class="nav nav-tabs nav-white">
                    <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                    <li class=""><a href="#events" data-toggle="tab">Events</a></li>
                    <li class=""><a href="#interaction" data-toggle="tab">Interaction</a></li>
                  </ul>
                </header>
                <section class="scrollable">
                  <div class="tab-content">
                    <div class="tab-pane active" id="activity">
                      <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar_default.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">3 minuts ago</small>
                            <strong class="block">Drew Wllon</strong>
                            <small>Wellcome and play this web application template ... </small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">1 hour ago</small>
                            <strong class="block">Jonathan George</strong>
                            <small>Morbi nec nunc condimentum...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">2 hours ago</small>
                            <strong class="block">Josh Long</strong>
                            <small>Vestibulum ullamcorper sodales nisi nec...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar_default.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">1 day ago</small>
                            <strong class="block">Jack Dorsty</strong>
                            <small>Morbi nec nunc condimentum...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">3 days ago</small>
                            <strong class="block">Morgen Kntooh</strong>
                            <small>Mobile first web app for startup...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar_default.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">Jun 21</small>
                            <strong class="block">Yoha Omish</strong>
                            <small>Morbi nec nunc condimentum...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">May 10</small>
                            <strong class="block">Gole Lido</strong>
                            <small>Vestibulum ullamcorper sodales nisi nec...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar_default.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">Jan 2</small>
                            <strong class="block">Jonthan Snow</strong>
                            <small>Morbi nec nunc condimentum...</small>
                          </a>
                        </li>
                        <li class="list-group-item" href="#email-content" data-toggle="class:show">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar_default.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">3 minuts ago</small>
                            <strong class="block">Drew Wllon</strong>
                            <small>Vestibulum ullamcorper sodales nisi nec sodales nisi nec sodales nisi nec...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">1 hour ago</small>
                            <strong class="block">Jonathan George</strong>
                            <small>Morbi nec nunc condimentum...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">2 hours ago</small>
                            <strong class="block">Josh Long</strong>
                            <small>Vestibulum ullamcorper sodales nisi nec...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar_default.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">1 day ago</small>
                            <strong class="block">Jack Dorsty</strong>
                            <small>Morbi nec nunc condimentum...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">3 days ago</small>
                            <strong class="block">Morgen Kntooh</strong>
                            <small>Mobile first web app for startup...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar_default.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">Jun 21</small>
                            <strong class="block">Yoha Omish</strong>
                            <small>Morbi nec nunc condimentum...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">May 10</small>
                            <strong class="block">Gole Lido</strong>
                            <small>Vestibulum ullamcorper sodales nisi nec...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar_default.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">Jan 2</small>
                            <strong class="block">Jonthan Snow</strong>
                            <small>Morbi nec nunc condimentum...</small>
                          </a>
                        </li>
                        <li class="list-group-item" href="#email-content" data-toggle="class:show">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar_default.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">3 minuts ago</small>
                            <strong class="block">Drew Wllon</strong>
                            <small>Vestibulum ullamcorper sodales nisi nec sodales nisi nec sodales nisi nec...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">1 hour ago</small>
                            <strong class="block">Jonathan George</strong>
                            <small>Morbi nec nunc condimentum...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">2 hours ago</small>
                            <strong class="block">Josh Long</strong>
                            <small>Vestibulum ullamcorper sodales nisi nec...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar_default.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">1 day ago</small>
                            <strong class="block">Jack Dorsty</strong>
                            <small>Morbi nec nunc condimentum...</small>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="thumb-sm pull-left m-r-sm">
                            <img src="images/avatar.jpg" class="img-circle">
                          </a>
                          <a href="#" class="clear">
                            <small class="pull-right">3 days ago</small>
                            <strong class="block">Morgen Kntooh</strong>
                            <small>Mobile first web app for startup...</small>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="tab-pane" id="events">
                      <div class="text-center wrapper">
                        <i class="icon-spinner icon-spin icon-large"></i>
                      </div>
                    </div>
                    <div class="tab-pane" id="interaction">
                      <div class="text-center wrapper">
                        <i class="icon-spinner icon-spin icon-large"></i>
                      </div>
                    </div>
                  </div>
                </section>
              </section>
            </aside>
            <aside class="col-lg-4 b-l">
              <section class="vbox">
                <section class="scrollable">
                  <div class="wrapper">
                    <section class="panel">
                      <form>
                        <textarea class="form-control no-border" rows="5" placeholder="What are you doing..."></textarea>
                      </form>
                      <footer class="panel-footer bg-light lter">
                        <button class="btn btn-info pull-right btn-sm">POST</button>
                        <ul class="nav nav-pills nav-sm">
                          <li><a href="#"><i class="icon-camera"></i></a></li>
                          <li><a href="#"><i class="icon-facetime-video"></i></a></li>
                        </ul>
                      </footer>
                    </section>
                    <section class="panel">
                      <h4 class="font-thin padder">Latest Tweets</h4>
                      <ul class="list-group">
                        <li class="list-group-item">
                            <p>Wellcome <a href="#" class="text-info">@Drew Wllon</a> and play this web application template, have fun1 </p>
                            <small class="block text-muted"><i class="icon-time"></i>2 minuts ago</small>
                        </li>
                        <li class="list-group-item">
                            <p>Morbi nec <a href="#" class="text-info">@Jonathan George</a> nunc condimentum ipsum dolor sit amet, consectetur</p>
                            <small class="block text-muted"><i class="icon-time"></i>1 hour ago</small>
                        </li>
                        <li class="list-group-item">                     
                            <p><a href="#" class="text-info">@Josh Long</a> Vestibulum ullamcorper sodales nisi nec adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis</p>
                            <small class="block text-muted"><i class="icon-time"></i>2 hours ago</small>
                        </li>
                      </ul>
                    </section>
                    <section class="panel clearfix bg-info lter">
                      <div class="panel-body">
                        <a href="#" class="thumb pull-left m-r">
                          <img src="images/avatar.jpg" class="img-circle">
                        </a>
                        <div class="clear">
                          <a href="#" class="text-info">@Mike Mcalidek <i class="icon-twitter"></i></a>
                          <small class="block text-muted">2,415 followers / 225 tweets</small>
                          <a href="#" class="btn btn-xs btn-success m-t-xs">Follow</a>
                        </div>
                      </div>
                    </section>
                  </div>
                </section>
              </section>              
            </aside>
          </section>
        </section>
      </section>
      <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body"></a>
    </section>
    <!-- /.vbox -->
  </section>
	<script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>
  <script src="js/app.plugin.js"></script>
  <script src="js/app.data.js"></script>
  <!-- fuelux -->
  <script src="js/fuelux/fuelux.js"></script>
  <script src="js/libs/underscore-min.js"></script>
  <!-- datatables -->
  <script src="js/datatables/jquery.dataTables.min.js"></script>
  <!-- Sparkline Chart -->
  <script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
  <!-- Easy Pie Chart -->
  <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
</body>
</html>