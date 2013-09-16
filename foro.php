<?php
include_once 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>
			Forum | Linekkit
		</title>
		<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
          <link rel="stylesheet" href="css/animate.css" type="text/css" />
          <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
          <link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
          <link rel="stylesheet" href="css/plugin.css" type="text/css" />
          <link rel="stylesheet" href="css/app.css" type="text/css" />
        <link rel="stylesheet" href="css/lkcss.css">
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
			<?php include_once('barralateral.php');
            getBar(3,7);//getbat(tipoDeBarra,<li>activo)
            ?>
			<!-- .vbox -->
			<section id="content">
				<iframe src="http://www.linekkit.com/forum<?php echo $_GET['page']; ?>" width="100%" height="100%" style="border:0px;></iframe>
                </section>
			<!-- /.vbox -->
		</section>
        
		<script src="css/app.v1.js">
		</script>
		<!-- Bootstrap -->
		<!-- App -->
		<!-- Fuelux -->
	</body>

</html>