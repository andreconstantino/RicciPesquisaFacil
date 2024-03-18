<?php
	include "Upload.class.php";
	include "conexao.inc";
    session_start();
	
    $usuario = $_POST["usuario"];  
    $email = $_POST["email"]; 
    $cidade = $_POST["cidade"];
    $senha = $_POST["senha"];
	$repetir = $_POST["repetir"];

	if($senha != $repetir) {
		echo "ERRO: a senha deve ser igual nos campos senha e repetir senha.";
		exit();
	}

	if ((isset($_POST["submit"])) && (! empty($_FILES['foto']))){
		$upload = new Upload($_FILES['foto'], 1000, 800, "C:/xampp/htdocs/TCCBruno/fotos/");
		$nome_foto = $upload->salvar();
	} else {
		echo "problema ao salvar a foto!";
		exit();
	}

    //abrir a conexao com banco
	try {
		$pdo = obterConexao();
		$sql = "INSERT INTO usuario (nome, email, cidade, senha, foto) VALUES ";
		$sql .= "('$usuario','$email','$cidade','$senha', '$nome_foto');";
    
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
    
		if($stmt->rowCount() != 1)
			echo "<h2>Erro ao inserir usuario!</h2>"; 
   	} catch (PDOException $e) {
		echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
	}

	//adiciona o usuario na sessão
	$_SESSION["usuario"] = $usuario; 
	$_SESSION["foto"] = "http://localhost/TCCBruno/fotos/" . $nome_foto ;
	
	 header('location:Tela_inicial.php');
?>