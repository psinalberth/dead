<?php 
/**
* Módulo que contém as funções básicas, as quais serão aplicadas em todas as páginas
* do projeto.
* @author inalberth
*/

/**
* Obtém o cabeçalho padrão para o projeto.
*
* @param titulo Título a ser exibido na página.
*/
function get_header($titulo) {
	echo '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="resources/css/ead.css" type="text/css">
	<link rel="stylesheet" href="resources/css/bootstrap.min.css" type="text/css">
	<script src="resources/js/bootstrap.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>';
	/*<header>
		<nav class="navbar navbar-default navbar-fixed-top">
		  			<div class="container">
		  				<ul class="nav navbar-nav">
		  					<li><a href="#">Home</a></li>
		  					<li><a href="#">Customers</a></li>
		  					<li><a href="#">Suppliers</a></li>
		  					<li><a href="#">Products</a></li>
		  				</ul>
		  		</nav>
	</header>'
	;*/
}

/**
* Obtém o rodapé padrão para o projeto.
*/
function get_footer() {

}

function put_session() {

	session_start();
	$_SESSION["user"] = 18;
	echo $_SESSION["user"];
}

function _config($path) {

	if (isset($path)) {

		if ($path == 'adicionar') {
			$path = 'usuarios/' . $path;
		}

		$path = $path . '.php';
		header("Location: index.php");
		//include_once($path);

	} else {

		include_once('login.php');
	}
}

function listar($conexao) {

	$programas = array();
	$query = "SELECT * FROM AREA_ACESSO";

	mysqli_query($conexao, "SET NAMES 'utf8'");
	mysqli_query($conexao, 'SET character_set_connection=utf8');
	mysqli_query($conexao, 'SET character_set_client=utf8');
	mysqli_query($conexao, 'SET character_set_results=utf8');
	$result = mysqli_query($conexao, $query);

	while ($programa = mysqli_fetch_assoc($result)){
		array_push($programas, $programa);
	}

	return $programas;
}
