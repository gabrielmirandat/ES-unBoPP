<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php print $header_title; ?> </title>
	  <?php print @$header_css; // @ indica que eh opcional?>
      <link   href="libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="libs/css/custom.css">
      <script src="js/bootstrap.min.js"></script>
</head>

<body>
	<header class="container">
		<h1> <img src="img/unb-logo.jpg" class="img-rounded" alt="Cinque Terre" width="217" height="117"> </h1>
		<h1 class="-header-text"> ESunBoPP </h1>
			
		<nav class="-menu-options">
			<ul>
				<li><a href="createComum.php">Comum</a></li>
				<li><a href="createPromotor.php">Promotor</a></li>
				<li><a href="createGerente.php">Gerente</a></li>
			</ul>
		</nav>
	</header>	

	<!-- continue.. -->

<!-- </body> -->
<!-- </html>	 -->