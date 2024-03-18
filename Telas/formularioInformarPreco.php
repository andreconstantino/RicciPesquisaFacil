<html>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../estilo.css" />
<title>Informar preço</title>
<script type="text/javascript">
function verificarFormulario() {
    var codigoProduto = document.getElementById("cod_produto").value;
    var data = document.getElementById("data").value;
    var preco = document.getElementById("preco").value;
    var codigoSupermercado = document.getElementById("cod_supermercado").value;
	
    if (codigoProduto == '' || data == '' || preco == '' || codigoSupermercado == 'Selecionar supermercado') {
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
	<div id="principal" class="principal">	
		<center>
		<h2 align="center">Informar Preço</h2>
		
		<?php
		include "conexao.inc";
	    session_start();
	    $caminhoFotoProduto = "http://localhost/TCCBruno/fotos/produtos/";
		$codigoProduto = $_GET["codigoProduto"];

		try {
			$pdo = obterConexao();
			$sql = "SELECT * FROM produto WHERE codigo = " . $codigoProduto;

			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			$produtos = $stmt->fetchAll();

			foreach ($produtos as $produto){
				echo("<div class='produtoContainer'>");
				echo("<div class='fotoProdutoContainer'>");
				echo("<img src='" . $caminhoFotoProduto . $produto['foto'] . "' class='fotoProduto' />");
				echo("</div>");
				echo("<div class='descricaoProdutoContainer'><br><br>");
				echo("<font size='+2'> " . $produto['nome'] . "</font><br>");
				echo($produto['descricao'] . "<br>");
				echo("</div>");
				echo("</div>");
			}
		} catch (PDOException $e) {
			echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
		}
		?>
		
		<form action='cadastrarPrecoProduto.php' method='post' onsubmit="return verificarFormulario()" >
			<input type="text" id="cod_produto" name="cod_produto" value="
			<?php
			echo($_GET["codigoProduto"]);
			?>" hidden>

			<table>
				<tr>
					<td style="text-align: right; vertical-align: baseline">
							<label class="textodestacado" for="data">Data:</label>
					</td>
					<td valign="center">
						<input type="text" id="data" name="data" placeholder="  /  /    "
  pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}"><br><small> Formato: dia/mês/ano</small><br> <br>
					</td>
				</tr>
				<tr>
					<td style="text-align: right; vertical-align: baseline">
						<label class="textodestacado" for="preco">Preço:</label>
					</td>
					<td valign="center">
						<input type="text" id="preco" name="preco" placeholder=" , "
  pattern="^[1-9][0-9]*(\.[0-9]{1,2})?$">
  						<br><small> Formato: 0,00</small><br> <br>
					</td>
				</tr>
				<tr>
					<td style="text-align: right; vertical-align: baseline">
						<label class="textodestacado" for="cod_supermercado">Supermercado:</label>
					</td>
					<td valign="center">
						<select id="cod_supermercado" name="cod_supermercado">
						<option id = "0">Selecionar supermercado</option>
						<?php

							try {
								$pdo = obterConexao();
								$sql = "select * from supermercado";
						    
								$stmt = $pdo->prepare($sql);
								$stmt->execute();
						    	$supermercados = $stmt->fetchAll();
								foreach ($supermercados as $supermercado){
									echo("<option value='" . $supermercado['codigo'] . "'>" . $supermercado['nome'] . "</option>");
								}							 
						   	} catch (PDOException $e) {
								echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
							}
						?>
						</select><br><br>
					</td>
				</tr>
			</table>
			
			<input type="submit" value="Cadastrar">
			
			<input type="reset" value="Cancelar">
		</form>
		</center>
	</div>
</body>
</html>