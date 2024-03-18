<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../estilo.css" />
<title>Visualizar produto</title>
<body>

<?php
	include "conexao.inc";
    session_start();
    $caminhoFotoProduto = "http://localhost/TCCBruno/fotos/produtos/";
	
    $codigoProduto = $_GET["codigo"];  
    
    //abrir a conexao com banco
	try {
		$pdo = obterConexao();
		$sql = "SELECT * FROM produto  WHERE codigo = " . $codigoProduto;

		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$produto = $stmt->fetch();

		echo("<div class='produtoContainer'>");
		echo("<div class='fotoProdutoContainer'>");
		echo("<img src='" . $caminhoFotoProduto . $produto['foto'] . "' class='fotoProduto' />");
		echo("</div>");
		echo("<div class='descricaoProdutoContainer'>");
		echo("<font size='+2'> " . $produto['nome'] . "</font><br>");
		 
		echo($produto['descricao'] . "<br>");
		echo("</div>");
		echo("<div class='precoProdutoContainer'>");
		$sql = "SELECT preco FROM vende WHERE cod_produto = " . $codigoProduto . " order by preco";
		
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$informacoes = $stmt->fetch();
		
		echo(" <center><font size='+2'> " . $informacoes['preco'] . "  </font></center><br>");
		echo("</div>");
	} catch (PDOException $e) {
		echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
	}
?>
</body>
</html>