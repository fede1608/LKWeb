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
  <title>Web Application | todo</title>
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
  <!--[if lt IE 9]>
    <script src="js/ie/respond.min.js" cache="false"></script>
    <script src="js/ie/html5.js" cache="false"></script>
    <script src="js/ie/fix.js" cache="false"></script>
  <![endif]-->
</head>
<body style="background-image:url(images/dragon-wallpaper-lineage-2-1920x1080.jpg) !important; background-size:cover !important;">
		
  <section class="hbox stretch">
			<?php
            include_once('barralateral.php');
            getBar(1,4);//getbat(tipoDeBarra,<li>activo)
            ?>
    <!-- .vbox -->
    <section id="content">
      <section class="vbox">
        <header class="header bg-success bg-gradient">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#static" data-toggle="tab">Static table</a></li>
            <!--<li class=""><a href="#datagrid" data-toggle="tab">Datagrid</a></li>-->
            <li class=""><a href="#datatable" data-toggle="tab">PK Kills</a></li>
			<li class=""><a href="#datatable2" data-toggle="tab">PVP Kills</a></li>
            <li class=""><a href="#datatable3" data-toggle="tab">Online Time</a></li>
          </ul>
        </header>
        <section class="scrollable wrapper">
          <div class="tab-content">
            <div class="tab-pane active" id="static">
              <div class="row">
                <div class="col-sm-6">
                  <section class="panel">
                    <header class="panel-heading">
                      <span class="label bg-danger pull-right">4 left</span>
                      Tasks
                    </header>
                    <table class="table table-striped m-b-none text-sm">
                      <thead>
                        <tr>
                          <th>Progress</th>
                          <th>Item</th>                    
                          <th width="70"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>                    
                          <td>
                            <div class="progress progress-sm progress-striped active m-t-xs m-b-none">
                              <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-original-title="80%" style="width: 80%"></div>
                            </div>
                          </td>
                          <td>App prototype design</td>
                          <td class="text-right">
                            <div class="btn-group">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-pencil"></i></a>
                              <ul class="dropdown-menu pull-right">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                        <tr>                    
                          <td>
                            <div class="progress progress-xs m-t-xs m-b-none">
                              <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-original-title="40%" style="width: 40%"></div>
                            </div>
                          </td>
                          <td>Design documents</td>
                          <td class="text-right">
                            <div class="btn-group">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-pencil"></i></a>
                              <ul class="dropdown-menu pull-right">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                        <tr>                    
                          <td>
                            <div class="progress progress-xs m-t-xs m-b-none">
                              <div class="progress-bar progress-bar-warning" data-toggle="tooltip" data-original-title="20%" style="width: 20%"></div>
                            </div>
                          </td>
                          <td>UI toolkit</td>
                          <td class="text-right">
                            <div class="btn-group">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-pencil"></i></a>
                              <ul class="dropdown-menu pull-right">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                        <tr>                    
                          <td>
                            <div class="progress progress-xs m-t-xs m-b-none">
                              <div class="progress-bar progress-bar-danger" data-toggle="tooltip" data-original-title="15%" style="width: 15%"></div>
                            </div>
                          </td>
                          <td>Testing</td>
                          <td class="text-right">
                            <div class="btn-group">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-pencil"></i></a>
                              <ul class="dropdown-menu pull-right">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </section>
                </div>
                <div class="col-sm-6">
                  <section class="panel">
                    <header class="panel-heading">Stats</header>
                    <table class="table table-striped m-b-none text-sm">
                      <thead>
                        <tr>
                          <th>Graph</th>
                          <th>Item</th>                    
                          <th width="70"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>                    
                          <td>
                            <div class="sparkline" data-bar-color="#5cb85c" data-type="bar" data-height="19"><!--20,10,15,21,12,5,21,30,24,15,8,19--></div>
                          </td>
                          <td>App downloads</td>
                          <td class="text-success">
                            <i class="icon-level-up"></i> 40%
                          </td>
                        </tr>
                        <tr>                    
                          <td>
                            <div class="sparkline" data-bar-color="#61a1e1" data-type="bar" data-height="19"><!--,5,21,30,24,15,8,19,20,10,15,21,12--></div>
                          </td>
                          <td>Social connection</td>
                          <td class="text-success">
                            <i class="icon-level-up"></i> 20%
                          </td>
                        </tr>
                        <tr>                    
                          <td>
                            <div class="sparkline" data-bar-color="#999900" data-type="bar" data-height="19"><!--200,400,500,100,90,1200,1500,1000,800,500,80,50--></div>
                          </td>
                          <td>Revenue</td>
                          <td class="text-warning">
                            <i class="icon-level-down"></i> 5%
                          </td>
                        </tr>
                        <tr>                    
                          <td>
                            <div class="sparkline" data-bar-color="#ff5f5f" data-type="bar" data-height="19"><!--15,21,30,24,15,8,19,20,10,15,21,12--></div>
                          </td>
                          <td>Customer increase</td>
                          <td class="text-danger">
                            <i class="icon-level-down"></i> 20%
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </section>
                </div>
              </div>
              <section class="panel">
                <header class="panel-heading">
                  Responsive Table
                </header>
                <div class="row text-sm wrapper">
                  <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control input-s-sm inline">
                      <option value="0">Bulk action</option>
                      <option value="1">Delete selected</option>
                      <option value="2">Bulk edit</option>
                      <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-white">Apply</button>                
                  </div>
                  <div class="col-sm-4 m-b-xs">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-sm btn-white active">
                        <input type="radio" name="options" id="option1"> Day
                      </label>
                      <label class="btn btn-sm btn-white">
                        <input type="radio" name="options" id="option2"> Week
                      </label>
                      <label class="btn btn-sm btn-white">
                        <input type="radio" name="options" id="option2"> Month
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="input-group">
                      <input type="text" class="input-sm form-control" placeholder="Search">
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-white" type="button">Go!</button>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped b-t text-sm">
                    <thead>
                      <tr>
                        <th width="20"><input type="checkbox"></th>
                        <th class="th-sortable" data-toggle="class">Project
                          <span class="th-sort">
                            <i class="icon-sort-down text"></i>
                            <i class="icon-sort-up text-active"></i>
                            <i class="icon-sort"></i>
                          </span>
                        </th>
                        <th>Task</th>
                        <th>Date</th>
                        <th width="30"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="checkbox" name="post[]" value="2"></td>
                        <td>Idrawfast</td>
                        <td>4c</td>
                        <td>Jul 25, 2013</td>
                        <td>
                          <a href="#" class="active" data-toggle="class"><i class="icon-ok text-success text-active"></i><i class="icon-remove text-danger text"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" name="post[]" value="3"></td>
                        <td>Formasa</td>
                        <td>8c</td>
                        <td>Jul 22, 2013</td>
                        <td>
                          <a href="#" data-toggle="class"><i class="icon-ok text-success text-active"></i><i class="icon-remove text-danger text"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" name="post[]" value="4"></td>
                        <td>Avatar system</td>
                        <td>15c</td>
                        <td>Jul 15, 2013</td>
                        <td>
                          <a href="#" class="active" data-toggle="class"><i class="icon-ok text-success text-active"></i><i class="icon-remove text-danger text"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" name="post[]" value="4"></td>
                        <td>Throwdown</td>
                        <td>4c</td>
                        <td>Jul 11, 2013</td>
                        <td>
                          <a href="#" class="active" data-toggle="class"><i class="icon-ok text-success text-active"></i><i class="icon-remove text-danger text"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" name="post[]" value="5"></td>
                        <td>Idrawfast</td>
                        <td>4c</td>
                        <td>Jul 7, 2013</td>
                        <td>
                          <a href="#" class="active" data-toggle="class"><i class="icon-ok text-success text-active"></i><i class="icon-remove text-danger text"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" name="post[]" value="6"></td>
                        <td>Formasa</td>
                        <td>8c</td>
                        <td>Jul 3, 2013</td>
                        <td>
                          <a href="#" class="active" data-toggle="class"><i class="icon-ok text-success text-active"></i><i class="icon-remove text-danger text"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" name="post[]" value="7"></td>
                        <td>Avatar system </b></td>
                        <td>15c</td>
                        <td>Jul 2, 2013</td>
                        <td>
                          <a href="#" class="active" data-toggle="class"><i class="icon-ok text-success text-active"></i><i class="icon-remove text-danger text"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" name="post[]" value="8"></td>
                        <td>Videodown</td>
                        <td>4c</td>
                        <td>Jul 1, 2013</td>
                        <td>
                          <a href="#" class="active" data-toggle="class"><i class="icon-ok text-success text-active"></i><i class="icon-remove text-danger text"></i></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <div class="col-sm-4 hidden-xs">
                      <select class="input-sm form-control input-s-sm inline">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                      </select>
                      <button class="btn btn-sm btn-white">Apply</button>                  
                    </div>
                    <div class="col-sm-4 text-center">
                      <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-4 text-right text-center-xs">                
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="#"><i class="icon-chevron-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="icon-chevron-right"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </footer>
              </section>
            </div>
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
                  Top PVP
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