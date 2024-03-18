<?php
	include "Upload.class.php";
	include "conexao.inc";
    session_start();
	
	$codigo = $_POST["codigo"];
    $nome = $_POST["nome"];  
    $fabricante = $_POST["fabricante"];
    $categoria = $_POST["categoria"];
    $descricao = $_POST["descricao"];
    
	if ((! empty($_FILES['foto']))){
		$upload = new Upload($_FILES['foto'], 1000, 800, "C:/xampp/htdocs/TCCBruno/fotos/produtos/");
		$nome_foto = $upload->salvar();
	} else {
		echo "problema ao salvar a foto!";
		exit();
	}

    //abrir a conexao com banco
	try {
		$pdo = obterConexao();
		$sql = "UPDATE produto SET nome='" . $nome 
			. "' ,categoria='" . $categoria 
			. "' ,descricao='" . $descricao
			. "' ,foto='" . $nome_foto
			. "' WHERE Codigo =" . $codigo;
 		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount() != 1)
			echo "<h2>Erro ao atualizar produto!</h2>"; 
   	} catch (PDOException $e) {
		echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
	}
	
	header('location:Tela_inicial.php');
 ?>