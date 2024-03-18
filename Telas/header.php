<div id="header">
	<div align="right">
	<?php
	session_start();
	if(!isset ($_SESSION['login'])) {
	?>
	<a href="formularioLogar.php">
		<input type="button" value="Logar" name="enviar">
	</a>

	<a href="formularioCadastrarNovoUsuario.php">
		<input type="button" value="Cadastra-se" name="enviar">
	</a>	
	<?php
	} else {
	?>
		<form action="deslogar.php" method="post">
			<img src="<?php echo($_SESSION["foto"]);?>" width="40" align="40"> <?php echo($_SESSION["usuario"]);?>
			<input type="submit" value="Sair" name="sair">
		</form>
	<?php
	}
	?>
</div>