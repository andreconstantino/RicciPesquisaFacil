<?php
	include "Upload.class.php";
	include "conexao.inc";
    session_start();
	
    $supermercado = $_POST["cod_supermercado"];
    $produto = $_POST["cod_produto"]; 
    $data = $_POST["data"];
    $preco = $_POST["preco"];

    //abrir a conexao com banco
	try {
		$pdo = obterConexao();
		$sql = "INSERT INTO vende (cod_supermercado, cod_produto, data, preco) VALUES ";
		$sql .= "('$supermercado','$produto','$data','$preco');";
    
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
    
		if($stmt->rowCount() != 1)
			echo "<h2>Erro ao inserir preço de um produto!</h2>"; 
   	} catch (PDOException $e) {
		echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
	}

	
	 header('location:Tela_inicial.php');
?>