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
 require_once 'libs/mysql.inc.php';
require_once 'libs/config.inc.php';
$MySQLL = new SQL($hostL, $usernombre, $pass, $dblogin);
$MySQL2 = new SQL($hostL, $usernombre, $pass, $dbgame);
$tablecharacters='characters';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>
			Linekkit
		</title>
		<meta name="description" content="Linekkit es el servidor de Lineage 2 con mayor crecimiento en la actualidad. Miles de usuarios nos recomiendan.">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
          <link rel="stylesheet" href="css/animate.css" type="text/css" />
          <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
          <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
          <link rel="stylesheet" href="css/plugin.css" type="text/css" />
          <link rel="stylesheet" href="css/app.css" type="text/css" />
        <link rel="stylesheet" href="css/lkcss.css">
        <link href='http://fonts.googleapis.com/css?family=Alegreya+SC' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
			<script src="js/ie/respond.min.js" cache="false">
			</script>
			<script src="js/ie/html5.js" cache="false">
			</script>
			<script src="js/ie/fix.js" cache="false">
			</script>
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
					<section class="scrollable wrapper">
                    
                    	<div class="col-lg-12 row m-b-lg">
                        <img src="images/logo.png" width="450" height="127"> 
                        </div>
						<div class="col-lg-12 row m-b-lg">
						<div class="panel-group m-b" id="accordion2">
                                        <div class="panel no-border" style="background-color:rgba(0,0,0,0);">
                                            <div class="panel-heading fondo-transparente-negro-075">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"> <strong>Panel de Usuario -  <?php  //echo $mybb->user['username']; ?> <?php echo $userdata['login']; ?> </strong> </a>
                                                <h3 style="font-size: 15px;color: #C1763C;">
                                				Linekkit coins disponibles: 
                                				<?php 
                                				$registro=$MySQLL->execute("SELECT coins FROM ".$dblogin.".accounts WHERE login='".$userdata['login']."'");
                                				echo $registro[0]['coins'];
                                				?>
                                				</h3>
												<div id="collapseOne" class="panel-collapse in">
 <?php

$aid = (empty($_GET['id'])||$_GET['id']<=0||$_GET['id']>4) ? 1 : $_GET['id']; // para algo servía el puto operador trinario :?

