<?php
	include "Upload.class.php";
	include "conexao.inc";
    session_start();
	
    $nome = $_POST["nome"];
    $rua = $_POST["rua"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
	$telefone = $_POST["telefone"];
	$cidade = $_POST["cidade"];
	$logo = $_POST["logo"];

	if ((isset($_POST["submit"])) && (! empty($_FILES['logo']))){
		$upload = new Upload($_FILES['logo'], 1000, 800, "C:/xampp/htdocs/TCCBruno/fotos/supermercados/");
		$nomeLogo = $upload->salvar();
	} else {
		echo "problema ao salvar a foto!";
		exit();
	}
	
    //abrir a conexao com banco
	try {
		$pdo = obterConexao();
		$sql = "INSERT INTO supermercado (codigo, nome, rua, numero, bairro, codigoCidade, telefone, logo) VALUES ";
		$sql .= "('$codigo','$nome','$rua','$numero', '$bairro', $cidade, '$telefone', 
			'$nomeLogo');";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() != 1)
			echo "<h2>Erro ao inserir supermercado!</h2>"; 
   	} catch (PDOException $e) {
		echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
	}
	
	header('location:Tela_inicial.php');
?>