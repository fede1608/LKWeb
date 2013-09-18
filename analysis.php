<?php

/**
 * @author fede1
 * @copyright 2013
 */
 define('IN_MYBB', NULL);
require_once 'forum/global.php';
require_once 'forum/MyBBIntegrator.php';
$MyBBI = new MyBBIntegrator($mybb, $db, $cache, $plugins, $lang, $config); 
$forumpath = 'forum/';
date_default_timezone_set("America/Argentina/Buenos_Aires");
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
<section class="vbox">
                        <header class="header bg-light dk">
                          <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Estadisticas</a></li>
                            <li class=""><a href="#tab2" data-toggle="tab">Donaciones</a></li>
                            <li class=""><a href="#tab3" data-toggle="tab">Gastos</a></li>
                          </ul>
                        </header>
                        <section class="scrollable">
                          <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                              <div class="wrapper">
                              <h1>Por dia<?php echo ( floor ( time() / $round_numerator ) * $round_numerator );  ?></h1>
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
                                        <img src="images/logo/'.$r['server'].'.png" class="img-circle">
                                      </a>
                                      <a href="#" class="clear">
                                        <small class="pull-right">'.date('d/m/y H:i',$r['fecha']).'</small>
                                        <strong class="block">'.$r['descripcion'].'</strong>
                                        <small>'.$r['server'].' - '.$r['sistema'].'</small>
                                        <strong><small class="pull-right"> '.$r['currency'].' '.$r['valor'].' </small></strong>
                                      </a>
                                    </li>';
                                }
                                ?>
                                
                              </ul>
                            </div>                            
                            <div class="tab-pane" id="tab3">
                              <ul class="list-group m-b-none m list-group-lg list-group-sp">
                              
                              <?php
                              $res=$MySQLEco->execute('SELECT d.`descripcion` as descripcion,d.`id` as id,d.`costo` as valor,d.`fecha` as fecha,c.cur as currency,sp.name as sistema FROM `gastos` as d, currency as c,sistemasdepago as sp WHERE d.`currency`=c.id AND d.`metododepago`=sp.id ORDER BY d.fecha DESC ');
                              foreach($res as $r){
                                  echo '
                                    <li class="list-group-item">
                                      <a href="#" class="thumb-sm pull-left m-r-sm">
                                        <img src="images/avatar_default.jpg" class="img-circle">
                                      </a>
                                      <a href="#" class="clear">
                                        <small class="pull-right">'.date('d/m/y H:i',$r['fecha']).'</small>
                                        <strong class="block">'.$r['descripcion'].'</strong>
                                        <small>'.$r['sistema'].' </small>
                                        <strong><small class="pull-right"> '.$r['currency'].' '.$r['valor'].' </small></strong>
                                      </a>
                                    </li>';
                                }
                                ?>
                                
                              </ul>
                            </div>
                          </div>
                        </section>
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
$rounded_time=( floor ( time() / $round_numerator ) * $round_numerator );//+(3*60 * 24);
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
    $mes= mktime(0,0,0,intval(date('m',time()-($i*$round_numerator))),1,intval(date('Y',time()-($i*$round_numerator))));//$rounded_time-($i*$round_numerator);
    $messiguiente=mktime(0,0,0,intval(date('m',time()-(($i-1)*$round_numerator))),1,intval(date('Y',time()-(($i-1)*$round_numerator))));
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
