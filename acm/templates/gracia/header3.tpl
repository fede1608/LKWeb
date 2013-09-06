{php}
chdir('../');
include_once("session.php");
chdir('./acm');
if(!isacmlogged()){
    echo '<script language="javascript">
			window.top.location="../signin.php"
			</script>';
    exit();
	}
{/php}
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>
			Linekkit
		</title>
		<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
          <link rel="stylesheet" href="../css/animate.css" type="text/css" />
          <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
          <link rel="stylesheet" href="../css/font.css" type="text/css" cache="false" />
          <link rel="stylesheet" href="../css/plugin.css" type="text/css" />
          <link rel="stylesheet" href="../css/app.css" type="text/css" />
        <link rel="stylesheet" href="../css/lkcss.css">
        <link href='http://fonts.googleapis.com/css?family=Alegreya+SC' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
			<script src="../js/ie/respond.min.js" cache="false">
			</script>
			<script src="../js/ie/html5.js" cache="false">
			</script>
			<script src="../js/ie/fix.js" cache="false">
			</script>
		<![endif]-->
	</head>
	<body style="background-image:url(../images/bg-raid-boss.jpg) !important; background-size:cover !important;">
		

        <section class="hbox stretch">
			{php}
			chdir('../');
			include_once('barralateral.php');
			chdir('./acm');
            getBarSinForo(1,0);//getbat(tipoDeBarra,<li>activo)
            {/php}
			<!-- .vbox -->
			<section id="content">
				<section class="vbox">
					<section class="scrollable wrapper">
                    
                    	<div class="col-lg-12 row m-b-lg">
						<div class="panel-group m-b" id="accordion2">
                                        <div class="panel no-border" style="background-color:rgba(0,0,0,0);">
                                            <div class="panel-heading fondo-transparente-negro-075">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne"> <strong>Panel de Usuario -  <?php  //echo $mybb->user['username']; ?> <?php echo $userdata['login']; ?> </strong> </a>
                                            
						<div id="collapseOne" class="panel-collapse in">