<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../estilo.css" />
<title>Deslogar</title>
<body>

<?php
    session_start();

	unset ($_SESSION['login']);
	unset ($_SESSION['foto']);
	unset ($_SESSION['usuario']);
	header("Location: tela_inicial.php");	
?>
</body>
</html>