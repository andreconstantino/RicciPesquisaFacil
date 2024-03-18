<html>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../estilo.css" />
<title>Informar preço</title>
<body>

	<?php 
	include("header.php");
	?>
	<?php 
	include("menu.php");
	?>

	<H2 align="center">Preço do produto nos supermercados</h2>
	
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
			echo("<div class='descricaoProdutoContainer'>");
			echo("<font size='+2'> " . $produto['nome'] . "</font><br>");
			echo($produto['descricao'] . "<br>");
			echo("</div>");
			echo("</div>");
		}
	} catch (PDOException $e) {
		echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
	}

	echo("<br>Supermercados que vendem esse produto: <br><br>");
	$caminhoLogoSupermercado = "../fotos/supermercados/";
    
    //abrir a conexao com banco
	try {
		$pdo = obterConexao();
		$sql = "select cod_supermercado, nome, rua, numero, bairro, codigocidade, logo, preco FROM supermercado JOIN vende ON supermercado.codigo = vende.cod_supermercado AND vende.cod_produto = '$codigoProduto' group by cod_supermercado order by preco";

		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$supermercados = $stmt->fetchAll();

		if(!$supermercados) {
			echo("<p>Não existem supermercados que vendem esse produto." . $caracter . ".");
		}
		
		foreach ($supermercados as $supermercado){
			echo("<div class='supermercadoContainer'>");
			echo("<div class='logoSupermercadoContainer'>");
			echo("<img src='" . $caminhoLogoSupermercado . $supermercado['logo'] . "' class='logoSupermercado' />");
			echo("</div>");
			echo("<div class='descricaoSupermercadoContainer'>");
			echo("<font size='+2'> " . $supermercado['nome'] . "</font><br>");
			 
			echo("Rua " . $supermercado['rua'] . ", n. " . $supermercado['numero'] . ". Bairro " . $supermercado['bairro'] . "<br>");
			echo("</div>");
			echo("<div>");
			echo(" <center><font size='+2'> ");
			if(!empty($supermercado)) {
				echo "R$ ";
				echo number_format($supermercado['preco'],2,',','.');
			}
			else {
				echo("Sem registro");
			}
			if(isset ($_SESSION['login'])) {
				echo("<br><a href='formularioInformarPreco.php?codigoProduto=" . $codigoProduto
					. "&codigoSupermercado=" . $supermercado['cod_supermercado'] . "'>Informar preço</a>");
			}
			echo("</font></center><br>");
			echo("</div>");
			echo("</div>");
		}
	} catch (PDOException $e) {
		echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
	}
	
	echo("<div align='right'><a href='#principal'>Voltar ao topo</a></div>");
?>
</body>
</html>