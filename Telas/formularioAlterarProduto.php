<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../estilo.css" />
<title>Alterar produto</title>
<body>

	<?php 
	include("header.php");
	?>
	<?php 
	include("menu.php");
	?>

	<div align="center">
	<?php
	//session_start();
	if(false) { //DESCOMENTAR DEPOIS !isset ($_SESSION['usuario'])) {
	?>
	<a href="formularioCadastrarNovoUsuario.html">
		<input type="button" value="Cadastra-se" name="enviar"></a>	
	<?php
	} else {
	?>
		<!-- <img src="<?php echo($_SESSION["foto"]);?>" width="40" align="40"> <?php echo($_SESSION["usuario"]);?> -->
		<form action='alterarProduto.php' method='post' encType="multipart/form-data">

		<h2>Alterar produto</h2><br><br>
		<label class="textodestacado">Código</label>
		<input type="text" id="codigo" name="codigo"><br><br>
		
		<label class="textodestacado">Nome</label>
		<input type="text" id="nome" name="nome"><br><br>

		<label class="textodestacado">Fabricante</label>
		<input type="text" id="fabricante" name="fabricante"><br><br>

		<label class="textodestacado">Categoria</label>
		<input type="text" id="categoria" name="categoria"><br><br>

		<label class="textodestacado">descrição</label>
		<input type="text" id="descricao" name="descricao"><br><br>

		<input type="file" name="foto" id="foto"/>
        <img id="img"/>
        <script
        src="https://code.jquery.com/jquery-3.2.1.slim.js"
 
		integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg="
		 
	 	crossorigin="anonymous"></script><br> <br>

		<input type="submit" value="alterar">
		
		<input type="reset" value="Cancelar">
	</form>
	<?php
	}
	?>
	
	</div>
	
</body>
</html>