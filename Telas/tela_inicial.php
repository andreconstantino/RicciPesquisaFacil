<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../estilo.css" />
<title>Tela Inicial</title>
<script type="text/javascript">
function verificarFormulario() {
    var produto = document.getElementById("produto").value;
    var cidade = document.getElementById("cidade").value;
    if (produto == '') {
        alert("Por favor forneça o nome do produto a procurar.");
		return false;
    } if (cidade == 'Selecionar cidade') {
        alert("Por favor selecione uma cidade.");
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

<div id="principal">
	<form action="procurarProdutos.php" method="POST" onsubmit="return verificarFormulario()">
		<center>
			<h2>Olá, bem-vindo ao Ricci´s Pesquisa Fácil!</h2>
			<h3>Aqui você encontra o preço dos produtos nos supermercados de sua região facilmente!</h3>

			<label class="textodestacado">Procurar produto:</label>
			<input type="text" id="produto" name="produto" minlength="3" size="40" placeholder="nome do produto a procurar"><br> <br>

			<label class="textodestacado">Cidade:</label>
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
			</select>
			<input type="submit" value="" class="botaoProcurar">
		</center>
	</form>
</div>
</body>
</html>