?>
	

				<?php if (isset($_GET['error'])) {
					require_once './acm/language/spanish.php'; ?>
					<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                    <i class="icon-ban-circle"></i> <?php echo $vm[$_GET['error']];?></div>
					 <?php };?>
					 <?php if (isset($_GET['valid'])) {
					 require_once './acm/language/spanish.php';?>
					 <div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                     <i class="icon-ok-sign"></i><?php echo $vm[$_GET['valid']];?></div>
					 <?php };?>
						
						
						<h3 style="font-size: 23px;">Cambio de Linekkit Coins</h3>
						<div class="panel-group m-b" id="accordion3">
                                        
                                            
                                                
			<?php
                $chars = $MySQL2->execute("SELECT * FROM `". $tablecharacters ."` WHERE account_name=\"".$userdata['login']."\"");
                
				for($i=1;$i<=4;$i++){
                $dc=false;
				$nn=false;
                $ps=false;
                $comment2='';
					switch ($i)
					{
						case 1: 
                        $titulo="Asignar Donator Coins";
						$costinfo="1 Linekkit Coin = 1 Donator Coin";
						$dc=true;
						break;
						case 2: 
                        $titulo="Cambiar nombre de Personaje";
						$costinfo="15 Linekkit Coins";
						$nn=true;
						break;
						case 3: 
                        $titulo="Cambiar sexo de Personaje";
						$costinfo="15 Linekkit Coins";
						break;
                        case 4: 
                        $titulo="Convertirse en Premium";
                        $comment2='';
						$costinfo="<p>Premium Rates: Exp x12  SP x12 Drop x9 Spoil x9</p><p>120 LC/1 Mes, 70LC/15 Dias</p;";
                        $ps=true;
						break;
					}
                    if($aid==$i){
                        $collapsed1='';
                        $collapsed2=' in ';
                    }else{
                        $collapsed1='collapsed';
                        $collapsed2=' collapse ';
                    }
					echo '<div class="panel no-border" style="background-color:rgba(0,0,0,0);"><div class="panel-heading fondo-transparente-negro-075">
                    <a class="accordion-toggle '.$collapsed1.'" data-toggle="collapse" data-parent="#accordion3" href="#collapse'.$i.'"> 
				            <strong>'.$titulo.'</strong> </a></div>
					   <div id="collapse'.$i.'" class="panel-collapse '.$collapsed2.' fondo-transparente-negro-075"><div class="panel-body text-sm"><h3>'.$titulo.'</h3>';
					echo "<div class=\"col-lg-4 col-lg-offset-4\"><h3 style=\"font-size: 12px;color: #4A4A4A;\">".$costinfo."</h3>";
				?>
				
				<form name="agregar" method="POST" action="./cambiodepuntos.php" class="panel-body" >
				<br>
				
				<?php
					if(!$ps){
					echo "<br><label>Elegir Personaje:</label> <br><span class=\"field\"><select id=\"pjseleccionado\" name=\"pjseleccionado\" class=\"form-control\">";
					foreach ($chars as $char){
					echo "<option value='".$char['char_name']."'>Lx10 - ".$char['char_name']."</option>";
					}
/* 					$chars2 = $MySQL->execute("SELECT * FROM linekkitfreya20.". $tablecharacters ." WHERE account_name=\"".$userdata['login']."\"");
					foreach ($chars2 as $char){
										echo "<option value='".$char['char_name']."'>Lx20 - ".$char['char_name']."</option>";
					} */
					echo "</select><br>";
                    }
				if($dc){	
				?>
				<br>
				<label>Cantidad de Linekkit Coins:</label>
				<br><span class="field"><input type="text" id="cantidadcoins" name="cantidadcoins" value="0" class="form-control"></span>
				<?php } 
				if($nn){
				?>
				<br>
				<label>Nuevo Nombre:</label>
				<br><span class="field"><input type="text" id="nuevonombre" name="nuevonombre" value="Player" class="form-control"></span>
				<?php } 
                if($ps){
                ?><br>
				<label>Elegir Pack Premium(Son acumulables):</label>
                
				<br><span class="field"><select id="packpremium" name="packpremium" class="form-control">
                <option value='1'> Premium Rates x 1 Mes</option>
                <option value='2'> Premium Rates x 15 D&iacute;as</option>
                
                </select></span>
                <input type="hidden" name="pjseleccionado" value="--">
				<?php } ?>
				
				
				<br>
				
				<input type="hidden" name="nombredeusuario" value="<?php echo $userdata['login']; ?>">
				<input type="hidden" name="opcion" value="<?php echo $i; ?>">
				
				<br>
				
				<br>
				<input type="button" onclick="document.location='./acm/index.php?action=acc_serv'" class="btn btn-info" value="Atras">
				
				<input type="submit" value="Crear" class="btn btn-success">
			</form>
			</div>
            </div>
             </div>
             
             </div>
             
					<?php } ?>	
                    
                    
						<div class="panel no-border" style="background-color:rgba(0,0,0,0);"><div class="panel-heading fondo-transparente-negro-075">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse5"> 
        				            <strong>Cambiar imagen de perfil del personaje</strong> </a></div>
        					   <div id="collapse5" class="panel-collapse   fondo-transparente-negro-075 collapse" style="height: auto;"><div class="panel-body text-sm"><h3>Cambiar Imagen de Perfil del Personaje:</h3><div class="col-lg-4 col-lg-offset-4"><h3 style="font-size: 12px;color: #4A4A4A;"><p>Debe ser la URL de una imagen (jpg,gif,png)</p><p>Recomendamos que sea una im&aacute;gen cuadrada				
        				</p><form name="agregar" method="POST" action="./charprofilechange.php" class="panel-body">
        				<br>
        				
        				<br>
        				<label></label>
                        
                        	<?php
        					
        					echo "<br><label>Elegir Personaje:</label> <br><span class=\"field\"><select id=\"char\" name=\"char\" class=\"form-control\">";
        					foreach ($chars as $char){
        					echo "<option value='".$char['char_name']."'>Lx10 - ".$char['char_name']."</option>";
        					}
        					echo "</select><br>";
                            
                            ?>
                        
        				<br><br>
        				<label>Nuevo Nombre:</label>
        				<br><span class="field"><input type="text" id="imgurl" name="imgurl" value="http://www.example.com/image.png" class="form-control"></span>
        				
        
        				
        				<br>
        				<input type="button" onclick="document.location='./acm/index.php?action=acc_serv'" class="btn btn-info" value="Atras">
        				
        				<input type="submit" value="Crear" class="btn btn-success">
			         </form>
			     </h3></div>
                </div>
             </div>
            </div>
						
						
						
						</div>
						
						
						
						</div>
						</div>
						</div>
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
        <!-- Sparkline Chart -->
        <script src="js/charts/sparkline/jquery.sparkline.min.js"></script>
        <!-- App -->
        <script src="js/app.js"></script>
        <script src="js/app.plugin.js"></script>
        <script src="js/app.data.js"></script>  
		


	</body>

</html>
