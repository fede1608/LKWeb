<?php
include_once 'statsfeed.php'; 
$generalStats=getGeneralTops();
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Estadísticas | Linekkit</title>
  <meta name="description" content="Linekkit es el servidor de Lineage 2 con mayor crecimiento en la actualidad. Miles de usuarios nos recomiendan.">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
  <link rel="stylesheet" href="js/fuelux/fuelux.css" type="text/css" />
  <link rel="stylesheet" href="js/datatables/datatables.css" type="text/css" />
  <link rel="stylesheet" href="css/plugin.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
  <link rel="stylesheet" href="css/lkcss.css"/>
  <link href="http://fonts.googleapis.com/css?family=Alegreya+SC" rel="stylesheet" type="text/css">
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
            getBar(1,4);//getbat(tipoDeBarra,<li>activo)
            ?>
    <!-- .vbox -->
    <section id="content">
      <section class="vbox">
        <header class="header bg-gradient fondo-transparente-negro-075">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#static" class="letras-doradas" data-toggle="tab">Vista General</a></li>
            <!--<li class=""><a href="#datagrid" data-toggle="tab">Datagrid</a></li>-->
            <li class=""><a href="#datatable" class="letras-doradas" data-toggle="tab">TOP 100 PK Kills</a></li>
			<li class=""><a href="#datatable2" class="letras-doradas" data-toggle="tab">TOP 100 PVP Kills</a></li>
            <li class=""><a href="#datatable3" class="letras-doradas" data-toggle="tab">TOP 100 Tiempo Online</a></li>
          </ul>
        </header>
        <section class="scrollable wrapper">
          <div class="tab-content">
          
          	<!-- / Pestaña 1 -->
            <div class="tab-pane active" id="static">
              
              <!-- Primera fila-->
              <div class="row"> 
              
              <section class="scrollable wrapper">
                                       	                       
 				       <?php if (isset($_GET['error'])) {
					require_once './acm/language/spanish.php'; ?>
					<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                    <i class="icon-ban-circle"></i> <?php echo $vm[$_GET['error']];?> </div>
					 <?php };?>
					 <?php if (isset($_GET['valid'])) {
					 require_once './acm/language/spanish.php';?>
					 <div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                     <i class="icon-ok-sign"></i> <?php echo $vm[$_GET['valid']];?> </div>
					 <?php };?>
              
              <div class="panel-group m-b" id="accordion10">
                
               <div class="panel no-border fondo-transparente-negro-075">
                                <div class="panel-heading fondo-transparente-000">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion10" href="#collapseTop"> 
                                    <strong></strong>	<strong class="pull-right">Minimizar</strong>
                                    </a>
                                </div>
                                
                                <div id="collapseTop" class="panel-collapse in">

                             		<!-- Margen superior-->
                             		<div class="row"></div>
                             
                                    <!-- Columna 1 -->  		
                                    <div class="col-lg-12">
                                        
                                        
                                        <section class="panel fondo-transparente-000 borde-transparente-negro no-borders">
                                        <div class="row wrapper" style="padding-bottom:0; padding-top:0">
                                        <h1 class="text-center letras-doradas" style="font-family:Alegreya SC; margin-top:0;"><b>Los mejores jugadores de Linekkit</b></h1>
                                        
                                        </div>
                                        
                                        <div class="row linea-dorada-1"></div>
                                        
                                        <!-- TOP mejores jugadores-->
                                        <div class="row  wrapper-lg">
                                            
                                            <div class="col-xs-1" style="width:14%">
                                                <div class="row text-center">
                                                    <img class="img-rounded" src="images/emblem_1.jpg" width="150" height="150">
                                                </div>
                                                <div class="row text-center letras-blancas">
                                                	<b>Mejores puntajes</b>
                                                </div>
                                            
                                            
                                            </div>
                                            <div class="col-xs-11" style="width:86%">
                                            <?php
                                            $conttop=1;
                                            foreach($generalStats[5] as $gralStatsptosgral){
                                                switch($conttop){case 1: $star='icon-star';break;case 2:case 3: $star='icon-star-half-full';break;case 4:case 5:case 6: case 7: $star='icon-star-empty';break;};
                                            echo	'<!-- #'.$conttop.' -->
                                                <div class="thumb-lg">
                                                
                                                	<div class="row m-b-xs">
                                                    	<div class="col-xs-4" ></div>
                                                        <span class="col-xs-3 label bg-warning letras-negras" style="font-size:12px;">
                                                        <i class="'.$star.'"></i> '.$conttop.'</span>
                                                    </div>
                                                    <div class="row" style="padding-left:38px;">
                                                        <img src="images/'.$gralStatsptosgral['race'].'.png" style="width:84px !important; height:100px !important;" class="img-rounded">
                                                    </div>
                                                    <div class="row text-center letras-blancas">
                                                        '.$gralStatsptosgral['pj'].'
                                                        <br>
                                                        '.$gralStatsptosgral['cant'].' Puntos
                                                    </div>
                                                    <!-- Premium-->
                                                    <div class="row text-center letras-blancas" style="height:11px">
                                                    '.($gralStatsptosgral['premium']?'<img src="images/mini_premium.png" width="75" height="11">':'').' 
                                                    </div>
                                                    <!-- / Premium-->
                                                
                                                </div>
                                                <!-- / #1 -->';
                                                $conttop++;
                                                }
                                              ?>  
                                    
                                            
                                            </div>
                                        </div>
                                        
										<!-- / TOP mejores jugadores-->
                                        
                                         <div class="row linea-dorada-1"></div>
                                        
                                        <!-- TOP PVP -->
                                        <div class="row  wrapper-lg">
                                            
                                            <div class="col-xs-1" style="width:14%">
                                                <div class="row text-center">
                                                    <img class="img-rounded" src="images/emblem_2.jpg" width="150" height="150">
                                                </div>
                                                <div class="row text-center letras-blancas">
                                                	<b>Mejores PVP</b>
                                                </div>
                                            
                                            
                                            </div>
                                            <div class="col-xs-11" style="width:86%">
                                                                                        <?php
                                            $conttop=1;
                                            foreach($generalStats[2] as $gralStat){//pvp
                                                switch($conttop){case 1: $star='icon-star';break;case 2:case 3: $star='icon-star-half-full';break;case 4:case 5:case 6: case 7: $star='icon-star-empty';break;};
                                            echo	'<!-- #'.$conttop.' -->
                                                <div class="thumb-lg">
                                                
                                                	<div class="row m-b-xs">
                                                    	<div class="col-xs-4" ></div>
                                                        <span class="col-xs-3 label fondo-solido-rojo-1" style="font-size:12px;">
                                                        <i class="'.$star.'"></i> '.$conttop.'</span>
                                                    </div>
                                                    <div class="row" style="padding-left:38px;">
                                                        <img src="images/'.$gralStat['race'].'.png" style="width:84px !important; height:100px !important;" class="img-rounded">
                                                    </div>
                                                    <div class="row text-center letras-blancas">
                                                        '.$gralStat['pj'].'
                                                        <br>
                                                        '.$gralStat['cant'].' Kills
                                                    </div>
                                                    <!-- Premium-->
                                                    <div class="row text-center letras-blancas" style="height:11px">
                                                    '.($gralStat['premium']?'<img src="images/mini_premium.png" width="75" height="11">':'').' 
                                                    </div>
                                                    <!-- / Premium-->
                                                
                                                </div>
                                                <!-- / #1 -->';
                                                $conttop++;
                                                }
                                              ?>  
                                            	
                                                
                                                
                                            
                                            </div>
                                        </div>
                                        
										<!-- / TOP PVP-->
                                        
                                         <div class="row linea-dorada-1"></div>
                                        
                                        <!-- TOP PK-->
                                        <div class="row  wrapper-lg">
                                            
                                            <div class="col-xs-1" style="width:14%">
                                                <div class="row text-center">
                                                    <img class="img-rounded" src="images/emblem_4.jpg" width="150" height="150">
                                                </div>
                                                <div class="row text-center letras-blancas">
                                                	<b>Mejores PK</b>
                                                </div>
                                            
                                            
                                            </div>
                                            <div class="col-xs-11" style="width:86%">
                                           <?php
                                            $conttop=1;
                                            foreach($generalStats[1] as $gralStat){//pvp
                                                switch($conttop){case 1: $star='icon-star';break;case 2:case 3: $star='icon-star-half-full';break;case 4:case 5:case 6: case 7: $star='icon-star-empty';break;};
                                            echo	'<!-- #'.$conttop.' -->
                                                <div class="thumb-lg">
                                                
                                                	<div class="row m-b-xs">
                                                    	<div class="col-xs-4" ></div>
                                                        <span class="col-xs-3 label fondo-solido-azul-1" style="font-size:12px;">
                                                        <i class="'.$star.'"></i> '.$conttop.'</span>
                                                    </div>
                                                    <div class="row" style="padding-left:38px;">
                                                        <img src="images/'.$gralStat['race'].'.png" style="width:84px !important; height:100px !important;" class="img-rounded">
                                                    </div>
                                                    <div class="row text-center letras-blancas">
                                                        '.$gralStat['pj'].'
                                                        <br>
                                                        '.$gralStat['cant'].' Kills
                                                    </div>
                                                    <!-- Premium-->
                                                    <div class="row text-center letras-blancas" style="height:11px">
                                                    '.($gralStat['premium']?'<img src="images/mini_premium.png" width="75" height="11">':'').' 
                                                    </div>
                                                    <!-- / Premium-->
                                                
                                                </div>
                                                <!-- / #1 -->';
                                                $conttop++;
                                                }
                                              ?> 
                                                
                                            
                                            </div>
                                        </div>
                                        
										<!-- / TOP PK-->

                                        <div class="row linea-dorada-1"></div>

                                        <!-- TOP Tiempo Jugado-->
                                        <div class="row  wrapper-lg">
                                            
                                            <div class="col-xs-1" style="width:14%">
                                                <div class="row text-center">
                                                    <img class="img-rounded" src="images/emblem_6.jpg" width="150" height="150">
                                                </div>
                                                <div class="row text-center letras-blancas">
                                                    <b>Tiempo Jugado</b>
                                                </div>
                                            
                                            
                                            </div>
                                            <div class="col-xs-11" style="width:86%">
                                            <?php
                                            $conttop=1;
                                            foreach($generalStats[8] as $gralStat){//pvp
                                                switch($conttop){case 1: $star='icon-star';break;case 2:case 3: $star='icon-star-half-full';break;case 4:case 5:case 6: case 7: $star='icon-star-empty';break;};
                                            echo	'<!-- #'.$conttop.' -->
                                                <div class="thumb-lg">
                                                
                                                	<div class="row m-b-xs">
                                                    	<div class="col-xs-4" ></div>
                                                        <span class="col-xs-3 label fondo-solido-rojo-1" style="font-size:12px;">
                                                        <i class="'.$star.'"></i> '.$conttop.'</span>
                                                    </div>
                                                    <div class="row" style="padding-left:38px;">
                                                        <img src="images/'.$gralStat['race'].'.png" style="width:84px !important; height:100px !important;" class="img-rounded">
                                                    </div>
                                                    <div class="row text-center letras-blancas">
                                                        '.$gralStat['pj'].'
                                                        <br>
                                                        '.$gralStat['cant'].' Hs
                                                    </div>
                                                    <!-- Premium-->
                                                    <div class="row text-center letras-blancas" style="height:11px">
                                                    '.($gralStat['premium']?'<img src="images/mini_premium.png" width="75" height="11">':'').' 
                                                    </div>
                                                    <!-- / Premium-->
                                                
                                                </div>
                                                <!-- / #1 -->';
                                                $conttop++;
                                                }
                                              ?> 
                                                
                                                
                                                
                                            
                                            </div>
                                        </div>
                                        
                                        <!-- / TOP Tiempo Jugado-->

                                        <div class="row linea-dorada-1"></div>

                                        <!-- TOP Puntos por minuto-->
                                        <div class="row  wrapper-lg">
                                            
                                            <div class="col-xs-1" style="width:14%">
                                                <div class="row text-center">
                                                    <img class="img-rounded" src="images/emblem_7.jpg" width="150" height="150">
                                                </div>
                                                <div class="row text-center letras-blancas">
                                                    <b>Puntos de Exp por minuto</b>
                                                </div>
                                            
                                            
                                            </div>
                                            <div class="col-xs-11" style="width:86%">
                                            
                                                                                        <?php
                                            $conttop=1;
                                            foreach($generalStats[9] as $gralStat){//pvp
                                                switch($conttop){case 1: $star='icon-star';break;case 2:case 3: $star='icon-star-half-full';break;case 4:case 5:case 6: case 7: $star='icon-star-empty';break;};
                                            echo	'<!-- #'.$conttop.' -->
                                                <div class="thumb-lg">
                                                
                                                	<div class="row m-b-xs">
                                                    	<div class="col-xs-4" ></div>
                                                        <span class="col-xs-3 label fondo-solido-azul-1" style="font-size:12px;">
                                                        <i class="'.$star.'"></i> '.$conttop.'</span>
                                                    </div>
                                                    <div class="row" style="padding-left:38px;">
                                                        <img src="images/'.$gralStat['race'].'.png" style="width:84px !important; height:100px !important;" class="img-rounded">
                                                    </div>
                                                    <div class="row text-center letras-blancas">
                                                        '.$gralStat['pj'].'
                                                        <br>
                                                        '.floor($gralStat['cant']).' Exp/min
                                                    </div>
                                                    <!-- Premium-->
                                                    <div class="row text-center letras-blancas" style="height:11px">
                                                    '.($gralStat['premium']?'<img src="images/mini_premium.png" width="75" height="11">':'').' 
                                                    </div>
                                                    <!-- / Premium-->
                                                
                                                </div>
                                                <!-- / #1 -->';
                                                $conttop++;
                                                }
                                              ?> 
                                                
                                                
                                                
                                                
                                            
                                            </div>
                                        </div>
                                        
                                        <!-- / TOP Puntos por minuto-->
                                                                                    
                                        </section>
                                        
                                        
                                    </div>
                                    <!-- / Columna 1 -->
                                    
                                    
                                    
                                    <!-- Margen inferior-->
                             		<div class="row m-b-lg"></div>
                                    
                               </div>
                           </div>
                           
                   </div>
                
              </div>
              <!--/  Primera fila-->
              
              <div class="row"></div>
              
              <!-- SEGUNDA FILA -->
              
              <!-- Primera columna -->
              <div class="col-lg-5" style="width: 48%">
              	<section class="row panel fondo-transparente-negro-075 borde-transparente-negro">
                	
                    <!-- Primera columna-->
                    <div class="col-xs-6">
                    
                        <h2 class="text-center letras-blancas" style="font-family:Alegreya SC;">Razas</h2>
                        <div class="text-center wrapper ">
                        
                            <div class="sparkline inline" data-type="pie" data-height="150" data-slice-colors="['#acdb83','#56B3FC','#fb6b5b','#FFA838','#F0E88F','#E5A3FA']">
                                                <?php   include_once 'statsfeed.php';
                                                        include_once 'datachars.php';
                                                        $stats=getRaceStats(); 
                                                        echo $stats['str']; 
                                                        $arrayColor = array('#acdb83','#56B3FC','#fb6b5b','#FFA838','#F0E88F','#E5A3FA');?>
                            </div>
                        </div>
                    
                    </div>
                    <!-- / Primera columna -->
                    
                    <!-- Segunda columna-->
                    <div class="col-xs-6">
					
                        <ul class="list-group list-group-flush no-borders no-radius alt m-t-xs letras-blancas">
                                            <?php
                                            for($i=0;$i<=5;$i++){
                                                echo '<li class="list-group-item fondo-transparente-000 linea-azul-1">
                                                    <span class="pull-right" >
                                                        '.$stats[$i]['cant'].'
                                                    </span>
                                                    <span class="label bg-success" style="background-color:'.$arrayColor[$i].';">
                                                        '.$i.'
                                                    </span>
                                                    <span class="m-l-xs">'.$race[$stats[$i]['race']].'</span>
                                                </li>';
                                            }
                                            ?>
                                            
                                            
                        </ul>
                    </div>
                    <!-- / Segunda columna-->
                    
				</section>
              
              </div>
              <!-- / Primera columna-->

              <div class="col-lg-2" style="width: 4%"></div>
              
              <!-- Segunda columna-->
              <div class="col-lg-5" style="width: 48%">
              	<section class="row panel fondo-transparente-negro-075 borde-transparente-negro">
					
                    <!-- Primera columna-->
                    <div class="col-sm-6">
                    
                        <h2 class="text-center letras-blancas" style="font-family:Alegreya SC;">Clanes</h2>
                        <div class="text-center wrapper ">
                        
                            <div class="sparkline inline" data-type="pie" data-height="150" data-slice-colors="['#acdb83','#56B3FC','#fb6b5b','#FFA838','#F0E88F','#E5A3FA']">
                                                <?php   include_once 'statsfeed.php';
                                                        include_once 'datachars.php';
                                                        $stats=getClanStats(); 
                                                        echo $stats['str']; 
                                                        $arrayColor = array('#acdb83','#56B3FC','#fb6b5b','#FFA838','#F0E88F','#E5A3FA');?>
                            </div>
                        </div>
                    
                    </div>
                    <!-- / Primera columna -->
                    
                    <!-- Segunda columna-->
                    <div class="col-sm-6">
					
                        <ul class="list-group list-group-flush no-borders no-radius alt m-t-xs letras-blancas">
                                            <?php 
                                            for($i=0;$i<=5;$i++){
                                                echo '<li class="list-group-item fondo-transparente-000 linea-azul-1">
                                                    <span class="pull-right" >
                                                        '.$stats[$i]['cant'].'
                                                    </span>
                                                    <span class="label bg-success" style="background-color:'.$arrayColor[$i].';">
                                                        '.$i.'
                                                    </span>
                                                    <span class="m-l-xs">'.$stats[$i]['clan'].'</span>
                                                </li>';
                                            }
                                            ?>
                                            
                                            
                        </ul>
                    </div>
                    <!-- / Segunda columna-->
                    
				</section>
              
              </div>
              <!-- / Segunda columna-->
              
            </div>
            <!-- / Pestaña 1 -->
            
            <div class="tab-pane" id="datagrid">
              <section class="panel">
                <header class="panel-heading">
                  DataGrid 
                  <i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="Cargado por AJAX."></i> 
                </header>
                <div class="table-responsive">
                  <table id="MyStretchGrid" class="table table-striped datagrid m-b-sm">
                    <thead>
                      <tr>
                        <th>
                          <div class="row">
                            <div class="col-sm-8 m-t-xs m-b-xs">
                              <div class="select filter" data-resize="auto">
                                <button data-toggle="dropdown" class="btn btn-sm btn-white dropdown-toggle">
                                  <span class="dropdown-label"></span>
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                  <li data-value="all" data-selected="true"><a href="#">All</a></li>
                                  <li data-value="lt5m"><a href="#">Population &lt; 5M</a></li>
                                  <li data-value="gte5m"><a href="#">Population &gt;= 5M</a></li>
                                </ul>
                              </div>
                            </div>
                            <div class="col-sm-4 m-t-xs m-b-xs">
                              <div class="input-group search datagrid-search">
                                <input type="text" class="input-sm form-control" placeholder="Buscar">
                                <div class="input-group-btn">
                                  <button class="btn btn-white btn-sm"><i class="icon-search"></i></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </th>
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th class="row">
                          <div class="datagrid-footer-left col-sm-6 text-center-xs m-l-n" style="display:none;">
                            <div class="grid-controls m-t-sm">
                              <span>
                                <span class="grid-start"></span> -
                                <span class="grid-end"></span> of
                                <span class="grid-count"></span>
                              </span>
                              <div class="select grid-pagesize dropup" data-resize="auto">
                                <button data-toggle="dropdown" class="btn btn-sm btn-white dropdown-toggle">
                                  <span class="dropdown-label"></span>
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                  <li data-value="5"><a href="#">5</a></li>
                                  <li data-value="10"><a href="#">10</a></li>
                                  <li data-value="20" data-selected="true"><a href="#">20</a></li>
                                  <li data-value="50"><a href="#">50</a></li>
                                  <li data-value="100"><a href="#">100</a></li>
                                </ul>
                              </div>
                              <span>Por página</span>
                            </div>
                          </div>
                          <div class="datagrid-footer-right col-sm-6 text-right text-center-xs" style="display:none;">
                            <div class="grid-pager m-r-n">
                              <button type="button" class="btn btn-sm btn-white grid-prevpage"><i class="icon-chevron-left"></i></button>
                              <span>Página</span>
                              <div class="inline">
                                <div class="input-group dropdown combobox">
                                  <input class="input-sm form-control" type="text">
                                  <div class="input-group-btn dropup">
                                    <button class="btn btn-sm btn-white" data-toggle="dropdown"><i class="caret"></i></button>
                                    <ul class="dropdown-menu pull-right"></ul>
                                  </div>
                                </div>
                              </div>
                              <span>de <span class="grid-pages"></span></span>
                              <button type="button" class="btn btn-sm btn-white grid-nextpage"><i class="icon-chevron-right"></i></button>
                            </div>
                          </div>
                        </th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </section>
            </div>
            <div class="tab-pane" id="datatable">
              <section class="panel">
                <header class="panel-heading">
                  Top 100 PK Kills
                  <!--<i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>--> 
                </header>
                <div class="table-responsive">
                  <table class="table table-striped m-b-none" data-ride="datatables" style="/* width: 1089px; */">
                    <thead>
                      <tr>
                        <th width="10%" style="/* width: 10%; */">Puesto</th>
                        <th width="40%" style="/* width: 40%; */">Personaje</th>
                        <th width="10%" style="/* width: 10%; */">Pk Kills</th>
                        <th width="40%" style="/* width: 40%; */">Clan</th>
                        <!--<th width="15%">Dato extra</th>-->
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </section>
            </div>

            <div class="tab-pane" id="datatable2">
              <section class="panel">
                <header class="panel-heading">
                  Top 100 PVP Kills
                  <!--<i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>--> 
                </header>
                <div class="table-responsive">
                  <table class="table table-striped m-b-none" data-ride="datatables2" style="/* width: 1089px; */">
                    <thead>
                      <tr>
                        <th width="10%" style="/* width: 10%; */">Puesto</th>
                        <th width="40%" style="/* width: 40%; */">Personaje</th>
                        <th width="10%" style="/* width: 10%; */">PvP Kills</th>
                        <th width="40%" style="/* width: 40%; */">Clan</th>
                        <!--<th width="15%">Dato extra</th>-->
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </section>
            </div>
			
            <div class="tab-pane" id="datatable3">
              <section class="panel">
                <header class="panel-heading">
                  Top 100 Tiempo Online
                  <!--<i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>--> 
                </header>
                <div class="table-responsive">
                  <table class="table table-striped m-b-none" data-ride="datatables3" style="/* width: 1089px; */">
                    <thead>
                      <tr>
                        <th width="10%" style="/* width: 10%; */">Puesto</th>
                        <th width="30%" style="/* width: 40%; */">Personaje</th>
                        <th width="45%" style="/* width: 10%; */">Tiempo Online</th>
                        <th width="15%" style="/* width: 40%; */">Clan</th>
                        <!--<th width="15%">Dato extra</th>-->
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </section>
            </div>            
            
          </div>
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