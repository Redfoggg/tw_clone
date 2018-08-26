<?php  
	require_once('db.class.php');

	$usr = $_POST['usuario'];
	
	$email = $_POST['email'];
	
	$pass = md5($_POST['senha']);

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$usuario_existe = false;
	$email_existe = false;
//verificar usuario já existente
	$sql1 = "SELECT * FROM usuarios WHERE usuario = '$usr'";
	if($resultado_id = mysqli_query($link, $sql1)){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		if(isset($dados_usuario['usuario'])) {
			$usuario_existe = true;
		}
	} else {
		echo "Erro na localização do usuário";
	}

//verificar email já existente
	$sql2 = "SELECT * FROM usuarios WHERE email = '$email'";
	if($resultado_id = mysqli_query($link, $sql2)){
		$dados_usuario = mysqli_fetch_array($resultado_id);
		if(isset($dados_usuario['email'])) {
			$email_existe = true;
		}
	} else {
		echo "Erro na localização do Email";
	}
   	if ($usuario_existe || $email_existe) {

   		$retorno_get = '';

   		if($usuario_existe){
   			$retorno_get.= "erro_usuario=1&";
   		}
   		if($email_existe){
   			$retorno_get.= "erro_email=1&";
   		}

   		header('Location: inscrevase.php?'.$retorno_get);
   		die();
   	}

	
	$sql = "INSERT into usuarios(usuario, email, senha) values ('$usr', '$email', '$pass')";
	
	//executar a query sql

	if(mysqli_query($link, $sql)) {
		echo "Usuário registrado com sucesso";
	} else {
		echo "Erro ao cadastrar usuário";
	}

?>
