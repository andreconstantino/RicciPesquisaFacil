<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../estilo.css" />
<title>Cadastro de Usuario</title>

<script type="text/javascript">
function verificarFormulario() {
    var nome = document.getElementById("usuario").value;
    var email = document.getElementById("email").value;
    var cidade = document.getElementById("cidade").value;
    var senha = document.getElementById("senha").value;
	var repetir = document.getElementById("repetir").value;
	
    if (nome == '' || email == '' || cidade == '' || senha == '') {
        alert("Por favor preencha todos os campos.");
		return false;
    } else {
			if(senha != repetir) {
				alert("A senha digitada no campo 'Repetir Senha' deve ser a mesma digitada no campo 'Senha'.");
				return false;
			} else {
				return true;
			}
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
	<center>
		<h2>Cadastro de novo usuário</h2>
	<form action='cadastrarnovousuario.php' method='post' encType="multipart/form-data" onsubmit="return verificarFormulario()">
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
					<label class="textodestacado" for="email">E-mail:</label>
				</td>
				<td>
					<input type="text" id="email" name="email"><br> <br>
				</td>
			</tr>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado" for="cidade">Cidade:</label>
				</td>
				<td>
					<input type="text" id="cidade" name="cidade"><br> <br>
				</td>
			</tr>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado" for="foto">Foto:</label>
		        </td>
		        <td>
		        	<input type="file" name="foto" id="foto"/>
	        		<img id="img"/>
		        	<script
		        		src="https://code.jquery.com/jquery-3.2.1.slim.js"
						integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg="
			 			crossorigin="anonymous"></script>
			 		<br> <br>
			 	</td>
			</tr>
		 	<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado" for="senha">Senha:</label>
				</td>
				<td>
					<input type="password" id="senha" name="senha"><br> <br>
				</td>
			</tr>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado" for="repetir">Repetir senha:</label>
				</td>
				<td>
					<input type="password" id="repetir" name="repetir"><br> <br>
				</td>
			</tr>
		</table>
		<input type="submit" name="submit" value="Cadastrar">
		<input type="reset" onclick="location.href='Tela_inicial.php';"  value="Cancelar">
	</form>
	</center>
</body>
</html>