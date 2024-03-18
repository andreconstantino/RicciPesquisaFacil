<div id="menu">
	<img class="logoAplicacao" src="../Imagens/logo.jpg" width="150" align="50">
	
	<br> <br>
	<label class="textodestacado"><a href="tela_inicial.php">Procurar Preço</a></label><br> <br>

	<label class="textodestacado"><a href="visualizarSupermercados.php">Supermercados</a></label><br> <br>

	<?php if(isset ($_SESSION['login'])) { ?>
	<label class="textodestacado"><a href="formularioCadastrarNovoSupermercado.php">Cadastrar novo supermercado</a></label><br> <br>
	<?php 
	} 
	?>
	<label class="textodestacado">Produtos</label><br> <br>
	<?php if(isset ($_SESSION['login'])) { ?>
	<label class="textodestacado"><a href="formularioCadastrarNovoProduto.php">Cadastrar novo produto</a></label><br> <br>
	<label class="textodestacado"><a href="formularioAlterarProduto.php">Alterar produto</a></label><br> <br>
	<label class="textodestacado"><a href="formularioInformarPreco.php">Informar preço de produto</a></label><br> <br>
	<label class="textodestacado"><a href="formularioCadastrarNovaCategoria.php">Cadastrar nova categoria</a></label><br> <br>
	<?php 
	} 
	?>
</div>