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
include_once 'statsfeed.php'; 
include_once("session.php");

require_once 'libs/mysql.inc.php';
require_once 'libs/config.inc.php';
$MySQLEco = new SQL($host, $usernombre, $pass, "economia");

if((!isacmlogged())||(!$MyBBI->isLoggedIn())||(!$MyBBI->isSuperAdmin())){
   print_r($MyBBI->isSuperAdmin(0));
    echo '<script language="javascript">
			window.top.location="signin.php"
			</script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Admin | Overflow Development Team</title>
  <meta name="description" content="Admin" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
  <link rel="stylesheet" href="css/plugin.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
  <link rel="stylesheet" href="css/lkcss.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/respond.min.js" cache="false"></script>
    <script src="js/ie/html5.js" cache="false"></script>
    <script src="js/ie/fix.js" cache="false"></script>
  <![endif]-->
</head>
<body>
  <section class="hbox stretch">
    <?php
            include_once('barralateral.php');
            getBar(1,9);//getbar(tipoDeBarra,<li>activo)
            ?>
    <!-- .vbox -->
    <section id="content">
      <section class="vbox">
        <header class="header bg-black navbar navbar-inverse">
          <div class="collapse navbar-collapse pull-in">
            <ul class="nav navbar-nav m-l-n">
              <li class="active"><a href="#">Overflow Development Team Hiper Mega Red Enterprises</a></li>
              <li><a href="blog.html">Blog</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form navbar-left m-t-sm" role="search">
              <div class="form-group">
                <div class="input-group input-s">
                  <input type="text" class="form-control input-sm no-border bg-dark" placeholder="Search">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-sm btn-success btn-icon"><i class="icon-search"></i></button>
                  </span>
                </div>
              </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li class="hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-bell-alt text-white"></i>
                  <span class="badge up bg-info m-l-n-sm">2</span>
                </a>
                <section class="dropdown-menu animated fadeInUp input-s-lg">
                  <section class="panel bg-white">
                    <header class="panel-heading">
                      <strong>You have <span class="count-n">2</span> notifications</strong>
                    </header>
                    <div class="list-group">
                      <a href="#" class="media list-group-item">
                        <span class="pull-left thumb-sm">
                          <img src="images/avatar.jpg" alt="John said" class="img-circle">
                        </span>
                        <span class="media-body block m-b-none">
                          Use awesome animate.css<br>
                          <small class="text-muted">28 Aug 13</small>
                        </span>
                      </a>
                      <a href="#" class="media list-group-item">
                        <span class="media-body block m-b-none">
                          1.0 initial released<br>
                          <small class="text-muted">27 Aug 13</small>
                        </span>
                      </a>
                    </div>
                    <footer class="panel-footer text-sm">
                      <a href="#" class="pull-right"><i class="icon-cog"></i></a>
                      <a href="#">See all the notifications</a>
                    </footer>
                  </section>
                </section>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="thumb-sm avatar pull-left m-t-n-xs m-r-xs">
                    <img src="<?php 
                    $fuser=$MyBBI->getUser();
                    echo 'forum/'.$fuser['avatar']; ?>">
                  </span>
                  <?php echo $mybb->user['username']; ?><b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInLeft">
                  <li>
                    <a href="#">Settings</a>
                  </li>
                  <li>
                    <a href="profile.php">Profile</a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="badge bg-danger pull-right">3</span>
                      Notifications
                    </a>
                  </li>
                  <li>
                    <a href="docs.html">Help</a>
                  </li>
                  <li>
                    <a href="signin.html">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </header>
        <section class="scrollable">
          <section class="vbox flex">
            <header class="header">
              <div class="row b-b">
                <div class="col-sm-4">
                  <h3 class="m-t m-b-none">Dashboard</h3>
                  <p class="block text-muted">Welcome to application</p>
                </div>
                <div class="col-sm-8">
                  <div class="clearfix m-t-lg m-b-sm pull-right pull-none-xs">
                    <div class="pull-left">                  
                      <div class="pull-left m-r-xs">
                        <span class="block">Users <span class="badge up bg-danger">+5</span></span>                    
                        <span class="h4">432k</span>
                        <i class="icon-level-up text-success"></i>
                      </div>
                      <div class="clear">
                        <div class="sparkline inline" data-type="bar" data-height="35" data-bar-width="4" data-bar-spacing="2" data-stacked-bar-color="['#afcf6f', '#eee']">5:5,8:4,12:5,10:6,11:7,12:2,8:6</div>
                      </div>
                    </div>
                    <div class="pull-left m-l-lg">
                      <div class="pull-left m-r-xs">
                        <span class="block">Profit</span>                    
                        <span class="h4">$4k</span>
                        <i class="icon-level-down text-danger"></i>
                      </div>
                      <div class="clear">
                        <div class="sparkline inline" data-type="bar" data-height="35" data-bar-width="4" data-bar-spacing="2" data-bar-color="#fb6b5b">6,5,8,9,6,3,5</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper bg-light pull-in b-b font-bold">
                <a href="#" class="m-r"><i class="icon-bar-chart icon-2x icon-muted  v-middle"></i> Analysis</a>
                <a href="#" class="m-r"><span class="badge up m-r-n bg-danger">4</span><i class="icon-envelope icon-2x icon-muted  v-middle"></i> Message</a>
                <a href="#" class="m-r"><i class="icon-calendar icon-2x icon-muted  v-middle"></i> My Calendar</a>
                <a href="#"><i class="icon-cog icon-2x icon-muted  v-middle"></i> Settings</a>
              </div>
            </header>
            <section>
              <section>
                <section>
                  <section  class="hbox stretch">
                    <aside>
                      <section class="vbox">
                        <header class="header bg-light dk">
                          <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Estadisticas</a></li>
                            <li class=""><a href="#tab2" data-toggle="tab">Donaciones</a></li>
                            <li class=""><a href="#tab3" data-toggle="tab">Interaction</a></li>
                          </ul>
                        </header>
                        <section class="scrollable">
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                              <div class="wrapper">
                              <h1>Por dia</h1>
                                <div id="donacion-area-dia" class="graph"></div>
                                <h1>Por semana</h1>
                                <div id="donacion-area-semana" class="graph"></div>
                                <h1>Por mes</h1>
                                <div id="donacion-area-mes" class="graph"></div>
                                <div class="row m-t-lg">
                                  <div class="col-sm-6">
                                    <section class="panel">
                                      <header class="panel-heading">Composite</header>
                                      <div class="text-center clearfix">
                                        <div class="m-t-lg padder">
                                          <div class="sparkline" data-type="line" data-resize="true" data-height="100" data-width="100%" data-line-width="1" data-line-color="#dddddd" data-spot-color="#afcf6f" data-fill-color="" data-highlight-line-color="#eee" data-spot-radius="4" data-data="[330,250,200,325,350,380,250,320,345,450,250,250]"></div>
                                          <div class="sparkline inline" data-type="bar" data-height="57" data-bar-width="6" data-bar-spacing="10" data-bar-color="#a4d55d">5,8,12,10,11,12,8,9,6,7,8,6,10,7</div>
                                        </div>
                                      </div>
                                      <footer class="panel-footer text-sm">Check more data</footer>
                                    </section>
                                  </div>
                                  <div class="col-sm-6">
                                    <section class="panel">
                                      <header class="panel-heading">Stacked</header>
                                      <div class="panel-body text-center">
                                        <div class="sparkline inline" data-type="bar" data-height="160" data-bar-width="12" data-bar-spacing="10" data-stacked-bar-color="['#afcf6f', '#eee']">5:5,8:4,12:5,10:6,11:7,12:2,8:6,9:3,5:5,4:9</div>
                                        <ul class="list-inline text-muted axis"><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li></ul>
                                      </div>
                                    </section>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="tab2">
                              <ul class="list-group m-b-none m list-group-lg list-group-sp">
                              
                              <?php
                              $res=$MySQLEco->execute('SELECT d.`descripcion` as descripcion,d.`id` as id,d.`valor` as valor,d.`fecha` as fecha,c.cur as currency,s.name as server,sp.name as sistema FROM `donaciones` as d, currency as c,servidores as s, sistemasdepago as sp WHERE d.`currency`=c.id AND d.`servidor`=s.id AND d.`sistema`=sp.id ORDER BY d.fecha DESC ');
                              foreach($res as $r){
                                  echo '
                                    <li class="list-group-item">
                                      <a href="#" class="thumb-sm pull-left m-r-sm">
                                        <img src="images/avatar_default.jpg" class="img-circle">
                                      </a>
                                      <a href="#" class="clear">
                                        <small class="pull-right">'.date('d/m/y H:i',$r['fecha']).'</small>
                                        <strong class="block">'.$r['server'].'</strong>
                                        <small>'.$r['descripcion'].' '.$r['currency'].' '.$r['valor'].' '.$r['sistema'].'</small>
                                      </a>
                                    </li>';
                                }
                                ?>
                                
                              </ul>
                            </div>                            
                            <div class="tab-pane" id="tab3">
                              <div class="text-center wrapper">
                                <i class="icon-spinner icon-spin icon-large"></i>
                              </div>
                            </div>
                          </div>
                        </section>
                      </section>
                    </aside>
                    <aside class="b-l aside-lg">
                      <section class="vbox">
                        <section class="scrollable wrapper">
                          <div class="text-center">
                            <div class="inline">
                              <div class="easypiechart" data-percent="65" data-line-width="25" data-track-color="#eee" data-bar-color="#afcf6f" data-scale-color="#ddd" data-loop="false" data-size="180">
                                <span class="h2">60</span>%
                                <div class="easypie-text">Processing</div>
                              </div>
                            </div>
                          </div>
                          <div class="panel-group m-b" id="accordion2">
                            <div class="panel">
                              <div class="panel-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                  Collapsible Group Item #1
                                </a>
                              </div>
                              <div id="collapseOne" class="panel-collapse in">
                                <div class="panel-body text-sm">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt.
                                </div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                  Collapsible Group Item #2
                                </a>
                              </div>
                              <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body text-sm">
                                  Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                              </div>
                            </div>
                            <div class="panel">
                              <div class="panel-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                  Collapsible Group Item #3
                                </a>
                              </div>
                              <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body text-sm">
                                  Sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                      </section>                      
                    </aside>
                  </section>
                </section>
              </section>
            </section>
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
  <!-- Sparkline Chart -->
  <script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>
  <script src="js/app.plugin.js"></script>
  <script src="js/app.data.js"></script>
  


  <!-- Sparkline Chart -->
  <script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
  <!-- Easy Pie Chart -->
  <script src="js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <!-- Morris -->
  <script src="js/charts/morris/raphael-min.js" cache="false"></script>
  <script src="js/charts/morris/morris.min.js" cache="false"></script>
    <script type="text/javascript">
<?php
$round_numerator = 60 * 60 * 24;//60 * 15 // 60 seconds per minute * 15 minutes equals 900 seconds
//$round_numerator = 60 * 60 or to the nearest hour
//$round_numerator = 60 * 60 * 24 or to the nearest day
$rounded_time=( floor ( time() / $round_numerator ) * $round_numerator )+(3*60 * 24);
$diasatras = $rounded_time - 9*24*60*60;
$resserv=$MySQLEco->execute('SELECT * FROM `donaciones` as d WHERE  d.fecha>'.$diasatras.' ORDER BY d.fecha,d.servidor, d.currency');
$cont=0;
for($i=9;$i>=0;$i--){
    $dia=$rounded_time-($i*$round_numerator);
    $diasiguiente=$rounded_time-(($i-1)*$round_numerator);
    $dataarea[$i]['period']=date('Y-m-d',$dia);
    $dataarea[$i][0]=0;
    $dataarea[$i][1]=0;
    
    //if(!isset($resserv[$cont])) break;
    while(($resserv[$cont]['fecha']>$dia)&&($resserv[$cont]['fecha']<$diasiguiente)){
        $cant=$resserv[$cont]['valor'];
        switch($resserv[$cont]['currency']){
            case 0:
            break;
            case 1:
            $cant*=5.70;
            break;
            case 2:
            $cant*=7.65;
            break;
        }
        $dataarea[$i][$resserv[$cont]['servidor']]+=$cant;
        $cont++;
    }    
}

echo "	
			var buildArea2 = function(){
		Morris.Area({
			element: 'donacion-area-dia',
			data: [";  
for($i=9;$i>0;$i--){
    echo "{period: '".$dataarea[$i]['period']."', minekkit: ".$dataarea[$i][0].", linekkit: ".$dataarea[$i][1]."},";
}
echo "{period: '".$dataarea[$i]['period']."', minekkit: ".$dataarea[$i][0].", linekkit: ".$dataarea[$i][1]."}";
echo "],
			xkey: 'period',
			ykeys: ['minekkit', 'linekkit'],
			xLabels: 'day',
			labels: ['Minekkit Server', 'Linekkit Server'],			
			hideHover: 'auto',
			lineWidth: 2,
			pointSize: 4,
			lineColors: ['#59dbbf', '#aeb6cb'],
			fillOpacity: 0.5,
			smooth: true,
		});
	};

	$('#tab1 #donacion-area-dia').each(function(){
		buildArea2();
		/*var morrisResizes;
		$(window).resize(function(e) {
			clearTimeout(morrisResizes);
			morrisResizes = setTimeout(function(){
				$('.graph').html('');
				buildArea2();
			}, 5500);
		});*/
	});

	";
    $round_numerator = 7 * 60 * 60 * 24;//60 * 15 // 60 seconds per minute * 15 minutes equals 900 seconds
//$round_numerator = 60 * 60 or to the nearest hour
//$round_numerator = 60 * 60 * 24 or to the nearest day
$rounded_time=( floor ( time() / $round_numerator ) * $round_numerator )+(3*60 * 24);
$semanasatras = $rounded_time - 9*7*24*60*60;
$resserv=$MySQLEco->execute('SELECT * FROM `donaciones` as d WHERE  d.fecha>'.$semanasatras.' ORDER BY d.fecha,d.servidor, d.currency');
//echo 'SELECT * FROM `donaciones` as d WHERE  d.fecha>'.$semanasatras.' ORDER BY d.fecha,d.servidor, d.currency';
//print_r($resserv);
$cont=0;
for($i=9;$i>=0;$i--){
    $semana=$rounded_time-($i*$round_numerator);
    $semanasiguiente=$rounded_time-(($i-1)*$round_numerator);
    $dataarea[$i]['period']=date('Y',$semana).' W'.date('W',$semana);
    $dataarea[$i][0]=0;
    $dataarea[$i][1]=0;
    
    //if(!isset($resserv[$cont])) break;
	//echo '('.$resserv[$cont]['fecha'].'>'.$semana.')&&('.$resserv[$cont]['fecha'].'<'.$semanasiguiente.')';
    while(($resserv[$cont]['fecha']>$semana)&&($resserv[$cont]['fecha']<$semanasiguiente)){
	//echo "while $cont <br>";
        $cant=$resserv[$cont]['valor'];
        switch($resserv[$cont]['currency']){
            case 0:
            break;
            case 1:
            $cant*=5.70;
            break;
            case 2:
            $cant*=7.65;
            break;
        }
        $dataarea[$i][$resserv[$cont]['servidor']]+=$cant;
        $cont++;
    }    
}

echo "	
			var buildArea3 = function(){
		Morris.Area({
			element: 'donacion-area-semana',
			data: [";  
for($i=9;$i>0;$i--){
    echo "{period: '".$dataarea[$i]['period']."', minekkit: ".$dataarea[$i][0].", linekkit: ".$dataarea[$i][1]."},";
}
echo "{period: '".$dataarea[$i]['period']."', minekkit: ".$dataarea[$i][0].", linekkit: ".$dataarea[$i][1]."}";
echo "],
			xkey: 'period',
			ykeys: ['minekkit', 'linekkit'],
			xLabels: 'day',
			labels: ['Minekkit Server', 'Linekkit Server'],			
			hideHover: 'auto',
			lineWidth: 2,
			pointSize: 4,
			lineColors: ['#59dbbf', '#aeb6cb'],
			fillOpacity: 0.5,
			smooth: true,
		});
	};

	$('#tab1 #donacion-area-semana').each(function(){
		buildArea3();
		/*var morrisResizes;
		$(window).resize(function(e) {
			clearTimeout(morrisResizes);
			morrisResizes = setTimeout(function(){
				$('.graph').html('');
				buildArea3();
			}, 5500);
		});*/
	});
    ";
 $round_numerator = 30 * 60 * 60 * 24;//60 * 15 // 60 seconds per minute * 15 minutes equals 900 seconds
//$round_numerator = 60 * 60 or to the nearest hour
//$round_numerator = 60 * 60 * 24 or to the nearest day
$rounded_time=( floor ( time() / $round_numerator ) * $round_numerator )+(3*60 * 24);
$semanasatras = $rounded_time - 9*30*24*60*60;
$resserv=$MySQLEco->execute('SELECT * FROM `donaciones` as d WHERE  d.fecha>'.$semanasatras.' ORDER BY d.fecha,d.servidor, d.currency');
//echo 'SELECT * FROM `donaciones` as d WHERE  d.fecha>'.$semanasatras.' ORDER BY d.fecha,d.servidor, d.currency';
//print_r($resserv);
$cont=0;
for($i=9;$i>=0;$i--){
    $mes=$rounded_time-($i*$round_numerator);
    $messiguiente=$rounded_time-(($i-1)*$round_numerator);
    $dataarea[$i]['period']=date('Y-m',$mes);
    $dataarea[$i][0]=0;
    $dataarea[$i][1]=0;
    
    //if(!isset($resserv[$cont])) break;
	//echo '('.$resserv[$cont]['fecha'].'>'.$semana.')&&('.$resserv[$cont]['fecha'].'<'.$semanasiguiente.')';
    while(($resserv[$cont]['fecha']>$mes)&&($resserv[$cont]['fecha']<$messiguiente)){
	//echo "while $cont <br>";
        $cant=$resserv[$cont]['valor'];
        switch($resserv[$cont]['currency']){
            case 0:
            break;
            case 1:
            $cant*=5.70;
            break;
            case 2:
            $cant*=7.65;
            break;
        }
        $dataarea[$i][$resserv[$cont]['servidor']]+=$cant;
        $cont++;
    }    
}

echo "	
			var buildArea4 = function(){
		Morris.Area({
			element: 'donacion-area-mes',
			data: [";  
for($i=9;$i>0;$i--){
    echo "{period: '".$dataarea[$i]['period']."', minekkit: ".$dataarea[$i][0].", linekkit: ".$dataarea[$i][1]."},";
}
echo "{period: '".$dataarea[$i]['period']."', minekkit: ".$dataarea[$i][0].", linekkit: ".$dataarea[$i][1]."}";
echo "],
			xkey: 'period',
			ykeys: ['minekkit', 'linekkit'],
			xLabels: 'month',
			labels: ['Minekkit Server', 'Linekkit Server'],			
			hideHover: 'auto',
			lineWidth: 2,
			pointSize: 4,
			lineColors: ['#59dbbf', '#aeb6cb'],
			fillOpacity: 0.5,
			smooth: true,
		});
	};

	$('#tab1 #donacion-area-mes').each(function(){
		buildArea4();
	/*	var morrisResizes;
		$(window).resize(function(e) {
			clearTimeout(morrisResizes);
			morrisResizes = setTimeout(function(){
				$('.graph').html('');
				buildArea4();
			}, 5500);
		});*/
	});
    ";
 ?>
</script>
</body>
</html>