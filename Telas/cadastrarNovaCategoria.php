<?php
	include "Upload.class.php";
	include "conexao.inc";
    session_start();
	
    $nomecat = $_POST["nomecat"];

	//abrir a conexao com banco
	try {
		$pdo = obterConexao();
		$sql = "INSERT INTO categoria (nome_categoria) VALUES ";
		$sql .= "('$nomecat');";
    
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
    
		if($stmt->rowCount() != 1)
			echo "<h2>Erro ao inserir categoria!</h2>"; 
   	} catch (PDOException $e) {
		echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
	}
	
	 header('location:Tela_inicial.php');
?>