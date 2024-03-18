<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../estilo.css" />
<title>Verificar login</title>
<body>

<?php
	include "conexao.inc";
    session_start();
	unset($_SESSION['erroLogin']);
    $nomeUsuario = $_POST["usuario"];  
	$senha = $_POST["senha"];  
    
    //abrir a conexao com banco
	try {
		$pdo = obterConexao();
		$sql = "SELECT * FROM usuario WHERE nome = '" . $nomeUsuario . "' AND "
			. "senha = '" . $senha . "'";

		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$usuario = $stmt->fetch();

		if($usuario) {
			$_SESSION['login'] = true;
			$_SESSION['foto'] = "../fotos/" . $usuario['foto'];
			$_SESSION['usuario'] = $usuario['nome'];
			header("Location: tela_inicial.php");	
		} else {
			$_SESSION['erroLogin'] = true;
			header("Location: formularioLogar.php");	
		}
		
		
	} catch (PDOException $e) {
		echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
	}
?>
</body>
</html>