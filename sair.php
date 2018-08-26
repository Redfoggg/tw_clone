<?php 

	session_start();
	
	unset($_SESSION['usuario']);
	unset($_SESSION['email']);

	header('refresh: 1; index.php');
	echo "Desconectando...";

	


?>