<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../estilo.css" />
<title>Visualizar supermercados</title>
<body>

	<?php 
	include("header.php");
	?>
	<?php 
	include("menu.php");
	?>
	
<div id="principal">	

<h2 align="center">Supermercados</h2>

<?php
	if(isset ($_SESSION['login'])) {
		echo("<div align='right'><label class='textodestacado'><a href='formularioCadastrarNovoSupermercado.php'>+ adicionar supermercado</a></label><br></div> <br>");
	}

	$caracter = $_GET["caracter"];
		
	echo("<center>");
	foreach( range( 'A', 'Z' ) as $letra ) {
		if($letra != $caracter)
			echo("<a href='visualizarSupermercados.php?caracter=" . $letra . "'>" . $letra . "</a>&nbsp&nbsp&nbsp");
		else echo($letra . "&nbsp&nbsp&nbsp");
	}
	if(!$caracter) {
		echo(Todos . " ");	
	}
	else echo("<a href='visualizarSupermercados.php'>" . Todos . "</a> ");
	echo("</center><br>");
	
	include "conexao.inc";
    session_start();
    $caminhoLogoSupermercado = "../fotos/supermercados/";
    
    //abrir a conexao com banco
	try {
		$pdo = obterConexao();
		$sql = "SELECT * FROM supermercado WHERE nome LIKE '$caracter%'";

		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$supermercados = $stmt->fetchAll();

		if(!$supermercados) {
			echo("<p>Não existem supermercados cadastrados com a letra " . $caracter . ".");
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
			echo("</div>");
		}
	} catch (PDOException $e) {
		echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
	}
?>	

<div align='right'><a href='#principal'>Voltar ao topo</a></div>
</div>
</body>
</html>