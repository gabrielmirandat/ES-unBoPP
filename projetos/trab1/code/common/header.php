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
				<li>Comum:</li>
				<li><a href="createComum.php">Criar</a></li>
				<li><a href="loginComum.php">Logar</a></li>
				<li>Promotor:</li>
				<li><a href="createPromotor.php">Criar</a></li>
				<li><a href="loginPromotor.php">Logar</a></li>
				<li>Gerente:</li>
				<li><a href="createGerente.php">Criar</a></li>
				<li><a href="loginGerente.php">Logar</a></li>
			</ul>
		</nav>
	</header>	

	<!-- continue.. -->

<!-- </body> -->
<!-- </html>	 -->