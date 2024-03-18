<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../estilo.css" />
<title>Cadastro de Categoria</title>

<script type="text/javascript">
function verificarFormulario() {
    var nome categoria = document.getElementById("nomecat").value;
}
</script>
<body>

    <?php 
	include("header.php");
	?>
	<?php 
	include("menu.php");
	?>
	<center>
		<h2>Cadastro de categoria</h2>
	<form action='cadastrarNovaCategoria.php' method='post' encType="multipart/form-data" onsubmit="return verificarFormulario()">
		<br> <br>
		<table>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado" for="nomecat">Nome da categoria:</label>
				</td>
				<td valign="center">
					<input type="text" id="nomecat" name="nomecat"><br> <br>
				</td>
			</tr>
		</table>
		<input type="submit" name="submit" value="Cadastrar">
		<input type="reset" onclick="location.href='Tela_inicial.php';"  value="Cancelar">
	</form>
	</center>
</body>
</html>