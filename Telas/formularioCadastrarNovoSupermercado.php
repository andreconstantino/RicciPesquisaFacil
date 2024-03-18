<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../estilo.css" />
<title>Cadastro novo supermercado</title>
<script type="text/javascript">
function verificarFormulario() {
    var nome = document.getElementById("nome").value;
    var rua = document.getElementById("rua").value;
    var numero = document.getElementById("numero").value;
    var bairro = document.getElementById("bairro").value;
	var cidade = document.getElementById("cidade").value;
	var telefone = document.getElementById("telefone").value;
	var logo = document.getElementById("logo").value;
	
    if (nome == '' || rua == '' || numero == '' || bairro == '' 
    	|| cidade == 'Selecionar cidade' || telefone == '' || logo == '') {
        alert("Por favor preencha todos os campos.");
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

	<div align="center">
		<form action='cadastrarNovoSupermercado.php' method='post' encType="multipart/form-data" onsubmit="return verificarFormulario()">

		<H2>Cadastrar um novo supermercado</H2><br>

		<table>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado">Nome: </label>
				</td>
				<td valign="center">
					<input type="text" id="nome" name="nome"><br><br>
				</td>
			</tr>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado">Rua: </label>
				</td>
				<td valign="center">
					<input type="text" id="rua" name="rua"><br><br>
				</td>
			</tr>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado">Número: </label>
				</td>
				<td valign="center">
					<input type="text" id="numero" name="numero"><br><br>
				</td>
			</tr>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado">Bairro: </label>
				</td>
				<td valign="center">
					<input type="text" id="bairro" name="bairro"><br><br>
				</td>
			</tr>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado">Cidade: </label>
				</td>
				<td valign="center">
					<select id="cidade" name="cidade">
						<option id = "0">Selecionar cidade</option>
						<?php
							include "conexao.inc";
							try {
								$pdo = obterConexao();
								$sql = "SELECT * FROM cidade";

								$stmt = $pdo->prepare($sql);
								$stmt->execute();
								$cidades = $stmt->fetchAll();

								foreach ($cidades as $cidade){
									echo("<option value='" . $cidade['codigo'] . "'>" . $cidade['nomecidade'] . "</option>");
								}
							} catch (PDOException $e) {
								echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
							}
						?>
					</select><br><br>
				</td>
			</tr>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado">Telefone: </label>
				</td>
				<td valign="center">
					<input type="text" id="telefone" name="telefone"><br><br>
				</td>
			</tr>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado">Logo: </label>
				</td>
				<td valign="center">
					<input type="file" name="logo" id="logo"/>
        			<img id="img"/>
        			<script src="https://code.jquery.com/jquery-3.2.1.slim.js"
 					integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg="
		 			crossorigin="anonymous"></script><br> <br>
		 		</td>
		 	</tr>
	 	</table>
       	<input type="submit" name="submit"  value="Cadastrar">
		
		<input type="reset" value="Cancelar">
	</form>
	</div>
	
</body>
</html>