<?php

function obterConexao() {
    //definicao do BD
	$host = 'localhost';
	$database = 'riccipf';
	$userdatabase = 'root';
	$passworddatabase = '';
	
    //abrir a conexao com banco
	try {
		$pdo = new PDO("mysql:host=$host;dbname=$database", $userdatabase, $passworddatabase);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	} catch (PDOException $e) {
		echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
	}
	return $pdo;
}


?>