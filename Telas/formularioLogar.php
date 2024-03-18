<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../estilo.css" />
<script type="text/javascript" src="./feedback.js" > </script>
<title>Cadastro de Usuario</title>
<script type="text/javascript">
function verificarFormulario() {
    var usuario = document.getElementById("usuario").value;
	var senha = document.getElementById("senha").value;

    if (usuario == '' || senha == '') {
        alert("Por favor forneça o nome e a senha para logar.");
		return false;
    } else {
		return true;
    }
}
</script>
<body>

    <?php 
	include("header.php");
	?>
	<?php 
	include("menu.php");
	?>
	
	
<div id="modalFeedback">
</div>

<script >
	<?php
	if(isset($_SESSION['erroLogin']) && $_SESSION['erroLogin']) {
		echo("abrirModal('Usuário ou senha inválidos!');");
	}
	?>
</script>
	<center>
		<h2>Fazendo login</h2>
	<form action='verificarLogin.php' method='post' onsubmit="return verificarFormulario()">
		<br> <br>
		<table>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado" for="usuario">Nome de usuário:</label>
				</td>
				<td valign="center">
					<input type="text" id="usuario" name="usuario"><br> <br>
				</td>
			</tr>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
				<label class="textodestacado" for="senha">Senha:</label>
				</td>
				<td valign="center">
					<input type="password" id="senha" name="senha"><br> <br>
				</td>
			</tr>
		</table>
		<input type="submit" name="submit" value="Logar">
		<input type="reset" onclick="location.href='Tela_inicial.php';"  value="Cancelar">
	</form>
	</center>
</body>
</html>