<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../estilo.css" />
<title>Cadastro novo produto</title>
<script type="text/javascript">
function verificarFormulario() {
    var nome = document.getElementById("nome").value;
    var fabricante = document.getElementById("fabricante").value;
    var categoria = document.getElementById("categoria").value;
    var descricao = document.getElementById("descricao").value;
	var foto = document.getElementById("foto").value;
	
    if (nome == '' || fabricante == '' || categoria == '' || descricao == '' || foto == '') {
        alert("Por favor preencha todos os campos.");
		return false;
    } else {
		return true;
    }
}
</script>
<body>

    <?php 
	include("header.php");
	?>
	<?php 
	include("menu.php");
	include "Upload.class.php";
	include "conexao.inc";
    session_start();
	?>
	
	<div id="principal" align="center">	
		<!-- <img src="<?php echo($_SESSION["foto"]);?>" width="40" align="40"> <?php echo($_SESSION["usuario"]);?> -->
		<form action='cadastrarNovoProduto.php' method='post' encType="multipart/form-data" onsubmit="return verificarFormulario()"	>

		<h2>Cadastrar um novo produto</h2><br>

		<table>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado">Nome:</label>
				</td>
				<td valign="center">
					<input type="text" id="nome" name="nome"><br><br>
				</td>
			</tr>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado">Fabricante:</label>
				</td>
				<td valign="center">
					<input type="text" id="fabricante" name="fabricante"><br><br>
				</td>
			</tr>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado">Categoria:</label>
				</td>
				<td valign="center">
					<select id="categoria" name="categoria">
					<?php

						try {
							$pdo = obterConexao();
							$sql = "select * from categoria";
					    
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
					    	$categorias = $stmt->fetchAll();
							foreach ($categorias as $categoria){
								echo("<option value='" . $categoria['id_categoria'] . "'>" . $categoria['nome_categoria'] . "</option>");
							}							 
					   	} catch (PDOException $e) {
							echo 'Falha de conexao com o banco de dados: ' . $e->getMessage();
						}
					?>
					</select><br><br>
				</td>
			</tr>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado">Descrição:</label>
				</td>
				<td valign="center">
					<input type="text" id="descricao" name="descricao"><br><br>
				</td>
			<tr>
				<td style="text-align: right; vertical-align: baseline">
					<label class="textodestacado" for="foto">Foto:</label>
		        </td>
		        <td>
		        	<input type="file" name="foto" id="foto"/>
	        		<img id="img"/>
		        	<script
		        		src="https://code.jquery.com/jquery-3.2.1.slim.js"
						integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg="
			 			crossorigin="anonymous"></script>
			 		<br> <br>
			 	</td>
			</tr>
	 	</table>
		<input type="submit" value="Cadastrar">
		
		<input type="reset" value="Cancelar">


		<input type="button" value="Sair" name="sair">
	</form>
		
	</div>
</div>
</body>
</html>