<?php
include("security.php"); 
?>
<html>
<head>
	<title>App Login</title>
	<meta charset="utf-8" />
</head>
<body>
	<h1>Bienvenido al sistema!</h1>
	<h2>Usuario: <?php echo $_SESSION["usuarioactual"]; ?> </h2><br>
	<p>Entro correctamente al sistema.</p><br><br>
	<a href="logout.php">Salir</a>
</body>
</html>
