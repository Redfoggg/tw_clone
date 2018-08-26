<?php 
	
	

	require_once('db.class.php');


	$sql = " SELECT * FROM usuarios";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);
	//retorno de registros.
	if ($resultado_id) {
		$dados_usuario = array(); 
		while($linha = mysqli_fetch_array($resultado_id, MYSQLI_NUM)){
			$dados_usuario[] = $linha;
		}
		foreach($dados_usuario as $usuario) {
			var_dump($usuario);
			echo '<br>';
		}
	} 
	else {
		echo "Execução da consulta errada";
	}

	

?>