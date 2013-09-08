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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Estadísticas | Linekkit</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
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
            <li class="active"><a href="#static" data-toggle="tab">Vista General</a></li>
            <!--<li class=""><a href="#datagrid" data-toggle="tab">Datagrid</a></li>-->
            <li class=""><a href="#datatable" data-toggle="tab">PK Kills</a></li>
			<li class=""><a href="#datatable2" data-toggle="tab">PVP Kills</a></li>
            <li class=""><a href="#datatable3" data-toggle="tab">Tiempo Online</a></li>
          </ul>
        </header>
        <section class="scrollable wrapper">
          <div class="tab-content">
          
          	<!-- / Pestaña 1 -->
            <div class="tab-pane active" id="static">
              
              <!-- Primera fila-->
              <div class="row"> 
                
                <!-- Primera columna-->
                <div class="col-sm-4">
                	<section class="panel fondo-transparente-negro-075 borde-transparente-negro">
                                    <h1 class="text-center letras-blancas" style="font-family:Alegreya SC; font-size:72px">Global</h1>
									
									<ul class="list-group list-group-flush no-radius alt">
										<li class="list-group-item fondo-transparente-000 m-t-lg no-border linea-azul-1">
										  <span class=" col-xs-3 label fondo-solido-rojo-1" style="font-size:36px">
												1
										  </span>
                                            
                                          <div class="col-xs-9">
                                                <div class="row">
                                                	<span class="h2 m-l-xs letras-blancas">Batman</span>
                                                </div>
                                                <div class="row">
                                                	<span class="h4 m-l-xs letras-blancas">999999</span>
                                                </div>
                                             
                                             </div>
                                             
									  </li>
                                        <div class="row"></div>
										<li class="list-group-item fondo-transparente-000 no-border linea-azul-1 m-t-xs">
											<span class="  col-xs-2 label fondo-solido-azul-1 letras-blancas" style="font-size:24px; ">
												2
											</span>
											 
                                             <div class="col-xs-10">
                                                <div class="row">
                                                	<span class="h4 m-l-xs letras-blancas">Iron Man</span>
                                                </div>
                                                <div class="row">
                                                	<span class="h5 m-l-xs letras-blancas">999999</span>
                                                </div>
                                             
                                             </div>
										</li>
                                        <div class="row"></div>
										<li class="list-group-item fondo-transparente-000 no-border linea-azul-1 m-t-xs">
											<span class="  col-xs-1 label letras-negras" style="font-size:18px; background-color:#FFA838">
												3
											</span>
											 
                                             <div class="col-xs-10">
                                                <div class="row">
                                                	<span class="h5 m-l-xs letras-blancas">Capitán América</span>
                                                </div>
                                                <div class="row">
                                                	<span class="h6 m-l-xs letras-blancas">999999</span>
                                                </div>
                                             
                                             </div>
										</li>
                                        <div class="row"></div>
                                      <li class="list-group-item fondo-transparente-000 m-t-lg linea-azul-1">
											<span class="pull-right letras-blancas">
												1234567
											</span>
											<span class="label bg-warning letras-negras">
												4
										</span>
											 <span class="m-l-xs letras-blancas">Hulk</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												123456
										  </span>
											<span class="label bg-warning letras-negras">
												5
										  </span>
											 <span class="m-l-xs letras-blancas">Flash</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-warning letras-negras">
												6
										  </span>
											 <span class="m-l-xs letras-blancas">Superman</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-warning letras-negras">
												7
										  </span>
											 <span class="m-l-xs letras-blancas">Superman</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-warning letras-negras">
												8
										  </span>
											 <span class="m-l-xs letras-blancas">Superman</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-primary">
												9
										  </span>
											 <span class="m-l-xs letras-blancas letras-blancas">Superman</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-primary ">
												10
										  </span>
											 <span class="m-l-xs letras-blancas letras-blancas">Superman</span>
										</li>
									</ul>
                                        
                                        
									</ul>
								</section>
                </div>
                <!-- / Primera columna-->
                
                <!-- Segunda columna-->
                <div class="col-sm-4">
                	<section class="panel fondo-transparente-negro-075 borde-transparente-negro">
                                    <h1 class="text-center letras-blancas" style="font-family:Alegreya SC; font-size:72px">Top PVP</h1>
									
									<ul class="list-group list-group-flush no-radius alt">
										<li class="list-group-item fondo-transparente-000 m-t-lg no-border linea-azul-1">
										  <span class=" col-xs-3 label fondo-solido-rojo-1" style="font-size:36px">
												1
										  </span>
                                            
                                          <div class="col-xs-9">
                                                <div class="row">
                                                	<span class="h2 m-l-xs letras-blancas">Batman</span>
                                                </div>
                                                <div class="row">
                                                	<span class="h4 m-l-xs letras-blancas">999999</span>
                                                </div>
                                             
                                             </div>
                                             
									  </li>
                                        <div class="row"></div>
										<li class="list-group-item fondo-transparente-000 no-border linea-azul-1 m-t-xs">
											<span class="  col-xs-2 label fondo-solido-azul-1 letras-blancas" style="font-size:24px; ">
												2
											</span>
											 
                                             <div class="col-xs-10">
                                                <div class="row">
                                                	<span class="h4 m-l-xs letras-blancas">Iron Man</span>
                                                </div>
                                                <div class="row">
                                                	<span class="h5 m-l-xs letras-blancas">999999</span>
                                                </div>
                                             
                                             </div>
										</li>
                                        <div class="row"></div>
										<li class="list-group-item fondo-transparente-000 no-border linea-azul-1 m-t-xs">
											<span class="  col-xs-1 label letras-negras" style="font-size:18px; background-color:#FFA838">
												3
											</span>
											 
                                             <div class="col-xs-10">
                                                <div class="row">
                                                	<span class="h5 m-l-xs letras-blancas">Capitán América</span>
                                                </div>
                                                <div class="row">
                                                	<span class="h6 m-l-xs letras-blancas">999999</span>
                                                </div>
                                             
                                             </div>
										</li>
                                        <div class="row"></div>
                                      <li class="list-group-item fondo-transparente-000 m-t-lg linea-azul-1">
											<span class="pull-right letras-blancas">
												1234567
											</span>
											<span class="label bg-warning letras-negras">
												4
										</span>
											 <span class="m-l-xs letras-blancas">Hulk</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												123456
										  </span>
											<span class="label bg-warning letras-negras">
												5
										  </span>
											 <span class="m-l-xs letras-blancas">Flash</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-warning letras-negras">
												6
										  </span>
											 <span class="m-l-xs letras-blancas">Superman</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-warning letras-negras">
												7
										  </span>
											 <span class="m-l-xs letras-blancas">Superman</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-warning letras-negras">
												8
										  </span>
											 <span class="m-l-xs letras-blancas">Superman</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-primary">
												9
										  </span>
											 <span class="m-l-xs letras-blancas letras-blancas">Superman</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-primary ">
												10
										  </span>
											 <span class="m-l-xs letras-blancas letras-blancas">Superman</span>
										</li>
									</ul>
                                        
                                        
									</ul>
								</section>
                </div>
                <!-- / Segunda columna-->
                
                <!-- Tercera columna-->
                <div class="col-sm-4">
                	<section class="panel fondo-transparente-negro-075 borde-transparente-negro">
                                    <h1 class="text-center letras-blancas" style="font-family:Alegreya SC; font-size:72px">Top PK</h1>
									
									<ul class="list-group list-group-flush no-radius alt">
										<li class="list-group-item fondo-transparente-000 m-t-lg no-border linea-azul-1">
										  <span class=" col-xs-3 label fondo-solido-rojo-1" style="font-size:36px">
												1
										  </span>
                                            
                                          <div class="col-xs-9">
                                                <div class="row">
                                                	<span class="h2 m-l-xs letras-blancas">Batman</span>
                                                </div>
                                                <div class="row">
                                                	<span class="h4 m-l-xs letras-blancas">999999</span>
                                                </div>
                                             
                                             </div>
                                             
									  </li>
                                        <div class="row"></div>
										<li class="list-group-item fondo-transparente-000 no-border linea-azul-1 m-t-xs">
											<span class="  col-xs-2 label fondo-solido-azul-1 letras-blancas" style="font-size:24px; ">
												2
											</span>
											 
                                             <div class="col-xs-10">
                                                <div class="row">
                                                	<span class="h4 m-l-xs letras-blancas">Iron Man</span>
                                                </div>
                                                <div class="row">
                                                	<span class="h5 m-l-xs letras-blancas">999999</span>
                                                </div>
                                             
                                             </div>
										</li>
                                        <div class="row"></div>
										<li class="list-group-item fondo-transparente-000 no-border linea-azul-1 m-t-xs">
											<span class="  col-xs-1 label letras-negras" style="font-size:18px; background-color:#FFA838">
												3
											</span>
											 
                                             <div class="col-xs-10">
                                                <div class="row">
                                                	<span class="h5 m-l-xs letras-blancas">Capitán América</span>
                                                </div>
                                                <div class="row">
                                                	<span class="h6 m-l-xs letras-blancas">999999</span>
                                                </div>
                                             
                                             </div>
										</li>
                                        <div class="row"></div>
                                      <li class="list-group-item fondo-transparente-000 m-t-lg linea-azul-1">
											<span class="pull-right letras-blancas">
												1234567
											</span>
											<span class="label bg-warning letras-negras">
												4
										</span>
											 <span class="m-l-xs letras-blancas">Hulk</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												123456
										  </span>
											<span class="label bg-warning letras-negras">
												5
										  </span>
											 <span class="m-l-xs letras-blancas">Flash</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-warning letras-negras">
												6
										  </span>
											 <span class="m-l-xs letras-blancas">Superman</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-warning letras-negras">
												7
										  </span>
											 <span class="m-l-xs letras-blancas">Superman</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-warning letras-negras">
												8
										  </span>
											 <span class="m-l-xs letras-blancas">Superman</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-primary">
												9
										  </span>
											 <span class="m-l-xs letras-blancas letras-blancas">Superman</span>
										</li>
                                        <li class="list-group-item fondo-transparente-000 linea-azul-1">
											<span class="pull-right letras-blancas">
												12345
										  </span>
											<span class="label bg-primary ">
												10
										  </span>
											 <span class="m-l-xs letras-blancas letras-blancas">Superman</span>
										</li>
									</ul>
                                        
                                        
									</ul>
								</section>
                </div>
                <!-- / Tercera columna-->
                
              </div>
              <!--/  Primera fila-->
              
              <div class="row"></div>
              
              <!-- SEGUNDA FILA -->
              
              <!-- Primera columna-->
              <div class="col-sm-6">
              	<section class="panel fondo-transparente-negro-075 borde-transparente-negro">
                	
                    <!-- Primera columna-->
                    <div class="col-sm-6 fondo-transparente-negro-075">
                    
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
                    <div class="col-sm-6 fondo-transparente-negro-075">
					
                        <ul class="list-group list-group-flush no-radius alt">
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
              
              <!-- Segunda columna-->
              <div class="col-sm-6">
              </div>
              <!-- / Segunda columna-->
              
            </div>
            <!-- / Pestaña 1 -->
            
            <div class="tab-pane" id="datagrid">
              <section class="panel">
                <header class="panel-heading">
                  DataGrid 
                  <i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
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
                                <input type="text" class="input-sm form-control" placeholder="Search">
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
                              <span>Per Page</span>
                            </div>
                          </div>
                          <div class="datagrid-footer-right col-sm-6 text-right text-center-xs" style="display:none;">
                            <div class="grid-pager m-r-n">
                              <button type="button" class="btn btn-sm btn-white grid-prevpage"><i class="icon-chevron-left"></i></button>
                              <span>Page</span>
                              <div class="inline">
                                <div class="input-group dropdown combobox">
                                  <input class="input-sm form-control" type="text">
                                  <div class="input-group-btn dropup">
                                    <button class="btn btn-sm btn-white" data-toggle="dropdown"><i class="caret"></i></button>
                                    <ul class="dropdown-menu pull-right"></ul>
                                  </div>
                                </div>
                              </div>
                              <span>of <span class="grid-pages"></span></span>
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
                  Top PK 
                  <i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
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
                  Top PVP
                  <i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
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
                  Top Online
                  <i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
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