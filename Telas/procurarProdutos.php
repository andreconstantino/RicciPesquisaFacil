<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../estilo.css" />
<title>Visualizar produto</title>
<body>

	<?php 
	include("header.php");
	?>
	<?php 
	include("menu.php");
	?>
	
<div id="principal" class="principal">	

<H2 align="center">Produtos</h2>

<?php
	include "conexao.inc";
    session_start();
    $caminhoFotoProduto = "http://localhost/TCCBruno/fotos/produtos/";
	
    $stringProduto = $_POST["produto"];
	$cidade = $_POST["cidade"];	
    
	echo("<div>Resultado para: <b>" . $stringProduto . "</b></div><p>");

    //abrir a conexao com banco
	try {
		$pdo = obterConexao();
		$sql = "SELECT * FROM produto  WHERE nome LIKE '%" . $stringProduto . "%';";

		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$produtos = $stmt->fetchAll();

		foreach ($produtos as $produto){
			echo("<div class='produtoContainer'>");
			echo("<div class='fotoProdutoContainer'>");
			echo("<img src='" . $caminhoFotoProduto . $produto['foto'] . "' class='fotoProduto' />");
			echo("</div>");
			echo("<div class='descricaoProdutoContainer'>");
			echo("<font size='+2'> <a href='listarPrecoProduto.php?codigoProduto=" . $produto['Codigo'] . "'> " . $produto['nome'] . " </a></font><br>");
			 
			echo($produto['descricao'] . "<br>");
			echo("</div>");
			echo("<div class='precoProdutoContainer'>");

			$sql = "SELECT preco, cod_supermercado FROM vende JOIN supermercado WHERE cod_produto = " . $produto['Codigo'] . " AND supermercado.codigo = vende.cod_supermercado AND supermercado.codigocidade = " . $cidade .  " ORDER BY preco";
			
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			$informacoes = $stmt->fetch();
			echo(" <center><font size='+2'> ");
			if(!empty($informacoes)) {
				echo "R$ ";
				echo number_format($informacoes['preco'],2,',','.');
			}
			else {
				echo("Sem registro");
			}
			if(isset ($_SESSION['login'])) {
				echo("<br><a href='formularioInformarPreco.php?codigoProduto=" . $produto['Codigo'] 
					. "&codigoSupermercado=" . $informacoes['cod_supermercado'] . "'>Informar preço</a>");
			}
			echo("</font></center><br>");
			echo("</div>");
			echo("</div>");
		}
	} catch (PDOException $e) {
		echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
	}
	
	echo("<div align='right'><a href='#principal'>Voltar ao topo</a></div>");

	setlocale(LC_MONETARY, 'pt_BR');
	//echo money_format('%.2n', $number);
	
?>
</div>
</body>
</html>